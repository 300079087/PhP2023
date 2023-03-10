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

//echo "<pre>";
// echo $login_email . $login_password;
//   echo"</pre>";
//    exit();

   if (strtolower($login_email) == 'admin@test.com' && $login_password == 'p@ss')
   {
       $_SESSION['UID'] = 1;
        header("Location:admin.php");
   }
   else if (strtolower($login_email) == 'member@test.com' && $login_password == 'p@ss')
   {
       unset($_SESSION['UID']);
       header("Location:member.php");
   }
   else
   {
       unset($_SESSION['UID']);
       $error_message = "Wrong username or password";
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