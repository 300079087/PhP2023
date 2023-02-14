<?php
session_start();

$question = "";
$answer = "Ask me a question please";
$previous_question = '';

if(isset($_POST['txtQuestion'])){
    $question = $_POST['txtQuestion'];
}

if (isset($_SESSION['previous_question']))
{
    $previous_question = $_SESSION['previous_question'];
}
else
{
    $previous_question;
}
$responses = [
    'Ask again later.',
    'Yes',
    'No',
    'It appears to be so',
    'Reply is hazy, please try again',
    'Yes, definitely',
    'What is it you really want to know',
    'Outlook is good',
    'My sources say no',
    'Signs point to yes',
    'Don\'t count on it',
    'Cannot predict now',
    'As I see it, yes',
    'Better not tell you now',
    'Concentrate and ask again'
];

if(empty($question))
{
  $answer = "Ask me a Question.";
}
elseif(substr($question, -1) != "?"){
    $answer = 'Please enter a question with a ? mark @ the end.';
}
elseif($question == $previous_question)
{
    $answer = 'Please ask me a different question.';
}
else
{
    $answer = $responses[mt_rand(0,14)];
    $_SESSION['previous_question'] = $question;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magic 8 Ball</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
</head>
<body>
<div id="wrapper">
    <?php include('../includes/header.php'); ?>

    <?php include('../includes/nav.php'); ?>
    <main>
        <h3>Magic 8 Ball</h3>
        <p>
            <marquee><?=$answer ?></marquee>
            <form action="8ball.php" method="post">
            <label>Ask a question</label>
            <br/><br/>
            <input type="text" name="txtQuestion" id="txtQuestion" />
            <br/><br/>
            <input type="submit" value="Getting a response"/>
        </form>
        </p>
    </main>

    <?php include('../includes/footer.php'); ?>
</div>
</body>
</html>