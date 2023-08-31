<?php
require_once "app/config/config.php";
require_once "app/classes/Cart.php";
require_once "app/classes/User.php";

$user = new User();
if (!$user->is_logged()) {
    header("Location: login.php");
    exit();
}

$cart = new Cart();
$cart_items = $cart->get_cart_items(); 
?>
<?php require_once "inc/header.php"; ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Size</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cart_items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['size']) ?></td>
                <td>$<?= htmlspecialchars($item['price']) ?></td>
                <td>
                    <img src="<?= htmlspecialchars($item['image']) ?>" height="50">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once "inc/footer.php"; ?>
