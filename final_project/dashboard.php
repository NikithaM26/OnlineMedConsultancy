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

  <title>College Project Dashboard</title>
  <style media="screen">
    body {
      width: 100%;
      font-family: 'Montserrat', sans-serif;
      color: #111;
    }
    .topnav{
      background-color: #0A3A57;
      color: #fff;
    }
    .content{
      margin: 2% 7% 2%;
      padding: 2%;
      background: #F7CE55;
      text-align: center;
    }
    .profile-sidenav{
      border: 1px solid #111;
    }
    .row{
      margin: 0 7%;
      padding: 1%;
    }
    .modal{
      background: #0A3A57;
      text-align: left;
      padding: 5%;
    }
    .clearfix{
      text-align: left;
      padding: 3% 0;
    }
    .close{
      font-size: 50px;
      color: white;
    }
    .close:hover{
      color: red;
      cursor: pointer;
    }
    .container{
      padding-top: 2%;
    }
  </style>
</head>

<body>

  <?php
  $con = mysqli_connect("localhost","root","","mini_project");

  if(!$con)
  {
    die('Could not connect: ' . mysqli_error());
  }


  $sql = "SELECT * FROM login WHERE loginID=(SELECT max(loginID) FROM login);";
  $result = mysqli_query($con,$sql);
  $rows = mysqli_fetch_array($result);

  $query = "SELECT * FROM users WHERE '".$rows['USERNAME']."' = users.`UEMAIL`";
  $res = mysqli_query($con,$query);
  $row = mysqli_fetch_array($res);

  mysqli_close($con);
   ?>

  <div class="topnav">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="#"><h3>DBMS miniProject</h3></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <button type="submit" class="btn btn-outline-warning btn-md">
            <a class="nav-link" href="login.php" style="text-decoration:none;color:#fff;">Logout</a></button>
          </li>
        </ul>
      </div>

    </nav>
  </div>

  <div class="content">
    <h2>DASHBOARD</h2>
  </div>

  <div class="row">
    <div class="card border-info col-lg-3 col-md-3 col-sm-1">
      <div class="image" style="text-align:center;margin-top:5%;">
        <img class="card-img-top" src="images/headshot.jpg" alt="image" style="height:100%;width:60%;border-radius:50%;">
      </div>
      <div class="card-body text-info">
        <h4 class="card-title">
        <?php
        echo $row['UFNAME'] . " " . $row['ULNAME'] . "<br>";
         ?>
       </h4>
       <p class="card-info">
         <?php
         echo $row['UEMAIL'];
          ?>
       </p>

      </div>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1">

    </div>
    <div class="card border-info col-lg-8 col-md-8 col-sm-1">
      <div class="card-body text-info">
        <h4 class="card-title">Appointments</h4>
        <table id="mytable" class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">DID</th>
              <th scope="col">DOCTOR</th>
              <th scope="col">EMAIL</th>
              <th scope="col">APPOINTMENT DATE</th>
              <th scope="col">APPOINTMENT TIME</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $con = mysqli_connect("localhost","root","","mini_project");

            if(!$con)
            {
              die('Could not connect ' . mysqli_connect_error());
            }

                $sql = "SELECT * FROM  appointment WHERE EMAILID = '".$rows['USERNAME']."'" ;


                $result = mysqli_query($con, $sql);


                if (mysqli_num_rows($result) > 0)
                {
                  // code...
                  while ($rowa = mysqli_fetch_assoc($result))
                  {
                    $query1 = "SELECT * FROM doctors_registered WHERE DID = '".$rowa['SELECTDOC']."'";

                    $result1 = mysqli_query($con, $query1);
                    $row1 = mysqli_fetch_array($result1);

                    date_default_timezone_set("Asia/Kolkata");
                    $curDate = date("Y-m-d");

                    if($rowa['APT_DATE'] > $curDate){
                      echo "<tr><td>" . $rowa['SELECTDOC'] . "</td><td>" . $row1['DFNAME'] . " " . $row1['DLNAME'] . "</td>
                      <td>" . $row1['DEMAIL'] . "</td><td>" . $rowa['APT_DATE']. "</td><td>" . $rowa['APT_TIME'] . "</td></tr>";
                    }

                  }
                }

                if(!mysqli_query($con,$sql))
                {
                  die('Error: ' . mysqli_error($con));
                }

            mysqli_close($con);
             ?>

          </tbody>
        </table>
      </div>
      <div class="card-footer bg-transparent">
        <button class="btn btn-warning btn-md" type="button" name=""><a href="bookappointment.php" target="_blank" style="text-decoration:none;color:#111;">Book an appointment</a></button>
        <button class="btn btn-warning btn-md" type="button" name="button"><a href="cancelapt.php" style="text-decoration:none;color:#111;">Cancel appointment</a></button>
        <button class="btn btn-warning btn-md" onclick="document.getElementById('feedback').style.display='block'"
        style="width:auto; text-decoration:none;">Feedback</button>
      </div>
    </div>
  </div>

  <div id="feedback" class="modal">
  <span onclick="document.getElementById('feedback').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" method="post" action="">
    <div class="container">
      <h1>FEEDBACK</h1>
      <p>Let us know your thoughts...</p>
      <hr>
      <br>
      <label for="feedback"></label>
      <textarea name="feedback" rows="8" cols="80" placeholder="Feedback"></textarea>
      <br>
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> I am willing to submit this feedback.
      </label>

      <div class="clearfix">
        <button class="btn btn-success btn-md" type="submit" class="submitbtn" name="feedback_submit">Turn in</button>
        <button class="btn btn-danger btn-md" type="button" onclick="document.getElementById('feedback').style.display='none'" class="cancelbtn" >Cancel</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('feedback');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event)
{
  if (event.target == modal)
  {
    modal.style.display = "none";
  }
}
</script>


<!-- code for feedback -> to store input to the db -->
<?php
$conn = mysqli_connect("localhost","root","","mini_project");

if(!$conn)
{
  die('Could not connect ' . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if(isset($_POST['feedback_submit']))
  {

    $sql = "INSERT INTO feedback_users (USER_FNAME, USER_LNAME, USER_EMAIL, FEEDBACK) VALUES('".$row['UFNAME']."', '".$row['ULNAME']."',
      '".$row['UEMAIL']."','$_POST[feedback]')";

    if(!mysqli_query($conn,$sql))
    {
      die('Error: ' . mysqli_error($conn));
    }
    //echo "<script>alert('Thanks for your feedback. Click OK to continue...');</script>";
  }

}

mysqli_close($conn);
 ?>


</body>

</html>
