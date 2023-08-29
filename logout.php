<?php

require_once "app/config/config.php";
require_once "app/classes/User.php";

$user = new User();
$user->logout();

$_SESSION['message']['type'] = 'success';
$_SESSION['message']['text'] = 'Uspesno ste se izlogovali!';
header("Location: login.php");
exit();