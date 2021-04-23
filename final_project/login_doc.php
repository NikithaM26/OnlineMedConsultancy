<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width:device-width, initial-scale:1.0;">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <title>College Project Login</title>

    <style media="screen">
      body{
        width: 100%;
        padding: 2% 5%;
        font-family: 'Montserrat', sans-serif;
      }
      .top{
        background-color: #0A3A57;
        color: #fff;
        text-align: center;
        margin: 0 15%;
        padding: 1.5% 5% ;
      }
      .img{
        text-align: center;
      }
      .login{
        margin: 1.5% 15%;
        padding: 2%;
        background-color: #F7CE55;
      }
      .button{
        text-align: center;
      }
      .footer{
        text-align: center;
      }

    </style>

  </head>
  <body>
    <div class="top">
      <h1>LOGIN</h1>
    </div>

    <div class="login">
      <ul class="nav nav-tabs nav-justified">
        <li class="nav-item">
          <a class="nav-link" href="login.php" style="text-decoration:none;color:#0A3A57;">USERS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#" style="text-decoration:none;color:#0A3A57;">DOCTORS</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" href="adminLogin.php">ADMIN</a>
        </li>-->
      </ul><br>
      <div class="img">
        <img src="images/headshot.jpg" alt="image" style="border-radius: 50%;">
      </div>

      <form method="post" action="">
        <div class="form-row">
          <div class="form-group col-lg-4 col-md-4">

          </div>

          <div class="form-group col-lg-4 col-md-4">
            <label for="inputEmail4"></label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Username / email-id" name="username">
          </div>
          <div class="form-group col-lg-4 col-md-4">

          </div>

        </div>

        <div class="form-row">
          <div class="form-group col-lg-4 col-md-4">

          </div>
          <div class="form-group col-lg-4 col-md-4">
            <label for="inputPassword4"></label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="pswd">
          </div>
          <div class="form-group col-lg-4 col-md-4">

          </div>
        </div>

        <div class="button">
          <a href="#" style="text-decoration:none;color:#111;" onclick="alert('Functionality currently unavailable')">Forgot password?</a><br><br>
          <button type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit"><!--<a href="dashboard.php" style="text-decoration:none;color:#fff;">
          </a>-->Login</button>
        </div>
        <br>

        <div class="footer">
          <a href="signup.php" style="text-decoration:none;color:#111;">New here? Click here to Sign up</a>
        </div>
      </form>
    </div>

  </body>
</html>



<?php
$con = mysqli_connect("localhost","root","","mini_project");

if(!$con)
{
  die("Could not connect " . mysqli_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $sql = "SELECT * FROM doctors_registered WHERE DEMAIL = '$_POST[username]' AND PSWD = '$_POST[pswd]'";
  //  $sql1 = "INSERT INTO login_users(UEMAIL,PSWD) VALUES ('$_POST[username]', '$_POST[pswd]')";

    $result = mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);

    if(!mysqli_query($con,$sql))
    {
      die('Error: ' . mysqli_error());
    }

    if($rows != 0)
    {
      header("location:dashboardDoc.php");
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
