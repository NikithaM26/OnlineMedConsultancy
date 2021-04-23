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
    $specialization = '$_POST[specialization]';
    $city = '$_POST[city]';


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

    //$sql = "INSERT INTO appointment (PFNAME, PLNAME, EMAILID, CITY, STATE, SPECIALIZATION, PROBLEM_DESC)
    //VALUES('$_POST[fname]', '$_POST[lname]', '$_POST[email]', '$_POST[city]', '$_POST[state]', '$_POST[specialization]','$_POST[problem_desc]')";

    if(!mysqli_query($con,$sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    //echo "<script>alert('Appointment booking confirmed. Click OK to continue...');</script>";
  }

}

mysqli_close($con);
 ?>
