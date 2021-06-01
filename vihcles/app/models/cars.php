<?php


    class cars
    {
       private $db;

       public function __construct()
       {
           $this->db = new Database();
       }
       public function getVihcle()
       {
           $this->db->query('SELECT * FROM vihcle');
           return $this->db->resultSet();

       }
       public function getVihclebynum($num)
       {
           $this->db->query("SELECT * FROM vihcle WHERE regis_num = '$num'");
           // Bind values
           
           return $this->db->resultSet();

       }
       public function getVihcledispo()
       {
           $this->db->query('select *
           from vihcle v 
           inner join reservation r on v.Code_res = r.Code_Res');
           return $this->db->resultSet();
       }
       public function countvihcles()
       {
           $this->db->query('SELECT count(*) as num FROM vihcle');
           $this->db->execute();
           return  $this->db->resultSet();
       }


       
       public function addVihcle($data)
       {
           $this->db->query('INSERT INTO vihcle ( Price, name, class, fuel, passengers, image) values (:Price, :name, :class,:fuel,:passengers,:image)');
           // Bind values
           $this->db->bind(':Price', $data['Price']);
           $this->db->bind(':name', $data['name']);
           $this->db->bind(':class', $data['class']);
           $this->db->bind(':fuel', $data['fuel']);
           $this->db->bind(':passengers', $data['passengers']);
           $this->db->bind(':image', $data['image']);

           // Execute
           if( $this->db->execute() ){
               return true;
           } else {
               return false;
           }

       }
       public function edit($data) {
  
        
        $this->db->query('UPDATE vihcle SET Price=:Price,name= :name, class= :class,fuel=:fuel,passengers=:passengers,image=:image where regis_num=:regis_num');
        // Bind values
        $this->db->bind(':regis_num', $data['regis_num']);
        $this->db->bind(':Price', $data['Price']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':fuel', $data['fuel']);
        $this->db->bind(':passengers', $data['passengers']);
        $this->db->bind(':image', $data['image']);

        // Execute
        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }

}
public function delete($code){
    $this->db->query("DELETE FROM vihcle WHERE regis_num='$code'");
    if( $this->db->execute() ){
        return true;
    } else {
        return false;
    }
}
        
    }