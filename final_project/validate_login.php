<?php
$con = mysqli_connect("localhost","root","","mini_project");

if(!$con)
{
  die("Could not connect " . mysqli_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $sql = "SELECT * FROM users WHERE UEMAIL = '$_POST[username]' AND PSWD = '$_POST[pswd]'";
  //  $sql1 = "INSERT INTO login_users(UEMAIL,PSWD) VALUES ('$_POST[username]', '$_POST[pswd]')";

    $result = mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);

    if(!mysqli_query($con,$sql))
    {
      die('Error: ' . mysqli_error());
    }

    if($rows != 0)
    {
      header("location:dashboard.php");
    }
    else
    {
      echo"<script>alert('Incorrect username or password');</script>";
      //die();
    }

}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if(isset($_POST['submit']))
  {

    date_default_timezone_set("Asia/Kolkata");
    $curDate = date("Y-m-d");
    $curTime = date("H:i:s");

    $sql1 = "INSERT INTO login (USERNAME,PSWD,LOGINDATE,LOGINTIME) VALUES ('$_POST[username]', '$_POST[pswd]', '$curDate', '$curTime')";


    if(!mysqli_query($con,$sql1))
    {
      die('Error: ' . mysqli_error());
    }

  }
}

mysqli_close($con);

?>
