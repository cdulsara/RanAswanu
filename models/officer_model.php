<?php

class Officer_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //retrieve all officers
    public function officerList()
    {
        $st = $this->db->prepare("SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' GROUP BY user.user_id");

        // SELECT user.user_name, user.first_name, group_concat(user_tel.tel_no) FROM user JOIN user_tel on user.user_id =user_tel.user_id GROUP BY user.user_id
        $st->execute(array(
            ':role' => 'officer'
        ));
        // print_r($st->fetchAll());

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //delete an officer
    public function delete($id)
    {
        $st = $this->db->prepare('DELETE FROM user WHERE user_id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }
}
