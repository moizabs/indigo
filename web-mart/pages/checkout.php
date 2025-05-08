<?php
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: products.php?checkout=false"); // Redirect to products.php
    exit; 
}
include '../login/config.php';

function getProductDetails($conn, $productId) {
    $query = "SELECT * FROM products WHERE product_id = $productId";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}
$t_price = 0;
$delivery = 200;
$t_price +=$delivery;
$coupon_code = 0;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | indigo Shopify</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <style>
        .container {
            \r\n  max-width: 960px;\r\n}\r\n\r\n.lh-condensed { line-height: 1.25; 
            }
            .disabled {
    opacity: 0.5; /* Adjust the opacity value as needed */
}

    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; ?>

    
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <?php 
     if (isset($_SESSION['cart'])) {
        $total_price = 0; // Initialize total price

        foreach ($_SESSION['cart'] as $cart) {
            // Get product details
            $productDetails = getProductDetails($conn, $cart['product_id']);
            if ($productDetails) {
              $price = $productDetails['product_price'] * $cart['qty'];
              $t_price += $price;
    ?>
            <ul class="list-group mb-3 sticky-top">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?php echo $productDetails['product_name']; ?></h6>
                        <small class="text-muted"><?php echo $productDetails['product_description']; ?></small>
                    </div>
                    <span class="text-muted"><?php echo $price; ?></span>
                </li>
                <?php } 
               
            }
            
        }
        ?>
<?php
include '../login/config.php';

// Check if discount percentage is passed in the URL
if (isset($_GET['discount_percentage'])) {
    $discount_percentage = $_GET['discount_percentage'];

    // Fetch coupon code from the URL if available
    if (isset($_GET['coupon_code'])) {
        $coupon_code = $_GET['coupon_code'];

        // SQL query to fetch coupon details based on the provided coupon code
        $sql = "SELECT * FROM coupon WHERE coupon_code = '$coupon_code'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Coupon code exists, check if discount percentage matches
            $row = $result->fetch_assoc();
            $coupon_discount_percentage = $row['discount_percentage'];

            if ($coupon_discount_percentage == $discount_percentage) {
                // Discount percentage matches, apply discount
                $discount_amount = ($t_price * $discount_percentage) / 100;
                $t_price -= $discount_amount;
            } else {
                // Display a warning using SweetAlert
                echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <script>
                    Swal.fire({
                        icon: "warning",
                        title: "Invalid Coupon Code.",
                        text: "Coupon code is invalid. Try Different one.",
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                </script>';
            }
        } else {
            echo "Error: Invalid coupon code.";
        }
    } else {
        echo "Error: Coupon code not provided.";
    }
} else {
    $discount_percentage = 0;
}
?>



                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small><?php echo $coupon_code; ?></small>
                    </div>
                    <span class="text-success">-Rs <?php echo $discount_amount ?? 0; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Delivery Charges</span>
                    <strong>Rs 200</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (PKR)</span>
                    <strong>Rs <?php echo $t_price; ?></strong>
                </li>
            </ul>

            
            <form class="card1 p-2" action="coupon.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" id="discount" name="discount" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" name="coupon" style="background-color: #f37321; color: white;" class="btn">Redeem</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
    <h4 class="mb-3">Billing address</h4>
    <form action="confirm_order.php" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
                <div class="invalid-feedback"> Valid first name is required. </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
                <div class="invalid-feedback"> Valid last name is required. </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
            <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback"> Please enter your shipping address. </div>
        </div>

        <div class="row">
            <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <input class="custom-select d-block w-100 form-control" id="country" name="country" placeholder="Pakistan" required>
                <div class="invalid-feedback"> Please Enter a valid country. </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="state">City</label>
                <input class="custom-select d-block w-100 form-control" id="city" name="city" placeholder="Karachi" required>
                </select>
                <div class="invalid-feedback"> Please provide a valid city. </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                <div class="invalid-feedback"> Zip code required. </div>
            </div>
        </div>

        <hr class="mb-4">
        <h4 class="mb-3">Payment</h4>
        <div class="d-block my-3">
        <div class="custom-control custom-radio">
    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="credit_card" disabled>
    <label class="custom-control-label disabled" for="credit"><i class="fab fa-cc-visa"></i> Credit card / Debit Card</label>
</div>
<div class="custom-control custom-radio">
    <input id="easypaisa" name="paymentMethod" type="radio" class="custom-control-input" value="easypaisa" disabled>
    <label class="custom-control-label disabled" for="easypaisa"><i class="fas fa-mobile-alt"></i> Easypaisa</label>
</div>
<div class="custom-control custom-radio">
    <input id="jazzcash" name="paymentMethod" type="radio" class="custom-control-input" value="jazzcash" disabled>
    <label class="custom-control-label disabled" for="jazzcash"><i class="fas fa-mobile-alt"></i> Jazzcash</label>
</div>
<div class="custom-control custom-radio">
    <input id="cod" name="paymentMethod" type="radio" class="custom-control-input" value="cod" checked>
    <label class="custom-control-label" for="cod"><i class="fas fa-money-bill-alt"></i> Cash On Delivery</label>
</div>
<small class="text-muted">We're working on more payment modes.</small>


        <div class="row mt-3" hidden>
         <div class="col-md-6 mb-3" id="card-info">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" name="cc-name" placeholder="" required="" disabled>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback"> Name on card is required </div>
            </div>
            <div class="col-md-6 mb-3" id="card-info">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" name="cc-number" placeholder="" required="" disabled>
                <div class="invalid-feedback"> Credit card number is required </div>
            </div>
            <div class="col-md-3 mb-3" id="card-info">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" name="cc-expiration" placeholder="" required="" disabled>
                <div class="invalid-feedback"> Expiration date required </div>
            </div>
            <div class="col-md-3 mb-3" id="card-info">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="" required="" disabled>
                <div class="invalid-feedback"> Security code required </div>
            </div>        
        </div>
<!-- Inside the form in your HTML file -->
            <input type="hidden" name="total_price" value="<?php echo $t_price; ?>">
            <input type="hidden" name="discount_amount" value="<?php echo $discount_amount ?? 0; ?>">
            <input type="hidden" name="coupon_code" value="<?php echo $coupon_code ?? ''; ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?? ''; ?>">

            <input type="hidden" name="product_ids" value="<?php echo implode(',', array_column($_SESSION['cart'], 'product_id')); ?>">
            <input type="hidden" name="quantities" value="<?php echo implode(',', array_column($_SESSION['cart'], 'qty')); ?>">

        <hr class="mb-4">
        <button class="btn btn-lg btn-block text-center" style="background-color: #702b88; color: white;" type="submit">Confirm Order -></button>
    </form>
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Get order ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        const couponerror = urlParams.get('error');


        // Show SweetAlert with order details
        if (couponerror === 'invalid') {
          Swal.fire({
            icon: 'warning',
            title: 'Invalid Coupon-code!',
            text: 'Invalid Coupon Code. Please Try other one.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
        });
        }else if(couponerror === 'expired'){
            Swal.fire({
            icon: 'warning',
            title: 'Expired Coupon-code!',
            text: 'Expired Coupon Code. Please Try other one.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
        });
        }
    
    </script>

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>