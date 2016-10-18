
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="sweetalert/dist/sweetalert.css" type="text/css">
	<script src="sweetalert/dist/sweetalert.min.js"></script>
	<?php
		//include "connect.php";
		include "class.sql.php";
		$sql= new sqlDB();
	?>
</head>

<body>
	ชื่อ <input type="text"  id="fullname" name="fullname" /> <br>
	อีเมล <input type="text"  id="email" name="email" /> <br>
	ข้อความ<input type="text" id="txt" name="txt" /> <br>
	ip <input type="text"  id="ip" name="ip" value="<?php echo $_SERVER["REMOTE_ADDR"]; ?>" /> <br>
<input type="submit" value="Add" onclick="add();"></input> <br>
<input type="submit" value="Del" onclick="del();"></input> ID <input type="text"  id="uid" name="fullname" /> <br><br>
<input type="submit" value="edit" onclick="edit();"></input> <br><br>

<?php




?>
<?php
function datalist(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "upbeen";

// Create connection
	$conn = mysqli_connect($servername, $username, $password,$db);

		$sql = "select * from upbeen ORDER BY date_time";

		$result = mysqli_query($conn,$sql) or die(mysql_error()."".__LINE__);
		$arrData = array();
		$i=0;
		
     

	while($row=mysqli_fetch_assoc($result)){
		$arrData[]=$row;
	};

	 
        
        return $arrData;
		
}

$datalist = datalist();

?>
<table border="1">
<thead>
	<th>ชื่อ</th>
	<th>อีเมล</th>
	<th>ข้อความ</th>
	<th>ip</th>
	<th>วันที่</th>
	

</thead>
<?php

foreach ($datalist as $key => $value) {
	echo '<tr>';
	echo '<td>'.$value['fullname'].'</td>';
	echo '<td>'.$value['email'].'</td>';
	echo '<td>'.$value['txt'].'</td>';
	echo '<td>'.$value['ip'].'</td>';
	echo '<td>'.$value['date_time'].'</td>';
	echo '</tr>';

	# code...
}

?>
</body>


<script type="text/javascript">
function edit(){

 var jsonData = {"action": "UPDATE","data": [],'where':[]};
  jsonData.data = {
        
       "fullname": $("#fullname").val()
    }
    jsonData.where = {
        "id": $("#uid").val()
    }
    var fieldData = JSON.stringify(jsonData);


   $.ajax({
   	 type: "POST",
         url: "edit.php",
         data:{data:fieldData},
        success: function (data,msg) {
        	console.log(data);

        }
   });

}


function del(){
	var jsonData;
    jsonData= {
        
        "id": $("#uid").val()
        
    }
   
    var fieldData = JSON.stringify(jsonData);
   // console.log(fieldData);
   $.ajax({

   		 type: "POST",
         url: "del.php",
         data:{data:fieldData},
        success: function (data,msg) {
        	console.log(data);

        }
   });
}


function add(){
	var jsonData;
    jsonData= {
        
        "fullname": $("#fullname").val(),
        "email": $("#email").val(),
        "txt": $("#txt").val(),
        "ip": $("#ip").val(),
        "date_time": 'NOW()' 
       
    }
   
    var fieldData = JSON.stringify(jsonData);
    $.ajax({
        type: "POST",
        url: "insert.php",
         data:{data:fieldData},
        success: function (data,msg) {
        	
        	if(data == 'true'){
        		swal({
							title: "สำเร็จ!",
							text: "บันทึกข้อมูลเรียบร้อยแล้ว",
							type: "success",
							showConfirmButton: false,
							timer: 1000,
							customClass: "THsarabun"
						}, function () {
							setTimeout(function () {
									window.location = "test.php";
								}, 1000);
						}
				);
        	}
        	else{
        		swal({
							title: "เกิดข้อผิดพลาด!",
							text: "ไม่สามารถบันทึกข้อมูลเได้",
							type: "error",
							confirmButtonText: "ตกลง",
							closeOnConfirm: true,
							customClass: "THsarabun"
				});
        	}
        }
    });
}                   

</script>
</html>
