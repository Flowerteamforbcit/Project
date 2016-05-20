<?php

//require_once('./DBConnector.php');

//$um = new UserManager();

// Facade
class UserManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }

    public function getUserProfile($userID) {

        $rows = $this->db->query("select * from customer where id = :name",
            array(':name' => $userID));
        //var_dump($rows[0]);
        if(count($rows) == 1) {
            return $rows[0];
        }
        // otherwise
        return null;
    }

    public function listUsers() {
        $sql = "SELECT id, name, email, pw from customer";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function updateUserFirstName($id, $newLogin) {
        $sql = "UPDATE customer SET name = '$newLogin' WHERE id = '$id'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }
    

    public function deleteUser($id) {
        $sql = "DELETE from customer WHERE id = '$id'";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }

    public function addUser($login, $email, $pw) {

        $sql = "INSERT INTO customer (name, email, pw)
            VALUES ('$login', '$email', '$pw')";
        $affectedRows = $this->db->affectRows($sql);
        return $affectedRows;
    }

    public function findUser($usr, $pwd) {
        $params = array(":usr" => $usr, ":pwd" => $pwd);
        $sql = "SELECT * from customer WHERE id = :usr AND pw = :pwd";

        $rows = $this->db->query($sql, $params);
        if(count($rows) > 0) {
            return $rows[0];
        }

        return null;
    }


}

?>
