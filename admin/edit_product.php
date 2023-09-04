<?php

require_once "../app/config/config.php";
require_once "../app/classes/User.php";
require_once "../app/classes/Product.php";

$user = new User();

if ($user->is_logged() && $user->is_admin()) {
    $product_obj = new Product();
    $product = $product_obj->read($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_id = $_GET['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $image = $_POST['image'];

        $product_obj->update($product_id, $name, $price, $size, $image);

        header("Location: edit_product.php?id=".$product_id);
        exit();
    }
}
?>

<form action="" method="POST">
    <input type="text" name="name" id="name" value="<?= $product['name'] ?>">
    <input type="text" name="price" step="0.01" id="price" value="<?= $product['price'] ?>">
    <input type="text" name="size" id="size" value="<?= $product['size'] ?>">
    <input type="text" name="image" id="image" value="<?= $product['image'] ?>">
    <input type="submit" value="Update Product">
</form>
