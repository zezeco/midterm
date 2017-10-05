<?php
    require_once('database.php');

    // Get category ID     
    if(!isset($customerID)) {
        $customerID = $_GET['customerID'];
        if (!isset($customerID)) {
            $customerID = 1004;
        }
    }
    // Get all cust info
    $query = "SELECT * FROM customers
              WHERE customerID = $customerID";
    $cust = $db->query($query);
    $cust = $cust->fetch();

    // Get all informations for cust 1004
    $query = "SELECT * FROM registrations
              WHERE customerID = $customerID";
    $regis = $db->query($query);


    // Get all products
    $query = "SELECT * FROM products
              ORDER BY productCode";
    $products = $db->query($query);
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Tech Support</h1>
    </div>
    <div id="main">

        <h1>Product List</h1>

        <div id="content">
            <!-- display a table of products -->
            <h2><?php echo $cust['firstName']; ?> <?php echo $cust['lastName']; ?></h2>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <!--<th>&nbsp;</th>-->
                </tr>
                <?php foreach ($regis as $Pcode) : ?>
                    <?php $Pcode_inst = $Pcode['productCode']; ?>
                        <?php foreach ($products as $product) : ?>
                            <?php $product_inst = $product['productCode']; ?>
                        <tr>
                            <?php if ($Pcode_inst = $product_inst): ?>
                                <td><?php echo $product['productCode']; ?></td>
                                <td><?php echo $product['name']; ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                <?php endforeach; ?>
                
            </table>
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> My Shop, Inc.</p>
    </div>

    </div><!-- end page -->
</body>
</html>