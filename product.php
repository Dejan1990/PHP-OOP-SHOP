<?php
require_once "app/config/config.php";
require_once "app/classes/Product.php";
require_once "app/classes/Cart.php";

$product = new Product();
$product = $product->read($_GET['product_id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        $_SESSION['message']['type'] = 'danger';
        $_SESSION['message']['text'] = 'Morate biti ulogovani da bi kupili proizvod!';
        exit();
    }

    $product_id = $product['product_id'];
    $user_id = $_SESSION['user_id'];
    $quantity = $_POST['quantity'];

    $cart = new Cart();
    $cart->add_to_cart($product_id, $user_id, $quantity);

    header("Location: cart.php");
    exit();
}
?>
<?php require_once "inc/header.php"; ?>
<div class="row">
    <?php if ($product['image']): ?>
        <div class="col-lg-6">
            <img src="<?= $product['image'] ?>" class="img-fluid">
        </div>
    <?php endif; ?>
    <div class="col-lg-6">
        <h2>
            <?= $product['name'] ?>
        </h2>
        <p>Size:
            <?= $product['size'] ?>
        </p>
        <p>Price: $
            <?= $product['price'] ?>
        </p>
        <form action="" method="POST">
            <input type="number" name="quantity" id="quantity">
            <button type="submit" class="btn btn-primary">Add to cart</button>
        </form>
    </div>
</div>
<?php require_once "inc/footer.php";