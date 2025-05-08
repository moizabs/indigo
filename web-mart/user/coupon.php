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
        .coupon-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 50px;
        }
        .coupon-card {
            width: 250px;
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .coupon-image {
            width: 100px;
            margin-bottom: 20px;
        }
        .coupon-code {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }
        .coupon-expiry {
            font-size: 14px;
            color: #888;
        }
        .expired {
            color: #dc3545;
            filter: grayscale(100%);
            pointer-events: none; /* Disable click on expired coupons */
            opacity: 0.5; /* Reduce opacity for visual indication */
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
            <li class="nav-item"><a class="nav-link" href="orders.php"><i class="fas fa-clipboard-list"></i> Orders</a></li>
            <li class="nav-item"><a class="nav-link active1" href="coupon.php"><i class="fas fa-tags"></i> Coupon Code</a></li>
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
            <li class="nav-item"><a class="nav-link" href="orders.php"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li class="nav-item active"><a class="nav-link" href="coupon.php"><i class="fas fa-tag"></i> Coupon Code</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i> Contact Us</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div></div>
    <div class="content">
    <div class="container">
        <h2 class="mb-4">My Coupons</h2>
        <div class="coupon-container">
            <!-- Coupon Card Example (Replace with dynamic content from database) -->
            <div class="coupon-card">
                <img src="coupon_image.jpg" alt="Coupon Image" class="coupon-image">
                <div class="coupon-code">SAVE20</div>
                <div class="coupon-expiry">Expires on June 30, 2024</div>
                <i class="fas fa-check-circle text-success"></i> <!-- Active icon -->
            </div>
            <div class="coupon-card expired">
                <img src="coupon_image.jpg" alt="Coupon Image" class="coupon-image">
                <div class="coupon-code">FREESHIP</div>
                <div class="coupon-expiry">Expired on May 15, 2024</div>
                <i class="fas fa-times-circle text-danger"></i> <!-- Expired icon -->
            </div>
            <!-- Add more coupon cards dynamically based on user's coupons -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
