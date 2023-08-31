<?php
require_once "app/config/config.php";
require_once "app/classes/Cart.php";
require_once "app/classes/User.php";
require_once "app/classes/Order.php";

$user = new User();
if (!$user->is_logged()) {
    header("Location: login.php");
    exit();
}

$cart = new Cart();
$cart_items = $cart->get_cart_items(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order = new Order(); 
    $order = $order->create($cart_items);

    if ($order) {}
}
?>

<?php require_once "inc/header.php"; ?>
<form method="POST" action="">
    <div class="form-group mb-3">
        <label for="country">Drzava</label>
        <input type="text" class="form-control" id="country" name="country" required>
    </div>
    <div class="form-group mb-3">
        <label for="city">Grad</label>
        <input type="text" class="form-control" id="city" name="city" required>
    </div>
    <div class="form-group mb-3">
        <label for="zip">Postanski broj</label>
        <input type="text" class="form-control" id="zip" name="zip" required>
    </div>
    <div class="form-group mb-3">
        <label for="address">Adresa</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <button type="submit" class="btn btn-primary">Order</button>
</form>
<?php require_once "inc/footer.php"; ?>