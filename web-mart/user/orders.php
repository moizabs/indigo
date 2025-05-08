<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: index.php?Login=false");
    exit();
}

$name = $_SESSION["username"];

include '../login/config.php';

// Fetch total spend for the user from orders table
$user_id = $_SESSION["user_id"]; // Assuming you have a user_id stored in the session
$total_spend_query = "SELECT SUM(total_price) AS total_spend FROM orders WHERE user_id = $user_id";
$total_spend_result = $conn->query($total_spend_query);
$row = $total_spend_result->fetch_assoc();
$total_spend = $row["total_spend"];

// Fetch user orders
$user_orders_query = "SELECT * FROM orders WHERE user_id = $user_id";
$user_orders_result = $conn->query($user_orders_query);

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Indigo Shopify</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <style>
        /* Center content when sidebar is hidden */
        @media (max-width: 576px) {
            .content {
                margin-left: auto !important;
                margin-right: auto !important;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none d-xl-none d-sm-block">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Indigo Shopify </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             <li class="nav-item "><a class="nav-link" href="profile.php"><i class="fas fa-home"></i> Home</a></li>
            <li class="nav-item"><a class="nav-link active1" href="orders.php"><i class="fas fa-clipboard-list"></i> Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="coupon.php"><i class="fas fa-tags"></i> Coupon Code</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php"><i class="fas fa-phone"></i> Contact US</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-undo"></i> Logout</a></li>
        </ul>
    </div>
  </div>
</nav>
    <!-- Sidebar -->
    <div class="sidebar d-none d-sm-block">
        <h2>Dashboard</h2>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-home"></i> Home</a></li>
            <li class="nav-item active"><a class="nav-link" href="orders.php"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="coupon.php"><i class="fas fa-tag"></i> Coupon Code</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i> Contact Us</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div></div>

<!-- Page Content -->
<div class="content">
    <h2>Your Orders</h2>
    <?php if ($user_orders_result->num_rows > 0) { ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order ID</th>
                <th scope="col">Date</th>
                <th scope="col">Total Price</th>
                <!-- Add more columns as needed -->
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            while ($order_row = $user_orders_result->fetch_assoc()) {
                ?>
                <tr>
                    <th scope="row"><?php echo $count++; ?></th>
                    <td><?php echo $order_row["order_id"]; ?></td>
                    <td><?php echo $order_row["order_date"]; ?></td>
                    <td><?php echo $order_row["total_price"]; ?></td>
                    <!-- Add more columns as needed -->
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="text-center">
            <img src="../assets/img/Co-workers.gif" alt="" width="350px">
            <p>No orders found.</p>
            <a href="#" class="btn btn-primary">Order Now</a>
        </div>
    <?php } ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
