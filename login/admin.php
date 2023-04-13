<?php
session_start();

if ( !isset($_SESSION['ROLEID']) || $_SESSION['ROLEID'] != '3')
{
    $_SESSION['error'] = "Session has expired";
    header('Location:index.php');
}

include('../includes/db_conn.php');

try {
    $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
    $sql = $db->prepare("
        SELECT * FROM phpclass.member_roles
    ");
    $sql->execute();
    $roles = $sql->fetchAll();



}
catch(PDOException $e){
    echo $e->getMessage();
    exit;
}

$error_message = "";
$fullname = "";
$email = "";
$password = "";
$verify_password = "";
$role = "";
$member_key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X',
    mt_rand(0, 65535),
    mt_rand(0, 65535),
    mt_rand(0, 65535),
    mt_rand(16384, 20479),
    mt_rand(32768, 49151),
    mt_rand(0, 65535),
    mt_rand(0, 65535),
    mt_rand(0, 65535));

if (isset($_POST['submit']))
{
    //--validations
    if (isset($_POST['txt_fullname']) && !empty('txt_fullname'))
    {
        $fullname = $_POST['txt_fullname'];
    }
    else
    {
        $error_message = 'Your full name is required';
    }

    if (isset($_POST['txt_email']) && !empty('txt_email'))
    {
        $email = $_POST['txt_email'];
    }
    else
    {
        $error_message = 'Your email is required';
    }

    if (isset($_POST['txt_password']) && !empty('txt_password'))
    {
        $password = $_POST['txt_password'];
    }
    else
    {
        $error_message = 'Your password is required';
    }

    if ($password == $_POST['txt_verify_password'])
    {
        $verify_password = $_POST['txt_verify_password'];
    }
    else
    {
        $error_message = 'Verify your password';
    }

    if (isset($_POST['txt_role']) && !empty('txt_role'))
    {
        $role = $_POST['txt_role'];
    }
    else
    {
        $error_message = 'User role is required';
    }

    if (empty($error_message))
    {

        try {
            $db = new PDO($db_dsn, $db_username, $db_password, $db_options);

            $sql = $db->prepare("
                
                SELECT member_id from phpclass.member_login
                where email = :Email
            
            ");

            $sql->bindValue(":Email", $email);
            $sql->execute();
            $row = $sql->fetch();

            if($row != null)
            {
                $error_message = $email . ' already exists.';
            }
            else
            {

            $sql = $db->prepare("
                INSERT INTO phpclass.member_login (name, email, password, role_id, member_key)
                VALUES (:Name, :Email, :Password, :RoleID, :MemberKey)

            ");

            $sql->bindValue(':Name', $fullname);
            $sql->bindValue(':Email', $email);
            $sql->bindValue(':Password', md5($password . $member_key));
            $sql->bindValue(':RoleID', $role);
            $sql->bindValue(':MemberKey', $member_key);
            $sql->execute();

            $error_message = "New Member Added";

            $error_message = "";
            $fullname = "";
            $email = "";
            $password = "";
            $verify_password = "";
            $role = "";
            }

        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
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
    <title>Template</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
</head>
<body>
<div id="wrapper">
    <?php include('../includes/header.php'); ?>

    <?php include('../includes/nav.php'); ?>

    <main>
        <h3>Admin Page</h3>


        <? if(isset($error_message) && !empty($error_message)){ ?>
            <P CLASS="error"> <?=$error_message?></P>
        <? }?>

        <form method="post">
            <table border = "1" width="80%">
                <tr height="100">
                    <th colspan="2">
                        <h3>Add New Member</h3>
                    </th>
                </tr>

                <tr height="50">
                    <th>Full Name</th>
                    <td>
                        <input
                                type="text"
                                name="txt_fullname"
                                id="txt_fullname"
                                size="50"

                                value="<?=$fullname ?>"
                        />
                    </td>
                </tr>

                <tr height="50">
                    <th>Email</th>
                    <td>
                        <input
                                type="email"
                                name="txt_email"
                                id="txt_email"
                                size="50"

                                value="<?=$email ?>"
                        />
                    </td>
                </tr>
                <tr height="50">
                    <th>Password</th>
                    <td>
                        <input type="password"
                               name="txt_password"
                               id="txt_password"
                               size="50"

                               value = "<?=$password ?>"
                        />
                    </td>
                </tr>

                <tr height="50">
                    <th>Password Verify</th>
                    <td>
                        <input type="password"
                               name="txt_verify_password"
                               id="txt_verify_password"
                               size="50"

                               value = "<?=$verify_password ?>"
                        />
                    </td>
                </tr>

                <tr height="50">
                    <th>User Role</th>
                    <td>
                      <select name="txt_role" id="txt_role">
                          <?php
                          foreach($roles as $role_item){?>
                              <option value="<?= $role_item['role_id'] ?>"<?php if($role == $role_item['role_id']){ echo"selected";} ?>><?= $role_item['role_name'] ?> </option>
                          <?php }?>
                      </select>
                    </td>
                </tr>

                <tr height = "100">
                    <td colspan="2">

                        <input type="submit" value="Add Member" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </main>

    <?php include('../includes/footer.php'); ?>
</div>
</body>
</html>