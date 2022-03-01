<?php
session_start();
require("vendor/autoload.php");
include 'config.php';
include 'functions.php';

?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>

	<?php include 'header.php' ?>
	<div id="main">
		<div id="products">
			<?php $prod->displayProducts($products); ?>
		</div>
		<div id = "cartDiv">
			
		</div>

	</div>

	<?php include 'footer.php' ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="script.js"></script>
</body>

</html>