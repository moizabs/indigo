<?php
session_start();

include '../login/config.php';

function generateOrderID() {
    global $conn;

    $characters = '0123456789';
    $orderID = 'PKKHI';
    $length = 6 - strlen($orderID); // Adjust length based on existing prefix length

    // Generate random characters and numbers
    for ($i = 0; $i < $length; $i++) {
        $orderID .= $characters[rand(0, strlen($characters) - 1)];
    }

    // Check if the generated order_id already exists
    $query = "SELECT order_id FROM orders WHERE order_id = '$orderID'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // If order_id already exists, regenerate
        return generateOrderID();
    } else {
        // If order_id is unique, return it
        return $orderID;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $paymentMethod = $_POST['paymentMethod'];
    $totalPrice = $_POST['total_price'];
    $discountAmount = $_POST['discount_amount'];
    $couponCode = $_POST['coupon_code'];
    $productIds = $_POST['product_ids'];
    $quantities = $_POST['quantities'];

    $user_id = $_POST['user_id'];

    // Generate unique order ID
    $order_id = generateOrderID();

    // SQL query to create a table for orders if not exists
    $sql = "CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        order_id VARCHAR(10),
        user_id INT NOT NULL, 
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        email VARCHAR(255),
        address VARCHAR(255) NOT NULL,
        country VARCHAR(255) NOT NULL,
        city VARCHAR(255) NOT NULL,
        zip VARCHAR(20) NOT NULL,
        payment_method VARCHAR(50) NOT NULL,
        total_price DECIMAL(10,2) NOT NULL,
        discount_amount DECIMAL(10,2) NOT NULL,
        coupon_code VARCHAR(50),
        product_ids TEXT NOT NULL,
        quantities TEXT NOT NULL,
        order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // SQL query to insert the order data into the orders table
        $sql = "INSERT INTO orders (order_id, user_id, first_name, last_name, email, address, country, city, zip, payment_method, total_price, discount_amount, coupon_code, product_ids, quantities) VALUES ('$order_id', '$user_id', '$firstName', '$lastName', '$email', '$address', '$country', '$city', '$zip', '$paymentMethod', '$totalPrice', '$discountAmount', '$couponCode', '$productIds', '$quantities')";

        if ($conn->query($sql) === TRUE) {
            unset($_SESSION['cart']);
            header("location: thankyou.php?order_id=$order_id");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
