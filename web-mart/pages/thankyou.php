<?php
      $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : '';
    ?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
	<header class="site-header text-center" id="header" style="margin-top: -40px;">
		<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
        <h3>Your Order ID is: <?php echo $order_id; ?></h3>
	</header>

	<div class="main-content text-center">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
            <br><a href="products.php" class="btn btn-success" style="color: white;">Shop more -></a>
    </div>
</body>
</html>