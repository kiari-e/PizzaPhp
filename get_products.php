<?php
// include("connection.php");
// $stmt = $conn -> prepare("SELECT *  from products ");
// $stmt -> execute();
// $products = $stmt ->get_result()

 include ('functions.php');
 $query = "SELECT * FROM products";
    $products = dbSelectRows($query);

?>
