<?php

$db_dsn = "mysql:host=localhost;dbname=phpclass";
$db_username = "dbuser";
$db_password = "dbdev123";
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try{

    $db = new PDO($db_dsn, $db_username, $db_password, $db_options); // calling Pizza Hut
    $sql = $db->prepare("Select * from phpclass.customer;"); // placing your order
    $sql ->execute(); // baking the pizza
    $customers = $sql->fetchAll(); // pizza deliver

    //print_r($rows);
    //  exit;

}catch(PDOException $e){

    echo $e->getMessage();
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
</head>
<body>
<div id="wrapper">
    <?php include('../includes/header.php'); ?>

    <?php include('../includes/nav.php'); ?>

    <main>
        <?php if(isset($_GET['success']) && !empty($_GET['success'])) { ?>
            <div>
                <p class="success">Customer added/updated successfully</p>
            </div>
        <?php } ?>

        <table border="1" width="80%">
            <tr>
                <th>CustomerID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <?php foreach ($customers as $customer) { ?>
                <tr>
                    <td><?= $customer['CustomerID']?></td>
                    <td><?= $customer['FirstName']?></td>
                    <td><?= $customer['LastName']?></td>
                    <td><?= $customer['Address']?></td>
                    <td><?= $customer['City']?></td>
                    <td><?= $customer['State']?></td>
                    <td><?= $customer['Zip']?></td>
                    <td><?= $customer['Phone']?></td>
                    <td><?= $customer['Email']?></td>
                    <td><?= $customer['Password']?></td>
                </tr>
            <?php }?>
        </table>
        <a href="customeradd.php"><br><br>Add New Customer Here</a>
    </main>

    <?php include('../includes/footer.php'); ?>
</div>
</body>
</html>