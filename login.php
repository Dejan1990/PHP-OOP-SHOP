<?php
require_once "app/config/config.php";
require_once "app/classes/User.php";

$user = new User();
if ($user->is_logged()) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $result = $user->login($username, $password);

    if (!$result) {
        $_SESSION['message']['type'] = 'danger';
        $_SESSION['message']['text'] = 'Netacan username ili sifra!';
        header("Location: login.php");
        exit();
    }

    $_SESSION['message']['type'] = 'success';
    $_SESSION['message']['text'] = 'Uspesno ste se ulogovali!';
    header("Location: index.php");
    exit();
}
?>
<?php require_once "inc/header.php"; ?>
<div class="row justify-content-center">
    <div class="col-lg-5">
        <h3 class="text-center py-5">Login</h3>
        <form method="POST" action="" class="mb-3">
            <div class="form-group mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <a href="register.php">Sign Up</a>
    </div>
</div>
<?php require_once "inc/footer.php"; ?>