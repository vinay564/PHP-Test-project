<?php
include ('db_connection.php');

/*
 * if (isset($_POST['submit'])) {
 * // $today = date("H:i:s");
 * $u_stock_yard = $_POST['ustockyard'];
 * // $vehicle_num = $_POST['vehcile_number'];
 * $vehicle_num = str_replace(' ', '', $_POST['vehcile_number']);
 *
 * if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
 * $allowed = array(
 * "jpg" => "image/jpg",
 * "jpeg" => "image/jpeg",
 * "png" => "image/png"
 * );
 * $filename = $_FILES["photo"]["name"];
 * $filetype = $_FILES["photo"]["type"];
 * $filesize = $_FILES["photo"]["size"];
 *
 * // Verify file extension
 * $ext = pathinfo($filename, PATHINFO_EXTENSION);
 * if (! array_key_exists($ext, $allowed))
 * die("Error: Please select a valid file format.");
 *
 * // Verify file size - 50MB maximum
 * $maxsize = 50 * 1024 * 1024;
 * if ($filesize > $maxsize)
 * die("Error: File size is larger than the allowed limit.");
 *
 * // Verify MYME type of the file
 * if (in_array($filetype, $allowed)) {
 * // Check whether file exists before uploading it
 * if (file_exists("img/" . $filename)) {
 * echo $filename . " is already exists.";
 * } else {
 * move_uploaded_file($_FILES["photo"]["tmp_name"], "img/" . $filename);
 * echo "Your file was uploaded successfully.";
 * }
 * } else {
 * echo "Error: There was a problem uploading your file. Please try again.";
 * }
 * } else {
 * echo "Error: " . $_FILES["photo"]["error"];
 * }
 *
 * $dbc_conn = mysqli_connect('localhost', 'root', '', 'tractor_db');
 * $sql = "INSERT INTO trip_details(un_loading_stock_yard,tractor_no,tractor_photo) VALUES ('$u_stock_yard','$vehicle_num','$filename')";
 * if (mysqli_query($dbc_conn, $sql)) {
 * echo "Records inserted successfully.";
 * } else {
 * echo "ERROR: Could not able to execute $sql. ";
 * }
 * }
 */
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $u_stock_yard = $_POST['ustockyard'];
    $vehicle_num = str_replace(' ', '', $_POST['vehcile_number']);
    $tractor_quantity = $_POST['tractor_quantity'];
    $trip_nnumber = $_POST['trip_nnumber'];
    $driver_name = $_POST['driver_name'];
    $remarks = $_POST['remarks'];
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = array(
            "jpg" => "image/jpg",
            "jpeg" => "image/jpeg",
            "png" => "image/png"
        );
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (! array_key_exists($ext, $allowed))
            die("Error: Please select a valid file format.");

        // Verify file size - 50MB maximum
        $maxsize = 50 * 1024 * 1024;
        if ($filesize > $maxsize)
            die("Error: File size is larger than the allowed limit.");

        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("img/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "img/" . $filename);
                echo "Your file was uploaded successfully.";
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["photo"]["error"];
    }

    $dbc_conn = mysqli_connect('localhost', 'root', '', 'tractor_db');
    $sql = "INSERT INTO trip_details(date,stock_yard,tractor_no,tractor_quantity,trip_no_of_the_day,driver_name,remarks,tractor_photo) VALUES
             ('$date','$u_stock_yard','$vehicle_num','$tractor_quantity','$trip_nnumber','$driver_name','$remarks','$filename')";
    //echo "===". $sql;
    if (mysqli_query($dbc_conn, $sql)) {
       // echo "Records inserted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. ";
    }
}
?>


<html>
<head>
<script
	src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link
	href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"
	rel="stylesheet" id="bootstrap-css">
<script
	src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
	color: #fff;
	background: #19aa8d;
	font-family: 'Roboto', sans-serif;
}

.form-control, .form-control:focus, .input-group-addon {
	border-color: #e1e1e1;
}

.form-control, .btn {
	border-radius: 3px;
}

.signup-form {
	width: 390px;
	margin: 0 auto;
	padding: 30px 0;
}

.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}

.signup-form h2 {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}

.signup-form hr {
	margin: 0 -30px 20px;
}

.signup-form .form-group {
	margin-bottom: 20px;
}

.signup-form label {
	font-weight: normal;
	font-size: 13px;
}

.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
}

.signup-form .input-group-addon {
	max-width: 16px;
	text-align: center;
}

.signup-form input[type="checkbox"] {
	margin-top: 2px;
}

.signup-form .btn {
	font-size: 16px;
	font-weight: bold;
	background: #19aa8d;
	border: none;
	min-width: 140px;
}

.signup-form .btn:hover, .signup-form .btn:focus {
	background: #179b81;
	outline: none;
}

.signup-form a {
	color: #fff;
	text-decoration: underline;
}

.signup-form a:hover {
	text-decoration: none;
}

.signup-form form a {
	color: #19aa8d;
	text-decoration: none;
}

.signup-form form a:hover {
	text-decoration: underline;
}

.signup-form .fa {
	font-size: 21px;
}

.signup-form .fa-paper-plane {
	font-size: 18px;
}

.signup-form .fa-check {
	color: #fff;
	left: 17px;
	top: 18px;
	font-size: 7px;
	position: absolute;
}
</style>
<script type="text/javascript"> 
 $(document).ready(function() {
  $("#datetimepicker1").datepicker();
$("#datetimepicker1").datepicker("option", "dateFormat", "dd/mm/yy");
$("#datetimepicker1").datepicker().datepicker("setDate", new Date()); 

$('#vehcile_number').keyup(function(){
    $(this).val($(this).val().toUpperCase());
});

 }); 

/* $("#tractor_trip_details_form").validate({

	var form_data = new FormData();
      // Specify validation rules
	    rules: {
	      // The key name on the left side is the name attribute
	      // of an input field. Validation rules are defined
	      // on the right side
	      vehcile_number: "required",
	      tractor_quantity: "required",
	      driver_name: "required",
	      photo: "required"
	    },
	    // Specify validation error messages
	    messages: {
	    	vehcile_number: "Please enter Vehcile Number",
	    	tractor_quantity: "Please enter Tractor Quantity",
	    	driver_name: "Please enter Driver Name",
	    	photo: "Please Upload a valid file",
	    },
	    // Make sure the form is submitted to the destination defined
	    // in the "action" attribute of the form when valid
	    submitHandler: function(form) {
	    	  $.ajax({
	              url: 'trip_details.php',
	              type: 'POST',
	              data: form_data,
	              cache: false,
				  contentType: false,
				  processData: false,
	              /* ,
	              success: function(response) {
	            	  bootbox.
						confirm('Do you want to Register?',function (result) {
					            if (result == true)
					            	window.location.href = 'login.php';
					        });
	            	  return false;
	              } */
	    	            






</script>
</head>
<body>
	<div class="signup-form">

		<h2 align="center">Trip Details Form</h2>
		<form action="" id="tractor_trip_details_form"
			enctype="multipart/form-data" method="post">

			<div class="form-group">
				<div class="input-group datepicker" data-provide="datepicker">
					<span class="input-group-addon"><i
						class="glyphicon glyphicon-calendar"></i></span> <input
						id="datetimepicker1" name="date" placeholder="Pick Date"
						class="form-control" required="true" value="" type="text" />
				</div>

			</div>
		 <div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"> <i
						class="glyphicon glyphicon-home"></i></span> <input
						id="ustockyard" name="ustockyard" placeholder="Stock Yard"
						class="form-control" required="true" value="" type="text">
				</div>
			</div> 
	
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-truck"></i></span>
					<input type="text" class="form-control" name="vehcile_number"
						required="true" id="vehcile_number" placeholder="Tractor Number">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>
					<input type="text" class="form-control" name="tractor_quantity"
						required="true" placeholder="Tractor Quantity">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
					<input type="text" class="form-control" name="trip_nnumber"
						placeholder="Trip Nnumber" required="required">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span> <input
						type="text" class="form-control" name="driver_name"
						required="true" placeholder="Driver Name">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-comments"></i></span>
					<input type="text" class="form-control" name="remarks"
						required="true" placeholder="Remarks">
				</div>
			</div>

			<div class="form-group">

				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-file-image-o"></i></span><input
						id="driver_name" name="photo" placeholder="Enter Driver Name"
						class="form-control" value="" type="file">
				</div>
			</div>

			<div class="form-group">
				<button type="submit" name="submit"
					class="btn btn-primary btn-block">Submit</button>
			</div>
			<div class="form-group">
			 <div class="btn-group btn-group-justified">
              <a href="tracktor_trip_details.php" class="btn btn-success" style="text-decoration: none;">View Details</a>
              </div> 
	</div>
	</div>

	</form>

	</div>
</body>
</html>

