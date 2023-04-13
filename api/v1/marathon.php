<?php
require 'Slim/Slim.php';
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
    $delete_runner_payload = json_decode($request->getBody(), true);

    $member_id = $delete_runner_payload['member_id'];
    $race_id = $delete_runner_payload['race_id'];
    $promoter_member_key = $delete_runner_payload['member_key'];

    //echo "$member_id => $race_id => $promoter_member_key";

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

        $sql->bindValue(':Raceid', $race_id);
        $sql->bindValue(':Apikey', $promoter_member_key);
        $sql->execute();
        $auth = $sql->fetch();

        if ($auth == null)
        {
            echo"Invalid";
        }
        else
        {
            $sql = $db->prepare("
            DELETE FROM phpclass.member_race WHERE member_id = :Memberid AND race_id = :Raceid");

            $sql->bindValue(':Memberid', $member_id);
            $sql->bindValue(':Raceid', $race_id);
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

        $result['races'] = $races;

        echo json_encode($result);

    }catch (PDOException $e){
        echo $e->getMessage();
        exit;
    }
}

function getHello(){
    echo "Hello World";

}

function get_runners($race_id){

    include('../../includes/db_conn.php');
    try{

        $db = new PDO($db_dsn, $db_username, $db_password, $db_options);
        $sql = $db->prepare("
        SELECT  
            member_login.name,
            member_login.email,
            member_race.race_id
        FROM
            member_login
        inner join member_race on member_login.member_id = member_race.member_id
        where
            member_race.race_id = :Raceid   
        ");

        $sql->bindValue(':Raceid', $race_id);
        $sql->bindValue('Apikey', $promoter_member_key);
        $sql->execute();
        $auth = $sql->fetch();

        if ($auth == null)
        {
            echo"Invalid Promoter API Key";
        }
        else
        {
            $sql = $db->prepare(
                "INSERT INTO phpclass.member_race (member_id, race_id, role_id)
                VALUES (:MemberId, :Raceid, 1)"
            );
            $sql->bindValue(':Memberid', $member_id);
            $sql->bindValue(':Raceid',$race_id);
            $sql->execute();
        }

    }catch (PDOException $e){
        echo $e->getMessage();
        exit;
    }
}

function add_runner($runner_id){
    $request = \Slim\Slim::getInstance()->request();
    $add_runner_payload = json_decode($request->getBody(), true);
    $member_id = $add_runner_payload['member_id'];
    $race_id = $add_runner_payload['race_id'];
    $promoter_member_key = $add_runner_payload['member_key'];

    //echo "$member_id => $race_id => $promoter_member_key";

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



        $sql->bindValue(':Raceid', $race_id);
        $sql->bindValue(':Apikey', $promoter_member_key);
        $sql->execute();
        $auth = $sql->fetch();

        if ($auth == null)
        {
            echo"Invalid";
        }
        else
        {
            $sql = $db->prepare("
            INSERT INTO phpclass.member_race (member_id, raceid) values (':Memberid',':Raceid')");

            $sql->bindValue(':Memberid', $member_id);
            $sql->bindValue(':Raceid', $race_id);
            $sql->execute();
        }

    }catch (PDOException $e){
        echo $e->getMessage();
        exit;
    }

}


?>