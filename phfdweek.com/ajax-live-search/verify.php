<?php
$connect = mysqli_connect('localhost', 'okexfina_phfdweek', 'okexfina_phfdweek.com', 'okexfina_phfdweek.com');
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    
$update = "UPDATE users SET verification = 1 WHERE id = '$id'";
$query = mysqli_query($connect, $update);

if($query == TRUE){
    header('location: attendance');
} else {
    
    echo 'error';
}

}

?>