<?php
session_start();

if (isset($_GET['id'])) {
  $proid = $_GET['id'];

  unset($_SESSION['cart'][$proid]);
  header("location: add_to_cart.php");
}

;?>