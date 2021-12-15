
<?php
session_start();
$con = mysqli_connect("localhost","root","","registration1");
if(isset($_REQUEST["Login"]))
{
	$rollnumber = $_REQUEST["rollnumber"];
	$password = $_REQUEST["password"];
	$sql = mysqli_query($con,"SELECT * FROM student WHERE rollnumber='$rollnumber' AND password='$password'");
	$rowcount = mysqli_num_rows($sql);
	if($rowcount==true){
	    echo "Your Rollnumber and Password is Correct";
	    header('location:search.html');
    }
    else{
        echo "Your password is wrong"; 
    }
}
mysqli_close($con);
?>

