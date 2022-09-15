<html>
<head>
<style type="text/css">
.myclass {
	font-size: 12px;
}

.demo {
	font-size: 14px;
	text-align: center;
}

body {
	background-image: url('img/Sand-Taxi.jpg');
	background-attachment: fixed;
	background-repeat: no-repeat;
	background-size: cover;
}

#mytable {
	font-weight: bold;
}
</style>
<link
	href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"
	rel="stylesheet" id="bootstrap-css">
<script
	src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script
	src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">  
 </script>
<script type="text/javascript" language="javascript">  
 $(document).ready(function() {  
 $(".demo").css("background-color", "cyan");  
 });  

 function relocate()
 {
      location.href = "second_form.php";
 } 

 
 </script>
</head>
<body>
	<table class="table table-bordered">
		<thead>
			<tr class="demo">
				<th scope="col">Si.No</th>
				<th scope="col">Date</th>
				<th scope="col"> Stock Yard</th>
				<th scope="col">Vehicel Reg No</th>
				<th scope="col">Tractor Quantity</th>
				<th scope="col">Trip number</th>
				<th scope="col">Driver Name</th>
				<th scope="col">Remarks</th>
				<th scope="col">Tractor Photo</th>
			</tr>
		</thead>
		<tbody>
      <?php
    $dbc_conn = mysqli_connect('localhost', 'root', '', 'tractor_db');
    $query = "SELECT * FROM trip_details";
    $result = mysqli_query($dbc_conn, $query);
    // start a table tag in the HTML
   
    while ($row = mysqli_fetch_array($result)) { // Creates a loop to loop through results
        echo "<tr class ='myclass table-info' id='mytable'><td>" . $row['t_id'] . "</td>
           <td>" . $row['date'] . "</td>
<td>" . $row['stock_yard'] . "</td>
<td>" . $row['tractor_no'] . "</td>
<td>" . $row['tractor_quantity'] . "</td>
<td>" . $row['trip_no_of_the_day'] . "</td>
<td>" . $row['driver_name'] . "</td>
<td>" . $row['remarks'] . "</td>
<td align =Center> <img src=img/".$row['tractor_photo']."  height=200px width=200px ></td>
</tr>";
    }
   
    ?>
  </tbody>
	</table>
</body>
</html>