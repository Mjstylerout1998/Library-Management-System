<?php
session_start();

$db = mysqli_connect("localhost","root","","library");
if (isset($_POST['Insert']))
 {
	
  
  $title = $_POST['title'];
  $author = $_POST['author'];
  $price = $_POST['price'];

  $query = mysqli_query($db, "SELECT  `id`, `title`, `author` , `count` FROM `book` WHERE `title` like '%$title%' and `author` like '%$author%'");
  //SELECT `id`, `title`, `author` , `count` FROM `book` WHERE `title` like '%Programming in ANSI C,2/e%' and `author` like '%Bala%'
  $count =  mysqli_num_rows($query);

  if ($count == 0){
	$sql="insert into book (title,author,price,count) values('$title','$author','$price',1)";
	echo "The book '$title' is added Successfully.";
  }
  else{
  	$row = mysqli_fetch_array($query);
 	$result= $row['count'] + 1;
 	$id = $row['id'];
  	$sql = "update book set `count` = $result where `id` = $id";
  	//update book set `count` = 1 where `id` = 79
  	echo "<h2>The book '$title' is updated.</h2>";
  }
  mysqli_query($db, $sql);
  //echo $_SESSION['message']="You have Added Successfully";
  //header("location:search.html");
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>insrt</title>
</head>
<body>
<button type="button"> <b> <a href="insrt.html">Back</a> </b> </button>
</body>
</html>