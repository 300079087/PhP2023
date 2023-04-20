<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

    public function user_login($Email, $Pwd)
    {
        $this->load->database();
        $this->load->library('session');
        try {

            $db = new PDO($this->db->dsn, $this->db->username, $this->db->password, $this->db->options);
            $sql = $db->prepare("
        
            SELECT memeber_id, password, memeber_key from phpclass.member_login
            where Email = :Email and Role_ID = 2
        
        ");

            $sql->bindValue(':Email', $Email);
            $sql->execute();
            $row = $sql->fetch();

            if($row != null)
            {
                $hashed_password = md5($Pwd . $row['member_key']);

                if($hashed_password == $row['password']) {
                    $this->session->set_userdata(array("UID"=>  $row['member_key']));
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else {
                return false;
            }


        } catch (PDOException $e)
        {
            return false;
        }



    }

}
