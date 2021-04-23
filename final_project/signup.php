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

    <title>College Project Sign Up</title>

    <style media="screen">
      body, html{
        width: 100%;
        font-family: 'Montserrat', sans-serif;
        padding: 1% 3%;
        color: #111;
      }

      .top{
        background-color: #0A3A57;
        color: #fff;
        text-align: center;
        padding: 2% 3% 0;
      }

      .form-reg{
        background-color: #F7CE55;
        margin-top: 1%;
        padding:2%;
      }
      hr{
        height:1px;
        background-color: gray;
      }
    </style>
  </head>
  <body>
    <div class="top">
      <h1>Sign Up</h1><br>
    </div>
    <div class="form-reg">

      <form method="post" action="">

        <div class="form-row">
            <div class="form-group col-md-6 col-lg-6">
              <label for="firstname">First Name</label>
              <input type="text" class="form-control" name="fname">
            </div>
            <div class="form-group col-md-6 col-lg-6">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control" name="lname">
            </div>
        </div><br>

        <div class="form-row">

          <div class="form-group col-lg-6 col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="example@mail.com" name="email" >
          </div>
          <!--<div class="form-group col-lg-6 col-md-6">
            <label for="inputPhoneNum">Contact Number</label>
            <input type=" tel" class="form-control" id="inputPhoneNum" name="phno">
          </div>-->

        </div><br>

        <div class="form-row">
          <div class="form-group col-lg-6 col-md-6">
            <label for="inputPassword4">Set Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="password" >
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" onclick = "showPassword()"> Show passsword
          </div>
        </div>

        <!--<div class="form-row">
          <div class="form-group col-lg-6 col-md-6">
            <label for="inputPassword4">Confirm Password</label>
            <input type="password" class="form-control" id="inputPassword4" required>
          </div>
        </div>-->


        <hr>
        <br>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" required>
            <label class="form-check-label" for="gridCheck">
              I agree to sign up (this is for college project)
            </label>
          </div>
        </div>
        <button type="submit" name="submitpost" class="btn btn-primary">
          <!--<a href="login.php" style="text-decoration:none;color:#fff;">Sign in</a>-->Sign Up</button>
        <button type="submit" name="return" id="return" class="btn btn-primary btn-danger" formaction="login.php">Go Back</button>
      </form>

      </div>

<?php

$con = mysql_connect("localhost", "root", "");

if(!$con)
{
  die("Could not connect " . mysql_error());
}
mysql_select_db("mini_project", $con);

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if(isset($_POST['submitpost']))
  {
    $sql = "INSERT INTO users (UFNAME, ULNAME, UEMAIL, PSWD) VALUES('$_POST[fname]', '$_POST[lname]',
       '$_POST[email]', '$_POST[password]')";

    if(!mysql_query($sql,$con))
    {
      die('Error: ' . mysql_error());
    }

    echo "<script>alert('Thank you for Signing Up. Click OK to continue');</script>";

  }
}

  mysql_close($con);

 ?>

 <script>
    function showPassword()
    {
        var passwordElement = document.getElementById("inputPassword4");
        if (passwordElement.type === "password")
            {
                passwordElement.type = "text";
            }
        else{
            passwordElement.type = "password";
        }
    }


    </script>

  </body>
</html>
