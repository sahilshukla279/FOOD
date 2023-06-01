<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);
     
    $sql = "SELECT * FROM volunteer_tb";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql);

    if(isset($_POST['login']))
    { 
            $email = $_POST["volemailid"];
            $pass = $_POST["volpass"];
           

            if ($result->num_rows > 0)
            {   
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {

                    if ($email == $row["Email"] && $pass == $row["Password"])
                    {
                        echo "Login successfully";
                        $key = $row["Vid"];
                        $_SESSION['Vkey'] = $key;
                        header("Location: vform.php");
                        exit();
                    }
                    else
                    {
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Invalid Credentials!");'; 
                        echo 'window.location.href = "volunteer_login.php";';
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
                $fname = $lname= $address = $address2 = $town = $city = $state =$pincode = $email = $phone = $pass = $confpass = "";

                $fname = $_POST["regfname"];
                $lname = $_POST["reglname"];
                $address = $_POST["regaddress"];
                $address2 = $_POST["regaddress2"];
                $town = $_POST["regtown"];
                $city = $_POST["regcity"];
                $state = $_POST["regstate"];
                $pincode = $_POST["regpincode"];
                $email = $_POST["regemailid"];
                $phone = $_POST["regphonenumber"];
                $pass = $_POST["regpass"];
                $confpass = $_POST["regconfpass"];

            
                $sql = "INSERT INTO volunteer_tb 
                (`First Name`, `Last Name`, `Address 1`, `Address 2`,`Town`,`City`,`State`,`Pincode`,`Email`, `Phone Number`, `Password`, `Confirm Password`)
                VALUES ('$fname', '$lname','$address','$address2', '$town', '$city', '$state', '$pincode', '$email', '$phone', '$pass','$confpass')";
                if ($conn->query($sql) === TRUE) 
                {
                    echo "New record created successfully <br>";
                    header("Location: volunteer_login.php");
                    exit();
                } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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
        if (pass == confpass) {
          window.alert("Registration Succesful");

        }
        else {
          window.alert("Invalid Credentials");
        }
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
          <h2>Volunteer | <span id="pos1"> </span> Page</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Volunteer | <span id="pos2"> </span> Page</li>
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
      <div class="container shadow p-3 mb-5 bg-white rounded" name="login" id="login" style="width: 500px; height: auto;">
        <form action="" method="post">
          <h1 class="mt-2" style="color:rgb(116, 115, 169); ">
            <center>LOGIN</center>
          </h1>
          <div class="form-group">
            <label class="mb-3 mt-3" for="volemailid">Email address</label>
            <input type="email" class="form-control mb-3" name="volemailid" id="volemailid" aria-describedby="emailHelp"
              placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label class="mb-3" for="volpass">Password</label>
            <input type="password" class="form-control mb-3"  name="volpass" id="volpass" placeholder="Password"  >
          </div>
          <center>
            <button type="submit" class="btn btn-primary btn-lg mt-3" id="login" name="login"
              style="background:rgb(116, 115, 169); color:white; border:1px rgb(116, 115, 169); ">Login</button><br>


              <button type="submit" class="btn btn-sm mt-1 mb-3" name="forgot" id="forgot"
              style="background:white; color:rgb(116, 115, 169); border:0px;">
              <i>Forgot Password?</i></button><br>
              
              <div class="msg alert-success" id="msgs" name="msgs" > </div>
              <div class="msg alert-danger" id="msgd" name="msgd" > </div>

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
                  $email = $_POST["volemailid"];
                  $pass = $_POST["volpass"];
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

                              if(isset($_POST['volemailid']))
                              {
                                  $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['volemailid']);
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
          <div class="form-row mt-3">
            <div class="form-group col-md-6">
              <label for="regfname">First Name <span style="color:red">*</span></label>
              <input type="text" class="form-control" name="regfname" id="regfname" placeholder="First Name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="reglname">Last Name<span style="color:red">*</span></label>
              <input type="text" class="form-control" name="reglname" id="reglname" placeholder="Last Name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regaddress1">Address 1<span style="color:red">*</span></label>
            <input type="text" class="form-control" name="regaddress" id="regaddress" placeholder="Apartment, studio, or floor" required>
          </div>
          <div class="form-group">
            <label for="regaddress2">Address 2</label>
            <input type="text" class="form-control" name="regaddress2" id="regaddress2" placeholder="Street,Area">
          </div>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="regtown">Town<span style="color:red">*</span></label>
              <input type="text" class="form-control" name="regtown" id="regtown" placeholder="Enter Town" required>
            </div>
            <div class="form-group col-md-3">
              <label for="regcity">City<span style="color:red">*</span></label>
              <input type="text" class="form-control" name="regcity" id="regcity" placeholder="Enter City" required>
            </div>
            <div class="form-group col-md-3">
              <label for="regstate">State<span style="color:red">*</span></label>
              <select id="regstate" name="regstate" class="form-control" required>
                <option selected>Select State</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="regpincode">Pin code<span style="color:red">*</span></label>
              <input type="number" class="form-control" name="regpincode" id="regpincode" placeholder="Enter pin code" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="regemailid">Email</label>
              <input type="email" class="form-control" name="regemailid" id="regemailid" placeholder="Enter Email" required>
            </div>
            <div class="form-group col-md-6">
              <label for="regphonenumber">Phone Number</label>
              <input type="number" class="form-control" name="regphonenumber" id="regphonenumber" placeholder="Phone Number" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="regpass">Password</label>
              <input type="password" class="form-control" name="regpass" id="regpass" placeholder="Password" required>
            </div>
            <div class="form-group col-md-6">
              <label for="regconfpass">Confirm Password</label>
              <input type="password" class="form-control" name="regconfpass" id="regconfpass" placeholder="Confirm Password" required>
            </div>



          </div><br>

          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                <span style="color:red">*</span>I here by register myself to work for this organisation
                 as mentioned above in safe
                and hygenic quality for a noble cause with accepting all the covid-19
                guidelines.
              </label>
            </div>
          </div><center>
          <button type="submit" class="btn btn-primary btn-lg mt-3 mb-3" name="register" id="register" onclick="subregister()"
              style="background:rgb(116, 115, 169); color:white; border:1px rgb(116, 115, 169); ">Register</button><br>

            <button type="button" onclick="login()" class="btn btn-lg mt-3 mb-3"
              style="background:white; color:rgb(116, 115, 169); border:0px;">
              <i>Already Have an Account???</i></button>
        </form>
      </div>
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