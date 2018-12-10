<?php
session_start();

$_SESSION['admin_bank_id'] = false;
session_destroy();
header('location:index.php');
 ?>
