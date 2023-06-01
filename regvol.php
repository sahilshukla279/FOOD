<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if (isset($_POST['registerbtn']))
    {
    // define variables and set to empty values
    $fname = $lname= $address = $address2 = $town = $city = $state =$pincode = $email = $phone = "";

    $fname = $_POST["regfname"];
    $reg =  " [Registered]";
    $lname = $_POST["reglname"].$reg;
    $address = $_POST["regaddress"];
    $address2 = $_POST["regaddress2"];
    $town = $_POST["regtown"];
    $city = $_POST["regcity"];
    $state = $_POST["regstate"];
    $pincode = $_POST["regpincode"];
    $email = $_POST["regemailid"];
    $phone = $_POST["regphonenumber"];

   
    $sql = "INSERT INTO reg_tb 
    (`First Name`, `Last Name`, `Address 1`, `Address 2`,`Town`,`City`,`State`,`Pincode`,`Email`, `Phone Number`)
    VALUES ('$fname', '$lname','$address','$address2', '$town', '$city', '$state', '$pincode', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) 
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("New Volunteer Registered Successfully!");'; 
        echo 'window.location.href = "admin.php";';
        echo '</script>';

      } 
      else 
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    }
      
      $conn->close();
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
    function subregister() 
    {
      var pass = document.getElementById('regpass').value;
      var confpass = document.getElementById('regconfpass').value;
      var fname = document.getElementById('regfname').value;
      var lname = document.getElementById('reglname').value;
      var email = document.getElementById('regemailid').value;
      var phno = document.getElementById('regphonenumber').value;

      if (fname != "" && email != "" && lname != "" && phno != "") 
      {
          window.alert("Registration Succesful");
      }
      else
       {
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
        <li><a class="nav-link" href="index.php">Home</a></li>
          <li><a class="nav-link" href="admin.php">Dashboard</a></li>
          <li><a class="getstarted"  href="logout.php">Logout</a></li>
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
          <h2>Register Volunteer </h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Admin</li>
            <li>Register Volunteer</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">

      <!-- --------------------------------------------------------------
            # REGISTER
      -------------------------------------------------------------- -->
      <div class="container shadow p-3 mb-5 bg-white rounded" id="register"
        style="width: 600px; height: auto; ">

        <form action="" method="post">
                <h1 class="mt-2" style="color:rgb(116, 115, 169); ">
          <center>Organization Register</center>
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
<br>

            <center>
          <button type="submit" class="btn btn-primary btn-lg mt-3 mb-3" name="registerbtn" id="registerbtn" onclick="subregister()"
              style="background:rgb(116, 115, 169); color:white; border:1px rgb(116, 115, 169); ">Register</button><br>

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