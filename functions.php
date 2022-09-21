<?php 
function dbSelectRows($query){
    include ("connection.php");
    $result = mysqli_query($conn, $query);
    return $result;
}
?>