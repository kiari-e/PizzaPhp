<php lang="en">
  <head>
    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

  <?php include("./includes/navbar.php") ?>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Hot Pizza Meals</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    	</div>

    	<div class="container-wrap">
    		<div class="row no-gutters d-flex">
				<?php include("get_product.php");?>
				<?php foreach ($products as $product){?>
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img" style="background-image: url(images/products/<?php echo $product['product_image']; ?>);"></a>
    					<div class="text p-4">
    						<h3><?php echo $product['product_name'] ?></h3>
    						<p><?php echo $product['product_description'] ?></p>
    						<p class="price"><span><?php echo $product['product_price'] ?></span> <a href="#" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
                <form action="cart.php" method="post">
                <input type="hidden" name="product_name" value="<?php echo $product['product_name'];?>"/>
                <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>"/>
                <input type="hidden" name="product_price" value="<?php echo $product['product_price'];?>">
                <input type="hidden" name="product_description" value="<?php echo $product['product_description'];?>">
                <input type="hidden" name="product_quantity" value="<?php echo $product['product_quantity'];?>">
                <input type="hidden" name="product_image" value="<?php echo $product['product_image'];?>"/>
                <br><br/>
                <input type="submit" name="submit" value="Add to cart">
                </form>
    					</div>
    				</div>
    			</div>
				<?php }?>
    		</div>
    	</div>
    </section>

    <?php include("./includes/footer.php") ?>

 </body>
</php>
