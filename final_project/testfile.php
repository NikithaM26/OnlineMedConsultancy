<?php
$con = mysqli_connect("localhost","root","","mini_project");

if(!$con)
{
  die('Could not connect: ' . mysqli_error());
}


$sql = "SELECT * FROM login WHERE loginID=(SELECT max(loginID) FROM login);";
$result = mysqli_query($con,$sql);
$rows = mysqli_fetch_array($result);

$query = "SELECT * FROM signup WHERE '".$rows['USERNAME']."' = signup.`UEMAIL`";
echo "username: " . $rows['USERNAME'] . " " . "PASSWORD: " . $rows['PSWD']. "<br> ";

mysqli_close($con);
 ?>
