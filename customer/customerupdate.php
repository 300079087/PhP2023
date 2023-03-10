<?php

include ('../includes/db_conn.php');

$db_dsn = "mysql:host=localhost;dbname=phpclass";
$db_username = "dbuser";
$db_password = "dbdev123";
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

if(
    isset($_POST['FirstName']) && !empty($_POST['FirstName']) &&
    isset($_POST['LastName']) && !empty($_POST['LastName']) &&
    isset($_POST['Address']) && !empty($_POST['Address']) &&
    isset($_POST['City']) && !empty($_POST['City']) &&
    isset($_POST['State']) && !empty($_POST['State']) &&
    isset($_POST['Zip']) && !empty($_POST['Zip']) &&
    isset($_POST['Phone']) && !empty($_POST['Phone']) &&
    isset($_POST['Email']) && !empty($_POST['Email']) &&
    isset($_POST['Password']) && !empty($_POST['Password'])
) {

    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $address = $_POST['Address'];
    $city = $_POST['City'];
    $state = $_POST['State'];
    $zip = $_POST['Zip'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

//    echo "<pre>";
//    print_r($_POST);
//    echo"</pre>";
//    exit();

    try {
        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db -> prepare("
                UPDATE phpclass.customer set
                    FirstName = :FirstName, 
                    LastName = :LastName,
                    Address = :Address,
                    City = :City,
                    State = :State,
                    Zip = :Zip,
                    Phone = :Phone,
                    Email = :Email,
                    Password = :Password,
                where 
                    CustomerID = :Id
        ");

        $sql -> bindValue(  'FirstName', $firstname);
        $sql -> bindValue(  'LastName', $lastname);
        $sql -> bindValue(  'Address', $address);
        $sql -> bindValue(  'City', $city);
        $sql -> bindValue(  'State', $state);
        $sql -> bindValue(  'Zip', $zip);
        $sql -> bindValue(  'Phone', $phone);
        $sql -> bindValue(  'Email', $email);
        $sql -> bindValue(  'Password', $password);
        $sql ->execute();

        header("Location:customerview.php?success=1");

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
                    phpclass.customer
            where
                CustomerID = :Id
              "
        );
        $sql->bindValue(":Id", $id);
        $sql-> execute();
        $customer = $sql->fetch();

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

    header("Location:customerview.php");
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
    <form method="post"">
    <input type="hidden" name="customer_id" id="customer_id" value="<?= $customer ['customer_id']?>">
    <table border ="1" width =80%>
        <tr height="100">
            <th colspan="2">
                <h3>Update Customer</h3>
            </th>
        </tr>

        <tr height="50">
            <th>First Name</th>
            <td>
                <input
                    type="text"
                    name="first_name"
                    id="first_name"
                    size="50"
                    value = "<?= $customer ['first_name']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Last Name</th>
            <td>
                <input
                        type="text"
                        name="last_name"
                        id="last_name"
                        size="50"
                        value = "<?= $customer ['last_name']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Address</th>
            <td>
                <input
                        type="text"
                        name="address"
                        id="address"
                        size="50"
                        value = "<?= $customer ['address']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Address</th>
            <td>
                <input
                        type="text"
                        name="address"
                        id="address"
                        size="50"
                        value = "<?= $customer ['address']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>City</th>
            <td>
                <input
                        type="text"
                        name="city"
                        id="city"
                        size="50"
                        value = "<?= $customer ['city']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>City</th>
            <td>
                <input
                        type="text"
                        name="state"
                        id="state"
                        size="50"
                        value = "<?= $customer ['state']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Zip</th>
            <td>
                <input
                        type="text"
                        name="zip"
                        id="zip"
                        size="50"
                        value = "<?= $customer ['zip']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Zip</th>
            <td>
                <input
                        type="text"
                        name="phone"
                        id="phone"
                        size="50"
                        value = "<?= $customer ['phone']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Zip</th>
            <td>
                <input
                        type="text"
                        name="email"
                        id="email"
                        size="50"
                        value = "<?= $customer ['email']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Zip</th>
            <td>
                <input
                        type="text"
                        name="password"
                        id="password"
                        size="50"
                        value = "<?= $customer ['password']?>"
                />
            </td>
        </tr>

    </table>
    </form>
</main>

<?php include ('../includes/footer.php');?>


</body>
</html>