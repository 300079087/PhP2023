<?php

include('../includes/db_conn.php');

$db_dsn = "mysql:host=localhost;dbname=phpclass";
$db_username = "dbuser";
$db_password = "dbdev123";
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try{

    $db = new PDO($db_dsn, $db_username, $db_password, $db_options); // calling Pizza Hut
    $sql = $db->prepare("Select * from phpclass.movielist;"); // placing your order
    $sql ->execute(); // baking the pizza
    $movies = $sql->fetchAll(); // pizza deliver

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
    <title>Movie List Database</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<?php include ('../includes/header.php');?>
<?php include ('../includes/nav.php') ;?>

<main>
    <h3> My Movie List</h3>

    <?php if(isset($_GET['success']) && !empty($_GET['success'])) { ?>
        <div>
            <p class="success">Movie added/updated successfully</p>
        </div>
    <?php } ?>
    <?php if(isset($_GET['delete']) && !empty($GET['delete'])) { ?>
        <div>
            <p class="success">Movie deleted successfully</p>
        </div>
    <?php } ?>

    <table border="1" width="80%">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Rating</th>
        </tr>
        <?php foreach ($movies as $movie) { ?>
            <tr>
                <td><?= $movie['movie_id']?></td>
                <td>
                    <a href="movieupdate.php?id=<?= $movie['movie_id']?>"><?=$movie['movie_title']?></a>
                </td>
                <td><?= $movie['movie_rating']?></td>

            </tr>
        <?php }?>
    </table>
    <div>
        <a href="movieadd.php">Add New Movie</a>
    </div>

    <?php include ('../includes/footer.php');?>
</main>
</body>
</html>