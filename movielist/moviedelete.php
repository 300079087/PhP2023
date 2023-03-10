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

    echo("error");

    try {
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
        
            DELETE FROM phpclass.movielist 
                   where movie_id = :Id

        "
        );

        $sql ->bindValue(':Id', $id);
        $sql -> execute();

        header("Location:list.php?delete=1");

        exit();
    }
    catch (PDOException $e){
        echo $e->getMessage();

        exit();

    }

}
header("Location:list.php");