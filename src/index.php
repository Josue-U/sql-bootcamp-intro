<?php 

require_once('database.php');

try {
    $results = $db->prepare("SELECT productName, productCode FROM products");
    $results->execute();
} catch(Exception $e) {
    echo $e->getMessage();
    exit;
}

$products = $results->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Classic Models</title>
</head>
<body>
    <h1>Classic Models</h1>
    <ol>
        <?php
            foreach ($products as $key => $product) {
                //var_dump($product['productCode']);
                echo '<li><a href="product.php?code='. $product['productCode'].'">'.$product['productName'].'</a></li>';
            }
         ?>
    </ol>

</body>
</html>