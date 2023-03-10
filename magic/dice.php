<?php
$Dice = Array(
        1=> '<img src= images/dice_1.png >',
        2=> '<img src= images/dice_2.png >',
        3=> '<img src= images/dice_3.png >',
        4=> '<img src= images/dice_4.png >',
        5=> '<img src= images/dice_5.png >',
        6=> '<img src= images/dice_6.png >',
)
*/
//Creating this array, but never needed it, practice makes better. :)/
$Dice = [1,2,3,4,5,6];

$Dice = [1,2,3,4,5,6];
$Personal_Score = 0;
$Computer_Score = 0;
$Result_Score = 0;
$Personal_Dice1 = mt_rand(1,6);
$Personal_Dice2 = mt_rand(1,6);

$Computer_Dice1 = mt_rand(1,6);
$Computer_Dice2 = mt_rand(1,6);
$Computer_Dice3 = mt_rand(1,6);

$Personal_Score = $Personal_Dice1 + $Personal_Dice2;

$Personal_Dice1 = $Dice[mt_rand(0,6)];
$Personal_Dice2 = $Dice[mt_rand(0,6)];

$Computer_Dice1 = $Dice[mt_rand(0,6)];
$Computer_Dice2 = $Dice[mt_rand(0,6)];
$Computer_Dice3 = $Dice[mt_rand(0,6)];

$Personal_Score = Personal_Dice1 + $Personal_Dice2;

$Computer_Score = $Computer_Dice1 + $Computer_Dice2 + $Computer_Dice3;

if($Personal_Score == $Computer_Score)
{
    $Result_Score = "Tie Nobody Wins";
}
elseif($Personal_Score > $Computer_Score)
{
    $Result_Score = "Personal Wins";
}
else
{
    $Result_Score = "Computer Wins";
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
        <h2>Your score is: <?= $Personal_Score ?></h2>

        <table>
            <tr>
                <td><img alt="no" src="../images/dice_<?= $Personal_Dice1 ?>.png"></td>
                <td><img alt="no" src="../images/dice_<?= $Personal_Dice2 ?>.png"></td>
            </tr>
        </table>
        <br>
        <h2>Computer score is: <?= $Computer_Score ?></h2>
        <table>
            <tr>
                <td><img alt="no" src="../images/dice_<?= $Computer_Dice1 ?>.png"></td>
                <td><img alt="no" src="../images/dice_<?= $Computer_Dice2 ?>.png"></td>
                <td><img alt="no" src="../images/dice_<?= $Computer_Dice3 ?>.png"></td>
            </tr>
        </table>

        <br>
        <h2>Computer score is: <?= $Computer_Score ?></h2>
        <br>
        <h2>Result means: <?= $Result_Score ?></h2>
    </main>

    <?php include('../includes/footer.php'); ?>
</div>
</body>
</html>