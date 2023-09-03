<?php
require_once "app/config/config.php";
require_once "app/classes/Order.php";
require_once "app/classes/User.php";

$user = new User();
if (!$user->is_logged()) {
    header("Location: login.php");
    exit();
}

$order = new Order();
$orders = $order->get_orders();
?>
<?php require_once "inc/header.php"; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Size</th>
            <th scope="col">Image</th>
            <th scope="col">Delivery Address</th>
            <th scope="col">Order Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td class="pt-3"><?= htmlspecialchars($order['order_id']) ?></td>
                <td class="pt-3"><?= htmlspecialchars($order['name']) ?></td>
                <td class="pt-3"><?= htmlspecialchars($order['quantity']) ?></td>
                <td class="pt-3"><?= htmlspecialchars($order['price']) ?></td>
                <td class="pt-3"><?= htmlspecialchars($order['size']) ?></td>
                <td>
                    <img src="<?= htmlspecialchars($order['image']) ?>" height="50">
                </td>
                <td class="pt-3"><?= htmlspecialchars($order['delivery_address']) ?></td>
                <td class="pt-3"><?= htmlspecialchars($order['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once "inc/footer.php"; ?>