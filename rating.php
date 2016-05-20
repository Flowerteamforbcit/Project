<?php 

require_once('init.php');
try {
		$dbh = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
$action = $_POST['action'];

switch ($action) {
    case "addRating":
        $rating = $_POST['rating'];
        $id = $_POST['id'];
//
        $sql = " SELECT * from rating where id = '$id' ";
        $statement = $dbh->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (empty($rows)) {
            $sql = "INSERT INTO rating VALUE ('$id','$rating','1')";
            $statement = $dbh->prepare($sql);
            $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $rating += $rows[0]['rating'];
            $number = $rows[0]['#ofRatings'];
            $number += 1;
            $sql = "UPDATE `rating` SET `rating`='$rating',`#ofRatings`='$number' WHERE id='$id' ";
            $statement = $dbh->prepare($sql);
            $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        var_dump($rows);
        break;
    case "getRating":
        $sql = "SELECT rating, `#ofRatings` FROM rating where id = '$id' ";
        $statement = $dbh->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $rating = $rows[0]['rating'] / $rows[0]['rating'];
        echo $rating;
        break;
    case "getRatings":
        $sql = "SELECT * FROM rating ";
        $statement = $dbh->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($rows);
        break;
}

?>