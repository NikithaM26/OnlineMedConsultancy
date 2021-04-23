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

  <title>College Project Register</title>

  <style media="screen">
    body {
      width: 100%;
      padding: 2% 5%;
      font-family: 'Montserrat', sans-serif;

    }

    .top {
      background-color: #0A3A57;
      color: #fff;
      text-align: center;
      padding: 2% 5% 0;
    }

    .form-reg {
      background-color: #F7CE55;
      margin-top: 1%;
      padding: 5% 3%;
    }

    hr {
      height: 1px;
      background-color: gray;
    }
  </style>
</head>

<body>
  <div class="top">
    <h1>REGISTRATION DESK</h1><br>
  </div>

  <div class="form-reg">

    <form method="POST" action="">

      <div class="form-row">
        <div class="form-group col-md-6 col-lg-6">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" name="dfname" required>
        </div>
        <div class="form-group col-md-6 col-lg-6">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" name="dlname">
        </div>
      </div><br>

      <div class="form-row">

        <div class="form-group col-lg-6 col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="text" class="form-control" id="inputEmail4" placeholder="example@mail.com" name="demail" required>
        </div>
        <div class="form-group col-lg-6 col-md-6">
          <label for="inputPhoneNum">Contact Number</label>
          <input type=" tel" class="form-control" id="inputPhoneNum" name="phno">
        </div>

      </div><br>

      <div class="form-row">
        <div class="form-group col-lg-6 col-md-6">
          <label for="inputPassword4">Set Password</label>
          <input type="password" class="form-control" id="inputPassword4" name="pswd" required>
        </div>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" onclick = "showPassword()"> Show passsword
        </div>
      </div>

      <br>
      <!--<div class="form-row">
        <div class="form-group col-lg-6 col-md-6">
          <label for="inputPassword4">Confirm Password</label>
          <input type="password" class="form-control" id="inputPassword4" required>
        </div>
      </div>-->
      <br>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck" required>
        <label class="form-check-label" for="gridCheck">
          I agree to sign up (this is for college project)
        </label>
      </div>
      <br>
      <hr><br>
      <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Enter your official address" name="address_official" required>
      </div><br>
      <hr><br>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputCity">City</label>
          <select id="inputCity" class="form-control" name="city">
            <option selected>Choose city...</option>
            <option>Bengaluru</option>
            <option>Mumbai</option>
            <option>Chennai</option>
            <option>New Delhi</option>
            <option>Kolkata</option>
            <option>Hyderabad</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">State</label>
          <select id="inputState" class="form-control" name="state">
            <option selected>Choose...</option>
            <option>Karnataka</option>
            <option>Maharashtra</option>
            <option>Tamil Nadu</option>
            <option>Delhi</option>
            <option>West Bengal</option>
            <option>Telangana</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="inputZip">Zip</label>
          <input type="text" class="form-control" id="inputZip" name="zip">
        </div>
      </div>
      <br>
      <hr><br>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="qualification">Qualification details</label>
          <input type="text" class="form-control" id="qualification" name="qualification">
        </div>
        <div class="form-group col-md-6">
          <label for="JobSpecialization">Specialization</label>
          <select class="form-control" id="JobSpecialization" name="specialization">
            <option>Choose...</option>
            <option>Gynaecologist and Obstetrician</option>
            <option>Cardiologist</option>
            <option>Neurologist</option>
            <option>Pulmonologist</option>
            <option>ENT specialist</option>
            <option>Dentist</option>
          </select>
        </div>
      </div>

      <br>

      <div class="form-group">
        <label for="FormControlTextarea">Profile description</label>
        <textarea class="form-control" id="FormControlTextarea" rows="5" name="profile_desc"></textarea>
      </div>
      <br>
      <hr><br>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck" required>
          <label class="form-check-label" for="gridCheck">
            I agree to the terms and conditions (this is for college project)
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="submitpost">Submit</button>
      <button type="submit" name="return" id="return" class="btn btn-primary btn-danger" formaction="login.php">Go Back</button>
    </form>

  </div>

  <!-- php code -->
  <?php
$con = mysql_connect("localhost","root","");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("mini_project", $con);

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if(isset($_POST['submitpost']))
  {
    $sql = "INSERT INTO doctors_registered (DFNAME, DLNAME, DEMAIL, PHNO, PSWD, OFFICIAL_ADDRESS,
    CITY, STATE, ZIP, QUALIFICATION, SPECIALIZATION, PROFILE_DESC)
    VALUES('$_POST[dfname]', '$_POST[dlname]', '$_POST[demail]', '$_POST[phno]', '$_POST[pswd]', '$_POST[address_official]', '$_POST[city]',
    '$_POST[state]', '$_POST[zip]', '$_POST[qualification]', '$_POST[specialization]', '$_POST[profile_desc]')";

    if(!mysql_query($sql, $con))
    {
      die('Error: ' . mysql_error());
    }
    echo "<script>alert('Thank you for registering with us. Click OK to continue');</script>";
  }
}
mysql_close($con);

   ?>

   <script>
      function showPassword(){
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
