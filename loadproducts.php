<?php
require_once('init.php');
loadScripts();
$data = array("status" => "not set!");
if(!(empty($_POST['form']))){
    
    $form = $_POST['form'];
    $pm = new ProductManager();
    $rows = $pm->listProducts($form);
    $html = "";
    if (!$rows || count($rows) == 0) {
        $html = "<tr><td>dd There is no result</td></tr>";
    } else {
        foreach ($rows as $row) {
            $name = $row['name'];
            $storeName = $row['storeName'];
            $price = $row['price'];
            $address = $row['storeAddress'];
			$product_id = $row['id'];
            $image = $row['image'];
				
            $html .= "
            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4'>
            <div class='box'>
            <div class='boxInner'> 

                <a href='productPage.php?id=$product_id'> <img src='img/$image.jpg'>
                    <div class='over'></div></a>
                    <h5><span>$storeName</span></h5>
                    <h6><span>$name</span></h6>

                    <lol7><span>$address</span></lol7>
                    <price><span>$$price</span></price>
                    <fieldset class='rating'>
                        <div id='rateyo$product_id' class='rateyo' onclick='getRateId($product_id);'></div>
                    </fieldset>

                </div>

            </div>
            </div>";
        }
        $html .= "<script type='text/javascript' src='js/rateyoSettings.js'></script>";
    }
    echo $html;
    return;
} 
?>