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
            header("location: add_to_cart.php");
            exit(); // Stop further execution
        } 
    }
} 
?>

<?php

if (!isset($_SESSION["username"])) {
    header("Location: ../index.php?Login=false");
    exit();
}
include '../login/config.php'; // Assuming this file contains your database connection code

// Function to fetch product details by ID
function getProductDetails($conn, $productId) {
    $query = "SELECT * FROM products WHERE product_id = $productId";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}
$total_price =0 ;
$delivery = 200;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart | indigo Shopify</title>

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
        <link rel="stylesheet" href="../assets/css/detail.css ">

  <style>
    body{
    margin-top:20px;
    background:#eee;
}
.ui-w-40 {
    width: 40px !important;
    height: auto;
}

.card{
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);    
}

.ui-product-color {
    display: inline-block;
    overflow: hidden;
    margin: .144em;
    width: .875rem;
    height: .875rem;
    border-radius: 10rem;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    vertical-align: middle;
}
.card1{
    border: 2px solid #702b88;
    padding: 20px;
    border-radius: 20px;
}
  </style>
      </head>
<body>
<?php
    include '../includes/navbar.php';

    echo '<div class="container">
            <div class="table-responsive">
                <table class="table my-3">
                    <thead>
                        <tr class="text-center">
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Action</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>';

    if (isset($_SESSION['cart'])) {
        $total_price = 0; // Initialize total price

        foreach ($_SESSION['cart'] as $cart) {
            // Get product details
            $productDetails = getProductDetails($conn, $cart['product_id']);
            if ($productDetails) {
                $price = $productDetails['product_price'] * $cart['qty']; // Calculate total price for the product
                $total_price += $price;
                echo '<tr class="text-center">
                        <td>
                            <img src="../'. $productDetails['product_image'] .'" width="60px" alt=""><br>
                            <strong>' . $productDetails['product_name'] . '</strong>
                        </td>
                        <td>
                            <form action="update.php" method="post">
                                <input class="form-control" type="number" value="' . $cart['qty'] . '" name="qty" min="1">
                                <input type="hidden" name="upid" value="' . $cart['product_id'] . '">
                        </td>
                        <td>
                            <input type="submit" name="update" value="Update" class="btn btn-sm btn-warning">
                            </form>
                        </td>
                        <td>PKR ' . $price  .'</td>
                        <td><a class="btn btn-sm btn-danger" style="border-radius: 50%;" href="removecartitem.php?id=' . $cart['product_id'] . '">X</a></td>
                    </tr>';
            } else {
                // Handle case where product details are not found
                echo '<tr><td colspan="5">Product details not found for ID: ' . $cart['product_id'] . '</td></tr>';
            }
        }
    } else {
        echo '<tr><td colspan="5" class="text-center">Cart is empty
            <a href="products.php" class="btn btn-warning">Continue Shopping</a>
            </td></tr>';
    }

    echo '</tbody></table></div></div>';
?>





<div class="container">
    <div class="row ">
        <div class="col-lg-6 d-none d-lg-block" id="desktop">
        <h2>Related Items</h2>
       
        <div class="px-3"> <!-- Added padding from left and right -->
        <!-- Category Slider -->
        <?php

        // Fetching categories
        $sql_categories = "SELECT id, category_name FROM categories LIMIT 1";
        $result_categories = $conn->query($sql_categories);

        if ($result_categories->num_rows > 0) {
            while ($row_category = $result_categories->fetch_assoc()) {
                $category_id = $row_category['id'];
                $category_name = $row_category['category_name'];

                echo "<div class='row align-items-center'>";
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

                        echo '<div class="col-md-6 mb-3">'; // Added margin bottom to remove space from bottom
                        echo "<a href='product_detail.php?product_id=$product_id' style='text-decoration: none;'>"; // Anchor tag to make the entire card clickable
                        echo '<div class="card">';
                        echo "<img src='../assets/img/Grocery.png' class='card-img-top' alt='$title'>";
                        echo '<div class="card-body">';
                        echo "<h5 class='card-title'>$title</h5>";
                        echo "<p class='card-text'>$description</p>";
                        echo "<p class='card-text'><i class='fas fa-clock'></i> EDT: 1 hour</p>"; // Estimated delivery time
                        echo "<p class='card-text'><strong>PKR $price</strong></p>"; // Bolded the price
                        echo '</div>';
                        echo '</div>';
                        echo "</a>"; // Close the anchor tag
                        echo '</div>';
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
    </div>

    <!-- mobile view -->
    <div id="relatedItemsCarousel" class="carousel slide d-block d-lg-none" data-ride="carousel">
    <div class="carousel-inner" style="margin-top: 40px;">
    <h2 class="heading text-center">Related Items</h2>
        <?php
        include '../login/config.php';
        // Fetching categories
        $sql_categories = "SELECT id, category_name FROM categories LIMIT 1";
        $result_categories = $conn->query($sql_categories);

        if ($result_categories->num_rows > 0) {
            while ($row_category = $result_categories->fetch_assoc()) {
                $category_id = $row_category['id'];
                $category_name = $row_category['category_name'];
                // Fetching products for each category
                $sql_products = "SELECT * FROM products WHERE category_id='$category_id' LIMIT 4";
                $result_products = $conn->query($sql_products);

                if ($result_products->num_rows > 0) {
                    $first = true;
                    while ($row_product = $result_products->fetch_assoc()) {
                        $product_id = $row_product['product_id']; // Retrieve product id
                        $title = $row_product['product_name'];
                        $description = $row_product['product_description'];
                        $rating = $row_product['product_rating'];
                        $price = $row_product['product_price'];
                        // $image = $row_product['product_image'];

                        if ($first) {
                            echo '<div class="carousel-item active mt-4">';
                            $first = false;
                        } else {
                            echo '<div class="carousel-item">';
                        }

                        echo '<div class="col-md-6">'; // Added margin bottom to remove space from bottom
                        echo "<a href='product_detail.php?product_id=$product_id' style='text-decoration: none;'>"; // Anchor tag to make the entire card clickable
                        echo '<div class="card" style="margin-left: 38px;">';
                        echo "<img src='../assets/img/Grocery.png' class='card-img-top' alt='$title'>";
                        echo '<div class="card-body" style="margin-bottom: 100px !important;">';
                        echo "<h5 class='card-title'>$title</h5>";
                        echo "<p class='card-text'>$description</p>";
                        echo "<p class='card-text'><i class='fas fa-clock'></i> EDT: 1 hour</p>"; // Estimated delivery time
                        echo "<p class='card-text'><strong>PKR $price</strong></p>"; // Bolded the price
                        echo '</div>';
                        echo '</div>';
                        echo "</a>"; // Close the anchor tag
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No products found for this category.";
                }
            }
        } else {
            echo "No categories found.";
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#relatedItemsCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" style="background-color: black !important;" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#relatedItemsCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" style="background-color: black !important;" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
        <div class="col-lg-6 p-10">
        <div class="container mt-4">
    <div class="card1">
        <div class="card-body">
            <h5 class="card-title">Summary</h5>
            <form action="checkout.php" method="post">
           
                <div class="form-group">
                    <label>Total Amount:</label>
                    <!-- Assuming $total_price is calculated already -->
                    <input type="text" class="form-control" value="<?php echo $total_price; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Delivery Charges:</label>
                    <input type="text" class="form-control" value="<?php echo $delivery;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Total Amount with Delivery Charges:</label>
                    <!-- Assuming delivery charges are added to total price -->
                    <input type="text" class="form-control" value="<?php echo $total_price + $delivery; ?>" readonly>
                </div>
                <button type="submit" class="btn" style="margin-top: 10px; background-color: #702b88; color: white;"><a href="checkout.php" style="text-decoration: none; color: white; ">Proceed to Checkout</a></button>
            </form>
            <form action="products.php" method="post">
                <button type="submit" class="btn btn-secondary mt-2"><a href="products.php" style="text-decoration: none; color: white;">Continue Shopping</a></button>
            </form>
        </div>
    </div>
</div>

        </div>
    </div>
</div>

<!-- footer -->
<footer class="container-fluid mt-5 text-center text-lg-start p-3 bg">
        <div class="container d-flex justify-content-center py-5">
            <button type="button" class="btn btn-primary bg-primary btn-lg btn-floating mx-2">
                <i class="fab fa-facebook text-white"></i>
            </button>
            <button type="button" class="btn btn-danger bg-danger btn-lg btn-floating mx-2">
                <i class="fab fa-instagram text-white"></i>
            </button>
            <button type="button" class="btn btn-primary bg-primary btn-lg btn-floating mx-2">
                <i class="fab fa-twitter text-white"></i>
            </button>
            <button type="button" class="btn btn-danger bg-danger btn-lg btn-floating mx-2">
                <i class="fab fa-youtube text-white"></i>
            </button>

        </div>

        <!-- Copyright -->
        <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="#">BugBusters</a>
        </div>
    </footer>


    <!-- ------- Arrow up -------  -->
    <div class="upward">
        <a class="nav-link" href="#">
            <i class="fas fa-arrow-up"></i>
        </a>
    </div>

<!-- end -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');

            if (error === 'expired') {
                // Show Swal toast notification
                Swal.fire({
                    icon: 'warning',
                    title: 'Coupon Expired',
                    text: 'The Coupon You are applying for is expired.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }else if(error === 'invalid'){
                Swal.fire({
                    icon: 'warning',
                    title: 'Coupon Invalid!',
                    text: 'The Coupon You are applying for is Invalid.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }else if(error === 'missing'){
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong!',
                    text: 'There may be Some error with this coupon.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }
        });
    </script>

</body>
</html>