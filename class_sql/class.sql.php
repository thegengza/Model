<?php 
include "config.php";


class sqlDB{

	function __construct($charset = 'utf8'){
        @mysql_set_charset($charset);
  
      
    }
 
     public function insert($tablename,$data){
        $conn = mysqli_connect(HOSTNAME, USERNAME, PWORD,DBNAME);
        $tablelist='';
        $datalist='';
         foreach ($data as $index => $value) {
            if($value != 'NOW()'){
                $tablelist .= $index.',';
                $datalist .= "'".$value."',";
            }
            else{
                $tablelist .= $index;
                $datalist .= $value;
            }
            
            
         }
         $sql='INSERT INTO '.$tablename.'('.$tablelist.') VALUES('.$datalist.')';   
         $result = mysqli_query($conn,$sql);
         return ($result ?  'true' : 'false');

      
       
     }
      public function del($tablename,$data){

         $conn = mysqli_connect(HOSTNAME, USERNAME, PWORD,DBNAME);

         $tablelist='';
         $datalist='';

          foreach ($data as $index => $value) {
                $tablelist .= $index;
                $datalist .= "'".$value."'";
          }

        $sql=' DELETE FROM '.$tablename.' WHERE '.$tablelist.'='.$datalist.' ';   
         $result = mysqli_query($conn,$sql);
       
         return ($result ?  'true' : 'false||พบ sql ผิดพลาด '.$sql.' ');

      
      }

      public function edit($tablename,$data){

         $conn = mysqli_connect(HOSTNAME, USERNAME, PWORD,DBNAME);

       
        $datalist='';
        $where='';
      //  print_r($data);
         foreach ($data['data'] as $index => $value) {
           $datalist .= $index.' = '.$value; 
            
         }
         foreach ($data['where'] as $indexWhere => $Wherelist) {
            $where.= $indexWhere." = ' ".$Wherelist." ' " ;
             # code...
         }
        $sql='UPDATE '.$tablename.' SET '.$datalist.' WHERE '.$where.' ';
        $result = mysqli_query($conn,$sql);
        return ($result ?  'true' : 'false||พบ sql ผิดพลาด '.$sql.' '); 

      
      }


   



}

?>