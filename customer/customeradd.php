<?php

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
    isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])
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
    $confirmpass = $_POST['confirm_password'];
    $salt = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X',
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(16384, 20479),
        mt_rand(32768, 49151),
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(0, 65535));

    $db_dsn = "mysql:host=localhost;dbname=phpclass";
    $db_username = "dbuser";
    $db_password = "dbdev123";
    $db_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    if ($password != $confirmpass) {
        echo("Your passwords do not match");
        return;
    }

    try {

        $db = new PDO($db_dsn, $db_username, $db_password, $db_options); // calling Pizza Hut
        $sql = $db->prepare("
    
        INSERT INTO phpclass.customer(FirstName, LastName, Address, City, State, Zip, Phone, Email, Password) 
        values(:FirstName, :LastName, :Address, :City, :State, :Zip, :Phone, :Email, :Password)
    
    "); // placing your order

        $sql -> bindValue(  ':FirstName', $firstname);
        $sql -> bindValue(  ':LastName', $lastname);
        $sql -> bindValue(  ':Address', $address);
        $sql -> bindValue(  ':City', $city);
        $sql -> bindValue(  ':State', $state);
        $sql -> bindValue(  ':Zip', $zip);
        $sql -> bindValue(  ':Phone', $phone);
        $sql -> bindValue(  ':Email', $email);
        $sql -> bindValue(  ':Password', md5($password . $salt));

        $sql->execute(); // baking the pizza

        $error_message = "Successfully added customer";

        header("Location:customerview.php?success=1");

        //print_r($rows);
        //  exit;

    } catch (PDOException $e) {

        echo $e->getMessage();
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
    <title>Template</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
</head>
<body>
<div id="wrapper">
    <?php include('../includes/header.php'); ?>

    <?php include('../includes/nav.php'); ?>

    <main>
        <?php if(isset($_GET['success']) && !empty($_GET['success'])) { ?>
            <div>
                <p class="success">Customer added successfully.</p>
            </div>
        <?php } ?>

        <form method="post">
            <table border = "1" width="80%">
                <tr height="100">
                    <th colspan="2">
                        <h3>Add New Customer</h3>
                    </th>
                </tr>

                <tr height="50">
                    <th>First Name</th>
                    <td>
                        <input type="text" name="first_name" id="first_name" size="50" placeholder="Jerry" required >
                    </td>
                </tr>
                <tr height="50">
                    <th>Last Name</th>
                    <td>
                        <input type="text" name="last_name" id="last_name" size="50" placeholder="Smith" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>Address</th>
                    <td>
                        <input type="text" name="address" id="address" size="50" placeholder="602 Billy Avenue" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>City</th>
                    <td>
                        <input type="text" name="city" id="city" size="50" placeholder="Milwaukee" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>State</th>
                    <td>
                        <select name="state" id="state">
                            <option value="AL">AL</option>
                            <option value="AK">AK</option>
                            <option value="AR">AR</option>
                            <option value="AZ">AZ</option>
                            <option value="CA">CA</option>
                            <option value="CO">CO</option>
                            <option value="CT">CT</option>
                            <option value="DC">DC</option>
                            <option value="DE">DE</option>
                            <option value="FL">FL</option>
                            <option value="GA">GA</option>
                            <option value="HI">HI</option>
                            <option value="IA">IA</option>
                            <option value="ID">ID</option>
                            <option value="IL">IL</option>
                            <option value="IN">IN</option>
                            <option value="KS">KS</option>
                            <option value="KY">KY</option>
                            <option value="LA">LA</option>
                            <option value="MA">MA</option>
                            <option value="MD">MD</option>
                            <option value="ME">ME</option>
                            <option value="MI">MI</option>
                            <option value="MN">MN</option>
                            <option value="MO">MO</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="NC">NC</option>
                            <option value="NE">NE</option>
                            <option value="NH">NH</option>
                            <option value="NJ">NJ</option>
                            <option value="NM">NM</option>
                            <option value="NV">NV</option>
                            <option value="NY">NY</option>
                            <option value="ND">ND</option>
                            <option value="OH">OH</option>
                            <option value="OK">OK</option>
                            <option value="OR">OR</option>
                            <option value="PA">PA</option>
                            <option value="RI">RI</option>
                            <option value="SC">SC</option>
                            <option value="SD">SD</option>
                            <option value="TN">TN</option>
                            <option value="TX">TX</option>
                            <option value="UT">UT</option>
                            <option value="VT">VT</option>
                            <option value="VA">VA</option>
                            <option value="WA">WA</option>
                            <option value="WI">WI</option>
                            <option value="WV">WV</option>
                            <option value="WY">WY</option>
                        </select>

                    </td>
                </tr>
                <tr height="50">
                    <th>Zip</th>
                    <td>
                        <input type="text" name="zip" id="zip" size="50" placeholder="12345" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>Phone Number</th>
                    <td>
                        <input type="text" id="phone" name="phone" size="50" placeholder="(###)-###-####" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>Email Address</th>
                    <td>
                        <input type="email" name="email" id="email" size="50" placeholder="name@provider">
                    </td>
                </tr>

                <!-- Password validation, guess this means that the text in the first textbox MUST match the text in the second textbox, and if so then this will add a new Customer.
                //If not then it will prompt an error, and allow the user to retry? -->
                <tr height="50">
                    <th>Password</th>
                    <td>
                        <input type="password" id="password" name="password" size="100" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </td>
                </tr>
                <tr height="50">
                    <th>Confirm Password</th>
                    <td>
                        <input type="password" id="confirm_password" name="confirm_password" size="100" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Please re-enter the password from above here" required>
                    </td>
                </tr>

                <!-- I would like this to be the length of the textboxes adventually. Instead of a small button in the corner. -->
                    <td>
                        <input type="submit" value="Add Customer">
                    </td>
                </tr>
            </table>
        </form>

    </main>

    <?php include('../includes/footer.php'); ?>
</div>
</body>
</html>