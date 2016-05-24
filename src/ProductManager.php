<?php

//require_once('./DBConnector.php');

//$um = new ProductManager();

// Facade
class ProductManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }

    public function getProductProfile($userID) {

        $rows = $this->db->query("select * from product where id = :name",
            array(':name' => $userID));
        //var_dump($rows[0]);
        if(count($rows) == 1) {
            return $rows[0];
        }
        // otherwise
        return null;
    }



    public function updateProductSku($id, $newSku) {
        $sql = "UPDATE product SET sku = '$newSku' WHERE id = '$id'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }


    public function deleteProduct($id) {
        $sql = "DELETE from product WHERE ID = '$id'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }

    public function addProduct($SKU, $item_price,  $description, $path, $quantity) {

        $sql = "INSERT INTO product (SKU, item_price, description, path, Quantity)
        VALUES ('$SKU', '$item_price',  '$description', '$path', '$quantity')";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }



    public function listProducts($searchres) {
        $sql = "SELECT id, name, price, storeName, storeAddress, googleMap, image FROM product where name like '%$searchres%'";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function listProductsByOrder($searchres, $orderby) {
       $sql = "SELECT id, name, price, storeName, storeAddress, googleMap, image FROM product where name like '%$searchres%' ORDER BY $orderby";
       $rows = $this->db->query($sql);
       return $rows;
   }
   public function listDeliveryProducts($searchres) {
    $sql = "SELECT id, name, price, storeName, storeAddress, googleMap, image FROM product where name like '%$searchres%' AND delivery = 1 ";
    $rows = $this->db->query($sql);
    return $rows;
}

public function findProduct($SKU) {
    $params = array(":sku" => $SKU);
    $sql = "SELECT SKU, item_price, description, path, Quantity FROM product WHERE SKU = :sku";

    $rows = $this->db->query($sql, $params);
    if(count($rows) > 0) {
        return $rows[0];
    }

    return null;
}





public function listComments($product_id){
   $sql = "SELECT email, content FROM comments WHERE product_id = $product_id";
   
   $rows = $this->db->query($sql);
   return $rows;
}
}
?>
