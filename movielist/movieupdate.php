<?php

include ('../includes/db_conn.php');

$db_dsn = "mysql:host=localhost;dbname=phpclass";
$db_username = "dbuser";
$db_password = "dbdev123";
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

if(
    isset($_POST['movie_name']) && !empty($_POST['movie_name'])
    && isset($_POST['movie_rating']) && !empty($_POST['movie_rating'])
    && isset($_POST['movie_id']) && !empty($_POST['movie_id'])

) {

    $title = $_POST['movie_name'];
    $rating = $_POST ['movie_rating'];
    $id = $_POST['movie_id'];

//    echo "<pre>";
//    print_r($_POST);
//    echo"</pre>";
//    exit();

    try {
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db -> prepare("
                UPDATE phpclass.movielist set
                    movie_title = :Title, 
                    movie_rating = :Rating
                where 
                    movie_id = :Id
        ");

        $sql -> bindValue(  'Title', $title);
        $sql -> bindValue( 'Rating', $rating);
        $sql -> bindValue('Id' , $id);
        $sql ->execute();

        header("Location:list.php?success=1");

    }catch (PDOException $e){
        ECHO $e->getMessage();
        exit();
    }
} //---end if

if (isset($_GET['id'])){
    $id = $_GET['id'];

    try{
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql= $db->prepare("
                SELECT 
                    *
                FROM 
                    phpclass.movielist
            where
                movie_id = :Id
              "
        );
        $sql->bindValue(":Id", $id);
        $sql-> execute();
        $movie = $sql->fetch();

//         echo "<pre>";
//         print_r($movie);
//         echo "</pre>";
//         exit;

    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
}
else{

    header("Location:list.php");
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

    <script type="text/javascript">
        function DeleteMovie(moviename, id){
            if(confirm("Do you really want to delete" + moviename + "?")){
                document.location.href = "delete.php?id="+id;
            }
        }
    </script>
</head>
<body>
<?php include ('../includes/header.php');?>
<?php include ('../includes/nav.php') ;?>

<main>
    <form method="post">

        <input type="hidden" name="movie_id" id="movie_id" value="<?= $movie ['movie_id']?>">
        <table border = "1" width="80%">
            <tr height="100">
                <th colspan="2">
                    <h3>Update  Movie</h3>
                </th>
            </tr>

            <tr height="50">
                <th>Movie Name</th>
                <td>
                    <input
                        type="text"
                        name="movie_name"
                        id="movie_name"
                        size="50"
                        value = "<?= $movie ['movie_title']?>"
                    />
                </td>
            </tr>
            <tr height="50">
                <th>
                    Movie Rating
                </th>
                <td>
                    <input type="text"
                           name="movie_rating"
                           id="movie_rating"
                           size="10"
                           value = "<?= $movie ['movie_rating']?>"

                    />
                </td>
            </tr>
            <tr height = "100">
                <td colspan="2">

                    <input type="submit" value="Update Movie">
                    <input
                        type="button"
                        value="Delete Movie"
                        onClick="DeleteMovie(
                            '<?=$movie ['movie_title'] ?>',
                            '<?= $movie['movie_id']?>'
                            )"
                    />
                </td>
            </tr>
        </table>
    </form>
</main>

<?php include ('../includes/footer.php');?>


</body>
</html>