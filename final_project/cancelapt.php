<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>College Project</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

  </head>
  <style media="screen">
    body{
      padding: 5%;
    }
  </style>
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
    <h3 style="text-align:center;">APPOINTMENTS</h3><br><br>
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
    <button class="btn btn-warning btn-md" type="submit" name="cancel"><a href="dashboard.php" style="text-decoration:none;color:#111;">CANCEL</a></button>

  </body>
</html>
