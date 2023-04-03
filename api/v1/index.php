<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

//Put Update
//Post Insert
//Get Select
//Delete Delete

$app = new \Slim\Slim();

$app->get('/getHello','getHello');
$app->get('/showMember/:MemberName', 'showMember');

$app->post('/addMember/:MemberName', 'addMember');
$app->post('/addJson', 'addJson');

$app->delete('/delUser/:userID', 'delUser');

$app->run();

function getHello()
{
    echo "Hello World";
}

function showMember($MemberName)
{
    echo "Hello $MemberName";
}

function addMember($MemberName)
{
    echo "Hello $MemberName";
}

function addJson()
{
    $request = \Slim\Slim::getInstance()->$request();
    $post_json = json_decode($request->getBody(),TRUE);
    echo $post_json["address"];
}

function delUser($userID)
{
    echo "Deleted $userID";
}

?>