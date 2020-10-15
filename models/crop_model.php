<?php 

class Crop_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    //register new collecting center into the  database col. center table
    public function create($data){  
        $st = $this->db->prepare("INSERT INTO crops (`crop_varient`, `crop_type`, `best_area`, `harvest_per_land`, `harvest_period`, `discription`) VALUES (:crop_varient, :crop_type, :best_area, :harvest_per_land, :harvest_period, :discription)");
        $st->execute(array(
            ':crop_varient' => $data['crop_varient'],
            ':crop_type' => $data['crop_type'],
            ':best_area' => $data['best_area'],
            ':harvest_per_land' => $data['harvest_per_land'],
            ':harvest_period' => $data['harvest_period'],
            ':discription' => $data['discription'],
        ));
    }

    //getting single col. center
    public function singleCenterList($id){
        $st = $this->db->prepare("SELECT id, center_name, province, district, grama FROM colcenter WHERE id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetch();
    }
    
    //retrieve all col centers
    public function centers() {
        $st = $this->db->prepare("SELECT id, center_name, province, district FROM colcenter");
        $st->execute();
        return $st->fetchAll();
    }

    //update col. center
    public function update($data){
        $st = $this->db->prepare('UPDATE colcenter SET `center_name` = :center_name, `province` = :province, `district` = :district, `grama` = :grama WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':center_name' => $data['center_name'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':grama' => $data['grama']
        ));
    }

    //delete a col. center
    public function delete($id){
        $st = $this->db->prepare('DELETE FROM colcenter WHERE id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }
} 