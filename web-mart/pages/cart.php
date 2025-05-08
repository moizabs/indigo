<?php
session_start();

// Include your database connection file
include '../login/config.php';

if (isset($_GET['product_id'])) {
    $proid = $_GET['product_id'];

    // Fetch quantity from the database for the product
    $query = "SELECT product_stock FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $proid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantity = $row['product_stock'];

        // Check if quantity is greater than zero
        if ($quantity > 0) {
            // If session cart is not empty
            if (!empty($_SESSION['cart'])) {
                $acol = array_column($_SESSION['cart'], 'product_id');
                if (in_array($proid, $acol)) {
                    $_SESSION['cart'][$proid]['qty'] += 1;
                } else {
                    $item = [
                        'product_id' => $proid,
                        'qty' => 1
                    ];
                    $_SESSION['cart'][$proid] = $item;
                }
            } else {
                // If cart is completely empty, then store item in session cart
                $item = [
                    'product_id' => $proid,
                    'qty' => 1
                ];
                $_SESSION['cart'][$proid] = $item;
            }

            header("location: product_detail.php?product_id=$proid");
            exit(); // Stop further execution
        } else {
            // If quantity is zero, redirect back to product_detail.php
            header("location: product_detail.php?product_id=$proid&error=quantity_zero");
            exit(); // Stop further execution
        }
    } else {
        // If product not found in database, handle accordingly
        header("location: products.php");
        exit(); // Stop further execution
    }
} else {
    // If product_id is not set, handle accordingly
    header("location: products.php");
    exit(); // Stop further execution
}
?>
