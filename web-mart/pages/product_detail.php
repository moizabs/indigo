<?php
session_start();

include '../includes/navbar.php';
include '../login/config.php';

// Sanitize input
$id = isset($_GET['product_id']) ? mysqli_real_escape_string($conn, $_GET['product_id']) : "";

// Initialize variables
$itemTitle = "No Item Specified";
$itemPrice = 0;
$itemDescription = "";
$itemImage = "";
$rating = 0;

if (!empty($id)) {
    // Fetch product details based on ID
    $query = "SELECT product_id, product_name, product_description, product_image, product_rating, product_price, product_stock FROM products WHERE product_id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $itemTitle = $row['product_name'];
        $itemPrice = $row['product_price'];
        $itemDescription = $row['product_description'];
        $itemImage = $row['product_image'];
        $rating = $row['product_rating'];
        $stock = $row['product_stock'];
    } else {
        $itemTitle = "Item not found.";
    }

    $review_query = "SELECT COUNT(review) AS review_count FROM reviews WHERE product_id = '$id'";
    $result_reviews_count = mysqli_query($conn, $review_query);
    $row_reviews_count = mysqli_fetch_assoc($result_reviews_count);
    $review = $row_reviews_count['review_count'];


    mysqli_close($conn);
}

function generateStarRating($rating) {
    $stars = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $stars .= '★'; // Filled star
        } else {
            $stars .= '☆'; // Empty star
        }
    }
    return $stars; // Return the generated star ratings as a string
}
?>

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
    <link rel="stylesheet" href="../assets/css/detail.css">

    <link rel="stylesheet" href="../login/login-style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <title><?php echo $itemTitle; ?> | Buy Now</title>
<style>
    .swal-custom-class {
    z-index: 99999 !important; /* Set a high z-index value */
}

</style>
</head>

    <body>

        <!-- =========== Product section ================= -->
        <section class="container product-page" style="padding-top: 30px !important;">
        <div id="alertPlaceholder"></di v> 

            <div class="row  product-info pt-10" >
                <html>
                    <div class="col-lg-1 col-md-2 small-products d-tab-none">
                        <div class="grey">
                        <?php  $imageURL = 'http://localhost/indigo/' . $row["product_image"];?>
                            <img src="<?php echo $imageURL; ?>">
                        </div>
                        <div class="grey">
                        <?php  $imageURL = 'http://localhost/indigo/' . $row["product_image"];?>
                            <img src="<?php echo $imageURL; ?>">
                        </div>
                        <div class="grey">
                        <?php  $imageURL = 'http://localhost/indigo/' . $row["product_image"];?>
                        <img src="<?php echo $imageURL; ?>">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="grey">
                        <?php  $imageURL = 'http://localhost/indigo/' . $row["product_image"];?>
                        <img src="<?php echo $imageURL; ?>" class="img-fluid" alt="<?php echo $itemTitle; ?>">
                        </div>
                    </div>

                    <div class="col-lg-3 mx-3 mt-3">

                        <div class="product-details text-dark">
                            <div class="sec1">
                            <h5><?php echo $itemTitle; ?></h5>

                            <div class="ratings d-flex">
    <div class="star-rating" data-rating="0">
        <?php echo generateStarRating($rating); ?>
    </div>
    <span class="mx-2 text-secondary"> <?php echo '(' .$review.')'; ?> reviews    <i class="bi bi-info-circle"></i></span>
</div>
                            </div>

    
                            <div class="line my-2"></div>

                            <div class="sec2">
                                <h5>Product Description</h5>
                                <p class="text-secondary"><?php echo $itemDescription; ?></p>
                            </div>

                            <div class="line my-2"></div>

                            <div class="sec3">
                                <h5>Quantity</h5>

                                <div class="d-flex">
                                    <?php
                                    if($stock > 0){
                                        echo '<div class="bi bi-check-circle mx-1 text-secondary"></div>';
                                        echo '<p class="text-secondary">Stock Available</p>';
                                    }else{
                                        echo '<div class="fa-regular fa-circle-xmark mx-1 mt-2 text-secondary"></div>';
                                        echo '<p class="text-secondary">Out Of Stock    </p>';
                                    }
                                    ?>
</div>

                        <div class="d-flex mb-3">
            <div class="bi bi-dash sub" id="dec-quantity"></div>
            <span class="mx-3" id="quan">0</span>
            <div class="bi bi-plus-lg add" id="inc-quantity"></div>
        </div>


                                <div class="row">
                                    <div class="col-lg-6 col-md-3 col-mb-2">
                                        <button class="btn rounded-pill" id="buyNowButton" style="background-color: #702b88;  padding: 0.5rem 1.5rem; margin-bottom:10px;"><a href="add_to_cart.php?product_id=<?php echo $id;?>" style="text-decoration: none; color: white;">Buy Now</a></button>
                                    </div>
                                    <div class="col-lg-6 col-md-2 col-sm-2">
                                        <button class="add-to-cart"><a href="cart.php?product_id=<?php echo $id;?>" style="text-decoration: none; color: white; font-size: 11px;" class="tablet">Add to Cart</a></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- ============== info card ============== -->
                    <div class="col-lg-4">
                        <div class="purple-outline-card text-dark">

                        <div class="sec1 px-3 mt-3">
    <span class="d-flex justify-content-between">
        <span class="card-headings pb-3">Ship to</span>
        <p class="change-address-link">Change <i class="bi bi-geo-alt"></i></p>
    </span>
    <p class="location ">Your Location</p>
</div>

                            <div class="line my-2"></div>

                            <div class="sec2 px-3 py-1 ">
                                <h2 class="font-weight-bolder"><?php echo $itemPrice; ?></h2>
                                <span>Delivery Charges = Rs. 200</span><br><br>
                                <span class="font-weight-bolder">Total Price = <?php echo $itemPrice + 200; ?></span>
                            </div>

                            <div class="line my-2"></div>

                            <div class="sec3 px-3 py-3">
                                <span class="card-headings">Service</span >

                                <div class="serv pt-3">
                                    <span class="d-flex">
                                        <i class="bi bi-truck"></i>
                                        <p class="card-para mx-2">Delivery in 2 hours</p>
                                    </span>
                                    <p>Fast Delivery</p>
                                </div>

                                <div class="serv">
                                    <span class="d-flex">
                                        <i class="bi bi-x-circle-fill"></i>
                                        <p class="card-para mx-2">No Return Policy</p>
                                    </span>
                                    <a class="card-para" href="#">Read Policy</a>
                                </div>

                                <div class="serv pt-2">
                                    <span class="d-flex">
                                        <img src="../assets/img/small-indigo.png" width="14px" height="16px" alt="">
                                        <p class="card-para mx-1">Shop And Sold By Indigo</p>
                                    </span>
                                </div>
                            </div>
                            <div class="sec4 px-3 py-3">

                            <span class="card-headings">Reviews</span>
                            <?php
                    include '../login/config.php';
                    $review_query = "SELECT reviews.review, register.name, reviews.rating 
                                    FROM reviews 
                                    INNER JOIN register ON reviews.user_id = register.id 
                                    LIMIT 2";

                    $result_reviews = mysqli_query($conn, $review_query);

                    while ($row_review = mysqli_fetch_assoc($result_reviews)) {
                        $profile_initial = strtoupper(substr($row_review['name'], 0, 1));
                        ?>
                        
    <div class="row mt-3">
        <div class="col-lg-1">
            <div class="profile" style="padding-left: 16px; padding-top: 13px; font-size: 25px; background-color: #f47321; color: white;"><?php echo $profile_initial; ?></div>
        </div>
        <div class="col-lg-11">
            <div class="px-5">
                <span class="d-flex">
                    <span class="card-headings pb-2"><?php echo $row_review['name']; ?> -</span>
                    <div class="star-rating d-flex" data-rating="<?php echo $row_review['rating']; ?>">
                        <?php
                        // Display stars based on the rating
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $row_review['rating']) {
                                echo '<span class="star">&#9733;</span>';
                            } else {
                                echo '<span class="star">&#9734;</span>';
                            }
                        }
                        ?>
                    </div>
                </span>
                <p class="card-para"><?php echo $row_review['review']; ?></p>
            </div>
        </div>
    </div>
<?php
}

// Close the database connection
$conn->close();
?>


                            </div>

                        </div>
                    </div>
         </section>
         <section class="container our-products desktop">
        <div class="px-3"> 
        <h1 class="my-3 text-center sub-heading">Related Products</h1>
        <!-- Category Slider -->
        <?php
        include '../login/config.php';
        // Fetching categories
        $sql_categories = "SELECT id, category_name FROM categories LIMIT 1";
        $result_categories = $conn->query($sql_categories);

        if ($result_categories->num_rows > 0) {
            while ($row_category = $result_categories->fetch_assoc()) {
                $category_id = $row_category['id'];

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

                        echo '<div class="col-md-3 mb-3">'; // Added margin bottom to remove space from bottom
                        echo "<a href='product_detail.php?product_id=$product_id' style='text-decoration: none;'>"; // Anchor tag to make the entire card clickable
                        echo '<div class="card card1">';
                        echo "<img src='../assets/img/Grocery.png' class='card-img-top' alt='$title'>";
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

<!-- mobile slider -->
<section class="container our-products mobile mb-10">
    <div class="px-3"> <!-- Added padding from left and right -->
        <h1 class="my-3 text-center sub-heading">Related Products</h1>
        <?php
        include '../login/config.php';
        // Fetching categories
        $sql_categories = "SELECT id, category_name FROM categories LIMIT 1";
        $result_categories = $conn->query($sql_categories);

        if ($result_categories->num_rows > 0) {
            while ($row_category = $result_categories->fetch_assoc()) {
                $category_id = $row_category['id'];

                // Fetching products for each category
                $sql_products = "SELECT * FROM products WHERE category_id='$category_id' LIMIT 4";
                $result_products = $conn->query($sql_products);

                if ($result_products->num_rows > 0) {
                    echo '<div id="carouselExample" class="carousel slide d-md-none" data-bs-ride="carousel">';
                    echo '<div class="carousel-inner">';
                    $first = true;
                    while ($row_product = $result_products->fetch_assoc()) {
                        $product_id = $row_product['product_id']; // Retrieve product id
                        $title = $row_product['product_name'];
                        $description = $row_product['product_description'];
                        $rating = $row_product['product_rating'];
                        $price = $row_product['product_price'];
                        // $image = $row_product['product_image'];

                        if ($first) {
                            echo '<div class="carousel-item active">';
                            $first = false;
                        } else {
                            echo '<div class="carousel-item">';
                        }
                        echo '<div class="col-12">';
                        echo "<a href='product_detail.php?product_id=$product_id' style='text-decoration: none;'>"; // Anchor tag to make the entire card clickable
                        echo '<div class="card card1">';
                        echo "<img src='../assets/img/Grocery.png' class='card-img-top' alt='$title'>";
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
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">';
                    echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                    echo '<span class="visually-hidden">Previous</span>';
                    echo '</button>';
                    echo '<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">';
                    echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                    echo '<span class="visually-hidden">Next</span>';
                    echo '</button>';
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

<?php
include '../includes/footer.php';
?>
<!-- Modal for changing address -->
<div class="modal fade" id="changeAddressModal" style="margin-top: 40px;" tabindex="-1" aria-labelledby="changeAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeAddressModalLabel">Change Your Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="changeAddressForm">
                    <div class="mb-3">
                        <label for="newAddress" class="form-label">New Address</label>
                        <input type="text" class="form-control" id="newAddress" placeholder="Enter your new address">
                    </div>
                    <div id="locationInfo">
                        <!-- Location info will be displayed here -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #f37321; color: white;">Close</button>
                <button type="button" class="btn" id="submitAddress" style="background-color: #f37321; color: white;">Submit</button>
            </div>
        </div>
    </div>
</div>
        <!-- Bootstrap JavaScript -->
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
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

         <!-- Swal CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$(document).ready(function () {
    var buyNowButton = $("#buyNowBtn");
    var addToCartButton = $(".add-to-cart");
    var decreaseButton = $("#dec-quantity");
    var increaseButton = $("#inc-quantity");
    var quantityDisplay = $("#quan");
    var stock = <?php echo $stock; ?>; // Get the stock value from PHP
    var quantity = 0;

    // Update the quantity display
    function updateQuantityDisplay() {
        quantityDisplay.text(quantity);
    }

    function checkStockAndButtons() {
        if (stock <= 0) {
            // Out of stock
            addToCartButton.prop('disabled', true);
            buyNowButton.prop('disabled', true);
            Swal.fire({
                icon: 'error',
                title: 'Out of Stock',
                text: 'This product is currently out of stock.',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        } else if (quantity >= stock) {
            // Stock is limited and quantity exceeds stock
            increaseButton.prop('disabled', true);
            addToCartButton.prop('disabled', true);
            buyNowButton.prop('disabled', true);
            Swal.fire({
                icon: 'warning',
                title: 'Limited Stock',
                text: 'Only ' + stock + ' item(s) remaining.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        } else {
            // Stock is available and quantity can be increased
            increaseButton.prop('disabled', false);
            addToCartButton.prop('disabled', false);
            buyNowButton.prop('disabled', false);
        }
    }

    checkStockAndButtons();

    // Decrease quantity
    decreaseButton.click(function () {
        if (quantity > 0) {
            quantity--;
            updateQuantityDisplay();
            checkStockAndButtons();
        }
    });

    // Increase quantity
    increaseButton.click(function () {
        if (quantity < stock) {
            quantity++;
            updateQuantityDisplay();
            checkStockAndButtons();
        }
    });

    var modalbtn = $("#changeAddressModal");
    // Handle click on "Change" link
    $('.change-address-link').click(function () {
        modalbtn.modal("show");
    });

    $('#submitAddress').click(function () {
        var newAddress = $('#newAddress').val();
        console.log('New Address:', newAddress);
        $('#changeAddressModal').modal('hide');
        $('.location').text(newAddress);
    });

    $('.add-to-cart').click(function () {
        var productId = <?php echo json_encode($id); ?>;
        var productName = <?php echo json_encode($itemTitle); ?>;
        
        // Check if quantity is zero
        if (quantity === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Quantity cannot be zero',
                text: 'Please select a quantity greater than zero.',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
            return; // Stop execution if quantity is zero
        }

        

    });
});


</script>




</body>

  
</html>