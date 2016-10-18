<?php
include "class.sql.php"; // include ฟังชั่น sql 

 $data =  (json_decode($_POST['data'], true));
 $tableName="upbeen"; //ชื่อตาราง
 $sql = new sqlDB();
 echo $sql->insert($tableName,$data);
?>