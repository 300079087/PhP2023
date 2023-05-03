<?php

require('Slim/Slim.php');
\Slim\Slim::registerAutoloader();

/*
 * htpp method = mysql statement
 * Put = Update
*Post = Insert
*Get = Select
*Delete = Delete
*/

$app = new \Slim\Slim(); //instance of the Slim class

$app->get('/get_races', 'get_races');
$app->get('/get_runners/:race_id','get_runners' );
$app->post('/add_runner/:runner_id','add_runner');
$app->delete('/delete_runner/:runner_id','delete_runner');
$app->put('/update_runner', 'update_runner');


$app->run();

function update_runner(){
    $request = \Slim\Slim::getInstance()->request();
    $add_runner_payload = json_decode($request->getBody(), true);
    print_r($add_runner_payload);
    exit;
}

function delete_runner ($runner_id) {
    $request = \Slim\Slim::getInstance()->request();
    $post_json = json_decode($request->getBody(), true);
    $member_id = $post_json['member_id'];
    $race_id = $post_json['race_id'];
    $member_key = $post_json['member_key'];

    include('../../includes/db_conn.php');
    try{

        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
            SELECT 
                member_race.race_id
            FROM
                member_race
            inner join
                member_login ON member_race.member_id = member_login.member_id
            WHERE
                member_login.member_key = :Apikei AND
                member_race.race_id = :RaceID AND
                member_race.role_id = 2
        ");

        $sql->bindValue(':RaceID', $race_id);
        $sql->bindValue(':Apikey', $member_key);
        $sql->execute();
        $auth = $sql->fetch();

        if ($auth == null)
        {
            echo"Invalid";
        }
        else
        {
            $sql = $db->prepare("
            DELETE FROM phpclass.member_race WHERE member_id = :MemberID AND race_id = :RaceID");

            $sql->bindValue(':MemberID', $member_id);
            $sql->bindValue(':RaceID', $race_id);
            $sql->execute();
        }

    }catch (PDOException $e){
        echo $e->getMessage();
        exit;
    }


}

function get_races(){

    include('../../includes/db_conn.php');
    try{

        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("SELECT * FROM phpclass.race");
        $sql->execute();
        $races = $sql->fetchAll();

        echo '{"Races":' . json_encode($races) . '}';

        $db = null;
        $races = null;
        //$result['races'] = $races;

        //echo json_encode($result);

    }catch (PDOException $e){
        echo $e->getMessage();
        exit;
    }
}

function get_runners($race_id,$member_id){

    include('../../includes/db_conn.php');
    try{

        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
        SELECT DISTINCT
            Name, Email
        FROM
            member_login
        inner join member_race on member_login.member_id = member_race.member_id
        where
            member_race.race_id = :RaceID
        ");

        $sql->bindValue(':RaceID', $race_id);
        $sql->execute();
        $auth = $sql->fetchAll();

        if ($auth == null)
        {
            echo"Invalid Promoter API Key";
        }
        else
        {
            $sql = $db->prepare(
                "INSERT INTO phpclass.member_race (member_id, race_id, role_id)
                VALUES (:MemberID, :RaceID, 1)"
            );
            $sql->bindValue(':MemberID', $member_id);
            $sql->bindValue(':RaceID', $race_id);
            $sql->execute();
        }

    }catch (PDOException $e){
        echo $e->getMessage();
        exit;
    }
}

function add_runner($runner_id){
    $request = \Slim\Slim::getInstance()->request();
    $post_json = json_decode($request->getBody(), true);
    $member_id = $post_json['member_id'];
    $race_id = $post_json['race_id'];
    $member_key = $post_json['member_key'];

    include('../../includes/db_conn.php');
    try{

        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
            SELECT 
                member_race.race_id
            FROM
                member_race
            inner join
                member_login ON member_race.member_id = member_login.member_id
            WHERE
                member_login.member_key = :Apikei AND
                member_race.race_id = :RaceID AND
                member_race.role_id = 2
        ");

        $sql->bindValue(':RaceID', $race_id);
        $sql->bindValue(':Apikey', $member_key);
        $sql->execute();
        $auth = $sql->fetch();

        if ($auth == null)
        {
            echo"Invalid";
        }
        else
        {
            $sql = $db->prepare("
            INSERT INTO phpclass.member_race (member_id, race_id, role_id) values (':MemberID',':RaceID', 1)");

            $sql->bindValue(':MemberID', $member_id);
            $sql->bindValue(':RaceID', $race_id);
            $sql->execute();
        }

    }catch (PDOException $e){
        echo $e->getMessage();
        exit;
    }

}