<?php
    $SEC_PER_MIN = 60;
    $SEC_PER_HOUR = 60 * $SEC_PER_MIN;
    $SEC_PER_DAY = 24 * $SEC_PER_HOUR;
    $SEC_PER_YEAR = 365 * $SEC_PER_DAY;

    $NOW = time();
    $NEXT_DECADE = mktime(0, 0,0,1,1,2023);

    $seconds = $NEXT_DECADE - $NOW;

    //calculating the number of years now
    $years = floor($seconds / $SEC_PER_YEAR);
    //removing the number of years in seconds from total seconds
    $seconds = $seconds - ($SEC_PER_YEAR * $years);

    //calculate the number of days
    $days = floor($seconds / $SEC_PER_DAY);

    //remove days in seconds from total seconds
    $seconds = $seconds - ($SEC_PER_DAY * $days);

    //calculate the number of hours
    $hours = floor($seconds/$SEC_PER_HOUR);

    $seconds = $seconds - ($SEC_PER_HOUR * $hours);

    //calculate the number of minutes
    $minutes = floor($seconds/$SEC_PER_MIN);

    $seconds = $seconds - ($SEC_PER_MIN * $minutes);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Countdown Timer</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
</head>
<body>
<div id="wrapper">
    <main>


        <h3>Countdown Timer to Next Decade</h3>
        <p>
            Now: <?=$NOW ?>
            Next Decade Time: <?=$NEXT_DECADE ?>
        </p>

        <p>
            Current Date <?=date("Y-m-d h:i:s"); ?>
        </p>
        <p>Years: <?=$years ?> | Days: <?=$days ?> | Hours: <?=$hours ?> | Minutes: <?=$minutes ?> | Seconds: <?=$seconds ?></p>
    </main>



    <?php include('../includes/header.php'); ?>

    <?php include('../includes/nav.php'); ?>

    <?php include('../includes/footer.php'); ?>
</div>
</body>
</html>