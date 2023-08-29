<?php

class User 
{
    protected $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    
    public function create($name, $username, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $username, $email, $hashed_password);
        $result = $stmt->execute();

        //var_dump($result);
        //exit;

        if ($result) {
           // $_SESSION['user_id'] = $result->insert_id; // id registrovanog usera -> ulogovan je
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password)
    {
        $sql = "SELECT user_id, password FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                return true;
            }
        }

        return false;
    }
}