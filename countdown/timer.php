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
    $seconds = $seconds - ($years * $SEC_PER_YEAR);

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

    //End of semester timer assignment below:
    //Going to use the same variables from the demo / in class assignment we did.
    //Doesn't make sure to use different ones in this circumstance.

    //Creating the variables for the assignment.
    $Seconds_Semester = 0;
    $Minutes_Semester = 0;
    $Hours_Semester = 0;
    $Days_Semester = 0;

    $END_OF_SEMESTER = mktime(0,0,0,5,20,2023);

    //Initial amount of seconds now.
    $Seconds_Semester = $END_OF_SEMESTER - $NOW;

    //DAYS
    $Days_Semester = ($Seconds_Semester / $days);

    $Seconds_Semester = $Seconds_Semester - ($days * $Days_Semester);

    //HRS
    $Hours_Semester = ($Seconds_Semester / hours);

    $Seconds_Semester = $Seconds_Semester - (hours * $Hours_Semester);

    //MINS
    $Minutes_Semester = ($Seconds_Semester / $minutes);

    $Seconds_Semester = $Seconds_Semester - ($minutes * $Minutes_Semester);


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
    <?php include('../includes/header.php'); ?>

    <?php include('../includes/nav.php'); ?>
    <main>

        <section id="middle">
        <h3>Countdown Timer to Next Decade</h3>
        <p>
            Now: <?=$NOW ?>
            Next Decade Time: <?=$NEXT_DECADE ?>
        </p>

        <p>
            Current Date <?=date("Y-m-d h:i:s"); ?>
        </p>
        <p>Years: <?= $years ?> | Days: <?=$days ?> | Hours: <?=$hours ?> | Minutes: <?=$minutes ?> | Seconds: <?=$seconds ?></p>
        </section>

        <h3>Countdown Timer to End of Semester</h3>
        <p>
            Now: <?=$NOW ?>
            End of Semester Time: <?= $END_OF_SEMESTER ?>
        </p>
        <p>
            Current Date <?=date("Y-m-d h:i:s"); ?>
        </p>
        <p>Days: <?=$Days_Semester ?> | Hours: <?= $Hours_Semester ?> | Minutes: <?= $Minutes_Semester ?> | Seconds: <?= $Seconds_Semester ?></p>
    </main>
    <?php include('../includes/footer.php'); ?>
</div>
</body>
</html>