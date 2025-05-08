<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    
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
  <style>
        body {
            font-family: Arial, sans-serif;
        }
        .product-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px;
            width: 300px;
            display: inline-block;
        }
        .product-image {
            max-width: 100%;
            height: auto;
        }
        .product-title {
            font-size: 18px;
            margin: 10px 0;
        }
        .product-description {
            color: #888;
        }
           .product-price {
            color: #888;
            font-weight: 600;
            font-size: 20px;
           }

        .star-rating {
            color: gold;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        .add-to-cart, .buy-now {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
<?php
include '../includes/navbar.php';
include '../login/config.php';

// Check if a category is passed through the URL parameter
// Check if a category is passed through the URL parameter
if (isset($_GET['category_id'])) {
    $category_id = mysqli_real_escape_string($conn, $_GET['category_id']);
    
    // Query to fetch products of the specified category
    $sql = "SELECT product_id, product_name, product_description, product_image, product_rating, product_price FROM products WHERE category_id = '$category_id'";
    
    // Query to fetch the category name
    $cat_name_query = "SELECT category_name FROM categories WHERE id = '$category_id'";
    $result_cat_name = $conn->query($cat_name_query);
    
    if ($result_cat_name->num_rows > 0) {
        $cat_row = $result_cat_name->fetch_assoc();
        $category_name = $cat_row['category_name'];
        $heading = "" . ucfirst($category_name);
    } 
} else {
    // If no category is passed, retrieve all products
    $sql = "SELECT product_id, product_name, product_description, product_image, product_rating, product_price FROM products";
    $heading = "Our Products";
}


$result = $conn->query($sql);

// Display the heading
echo '<h1 class="my-3 text-center sub-heading">' . $heading . '</h1>';

if ($result->num_rows > 0) {
    echo '<div class="container">';
    echo '<div class="row pt-10">';
    while ($row_product = $result->fetch_assoc()) {
        $product_id = $row_product['product_id'];
        $title = $row_product['product_name'];
        $description = $row_product['product_description'];
        $rating = $row_product['product_rating'];
        $price = $row_product['product_price'];
        $image = $row_product['product_image'];

        echo '<div class="col-md-3 mb-3">';
        echo "<a href='product_detail.php?product_id=$product_id' style='text-decoration: none;'>"; // Anchor tag to make the entire card clickable
        echo '<div class="card">';
        echo "<img src=../$image class='card-img-top' alt='$title' height='180px'>";
        echo '<div class="card-body">';
        echo "<h5 class='card-title'>$title</h5>";
        echo "<p class='card-text'>$description</p>";
        echo "<p class='card-text'>Rating: " . generateStarRating($rating) . "</p>"; // Show star rating
        echo "<p class='card-text'><i class='fas fa-clock'></i> EDT: 1 hour</p>"; // Estimated delivery time
        echo "<p class='card-text'><strong>PKR $price</strong></p>"; // Bolded the price
        echo '</div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
    echo '</div>'; // Close the row
} else {
    echo '<p>No products in this category.</p>';
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
    return $stars;
}

$conn->close();
?>

    <?php
    include '../includes/footer.php';
    ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkout = new URLSearchParams(window.location.search);
               if (checkout === 'false') {
                // Show Swal toast notification
                Swal.fire({
                    icon: 'warning',
                    title: 'Cart is Empty!',
                    text: 'Please Shop something to confirm to checkout.',
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
