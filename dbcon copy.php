
<?php 
//create connection
$conn = mysqli_connect('localhost','raybat10_sms','69Mu$t@ng','raybat10_sms');

//check connection

if (!$conn) {
    echo "connection failed: " . mysqli_connect_error()."<br>";
    echo "connection error no: " . mysqli_connect_errno();

} else {
   // echo "connected successfuly";
}



 ?>