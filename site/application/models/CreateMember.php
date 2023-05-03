<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateMember extends CI_Model {

    public function user_create($Username, $Email, $Password)
    {
        $Member_key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X',
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(16384, 20479),
        mt_rand(32768, 49151),
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(0, 65535));

        $this->load->database();
        $this->load->library('session');
        try {

            $db = new PDO($this->db->dsn, $this->db->username, $this->db->password, $this->db->options);
            $sql = $db->prepare("
                Insert into phpclass.member_login (name, email, password, role_id, member_key)
            values (:Username, :Email, :Password, 1, :Member_key)
            ");

            $sql->bindValue(':Username', $Username);
            $sql->bindValue(':Email', $Email);
            $sql->bindValue(':Password', md5($Password . $Member_key));
            $sql->bindValue(':Member_key', $Member_key);
            $sql->execute();

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }



    }

}
