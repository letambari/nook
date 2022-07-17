<?php
	include 'connect.php';
	session_start();
    $fullname = htmlspecialchars($_POST['brandname']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['location']);
    
    
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
  $sql = "SELECT event_id FROM designers";
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

    		$users_table = "SELECT event_id FROM designers WHERE event_id = '$event_id' OR email = '$email' OR phone ='$phone'";
		    $query_users = mysqli_query($con, $users_table);
		    $count = mysqli_num_rows($query_users);

    		if ($count < 1) {
    	// code...
        $insert="INSERT INTO `designers` (`brandname`, `email`, `phone`, `location`, `event_id`) VALUES ('$fullname', '$email', '$phone', '$address', '$event_id')";
            $insert_query = mysqli_query($con, $insert);
            if ($insert_query == TRUE) {

                    //$_SESSION['user_login'] = $email;
						echo '<div class="alert alert-success">
						 <h3>Thank you <span style="color: gold">'.$fullname.'</span> for registering to be a participating designer at this years NOOK FASHION WEEKEND  </h3> 
						 <p>PLEASE AFTER PAYMENT SEND RECEIPT TO <strong>0818 659 8064 </strong> ON WHATSAPP AND GET YOUR CONFIRMATION DETAILS </p>
						 <p>Welcome on board</p>
						 
							 </div>';
							 
							 //include 'mail.php';

        //                     $them = $email;
        //                     $emails = 'BYFDWEEK <contact@byfdw.com>'; 
        //                     // Birthday Reminder <birthday@example.com>
        //                     $subject = 'Welcome to BYFDWEEK';

        //                     $to = $them;  
        //                     $from = $emails;
        //                     $subject = $subject;
        //                     $headers = 'BYFDWEEK';
        //                     $message = $themessage;
                            
                            
        //                             $headers = "From: $from\n";
        //                             $headers .= "MIME-Version: 1.0\n";
        //                             $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        //                     mail($to, $subject, $message, $headers);

                         
        //                     $emails = 'byFDWEEK <contact@byfdw.com>'; 
        //                     // Birthday Reminder <birthday@example.com>
        //                     $subject = 'Has Successful reserved a seat for the BYFDweek show.';

        //                     $to = 'info@byfdweek.com';  
        //                     $from = $emails;
        //                     $subject = $subject;
        //                     $headers = 'BYFDWEEK';
        //                     $message = 'a user with the below details just joined BYFDWEEK.<br>
        //                     Fullname: '.$fullname .' <br>
        //                     Phone: '.$phone .' <br>
        //                     Email: '.$email .' <br>
        //                     address: '.$address .' <br>
        //                     Entrance Code: BYFDWEEK_'.$event_id .' <br>';
                            
                            
        //                             $headers = "From: $from\n";
        //                             $headers .= "MIME-Version: 1.0\n";
        //                             $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        //                     mail($to, $subject, $message, $headers);


            }else{
                echo '<div class="alert alert-warning">
                <p>Unable to register</p>
                     </div>';
                
                }
    	
			
		}else{
			echo '<div class="alert alert-warning">
			<span class="btn btn-warning">This details is already registered</span>
				 </div>';
            
    		}
 	
    	
    }

?>