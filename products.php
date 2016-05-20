<?php

require('src/db.php');

$records = $dbh->prepare('SELECT DISTINCT name FROM product');
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);
?>