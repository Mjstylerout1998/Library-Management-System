<?php
$hostname = "localhost";
$dbname = "library";
$Username = "root";
$Password = "";
$query = "";
$count = -1;

$conn = mysqli_connect($hostname,$Username,$Password,$dbname);
if(!$conn)
{
    die("Connection Failed:" .mysqli_connect_error());
}
if(isset($_POST['search']))
{
    $title = $_POST['title'];
    if ($title){
      $query = mysqli_query($conn, "SELECT  `title`, `author` , `count` FROM `book` WHERE `title` like '%$title%' ");
      $count =  mysqli_num_rows($query);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Book Details</title>
    <center>
        <h1>Check Book Details </h1>
        <h2>Enter Book Name</h2>
        <hr> <br><br>
</head> 
<body>
  <form action="search.php" method="post">
  <input type="varchar" name="title">  
  <input type="submit" name="search" value="Search...">
  <p>
    <table align="center" border="1px" style="width: 1000px; line-height: 40px;">
      <tr>
        <th colspan="10"><h2>Book Record</h2></th>
      </tr>
      <t>
        <th>Title</th>
        <th>Author</th>
        <th>Count</th>
      </t>
    <tr>

<?php 
        if($count == -1)
        {

        }
        else if($count == 0)
        {
            echo '<h2> No Result Found ! </h2>';            
        }
        else
        {
            while ($row = mysqli_fetch_array($query))
            {
                $result= $row['title'];
                $output = '<td> <center>' .$result. '</center> </td>';
                echo $output;

                $result= $row['author'];
                $output = '<td> <center>' .$result. '</center> </td>';
                echo $output;

               $result= $row['count'];
               $output = '<td> <center>' .$result. '</center> </td> </tr>';
               echo $output;

            }
        }
    ?>
  <hr>
</form>
<button type="button"> <b> <a href="search.html">Back</a> </b> </button>
</center>
</body>
</html>