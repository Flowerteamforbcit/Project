<?php
require_once('init.php');
loadScripts();
$data = array("status" => "not set!");
//if (Utils::isGET()) {
if(!(empty($_POST['form']))){
    
    $form = $_POST['form'];
	$sortby = $_POST['sortby'];
	
    $pm = new ProductManager();
    $rows = $pm->listProductsByOrder($form, $sortby);
    $html = "";
    if (!$rows || count($rows) == 0) {
        // don't know why but dd will be hid 
        $html = "<tr><td>dd There is no result</td></tr>";
    } else {
        foreach ($rows as $row) {
            $name = $row['name'];
            $storeName = $row['storeName'];
            $price = $row['price'];
            $address = $row['storeAddress'];
			$product_id = $row['id'];
				
            $html .= "
            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4'>
            <div class='box'>
            <div class='boxInner'> 

                <a href='productPage.php?id=$product_id'> <img src='img/pine%20wood.jpg'>
                    <div class='over'></div></a>
                    <h5><span>$storeName</span></h5>
                    <h6><span>$name</span></h6>

                    <lol7><span>$address</span></lol7>
                    <price><span>$$price</span></price>
                    <fieldset class='rating'>                   
                        <input type='radio' id='star5' name='rating' value='5' /><label class = 'full' for='star5' title='Awesome - 5 stars'></label>
                        <input type='radio' id='star4half' name='rating' value='4 and a half' /><label class='half' for='star4half' title='Pretty good - 4.5 stars'></label>
                        <input type='radio' id='star4' name='rating' value='4' /><label class = 'full' for='star4' title='Pretty good - 4 stars'></label>
                        <input type='radio' id='star3half' name='rating' value='3 and a half' /><label class='half' for='star3half' title='Meh - 3.5 stars'></label>
                        <input type='radio' id='star3' name='rating' value='3' /><label class = 'full' for='star3' title='Meh - 3 stars'></label>
                        <input type='radio' id='star2half' name='rating' value='2 and a half' /><label class='half' for='star2half' title='Kinda bad - 2.5 stars'></label>
                        <input type='radio' id='star2' name='rating' value='2' /><label class = 'full' for='star2' title='Kinda bad - 2 stars'></label>
                        <input type='radio' id='star1half' name='rating' value='1 and a half' /><label class='half' for='star1half' title='Meh - 1.5 stars'></label>
                        <input type='radio' id='star1' name='rating' value='1' /><label class = 'full' for='star1' title='Sucks big time - 1 star'></label>
                        <input type='radio' id='starhalf' name='rating' value='half' /><label class='half' for='starhalf' title='Sucks big time - 0.5 stars'></label>
                    </fieldset>     

                </div>

            </div>
            </div>";
        }
    }
    echo $html;
    return;
} 
?>