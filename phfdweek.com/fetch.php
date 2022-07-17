<?php
$connect = mysqli_connect('localhost', 'okexfina_phfdweek', 'okexfina_phfdweek.com', 'okexfina_phfdweek.com');
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM users 
	WHERE event_id LIKE '%".$search."%'
	OR fullname LIKE '%".$search."%' 
	OR email LIKE '%".$search."%' 
	OR phone LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM users ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
   
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
						    <th>No</th>
							<th>Entrance Code</th>
							<th>Fullname</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Event Type</th>
							<th>Days</th>
							<th>Action</th>
						</tr>';
						$i = 1;
	while($row = mysqli_fetch_array($result))
	{
	     if($row['verification'] == 0){
        $verifcation = '<a href="verify?id='.$row["id"].'" class="btn btn-success">Verify</a>';
    } else {
        $verifcation = '<a href="" class="btn btn-danger">verified</a>';
    }
    
    if($row['eventtype'] == 2){
        $eventtype = 'Master';
    } else {
        $eventtype = 'Runway';
    }
		$output .= '
			<tr>
			    <td>'.$i.'</td>
				<td>'.$row["event_id"].'</td>
				<td>'.$row["fullname"].'</td>
				<td>'.$row["phone"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$eventtype.'</td>
				<td>'.$row["days"].'</td>
				<td>'.$verifcation.'</td>
			</tr>
			
		';
		 $i++;
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>