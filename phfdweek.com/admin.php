<?php 
include 'connect.php';


$coming = "SELECT * FROM users";
$sql = mysqli_query($con, $coming);
$i = 1;
while($row = mysqli_fetch_array($sql)){
    
    $fullname = $row['fullname'];
    $phone = $row['phone'];
    $email = $row['email'];
    $event_id = $row['event_id'];
    $id = $row['id'];
    $addresss = $row['addresss'];
	$eventtype = $row['eventtype'];
	$business = $row['business'];
	$designation = $row['designation'];
	$days = $row['days'];
	
	if($eventtype == 1){
	    $eventtype = 'Runway';
	} else {
	    $eventtype = 'Master Class';
	}
    
    $list .= '<tr>
        <td>'.$i.'</td>
        <td>'.$event_id.'</td>
        <td>'.$fullname.'</td>
        <td>'.$phone.'</td>
        <td>'.$email.'</td>
        <td>'.$addresss.'</td>
        <td>'.$eventtype.'</td>
        <td>'.$business.'</td>
        <td>'.$designation.'</td>
        <td>'.$days.'</td>
      </tr>';
      
       $i++;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Phfdweek Attendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Attendance List</h2>
  <!-- <p>Enter User code </p> -->       
  <table class="table table-bordered">
    <thead>
      <tr>
          <th>S/N</th>
         <th>Entrance ID</th>
        <th>Fullname</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Addresss</th>
        <th>Event Type</th>
        <th>Business</th>
        <th>Designation</th>
        <th>Days</th>
      </tr>
    </thead>
    <tbody>
      <?php echo $list; ?>
    </tbody>
    
    
  </table>
</div>

</body>
</html>
