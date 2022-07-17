<?php
	include 'connect.php';
	session_start();
    $fullname = htmlspecialchars($_POST['fullname']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $business = htmlspecialchars($_POST['business']);
    $designation = htmlspecialchars($_POST['designation']);
    $days = htmlspecialchars($_POST['days']);
    // echo $email;
    // exit();
// functions that generates random keys.


/*function generatekey(){
  $keylength = 8;
  $str = "1234567890abcdefghijklmnopqrstuvwxyz()\|][{}?/><;:";
  $randstr = substr(str_shuffle($str), 0, $keylength);
  return $randstr;
} */

/*function generatekey(){
  //$keylength = 8;
  $randstr = uniqid('destiny', true);
  //$randstr = str_shuffle($str);
  return $randstr;
}
*/

include 'connect.php';

function checkkeys($con, $randstr){
  $sql = "SELECT event_id FROM Users";
  $result = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['event_id'] == $randstr) {
      $keyexists = true;
      break;
    } else{
      $keyexists = false;

    }
    
  }

 // return $keyexists;
}

function generatekey($con){

  $keylength = 8;
  $str ="1234567890abcdefghijklmnopqrstuvwxyz";
  $randstr = substr(str_shuffle($str), 0, $keylength);

  $checkkey = checkkeys($con, $randstr);

  while ($checkkey == true) {
    $randstr = substr(str_shuffle($str), 0, $keylength);
    $checkkey = checkkeys($con, $randstr);
  }

  return $randstr;

}

 $event_id = generatekey($con);

    if ($fullname == '' || $phone == '' || $email == '' || $address == '') {
    	// code...
    	echo '<div class="alert alert-danger">
                            <strong>Enter all fields!</strong>
                                 </div>';
    } else {

    		$users_table = "SELECT event_id FROM users WHERE event_id = '$event_id' OR email='$email' OR phone ='$phone'";
		    $query_users = mysqli_query($con, $users_table);
		    $count = mysqli_num_rows($query_users);

    		if ($count < 1) {
    	// code...
        $insert="INSERT INTO users (fullname, phone, email, addresss, event_id, eventtype, business, designation, days) VALUES ('$fullname', '$phone', '$email', '$address', '$event_id', 2, '$business', '$designation', '$days')";
            $insert_query = mysqli_query($con, $insert);
            if ($insert_query == TRUE) {
                    //$_SESSION['user_login'] = $email;
						echo '<div class="alert alert-success">
					 <h3>Congratulations! '.$fullname.'</h3> 
						 <p>You now have a seat reserved for you for the PHFDweek Master Class. </p>
                        <p> Here is your Access Code: <strong>PHFDWEEK_'.$event_id.'</strong>.</p>
						<p>Screenshot this page or take keep your code safe.</p>

<p>We look forward to seeing you.</p>
<p>Once you arrive, please show the Ushers on duty this reference code which has also been sent to your provided email address.</p> 
							 </div>';

                         include 'mail2.php';
                         
                         
                            $them = $email;
                            $emails = 'PHFDWEEK <contact@phfdweek.com>'; 
                            // Birthday Reminder <birthday@example.com>
                            $subject = 'PHFDWEEK Welcome';

                            $to = $them;  
                            $from = $emails;
                            $subject = $subject;
                            $headers = 'PHFDWEEK';
                            $message = $themessage;
                            
                            
                                    $headers = "From: $from\n";
                                    $headers .= "MIME-Version: 1.0\n";
                                    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
                            mail($to, $subject, $message, $headers);

                         
                            $emails = 'PHFDWEEK <contact@phfdweek.com>'; 
                            // Birthday Reminder <birthday@example.com>
                            $subject = 'Reservations Alert!';

                            $to = 'info@phfdweek.com';  
                            $from = $emails;
                            $subject = $subject;
                            $headers = 'PHFDWEEK';
                            $message = 'Has Successful reserved a seat for the PHFDweek MASTER Class.<br>
                            Fullname: '.$fullname .' <br>
                            Phone: '.$phone .' <br>
                            Phone: '.$email .' <br>
                            Phone: '.$address .' <br>
                            Business: '.$business .' <br>
                            Designation: '.$designation .' <br>
                            Days: '.$days .' <br>
                            Entrance Code: '.$event_id .' <br>';
                            
                            
                                    $headers = "From: $from\n";
                                    $headers .= "MIME-Version: 1.0\n";
                                    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
                            mail($to, $subject, $message, $headers);


            }else{
                echo '<div class="alert alert-warning">
                <span class="btn btn-warning">Unable Send Application</span>
                     </div>';
                
                }
    	
			
		}else{
			echo '<div class="alert alert-warning">
		 <p>This details is already registered</p>
                     </div>';
            
    		}
 	
    	
    }

?>