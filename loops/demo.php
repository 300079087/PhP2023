<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loops Demo</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
</head>
<body>
<div id="wrapper">
    <main>
        <p><h1>Loop Demo Project</h1></p>

    <?php
        $number = 100;

        print($number);
        echo "<br><strong>" .$number. "</strong>";

        $result = "<br/><strong>";

        $result .= $number;

        $number1 = 10;
        $number2 = 11;

        $res = $number1 * $number2;

        print($number1 + $number2);
        print($res);

        echo "<br/> $number1 + $number2 = $res";

        //While Loop
        $i = 1;
        while($i < 7)
        {
            print("Your stunning");
            $i++;
        }

        $i = 6;
        while ($i > 0)
        {
            print("Your beautiful");
            $i--;
        }

        //do while loop
        $i = 6;
        do{
            print("Your gorgeous");
            $i--;
        } while($i > 0);

        for ($i = 1; $i < 5; $i++){
            print("Your intelligent");
            $i--;
        }

        // string functions
        echo"<br/><br/><br/>";
        $fullname = "Austin SF";

        $position = strpos($fullname, '2');
        echo "<br/>The whitespace is in the $position position for $fullname";

        $name_parts = explode(' ', fullname)
    ?>
    </main>

    <?php include('../../includes/header.php'); ?>

    <?php include('../../includes/nav.php'); ?>

    <?php include('../../includes/footer.php'); ?>
</div>
</body>
</html>