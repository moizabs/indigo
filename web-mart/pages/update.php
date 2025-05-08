<?php
session_start();

if ($_POST['update']) {

  $upid = $_POST['upid'];
  $acol = array_column($_SESSION['cart'], 'product_id');

  if (in_array($_POST['upid'], $acol)) {
    $_SESSION['cart'][$upid]['qty'] = $_POST['qty'];
  } else {
    $item = [
      'product_id' => $upid,
      'qty' => 1
    ];
    $_SESSION['cart'][$upid] = $item;
  }

  header("location: add_to_cart.php");
}