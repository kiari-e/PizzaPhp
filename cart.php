<?php 

error_reporting(1);
session_start();
if(isset($_POST['submit'])){

if(isset($_SESSION['cart'])){
	$product_array_ids =array_column($_SESSION['cart'],'product_id');

	// checking if product has been added to cart
	if(!in_array($_POST['product_id'],$product_array_ids)){
		// if it exist add to cart 
		$product_id = $_POST['product_id'];
		$product_array = array(
			'product_id'=>$product_id,
			'product_name'=>$_POST['product_name'],
			'product_image' => $_POST['product_image'],
			'product_price' => $_POST['product_price'],
			'product_quantity' => $_POST['product_quantity'],
			'product_description' => $_POST['product_description']

			
		);
		$_SESSION['cart'][$product_id]=$product_array;
	}else{
		echo"<script>alert('product has already been added to cart')</script>";
	}
	//this takes care if user is  adding the first itme to product to cart
}else{
			//  add product  to cart 
			$product_id = $_POST['product_id'];
			$product_array = array(
				'product_id'=>$product_id,
				'product_name'=>$_POST['product_name'],
				'product_image' => $_POST['product_image'],
				'product_price' => $_POST['product_price'],
				'product_quantity' => $_POST['product_quantity'],
				'product_description' => $_POST['product_description']
				
			);
    $_SESSION['cart'][$product_id]=$product_array;
}
}elseif (isset($_POST['remove_btn'])){
	$product_id = $_POST['product_id'];
	unset($_SESSION['cart'][$product_id]);
}
elseif (isset($_POST['edit_quantity_btm'])) {
	$product_id = $_POST['product_id'];
	$product_quantity = $_POST['product_quantity'];
	$product = $_SESSION['cart'][$product_id];//['cheese'=>'price']

	$product['product_quantity']= $product_quantity;// update product in session to new quantity
	$_SESSION['cart'][$product_id]=$product;
}
?>
<!DOCTYPE html>
<html lang="en">
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
    <!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- section-header.// -->
    <?php include("includes/navbar.php");?>

<section class="section-content padding-y bg">
<div class="container">

<!-- ============================ COMPONENT 1 ================================= -->

<div class="row">
	<aside class="col-lg-9">
<div class="card bg-warning">
<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200"> </th>
</tr>
</thead>
<tbody>  

<?php if(isset($_SESSION['cart'])){?>
	<?php foreach($_SESSION['cart'] as $key => $value){ ?>

<tr>
	
	
	<td>
		<figure class="itemside align-items-center">
			<div class="aside"><img style="height: 30%; width: 30%;" src="./images/products/<?php echo $value['product_image'];?>" class="img-sm"></div>
			<figcaption class="info">
				<a href="#" class="title text-dark"><?php echo $value['product_name'];?></a>
				<p class="text-muted small"><?php echo $value['product_description'];?></p>
			</figcaption>
		</figure>
	</td>
	<td> 
		<!-- col.// -->
					<div class="row"> 
						<div class="input-group input-spinner">
						
						<form method="POST" action="cart.php">
							<input type="number" min="0" step="1" style="width: 50px; margin-left: 20px	;" outline="none" value="<?php echo $value['product_quantity'];?>">
							<input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
							<input type="submit" value="edit" name="edit_quantitiy_btn"/>
						</form>
						
						</div> <!-- input-group.// -->
					</div> <!-- col.// -->
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">$<?php echo $value['product_price'];?></var> 
      <br>
			<!-- <small class="text-muted"> $315.20 each </small>  -->
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 


	<form action="cart.php" method="post">
	<input type="hidden" name="product_id" value="<?php echo $value['product_id'];  ?>">
	<button type="submit" class="btn btn-danger  rounded " name="remove_btn"> Remove</button>
	</form>

	</td>
</tr>
<?php }?>
	<?php } ?>

</tbody>
</table>
</div> <!-- card.// -->

	</aside> <!-- col.// -->
	<aside class="col-lg-3">

		<div class="card">
		<div class="card-body">
			<dl class="dlist-align">
			  <dt>Total price:</dt>
			  <dd class="text-right">$69.97</dd>
			</dl>
			<dl class="dlist-align">
			  <dt>Tax:</dt>
			  <dd class="text-right"> $10.00</dd>
			</dl>
			<dl class="dlist-align">
			  <dt>Total:</dt>
			  <dd class="text-right text-dark b"><strong>$59.97</strong></dd>
			</dl>
			<hr>
			<p class="text-center mb-3">
				<img src="./images/bg_3.png" height="26">
			</p>
			<a href="./place-order.html" class="btn btn-primary btn-block"> Checkout </a>
			<a href="./product.php" class="btn btn-light btn-block">Continue Shopping</a>
		</div> <!-- card-body.// -->
		</div> <!-- card.// -->

</aside> <!-- col.// -->


</div> <!-- row.// -->
<!-- ============================ COMPONENT 1 END .// ================================= -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
</body>
</html>
    <?php include("./includes/footer.php") ?>

 </body>
</php>
