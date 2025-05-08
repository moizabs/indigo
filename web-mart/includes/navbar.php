
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css ">
    <link rel="stylesheet" href="../login/login-style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
</head>
<body id="body">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <div class="logo">
                    <img src="../assets/img/logo.png" alt="indigigo shopify">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex align-content-center">
                    <li class="nav-item mx-2 d-flex mx-sm-auto mx-md-auto xs-link">
                        <input class="form-control search-bar" type="search" placeholder="search">
                        <button class="search-button"><i class="bi bi-search"></i></button>
                    </li>
                    <li class="nav-item mx-2">
                    <a class="nav-link" href="add_to_cart.php">
                        <img src="../assets/img/cart.png" style="width: 3em; height: 2rem;" alt="">
                        <?php if(isset($_SESSION['loggedin'])) : ?>
                            <?php $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                            <?php if ($cartCount > 0) : ?>
                                <sup style="color: #f47321; background-color: white; padding: 5px; border-radius: 60%;">
                                    <?php echo $cartCount; ?>
                                </sup>
                            <?php else : ?>
                                <sup style="color: #f47321; background-color: white; padding: 5px; border-radius: 60%;">
                                    0
                                </sup>
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>

                    </li>
                    <li class="nav-item mx-2">
                    <?php
                            if(isset($_SESSION['loggedin'])) {
                        ?>
                                <a class="nav-link text-light" href="user/profile.php">Profile</a>
                        <?php
                            } else {
                        ?>
                                <button type="button" class="btn btn-transparent bg-transparent" data-toggle="modal" data-target="#exampleModal">
                                    <a class="nav-link text-light" id="loginButton" href="#">Login</a>
                                </button>
                        <?php
                            }
                        ?>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link orange transparent-orange" href="#">Sign Up</a>
                    </li>
                    <li class="nav-item mx-2 mt-lg-1 d-flex mx-sm-auto mx-md-auto xs-link">
                        <a class="nav-link urdu" href="#">اردو</a>
                        <div class="orange-side"></div>
                    </li>


             </ul>

            </div>
        </div>
    </nav>

 <!-- -------------- Modal -------------- -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document"  style="margin-top: 80px !important;">
            <div class="modal-content">
                <div class="modal-header" hidden>

                </div>
                <div class="modal-body bg-transparent">

                    <!-- signup -->
                    <div class="section">
                        <div class="container">
                            <div class="row full-height justify-content-center">
                                <div class="col-12 text-center align-self-center py-5">
                                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                                        <label for="reg-log"></label>

                                        <div class="card-3d-wrap mx-auto">
                                            <div class="card-3d-wrapper">
                                                <div class="card-front">
                                                    <div class="center-wrap">
                                                        <div class="section text-center">

                                                            <h4 class="mb-4 pb-3">Log In</h4>
                                                            <form action="login.php" method="post">
                                                                <div class="form-group">
                                                                    <input type="email" class="form-style" name="email"
                                                                        placeholder="Email">
                                                                    <i class="input-icon uil uil-at"></i>
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <input type="password" class="form-style"
                                                                        name="password" placeholder="Password">
                                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                                </div>
                                                                <button type="submit" name="login" class="btn mt-4">Login</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="card-back">
                                                    <div class="center-wrap">
                                                        <div class="section text-center">
                                                            <form method="post" action="signup.php">
                                                                <h4 class="mb-3 pb-3">Sign Up</h4>

                                                                <div class="form-group">
                                                                    <input type="text" name="name" class="form-style"
                                                                        placeholder="Full Name">
                                                                    <i class="input-icon uil uil-user"></i>
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <input type="tel" class="form-style" name="number"
                                                                        placeholder="Phone Number">
                                                                    <i class="input-icon uil uil-phone"></i>
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <input type="email" class="form-style" name="email"
                                                                        placeholder="Email">
                                                                    <i class="input-icon uil uil-at"></i>
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <input type="password" class="form-style"
                                                                        name="password" placeholder="Password">
                                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                                </div>
                                                                <input type="submit" class="btn mt-4" value="Register">
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>
</html>