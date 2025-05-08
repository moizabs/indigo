<?php
include '../login/config.php';
// Retrieve the coupon code from the form submission
if(isset($_POST['coupon']) && isset($_POST['discount'])) {
    $coupon_code = $_POST['discount'];

    // SQL query to fetch coupon details based on the provided coupon code
    $sql = "SELECT * FROM coupon WHERE coupon_code = '$coupon_code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Coupon code exists, check expiry date
        $row = $result->fetch_assoc();
        $expiry_date = $row['expiry_date'];
        $discount_percentage = $row['discount_percentage'];

        // Check if the coupon has expired
        $current_date = date('Y-m-d');
        if ($current_date <= $expiry_date) {
            // Coupon is valid, redirect with coupon percentage in URL
            header("Location: checkout.php?coupon_code=$coupon_code&discount_percentage=$discount_percentage");
            exit();
        } else {
            // Coupon has expired, redirect back with error message
            header("Location: checkout.php?error=expired");
            exit();
        }
    } else {
        // Coupon code not found, redirect back with error message
        header("Location: checkout.php?error=invalid");
        exit();
    }
} else {
    // Handle cases where form data is not set properly
    header("Location: checkout.php?error=missing");
    exit();
}

$conn->close();
?>
