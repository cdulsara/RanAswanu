<?php 

class Farmer_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function farmerList() {
        $st = $this->db->prepare("SELECT * FROM users WHERE role = :role");
        $st->execute(array(
            ':role' => 'farmer'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();
    }
    
    //Display damageclaim
    public function damageclaimList(){
        $st = $this->db->prepare("SELECT * FROM dmgclaim  ");
        $st->execute(array(
            ':dmgid' => 'dmgid'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();

    }

    //Display croprequest
    public function cropReqList(){
        $st = $this->db->prepare("SELECT * FROM croprequest  ");
        $st->execute(array(
            ':cropreqid' => 'cropreqid'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();

    }

    public function sellcropsList(){
        $st = $this->db->prepare("SELECT * FROM sellcrops  ");
        $st->execute(array(
            ':cropsid' => 'cropsid'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();

    }



    public function creates($data)
    {

    $st = $this->db->prepare("INSERT INTO dmgclaim ( `dmgdate` , `province` , `district` , `gramasewa` , `address` , `estdmgarea` , `waydmg` , `details`) VALUES ( :dmgdate , :province , :district , :gramasewa , :address , :estdmgarea , :waydmg , :details)");
        $st-> execute(array(
            
            ':dmgdate' => $data['dmgdate'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':gramasewa' => $data['gramasewa'],
            ':address' => $data['address'],
            ':estdmgarea' => $data['estdmgarea'],
            ':waydmg' => $data['waydmg'],
            ':details' => $data['details']


        ));
    }

  

    public function sellurcrops($data)
    {
    
    $st=$this->db->prepare("INSERT INTO sellcrops ( `province` , `district` , `state` , `selectCrop`  , `cropVariety` , `exprice` , `weight` , `display`) VALUES (  :province , :district  ,:state , :selectCrop , :cropVariety , :exprice , :weight , :display)");
        $st-> execute(array(
    
            ':province' =>$data['province'],
            ':district' => $data['district'],
            ':state' =>$data['state'],
            ':selectCrop' =>$data['selectCrop'],
            ':cropVariety' => $data['cropVariety'],
            ':exprice' => $data ['exprice'],
            ':weight' => $data['weight'],
            ':display'=> $data['display']
            

        ));
    }


    public function cropRequest($data)
    {
        $st=$this->db->prepare("INSERT INTO croprequest ( `province` , `district` , `gramasewa` , `address` , `areasize` , `exptdate` , `croptype` , `selectCrop` , `cropVariety` , `otherdetails`) VALUES (  :province , :district , :gramasewa , :address , :areasize , :exptdate , :croptype , :selectCrop , :cropVariety , :otherdetails)");
        $st->execute(array(           
            
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':gramasewa' => $data['gramasewa'],
            ':address' => $data['address'],
            ':areasize' => $data['areasize'],
            ':exptdate' => $data['exptdate'],
            ':croptype' => $data['croptype'],
            ':selectCrop' => $data['selectCrop'],
            ':cropVariety' => $data['cropVariety'],
            ':otherdetails' => $data['otherdetails']
       //     ':conditions' => $data['conditions']

        ));
    }

    //delete dmgclaim data
    public function deletedmg($dmgid){
        $st = $this->db->prepare("DELETE FROM dmgclaim WHERE dmgid = :dmgid ");
        $st->execute(array(
            ':dmgid' => $dmgid
        ));
       
    }
    
    //delete sellcrops data
    public function deletesellcrops($cropsid){
        $st = $this->db->prepare("DELETE FROM sellcrops WHERE cropsid = :cropsid ");
        $st->execute(array(
            ':cropsid' => $cropsid
        ));
       
    }

    //delete cropreq data
    public function deletecropreq($cropreqid){
        $st = $this->db->prepare("DELETE FROM croprequest WHERE cropreqid = :cropreqid ");
        $st->execute(array(
            ':cropreqid' => $cropreqid
        ));

    }



   



        
    
    
}