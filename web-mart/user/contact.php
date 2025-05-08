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
        /* Styling for the contact form */
        .contact-form {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .contact-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .contact-form .form-group {
            position: relative;
        }
        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            padding-left: 35px;
        }
        .contact-form textarea {
            height: 150px;
        }
        .contact-form .fa-icon {
            position: absolute;
            top: 12px;
            left: 10px;
            color: #ccc;
            transition: color 0.3s ease;
        }
        .contact-form .form-group:focus-within .fa-icon {
            color: #333;
        }
        .contact-form button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .contact-form button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .contact-info {
            margin-top: 50px;
        }
        .contact-info p {
            margin-bottom: 10px;
            font-size: 16px;
        }
        .social-icons {
            margin-top: 20px;
        }
        .social-icons a {
            font-size: 24px;
            margin-right: 10px;
            color: #007bff;
            transition: color 0.3s ease;
        }
        .social-icons a:hover {
            color: #0056b3;
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
            <li class="nav-item"><a class="nav-link" href="coupon.php"><i class="fas fa-tags"></i> Coupon Code</a></li>
            <li class="nav-item"><a class="nav-link active1" href="contact.php"><i class="fas fa-phone"></i> Contact US</a></li>
            <li class="nav-item"><a class="nav-link" href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
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
        <li class="nav-item"><a class="nav-link" href="coupon.php"><i class="fas fa-tag"></i> Coupon Code</a></li>
        <li class="nav-item active"><a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i> Contact Us</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>
<!-- Page Content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-form">
                    <h2>Contact Us</h2>
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                            <i class="fas fa-user fa-icon"></i>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            <i class="fas fa-envelope fa-icon"></i>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Your Message" rows="5" required></textarea>
                            <i class="fas fa-pencil-alt fa-icon"></i>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-info">
                    <h2>Contact Information</h2>
                    <p><i class="fas fa-phone"></i> Phone: +1234567890</p>
                    <p><i class="fas fa-envelope"></i> Email: info@example.com</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Hide Font Awesome icons on input focus
    $('.form-control').focus(function() {
        $(this).prev('.fa-icon').css('display', 'none');
    });
</script>
</body>
</html>
