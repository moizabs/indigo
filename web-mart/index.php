<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Include Bootstrap CSS and JavaScript -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/detail.css">

    <link rel="stylesheet" href="login/login-style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <style>
         .modal-content {
      background-color: #f8f9fa;
    }
    .modal-body {
      display: flex;
      align-items: center;
    }
    .modal-body img {
      max-width: 50%;
      margin-right: 20px;
    }
    .deal-text {
      font-size: 20px;
    }
    #popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    width: 600px; /* Set desired width */
    height: auto; /* Set desired height */
    background-color: white; /* Background color of the popup */
    padding: 20px; /* Padding for content inside the popup */
    border: 1px solid #ccc; /* Border */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Box shadow */
  }
  
  /* Styles for the overlay */
  #overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    z-index: 9998; /* Overlay should be behind the popup */
  }
  .splide__slide {
      text-align: center;
    }
    .category-card {
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .container {
  max-width: 1200px; /* Adjust as needed */
  margin: 0 auto;
}

.category-wrapper {
  display: grid;
  grid-template-columns: repeat(5, 1fr); /* 4 cards in a row */
  gap: 20px;
}

.category-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 90%; /* Ensure all cards take up full width */
  transition: 0.25s ease;
}

.category-card img {
  width: 150px; /* Ensure image takes up full width of card */
  height: auto; /* Maintain aspect ratio */
  mix-blend-mode: multiply;

}
.category-card p {
  text-align: center;
  margin: 10px 0;
}

/* Add hover effect */
.category-card:hover {
  transform: scale(1.05); /* Increase size of card on hover */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow effect */
}

    </style>
</head>

<body id="home">


<div id="overlay"></div>
<div id="popup">
    <a href="pages/products.php">
  <img src="assets/img/deal1.png" alt="Popup Image" style="width: 100%; height: auto;">
  </a>
</div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <div class="logo">
                    <img src="assets/img/logo.png" alt="indigigo shopify">
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
                    <a class="nav-link" href="pages/add_to_cart.php">
                        <img src="assets/img/cart.png" style="width: 3em; height: 2rem;" alt="">
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
    <!-- navbar end -->




    <!-- =========== Carousel / Hero section =========== -->
    <section class="container mt-5 hero d-flex">
    <div class="row">
        <div class="col-lg-3 slider-text pt-20">
            <h1 class="big-heading">Shop With Trust</h1>
            <p class="text-secondary d-none d-md-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos iure vel,
                autem ratione aspernatur in!</p>
            <a href="products.php" style="text-decoration: none;">
                <button class="transparent-orange">Shop Now</button>
            </a>
        </div>

        <div class="col-lg-7">
            <!-- Add content for col-lg-7 if needed -->
        </div>

        <div class="col-lg-2 d-none d-lg-block cards">
    <div class="one card-hover">
        <h3 class="font-weight-bold">Home Shopping</h3>
        <p>Get ready for a monthly dose of joy delivered right to your doorstep.</p>
    </div>

    <div class="two card-hover">
        <h3 class="font-weight-bold">Exclusive Offers</h3>
        <p>Unlock exclusive deals reserved for our valued members.</p>
    </div>

    <div class="three card-hover">
        <h3 class="font-weight-bold">Collections</h3>
        <p>Indulge in curated collections designed to elevate your living experience.</p>
    </div>
</div>

    </div>
</section>
<section>
<h1 class="my-3 text-center sub-heading">Our Categories</h1>
<div class="container">
    <!-- categories -->
<?php
include 'login/config.php';
$query = "SELECT id, category_name, category_image FROM categories";
$result = mysqli_query($conn, $query);

// Step 3: Generate HTML dynamically
if (mysqli_num_rows($result) > 0) {
    echo '<div class="container mt-4">';
    echo '<div class="category-wrapper">'; // Changed class name
  

    // Iterate through the results
    while ($row = mysqli_fetch_assoc($result)) {
        $categoryName = $row['category_name'];
        $imageUrl = $row['category_image'];
        $categoryId = $row['id'];
        echo '<div class="category-card">'; // Changed div structure
        echo '<img src="' . $imageUrl . '" alt="Category Image" width="40">';
        echo '<p><a href="pages/products.php?category_id=' . $categoryId . '" style="text-decoration: none; color: black;">'
         . $categoryName . '</a></p>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
} else {
    // No categories found
    echo 'No categories found';
}

// Close database connection
mysqli_close($conn);
?>
</div>

</section>



<section class="container our-products">
  <div class="px-3"> <!-- Added padding from left and right -->
    <h1 class="my-3 text-center sub-heading">Our Products</h1>
    <!-- Category Slider -->
    <?php
    include 'login/config.php';

    // Function to generate star rating
    function generateStarRating($rating)
    {
        $stars = "";
        $full_stars = floor($rating);
        $half_stars = ceil($rating - $full_stars);

        // Full stars
        for ($i = 0; $i < $full_stars; $i++) {
            $stars .= "<i class='fas fa-star text-warning'></i>";
        }

        // Half stars
        if ($half_stars > 0) {
            $stars .= "<i class='fas fa-star-half-alt text-warning'></i>";
        }

        // Remaining empty stars
        $remaining_stars = 5 - $full_stars - $half_stars;
        for ($i = 0; $i < $remaining_stars; $i++) {
            $stars .= "<i class='far fa-star text-warning'></i>";
        }

        return $stars;
    }

    // Fetching categories
    $sql_categories = "SELECT id, category_name FROM categories LIMIT 3";
    $result_categories = $conn->query($sql_categories);
    $counter = 0; // Counter to keep track of the number of products displayed

    if ($result_categories->num_rows > 0) {
        while ($row_category = $result_categories->fetch_assoc()) {
            $category_id = $row_category['id'];
            $category_name = $row_category['category_name'];

            echo "<div class='row align-items-center'>";
            echo "<div class='col-md-8'><h2>$category_name</h2></div>"; // Category name on the left
            echo "<div class='col-md-4 text-right'><a href='pages/products.php?category_id=$category_id' class='btn btn-sm' style='background-color: #f47321; color: white;'>See more</a></div>"; // See more button on the right
            echo "</div>";
            // Fetching products for each category
            $sql_products = "SELECT * FROM products WHERE category_id='$category_id' LIMIT 4";
            $result_products = $conn->query($sql_products);

            if ($result_products->num_rows > 0) {
                echo '<div class="row">';
                while ($row_product = $result_products->fetch_assoc()) {
                    $product_id = $row_product['product_id']; // Retrieve product id
                    $title = $row_product['product_name'];
                    $description = $row_product['product_description'];
                    $rating = $row_product['product_rating'];
                    $price = $row_product['product_price'];
                    // $image = $row_product['product_image'];

                    echo '<div class="col-md-3 mb-3">'; // Added margin bottom to remove space from bottom
                    echo "<a href='pages/product_detail.php?product_id=$product_id' style='text-decoration: none;'>"; // Anchor tag to make the entire card clickable
                    echo '<div class="card">';
                    echo "<img src='assets/img/Grocery.png' class='card-img-top' alt='$title'>";
                    echo '<div class="card-body">';
                    echo "<h5 class='card-title'>$title</h5>";
                    echo "<p class='card-text'>$description</p>";
                    echo "<p class='card-text'>Rating: " . generateStarRating($rating) . "</p>"; // Show star rating
                    echo "<p class='card-text'><i class='fas fa-clock'></i> EDT: 1 hour</p>"; // Estimated delivery time
                    echo "<p class='card-text'><strong>PKR $price</strong></p>"; // Bolded the price
                    echo '</div>';
                    echo '</div>';
                    echo "</a>"; // Close the anchor tag
                    echo '</div>';

                    $counter++;
                    if ($counter == 4) { // Display deal image after the first row of products
                        echo '<div class="container mt-4 mb-4">';
                        echo '<img src="assets/img/deal2.png" alt="" width="100%">';
                        echo '</div>';
                    }
                }
                echo '</div>';
            } else {
                echo "No products found for this category.";
            }
        }
    } else {
        echo "No categories found.";
    }

    $conn->close();
    ?>
  </div>
</section>



    <!-- -------------- Categories End --------------  -->


    <section class="container mt-5">

        <h1 style="font-weight: 600;">Flash Sales</h1>

        <div class="row flash-sales mt-5">

            <div class="col-lg-6 col-md-12 col-sm-12">
                <img src="assets/img/Grocery.png" alt="">
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-4 col-md-12 col-sm-12 text">

                <div class="big-heading mt-lg-5">
                    <div style="color: #fff;">Exclusive</div>
                    <div>Discounts</div>
                </div>

                <p class=" text-light mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, non,
                    esse quibusdam itaque corrupti saepe officia eum id natus doloremque inventore cupiditate asperiores
                    corrupti saepe officia eum id.</p>

               <a href="products.php" style="text-decoration: none;"> <button class="transparent-orange">Shop Now</button></a>
            </div>

        </div>

    </section>



    <!-- ----------------- Footer ----------------- -->
    <?php
      include 'includes/footer.php';
      ?>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const registerSuccess = urlParams.get('register');
            const LoginSuccess = urlParams.get('success');
            const Login = urlParams.get('Login');


            if (registerSuccess === 'success') {
                // Show Swal toast notification
                Swal.fire({
                    icon: 'success',
                    title: 'Registration Successful',
                    text: 'You have successfully registered.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }else if(registerSuccess === 'false'){
                Swal.fire({
                    icon: 'warning',
                    title: 'Registration Failed!',
                    text: 'You have not successfully registered.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }else if(LoginSuccess === 'true'){
                Swal.fire({
                    icon: 'success',
                    title: 'Logged-in Successful',
                    text: 'You have successfully Logged.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }else if(LoginSuccess === 'false'){
                Swal.fire({
                    icon: 'warning',
                    title: 'login Failed!',
                    text: 'Invalid Credientials. Please Login Again.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }
            else if(Login === 'false'){
                Swal.fire({
                    icon: 'warning',
                    title: 'Login First!',
                    text: 'You can not access the page.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }
        });
    </script>

<script>
window.onload = function() {
  // Set timeout for 3 seconds
  setTimeout(function() {
    // Show the overlay and popup after 3 seconds
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('popup').style.display = 'block';
  }, 3000); // 3000 milliseconds = 3 seconds

  // Close modal when clicking outside of it
  document.getElementById('overlay').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('popup').style.display = 'none';
  });
};
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide', {
      type: 'slide',
      perPage: 3, // Number of visible slides
      breakpoints: {
        768: {
          perPage: 2,
        },
        576: {
          perPage: 1,
        },
      },
      gap: '1rem', // Gap between slides
    }).mount();
  });
</script>
</body>

</html>