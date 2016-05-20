<?php
session_start();
require 'src/db.php';
include 'header.php';


?>
<?php 


$product_id = $_GET['id'];

$records = $dbh->prepare('SELECT * FROM product WHERE id='.$product_id);
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);


$product_info = $results[0];
?>

<div class="container">
    <div class="jumbotron">
<div class="well well-sm">
    <img  class="img-responsive img-rounded" alt='sample' src='img/<?php echo $product_info['image']?>.jpg' >


<h4><b><?php echo $product_info['name']?></b></h4>
    <h5><b><?php echo $product_info['storeName']?></b></h5>
<h5>Price: $<?php echo $product_info['price']?></h5>
<h5>Address: <?php echo $product_info['storeAddress']?></h5>
</div>

        
<?php echo $product_info['googleMap']?>

    
    </div>
</div>
<?php

include 'footer.php';
?>