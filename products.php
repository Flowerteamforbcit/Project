<?php

require('src/db.php');

$records = $dbh->prepare('SELECT DISTINCT name FROM product ORDER BY name DESC');
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);
?>