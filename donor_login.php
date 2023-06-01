<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM donor_tb";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql);

              if(isset($_POST['login']))
              { 
                $email = $_POST["logemailid"];
                $pass = $_POST["logpass"];
                  if ($result->num_rows > 0)
                  {
                      // output data of each row
                      while($row = $result->fetch_assoc()) 
                      {
                          if ($email == $row["Email"] && $pass == $row["Password"])
                          {
                              echo "Login successfully";
                              $key = $row["Did"];
                              $_SESSION['Dkey'] = $key;
                              header("Location: dform.php");
                              exit();
                          }
                          else
                          {
                              echo '<script type="text/javascript">'; 
                              echo 'alert("Invalid Credentials!");'; 
                              echo 'window.location.href = "donor_login.php";';
                              echo '</script>';

                          }
                      }
                  } 
                  else 
                  {
                      echo "<script>alert('Invalid Credentials!')</script>";

                  }
              }
               
              // 
              // 
              // REGISTER
              // 
              //



                          
                if(isset($_POST['register']))
                {
                  // define variables and set to empty values
                  $fname = $lname= $email = $phone = $pass = $confpass = "";

                  $fname = $_POST["regfname"];
                  $lname = $_POST["reglname"];
                  $email = $_POST["regemailid"];
                  $phone = $_POST["regphonenumber"];
                  $pass = $_POST["regpass"];
                  $confpass = $_POST["regconfpass"];
                  
                  if ($result->num_rows > 0)
                  {
                      // output data of each row
                      while($row = $result->fetch_assoc()) 
                      {
                          if ($email == $row["Email"])
                          {
                            echo '<script type="text/javascript">'; 
                            echo 'alert("Email Id Already Existed!");'; 
                            echo 'window.location.href = "donor_login.php";';
                            echo '</script>';
                          }
                          else
                  {          
          
                    $sql = "INSERT INTO donor_tb (`First Name`, `Last Name`, `Email`, `Phone Number`, `Password`, `Confirm Password`)
                    VALUES ('$fname', '$lname', '$email', '$phone', '$pass', '$confpass')";
                    if ($conn->query($sql) === TRUE) 
                    {
                        echo "New record created successfully <br>";
                        header("Location: donor_login.php");
                        exit();
                      } 
                      else 
                      {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                }
                      }
                  }
                  
                }

              

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Food Offerings & Other Donations</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script>

    function register() {

      document.getElementById('login').style.display = "none";
      document.getElementById('register').style.display = "block";
      document.getElementById('pos1').innerHTML = "Register";
      document.getElementById('pos2').innerHTML = "Register";
    }

    function login() {

      document.getElementById('register').style.display = "none";
      document.getElementById('login').style.display = "block";
      document.getElementById('pos1').innerHTML = "Login";
      document.getElementById('pos2').innerHTML = "Login";

    }
    function subregister() {
      var pass = document.getElementById('regpass').value;
      var confpass = document.getElementById('regconfpass').value;
      var fname = document.getElementById('regfname').value;
      var lname = document.getElementById('reglname').value;
      var email = document.getElementById('regemailid').value;
      var phno = document.getElementById('regphonenumber').value;

      if (pass != "" && confpass != "" && fname != "" && email != "" && lname != "" && phno != "") {
        if (pass != confpass) {
          window.alert("Invalid Credentials");

        }
        // else {
        //   window.alert("Invalid Credentials");
        // }
      }
      else {
        window.alert("Please Enter All Credentials");
      }
    }
  </script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo">
        <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="getstarted" href="index.php">Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Donor | <span id="pos1"> </span> Page</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Donor | <span id="pos2"> </span> Page</li>
          </ol>
        </div>
        <script>
          document.getElementById('pos1').innerHTML = "Login";
          document.getElementById('pos2').innerHTML = "Login";
        </script>
      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">

      <!-- --------------------------------------------------------------
            # LOGIN
      -------------------------------------------------------------- -->

      <div class="container shadow p-3 mb-5 bg-white rounded" id="login" style="width: 500px; height: auto;">
        <form action="" method="post">
          <h1 class="mt-2" style="color:rgb(116, 115, 169); ">
            <center>LOGIN</center>
          </h1>
          <div class="form-group">
            <label class="mb-3 mt-3" for="logemailid">Email address</label>
            <input type="email" class="form-control mb-3" name="logemailid" id="logemailid" aria-describedby="emailHelp"
              placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label class="mb-3" for="logpass">Password</label>
            <input type="password" class="form-control mb-3" name="logpass" id="logpass" placeholder="Password">
          </div>
          <center>
            <button type="submit" class="btn btn-primary btn-lg mt-3" name="login" id="login"
              style="background:rgb(116, 115, 169); color:white; border:1px rgb(116, 115, 169); ">Login</button><bR>

            <button type="submit" class="btn btn-sm mt-1 mb-3" name="forgot" id="forgot"
              style="background:white; color:rgb(116, 115, 169); border:0px;">
              <i>Forgot Password?</i></button><br>

            <div class="msg alert-success" id="msgs" name="msgs"> </div>
            <div class="msg alert-danger" id="msgd" name="msgd"> </div>

            <button type="button" onclick="register()" class="btn btn-lg mt-1 mb-3"
              style="background:white; color:rgb(116, 115, 169); border:0px;"><i>New here?
                Register Yourself</i></button>
        </form>
        <?php

              // 
              // 
              // FORGOT PASSWORD????
              // 
              // 

              if(isset($_POST['forgot']))
              {
                  $email = $_POST["logemailid"];
                  $pass = $_POST["logpass"];
                  if ($result1->num_rows > 0)
                  {
                      // output data of each row
                      while($rows = $result1->fetch_assoc()) 
                      {
                          if ($email == $rows["Email"])
                          {

                              $email_body = "<div>";
                              $name = filter_var($rows['First Name'], FILTER_SANITIZE_STRING);
                              $email_body .= "<div>
                                                  <label>Dear,</label>&nbsp;<span>".$name."</span>
                                              </div><br>";
                          

                              $subject = "Forgot Your Password?";
                              $email_body .= "<div>
                                              <label>Seems like you have </label>&nbsp;<span>".$subject."</span>
                                              </div><br><br>";

                              if(isset($_POST['logemailid']))
                              {
                                  $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['logemailid']);
                                  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                                  $email_body .= "<div>
                                                  <label>Your Email Id is </label>&nbsp;<span>".$email."</span>
                                                  </div><br>";
                              }


                              
                              $pswd = $rows['Password'];
                              $email_body .= "<div>
                                                  <label>And Your Password is </label>&nbsp;<span>".$pswd."</span>
                                                  </div>";


                              $recipient = $email;
                              $email_body .= "</div>";


                              $headers  = 'MIME-Version: 1.0' . "\r\n"
                              .'Content-type: text/html; charset=utf-8' . "\r\n"
                              .'From: ' . $email . "\r\n";

                              if(mail($recipient, $subject, $email_body, $headers)) 
                              {
                                  echo '<script type="text/javascript">'; 
                                  echo 'document.getElementById("msgd").style.display = "none";';
                                  echo 'document.getElementById("msgs").style.display = "block";';
                                  echo 'document.getElementById("msgs").innerHTML = "Your Password has been Sent to Your Email Address!!!";'; 
                                  echo '</script>';
                                  break; 
                              } 
                              else 
                              {
                                  echo '<script type="text/javascript">'; 
                                  echo 'alert("Invalid Email Id");'; 
                                  echo '</script>';
                                  break;
                              }
                             break;
                          }
                          else  
                          {
                            echo '<script type="text/javascript">'; 
                            echo 'document.getElementById("msgs").style.display = "none";';
                            echo 'document.getElementById("msgd").style.display = "block";';
                            echo 'document.getElementById("msgd").innerHTML = "Invalid ID!";';  
                            echo '</script>';
                            
                          }
                      }
                  } 
                  else 
                  {
                      echo "<script>alert('Invalid Email Id!')</script>";

                  }

              }

        ?>


      </div>


      <!-- --------------------------------------------------------------
            # REGISTER
      -------------------------------------------------------------- -->
      <div class="container shadow p-3 mb-5 bg-white rounded" id="register"
        style="width: 600px; height: auto; display: none;">
        <form action="" method="post">
          <h1 class="mt-2" style="color:rgb(116, 115, 169); ">
            <center>REGISTER</center>
          </h1>
          <br>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="regfname">First Name</label>
              <input type="text" class="form-control" name="regfname" id="regfname" placeholder="First Name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="reglname">Last Name</label>
              <input type="text" class="form-control" name="reglname" id="reglname" placeholder="Last Name" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="regemailid">Email</label>
              <input type="email" class="form-control" name="regemailid" id="regemailid" placeholder="Enter Email"
                required>
            </div>
            <div class="form-group col-md-6">
              <label for="regphonenumber">Phone Number</label>
              <input type="number" class="form-control" name="regphonenumber" id="regphonenumber"
                placeholder="Phone Number" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="regpass">Password</label>
              <input type="password" class="form-control" name="regpass" id="regpass" placeholder="Password" required>
            </div>
            <div class="form-group col-md-6">
              <label for="regconfpass">Confirm Password</label>
              <input type="password" class="form-control" name="regconfpass" id="regconfpass"
                placeholder="Confirm Password" required>
            </div>
          </div>
          <center>
            <button type="submit" class="btn btn-primary btn-lg mt-3 mb-3" onclick="subregister()" name="register"
              style="background:rgb(116, 115, 169); color:white; border:1px rgb(116, 115, 169); ">Register</button><br>

            <button type="button" onclick="login()" class="btn btn-lg mt-3 mb-3"
              style="background:white; color:rgb(116, 115, 169); border:0px;">
              <i>Already Have an Account???</i></button>

        </form>
      </div>




    </section>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Food Offerings & Other Donations</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>