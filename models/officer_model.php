<?php

class Officer_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    //retrieve all officers
    public function officerList() {
        $st = $this->db->prepare("SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' GROUP BY user.user_id");

        // SELECT user.user_name, user.first_name, group_concat(user_tel.tel_no) FROM user JOIN user_tel on user.user_id =user_tel.user_id GROUP BY user.user_id
        $st->execute(array(
            ':role' => 'officer'
        ));
        // print_r($st->fetchAll());

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //delete an officer
    public function delete($id) {
        $st = $this->db->prepare('DELETE FROM user WHERE user_id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    //Search officer by name
    public function ajxSearchOfficerName($officerName) {
        $escaped_name = addcslashes($officerName, '%');
        $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' AND user.first_name LIKE :first_name OR user.last_name LIKE :first_name GROUP BY user.user_id";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':first_name' => "$officerName%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //Search officer by NIC
    public function ajxSearchOfficerNic($nic) {
        $escaped_name = addcslashes($nic, '%');
        $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' AND user.nic LIKE :nic  GROUP BY user.user_id";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':nic' => "$nic%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //Sort officers
    public function ajxFilterOfficer($filter, $ascOrDsc) {
        //    echo $ascOrDsc;

        if ($ascOrDsc == 'ASC') {
            $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' GROUP BY user.user_id ORDER BY $filter ASC";
        } else if ($ascOrDsc == 'DESC') {
            $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' GROUP BY user.user_id ORDER BY $filter DESC";
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cropReqList() {
        $officer_id = Session::get('user_id');
        $sql = "SELECT 
        harvest.*, crop.crop_type, crop.crop_varient,
        user.user_id, user.first_name, user.last_name,
        gramasewa_division.gs_name,
        collecting_center.center_name
        FROM harvest 
        JOIN user ON user.user_id = harvest.farmer_user_id
        JOIN crop ON crop.crop_id = harvest.crop_id
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
        JOIN collecting_center ON collecting_center.center_id = harvest.center_id
        WHERE harvest.officer_user_id = $officer_id";
        $st2 = $this->db->prepare($sql);
        $st2->execute();
        return $st2->fetchAll(PDO::FETCH_ASSOC);
    }
}
