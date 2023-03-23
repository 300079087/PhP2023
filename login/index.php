<?php

session_start();


include ('../includes/db_conn.php');

$db_dsn = "mysql:host=localhost;dbname=phpclass";
$db_username = "dbuser";
$db_password = "dbdev123";
$db_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

if(
    isset($_POST['login_email']) && !empty($_POST['login_email'])
    && isset($_POST['login_password']) && !empty($_POST['login_password'])
) {

    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    try {

        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
        
            SELECT password, role_id, member_key from phpclass.member_login
            where email = :Email
        
        ");

        $sql->bindValue(':Email', $login_email);
        $sql->execute();
        $row = $sql->fetch();

        if($row != null)
        {
            $hashed_password = md5($login_password . $row['member_key']);

            if($hashed_password == $row['password'] && $row['role_id'] == 3)
            {
                $_SESSION['UID'] = $row['member_key'];
                $_SESSION['ROLEID'] = $row['role_id'];
                header("location:admin.php");
            }
            else if ($hashed_password == $row['password'] && $row['role_id'] != 3)
            {
                header("location:member.php");
            }
            else
            {
                    $error_message = 'Wrong Username/Password';
            }
        }
        else
        {
            $error_message = 'Incorrect Username/Password';
        }


    } catch (PDOException $e)
    {
        echo $e->getMessage();
        exit;
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
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<?php include ('../includes/header.php');?>
<?php include ('../includes/nav.php') ;?>

<main>

    <? if(isset($error_message) && !empty($error_message)){ ?>
        <P CLASS="error"> <?=$error_message?></P>
    <? }?>

    <form method="post">
        <table border = "1" width="80%">
            <tr height="100">
                <th colspan="2">
                    <h3>Login</h3>
                </th>
            </tr>

            <tr height="50">
                <th>Email</th>
                <td>
                    <input
                        type="email"
                        name="login_email"
                        id="login_email"
                        size="50"
                        required
                        value=""
                    />
                </td>
            </tr>
            <tr height="50">
                <th>Password</th>
                <td>
                    <input type="password"
                           name="login_password"
                           id="login_password"
                           size="50"
                           required
                           value = ""
                    />
                </td>
            </tr>
            <tr height = "100">
                <td colspan="2">

                    <input type="submit" value="Login">
                </td>
            </tr>
        </table>
    </form>
</main>

<?php include ('../includes/footer.php');?>


</body>
</html>