<?php

$db_dsn = 'mysql:host=localhost;dbname=phpclass';
$db_username = 'dbuser';
$db_password = 'dbdev123';
$db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
    $sql = $db->prepare("SELECT * FROM phpclass.movielist;");
    $sql->execute();
    $movies = $sql->fetchAll();

    //echo "<pre>";
    //print_r($rows);
    //echo "<pre>";
    //exit;
}
catch(PDOException $e)
{
    echo $e->getMessage();
    exit;
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
        <h3>Movie List</h3>

        <table border="1" width="80%">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Rating</th>
            </tr>
            <?php foreach($movies as $movie) { ?>
            <tr>
                <td><?= $movie['movie_id'] ?></td>
                <td><?= $movie['movie_title'] ?></td>
                <td><?= $movie['movie_rating'] ?></td>
            </tr>
            <?php }?>
        </table>
    </main>

    <?php include('../includes/footer.php'); ?>
</div>
</body>
</html>
