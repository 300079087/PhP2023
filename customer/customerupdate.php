<?php

include ('../includes/db_conn.php');

$db_dsn = "mysql:host=localhost;dbname=phpclass";
$db_username = "dbuser";
$db_password = "dbdev123";
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

if(
    isset($_POST['first_name']) && !empty($_POST['first_name']) &&
    isset($_POST['last_name']) && !empty($_POST['last_name']) &&
    isset($_POST['address']) && !empty($_POST['address']) &&
    isset($_POST['city']) && !empty($_POST['city']) &&
    isset($_POST['state']) && !empty($_POST['state']) &&
    isset($_POST['zip']) && !empty($_POST['zip']) &&
    isset($_POST['phone']) && !empty($_POST['phone']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['verify_password']) && !empty($_POST['verify_password']) &&
    isset($_POST['customer_id']) && !empty($_POST['customer_id'])
) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify_password'];
    $id = $_POST['customer_id'];

//    echo "<pre>";
//    print_r($_POST);
//    echo"</pre>";
//    exit();

    if ($password != $verify_password) {
        echo("Your passwords do not match");
        return;
    }

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
                    Password = :Password
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
        $sql -> bindValue(  'Id', $id);
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

    <script type="text/javascript">
        function DeleteMovie(LastName, id){
            if(confirm("Do you really want to delete " + LastName + "?")){
                document.location.href = "customerdelete.php?id="+id;
            }
        }
    </script>

</head>
<body>
<?php include ('../includes/header.php');?>
<?php include ('../includes/nav.php') ;?>

<main>
    <form method="post">
    <input type="hidden" name="customer_id" id="customer_id" value="<?= $customer['CustomerID']?>">
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
                    value = "<?= $customer ['FirstName']?>"
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
                        value = "<?= $customer ['LastName']?>"
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
                        value = "<?= $customer ['Address']?>"
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
                        value = "<?= $customer ['City']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>State</th>
            <td>
                <input
                        type="text"
                        name="state"
                        id="state"
                        size="50"
                        value = "<?= $customer ['State']?>"
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
                        value = "<?= $customer ['Zip']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Phone</th>
            <td>
                <input
                        type="text"
                        name="phone"
                        id="phone"
                        size="50"
                        value = "<?= $customer ['Phone']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Email</th>
            <td>
                <input
                        type="text"
                        name="email"
                        id="email"
                        size="50"
                        value = "<?= $customer ['Email']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Password</th>
            <td>
                <input
                        type="password"
                        name="password"
                        id="password"
                        size="50"
                        value = "<?= $customer ['Password']?>"
                />
            </td>
        </tr>

        <tr height="50">
            <th>Verify Password</th>
            <td>
                <input
                        type="text"
                        name="verify_password"
                        id="verify_password"
                        size="50"
                        placeholder="Please verify your password"

                />
            </td>
        </tr>
        <tr height = "100">
            <td colspan="2">

                <input type="submit" value="Update Customer">
                <input
                        type="button"
                        value="Delete Customer"
                        onClick="DeleteMovie(
                            '<?=$customer ['LastName'] ?>',
                            '<?=$customer['CustomerID']?>'
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