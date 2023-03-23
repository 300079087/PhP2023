<?php


include ('../includes/db_conn.php');

$db_dsn = "mysql:host=localhost;dbname=phpclass";
$db_username = "dbuser";
$db_password = "dbdev123";
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

if(isset($_GET['id']) ) { //if this is not true
    $id= $_GET['id'];


    try {
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
        
            DELETE FROM phpclass.customer 
                   where CustomerID = :Id

        "
        );

        $sql ->bindValue(':Id', $id);
        $sql -> execute();

        header("Location:customerview.php?delete=1");

        exit();
    }
    catch (PDOException $e){
        echo $e->getMessage();

        exit();

    }

}
header("Location:customerview.php");