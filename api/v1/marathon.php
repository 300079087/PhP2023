<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$marathon = new \Slim\Slim();

$marathon->get('/get_races','get_races');
$marathon->get('get_runners/:race_id','get_runners');

$marathon->post('/addJson', 'add_runner');

$marathon->delete('/addJson', 'delete_runner');

$marathon->put('/addJson', 'update_runner');

$marathon->run();

function get_races()
{
    echo "Getting the races: ";
}

function get_runners($race_id)
{
    echo "Getting racer for: $race_id";
}

function add_runner()
{
    $request = \Slim\Slim::getInstance()->$request();
    $post_json = json_decode($request->getBody(),TRUE);
    echo $post_json["add_runner"];
}

function delete_runner()
{
    $request = \Slim\Slim::getInstance()->$request();
    $post_json = json_decode($request->getBody(),TRUE);
    echo $post_json["delete_runner"];
}

function update_runner()
{
    $request = \Slim\Slim::getInstance()->$request();
    $post_json = json_decode($request->getBody(),TRUE);
    echo $post_json["update_runner"];
}

?>