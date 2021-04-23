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

  <title>College Project Apt</title>
  <style media="screen">
    body {
      width: 100%;
      padding: 2% 5%;
      font-family: 'Montserrat', sans-serif;
    }
    hr{
      height:1px;
      background-color: gray;
    }
    .top{
      background-color: #0A3A57;
      color: #fff;
      text-align: center;
      padding: 2% 5% 0;
    }
    .form-apt{
      background-color: #F7CE55;
      margin-top: 1%;
      padding: 5% 3%;
    }

  </style>
</head>

<body>
  <div class="top">
    <h1>BOOK AN APPOINTMENT</h1><br>
  </div>

  <div class="form-apt">
    <form method="post" action="">
      <h4>Search for the best doctor near you, right here!</h4>
      <br><br>
      <div class="form-row">
        <div class="form-group col-md-6">
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

        <!--<div class="form-group col-md-4">
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
        </div>-->

        <div class="form-group col-md-6">
          <label for="SpecializationLookingFor">Doctor's Specialization</label>
          <select class="form-control" id="JobSpecializationLookingFor" name="specialization">
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
      <br><br>
      <div class="form-group">
        <label for="FormControlTextarea">Problem description (optional)</label>
        <textarea class="form-control" id="FormControlTextarea" rows="5" name="problem_desc"></textarea>
      </div><br>

      <button type="submit" class="btn btn-outline-dark" name="checkresult">Check Results</button><br><br><br>
      <hr>

      <div class="result" >
        <div class="form-group">
          <label for="displayresult"></label>
          <div class="form-group col-lg-12">
            <table id="mytable" class="table table-striped table-hover resultstable">
            <thead class="thead-dark">
              <tr class="tableizer-firstrow" style="padding:1.3%;">
                <th scope="col">DID</th>
                <th scope="col">FIRST NAME</th>
                <th scope="col">LAST NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">SPECIALIZATION</th>
              </tr>
            </thead>
            <tbody>
              <!-- php code -->
              <?php

              $con = mysqli_connect("localhost","root","","mini_project");

              if(!$con)
              {
                die('Could not connect ' . mysqli_connect_error());
              }

              if($_SERVER['REQUEST_METHOD'] === 'POST')
              {
                if(isset($_POST['checkresult']))
                {

                  $sql = "SELECT * FROM doctors_registered WHERE SPECIALIZATION = '$_POST[specialization]' AND CITY = '$_POST[city]'";

                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0)
                  {
                    // code...
                    while ($row = mysqli_fetch_assoc($result))
                    {
                      echo "<tr><td>" . $row['DID'] . "</td><td>" . $row['DFNAME']. "</td><td>" . $row['DLNAME']. "</td><td>" . $row['DEMAIL']. "</td><td>" . $row['SPECIALIZATION'] . "</td></tr>";
                    }
                  }

                  if(!mysqli_query($con,$sql))
                  {
                    die('Error: ' . mysqli_error($con));
                  }
                  //echo "<script>alert('Appointment booking confirmed. Click OK to continue...');</script>";
                }

              }

              mysqli_close($con);
               ?>

            </tbody>
          </table><br>
          </div>

          <div class="form-group col-lg-3 col-md-3 col-sm-3">
            <input type="number" name="selection" class="form-control" id="displayresult" placeholder="enter id of your selection"><br>
          </div><br>
        </div>
      </div><br>
      <hr>

      <br>
      <h4>Patient details</h4><br>

      <div class="form-row">
        <div class="form-group col-md-6 col-lg-6">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" name="fname" >
        </div>
        <div class="form-group col-md-6 col-lg-6">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" name="lname">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-lg-6 col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="text" class="form-control" id="inputEmail4" placeholder="example@mail.com" name="email" >
        </div>
      </div>
      <br>
      <hr><br>

      <div class="dateandtime">
        <div class="form-row">
          <div class="form-group col-lg-4">
            <label for="aptdate">Select date</label>
            <input type="date" class="form-control" id="aptdate" name="aptdate">
          </div>
          <div class="form-group col-lg-1">

          </div>
          <div class="form-group col-lg-3">
            <label for="apttime">Select time slot</label><br>
            <select class="form-control" name="apttime" id="apttime">
              <option>Choose...</option>
              <option>9:00 - 9:45</option>
              <option>10:00 - 10:45</option>
              <option>11:00 - 11:45</option>
              <option>17:00 - 17:45</option>
              <option>18:00 - 18:45</option>
              <option>19:00 - 19:30</option>
            </select>
          </div>
        </div><br>
      </div>
      <hr><br>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <select id="inputCity" class="form-control" name="location">
            <option selected>Choose city...</option>
            <option>Bengaluru</option>
            <option>Mumbai</option>
            <option>Chennai</option>
            <option>New Delhi</option>
            <option>Kolkata</option>
            <option>Hyderabad</option>
          </select>
        </div>


        <div class="form-group col-md-6">
          <label for="SpecializationLookingFor">Specialization Chosen</label>
          <select class="form-control" id="JobSpecializationLookingFor" name="specializationChosen">
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
      <hr><br>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck" >
          <label class="form-check-label" for="gridCheck">
            I agree to the terms and conditions (this is for college project)
          </label>
        </div>
      </div><br>
      <button type="submit" class="btn btn-primary" name="submitpost" >Submit</button>
      <button type="submit" name="return" id="return" class="btn btn-primary btn-danger"
      formaction="dashboard.php">Go Back</button>
      <br><br>

    </form>
  </div>

<?php

$con = mysqli_connect("localhost","root","","mini_project");

if(!$con)
{
  die('Could not connect ' . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if(isset($_POST['submitpost']))
  {

    $sql = "INSERT INTO appointment (PFNAME, PLNAME, EMAILID, CITY, SPECIALIZATION, PROBLEM_DESC,SELECTDOC,APT_DATE,APT_TIME)
    VALUES('$_POST[fname]', '$_POST[lname]', '$_POST[email]', '$_POST[location]',  '$_POST[specializationChosen]','$_POST[problem_desc]','$_POST[selection]','$_POST[aptdate]','$_POST[apttime]')";

    if(!mysqli_query($con,$sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    echo "<script>alert('Appointment booking confirmed. Click OK to continue...');</script>";
  }

}

mysqli_close($con);
 ?>


</body>

</html>
