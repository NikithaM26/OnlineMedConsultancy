<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width:device-width, initial-scale:1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/master.css">
  <title>College Project</title>
</head>

<body>
  <section id="top-intro" class="top-intro">
    <div class="container-fluid">

      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="">DBMS miniProject</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php" target="_blank">Login / Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#Contact">Contact</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <h1><strong>Hello there! Welcome on board...</strong></h1><br>
          <h4>Online Medical Consultancy project</h4><br>
          <button type="button" class="btn btn-outline-light btn-lg download-btn"><i class="fa fa-tv" ></i> Download</button>
          <button type="button" class="btn btn-light btn-lg download-btn"><i class="fa fa-mobile-phone" style="padding-right:7px;"></i> Download</button>

        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <img src="images/top-image.png" alt="image" class="top_image">
        </div>

      </div>

    </div>
  </section>

  <section id="about" class="about">
    <h2>ABOUT US</h2>
    <br><br>
    <p>This is Nikitha's DBMS mini project.<br><br>It is a medical consultancy website, which enables you to book an appointment with a doctor of your choice
    <br>and you can do so via this website which saves you a lot of time and effort. <br><br>The following are the services provided by this website...
  </p>

  </section>

  <section id="services" class="services">

    <div class="row shadow p-3 md-5 bg-white rounded">
      <div class="col-lg-4 col-md-2 col-md-1 service-box">
        <i class="fa fa-id-card"></i><br><br>
        <h3>Register with us</h3><br>
        <p>If you are a <strong>doctor or a medical service provider(hospital/clinic etc) </strong><br>
      and you wish to register with us, <br>click <a href="register.php" style="text-decoration:none; color:#111;" target="_blank">
        <strong><em>here</em></strong></a></p>
      </div>
      <div class="col-lg-4 col-md-2 col-md-1 service-box">
        <i class="fa fa-calendar"></i><br><br>
        <h3>Book a consultation</h3><br>
        <p>If you wish to seek a appointment with a doctor of your choice, <br>
      click <a href="login.php" style="text-decoration:none; color:#111;" target="_blank">
        <strong><em>here</em></strong></a></p></p>
      </div>
      <div class="col-lg-4 col-md-2 col-md-1 service-box">
        <i class="fa fa-bookmark"></i><br><br>
        <h3>View Appointments</h3><br>
        <p>If you wish to check your appointments then, <br>click <a href="login.php" style="text-decoration:none; color:#111;" target="_blank">
          <strong><em>here</em></strong></a></p></p>
      </div>

    </div>

  </section>


  <section class="feedback" id="feedback">
    <h3> <strong>VALUABLE FEEDBACK</strong></h3>
    <div id="feedback-carousel" class="carousel slide" data-ride="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <?php
          $con = mysqli_connect("localhost","root","","mini_project");

          if(!$con)
          {
            die('Could not connect: ' . mysqli_error());
          }

          $query = "SELECT * FROM feedback_users";
          $res = mysqli_query($con,$query);
          $row = mysqli_fetch_array($res);
          $row1 = mysqli_fetch_array($res);
          $row2 = mysqli_fetch_array($res);

          mysqli_close($con);
           ?>

          <h3><?php echo $row['FEEDBACK'] ?></h3><br>
          <p><em>-<?php echo $row['USER_FNAME'] . " " . $row['USER_LNAME']; ?></em></p>
        </div>

        <div class="carousel-item">
          <h3><?php echo $row1['FEEDBACK'] ?></h3><br>
          <p><em>-<?php echo $row1['USER_FNAME'] . " " . $row1['USER_LNAME']; ?></em></p>
        </div>

        <div class="carousel-item">
          <h3><?php echo $row2['FEEDBACK'] ?></h3><br>
          <p><em>-<?php echo $row2['USER_FNAME'] . " " . $row2['USER_LNAME']; ?></em></p>
        </div>

        <a href="#feedback-carousel" class="carousel-control-prev" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" ></span></a>

        <a href="#feedback-carousel" class="carousel-control-next" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span></a>

      </div>

    </div>

  </section>

  <section id="Contact" class="contact">
    <h3><strong>CONTACT US AT</strong></h3>
    <div class="contact-list">
      <i class="fa fa-phone" style="font-size: 26px; color: #fff; padding:5%;"></i>
      <i class="fa fa-envelope" style="font-size: 26px; color: #fff; padding:5%;"></i>
      <i class="fa fa-facebook-square" style="font-size: 26px; color: #fff; padding:5%;"></i>
      <i class="fa fa-twitter" style="font-size: 26px; color: #fff; padding:5%;"></i>
      <i class="fa fa-linkedin-square" style="font-size: 26px; color: #fff; padding:5%;"></i>
    </div>
    <button type="button" class="btn btn-outline-light btn-lg contact-btn"><i class="fa fa-tv" ></i>
      Download</button>
    <button type="button" class="btn btn-light btn-lg contact-btn"><i class="fa fa-mobile-phone" style="padding-right:7px;"></i>Download</button>
  </section>

  <footer id="footer" class="footer">

    <p>DBMS Mini-Project | Nikitha M</p>
    <a href="#top-intro" style="text-decoration:none; color:#0A3A57;">Back to top</a>

  </footer>


</body>

</html>
