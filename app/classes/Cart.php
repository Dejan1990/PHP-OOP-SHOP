<?php 

class Cart 
{
    protected $conn;
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function add_to_cart($product_id, $user_id)
    {
        $sql = "INSERT INTO carts (product_id, user_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $product_id, $user_id);
        $stmt->execute();
    }

    public function get_cart_items()
    {
        $sql = "SELECT p.product_id, p.name, p.price, p.size, p.image FROM carts c INNER JOIN products p ON c.product_id = p.product_id WHERE c.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}