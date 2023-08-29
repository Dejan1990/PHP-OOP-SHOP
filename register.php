<?php

require_once "app/config/config.php";
require_once "app/classes/User.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();

    $created = $user->create($name, $username, $email, $password);

    if ($created) {
        $_SESSION['message']['type'] = "success"; // success or danger
        $_SESSION['message']['text'] = "Uspesno registrovan nalog!";
        //"<script>window.location.href = 'index.php';</script>";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message']['type'] = "danger"; // success or danger
        $_SESSION['message']['text'] = "Greska!";
        header("Location: register.php");
        // "<script>window.location.href = 'register.php';</script>";
        exit();
    }
}

?>

<?php require_once "inc/header.php"; ?>

<h1 class="mt-5 mb-3">Registration</h1>

<form method="post" action="">
    <div class="form-group mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php require_once "inc/footer.php"; ?>