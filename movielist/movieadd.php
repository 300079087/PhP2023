<?php
if(
    isset($_POST['movie_name']) && !empty($_POST['movie_name'])
    && isset($_POST['movie_rating']) && !empty($_POST['movie_rating'])
) {

    $title = $_POST['movie_name'];
    $rating = $_POST ['movie_rating'];

//    echo "<pre>";
//    print_r($_POST);
//    echo"</pre>";
//    exit();

    include ('../includes/db_conn.php');

    $db_dsn = "mysql:host=localhost;dbname=phpclass";
    $db_username = "dbuser";
    $db_password = "dbdev123";
    $db_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    try {
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db -> prepare("
                INSERT INTO 
                    phpclass.movielist(movie_title, movie_rating)
                value(:Title, :Rating)
        ");

        $sql -> bindValue(  'Title', $title);
        $sql -> bindValue( 'Rating', $rating);
        $sql ->execute();

        header("Location:list.php?success=1");

    }catch (PDOException $e){
        ECHO $e->getMessage();
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Movie</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<?php include ('../includes/header.php');?>
<?php include ('../includes/nav.php') ;?>

<main>
    <form method="post">
        <table border = "1" width="80%">
            <tr height="100">
                <th colspan="2">
                    <h3>Add New Movie</h3>
                </th>
            </tr>

            <tr height="50">
                <th>Movie Name</th>
                <td>
                    <input type="text" name="movie_name" id="movie_name" size="50" >
                </td>
            </tr>
            <tr height="100">
                <th>
                    Movie Rating
                </th>
                <td>
                    <input type="text" name="movie_rating" id="movie_rating" size="10">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Add Movie">
                </td>
            </tr>
        </table>
    </form>
</main>

<?php include ('../includes/footer.php');?>


</body>
</html>