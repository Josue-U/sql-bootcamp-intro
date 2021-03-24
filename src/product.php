<?php 

require_once('database.php');

if(isset($_GET['code'])) {
    $code = $_GET['code'];

    try {
        $results = $db->prepare(
            "SELECT productName, productVendor, productCode
            FROM products
            WHERE productCode=?"
        );
        $results->bindParam(1, $code, PDO::PARAM_STR);
        $results->execute();
    } catch(Exception $e) {
        echo $e->getMessage();
        exit;
    }
    $product = $results->fetch(PDO::FETCH_ASSOC);
    if($product == FALSE) {
        echo "This code reference $code doesn't exist in the Database. </br> <a href='/''>Go back</a>";
        die();
    }
} else {
    echo "You have to enter a code reference !";
    die();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product</title>
</head>
<body>
    <h1>
       <?= $product['productName'] ?>
    </h1>
	<?php echo '<a href="/">Go back</a>'; ?>
</body>
</html>