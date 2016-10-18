<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
	  $(document).ready(function(){
        
	  	$(".month").each(function() {
            $(this).keyup(function(){
             calculateSum();
            });
        });
     });
	    function calculateSum() {

				var month = 0;
		 		var day = 0;
				var sum = $(".sumAllMoney").val()
				var sumALL=0;


				$(".month").each(function() {
				    if(!isNaN(this.value) && this.value.length!=0) {
				        month += parseInt(this.value);
				    }

			     });
				 $("#sum").html(month);
		}
</script>

	<input type="text" class="month" id="month" />
	<input type="text" class="month"id="month" />
	<span id="sum"></span>
	<br>



<?php
echo '<br>';
$sum=10;
echo $result = ($sum > 5 ? ($sum>10 ? 'hight top' : ($sum==10 ? 'Nice' : 'Sad') ) : 'low');

echo '<br>';

	$age=array("2"=>"35","1"=>"37","5"=>"43");
	arsort($age);

foreach($age as $x=>$x_value){
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "
";
}
echo '<br>';


?>
<input type="submit" class="" id="" onclick="test()" value="Here" />
<span id="show">	</span>
</body>
<script type="text/javascript">
function	test(){
	var data = 123;
	$.ajax({
			type: "POST",
        	url: "ajax_test.php",
        	data: {data:data },
        			success: function (data,msg) {
        					console.log(msg);
        					$("#show").html(data);
        	  }
	});
}
</script>
</html>


