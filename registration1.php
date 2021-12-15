<?php
session_start();

$db = mysqli_connect("localhost","root","","registration1");
if (isset($_POST['Register'])) {
	session_start();
  
  $rollnumber = $_POST['rollnumber'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $emailaddress = $_POST['emailaddress'];
  $phonenumber = $_POST['phonenumber'];

  $sql="insert into student (rollnumber,firstname,lastname,password,emailaddress,phonenumber) 
  values('$rollnumber','$firstname','$lastname','$password','$emailaddress','$phonenumber')";
  
  mysqli_query($db, $sql);
  echo $_SESSION['message']="You have Registered Successfully";
  header("location:registered.php");
}
?>
