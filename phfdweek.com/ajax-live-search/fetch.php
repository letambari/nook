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
							<th>Entrance Code</th>
							<th>Fullname</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Event Type</th>
							<th>Days</th>
							<th>Action</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
	     if($row['verification'] == 0){
        $verifcation = '<a href="verify?id='.$row["id"].'" class="btn btn-success">Verify</a>';
    } else {
        $verifcation = '<a href="" class="btn btn-danger">verified</a>';
    }
		$output .= '
			<tr>
				<td>'.$row["event_id"].'</td>
				<td>'.$row["fullname"].'</td>
				<td>'.$row["phone"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["eventtype"].'</td>
				<td>'.$row["days"].'</td>
				<td>'.$verifcation.'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>