<?php
require ('db_connection.php');
?>

<?php
    // $today = date("H:i:s");
    $date = $_POST['date'];
    $u_stock_yard = $_POST['ustockyard'];
    // $vehicle_num = $_POST['vehcile_number'];
    $vehicle_num = str_replace(' ', '', $_POST['vehcile_number']);
    $tractor_quantity =  $_POST['tractor_quantity'];
    $trip_nnumber = $_POST['trip_nnumber'];
    
    echo "==222222222222222$===".$trip_nnumber;   
    $driver_name = $_POST['driver_name'];
    echo "====".$driver_name;
    $remarks = $_POST['remarks'];
echo "==$$$$$$$$$$===".$remarks;   
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
    if (mysqli_query($dbc_conn, $sql)) {
        echo "Records inserted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. ";
    }

?>

		<?php 

//$sql=mysql_query("SELECT t_id,transporter_name FROM transporter_details");
$dbc_conn = mysqli_connect('localhost', 'root', '', 'tractor_db');
$query = "SELECT id,stock_yard_name FROM stock_yard";
$result = mysqli_query($dbc_conn, $query);
$select= '<div class="form-group">
				<div class="input-group"><select name="ustockyard" class="btn btn-default dropdown-toggle " type="button" id="transporter_names" data-toggle="dropdown" >';
$select.= '<option value="-1" selected>Select Transporter Name</option>';
    while($rs=mysqli_fetch_array($result)){
        
        $select.='<option value="'.$rs['stock_yard_name'].'" >'.$rs['stock_yard_name'].'</option>';
    }

$select.='</select>';
echo $select;
?>
