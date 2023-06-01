<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Food Offerings & Other Donations | Volunteer History</title>
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

</head>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);
    $key = $_SESSION['Dkey'];
    $sql = "SELECT * FROM `vassign_tb` WHERE `Did`='$key';";
    $result = $conn->query($sql);


?>


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
          <li><a class="nav-link" href="donor_form.php">Donate</a></li>
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
          <h2>Donor History</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>History</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page" id="s1">
    <?php 
    
    if ($result->num_rows > 0)
    {
        // output data of each row
        $row1 = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($row1 as $rows) 
        {     
              if(empty($rows["Vid"]))
              { 
              }
              else
              {
                
                $Vid = $rows["Vid"];
                $sql1 = "SELECT * FROM `volunteer_tb` WHERE `Vid` = '$Vid'";
                $sql2 = "SELECT * FROM `reg_tb` WHERE `Rid` = '$Vid'";

                  $result = $conn->query($sql1);
                  $row2 = $result->fetch_assoc();
                  $result5 = $conn->query($sql2);
                  $rows5 = $result5->fetch_assoc();

              }
              

?>
      <div class="container shadow p-3 mb-3 bg-white rounded" id="c1">
        <form class="ml-5  fontbig" >
          <div class="form-row mt-3 font-weight-bold">
            <div class="form-group col-md-4">
              <label for="inputFName">First Name:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputFName" name="fname" id="fname" class="font-weight-normal">
                <?php echo $rows['First Name']; ?>
            </label>
            </div>
            <div class="form-group col-md-4">
              <label for="inputLName">Last Name:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputLName" name="lname" id="lname" class="font-weight-normal">
              <?php echo $rows['Last Name']; ?>
              </label>
            </div>
            <div class="form-group col-md-4">
              <label for="inputPhoneNumber">Phone Number:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputPhoneNumber" name="phonenumber" id="phonenumber" class="font-weight-normal">
              <?php echo $rows['Phone']; ?>
              </label>
            </div>
          </div>
          <div class="form-group font-weight-bold">
            <label for="inputAddress">Address 1:</label>&nbsp;&nbsp;&nbsp;
            <label for="inputAddress" name="address1" id="address1" class="font-weight-normal">
            <?php echo $rows['Address 1']; ?>
            </label>
          </div>
          <div class="form-group font-weight-bold">
            <label for="inputAddress2">Address 2:</label>&nbsp;&nbsp;&nbsp;
            <label for="inputAddress2" name="address2" id="address2" class="font-weight-normal">
            <?php echo $rows['Address 2']; ?>
            </label>
          </div>
          <div class="form-row font-weight-bold">
            <div class="form-group col-md-3">
              <label for="inputTown">Town:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputTown" name="town" id="town" class="font-weight-normal">
              <?php echo $rows['Town']; ?>
              </label>
            </div>
            <div class="form-group col-md-3">
              <label for="inputCity">City:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputCity" name="city" id="city" class="font-weight-normal">
              <?php echo $rows['City']; ?>
              </label>
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">State:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputState" name="state" id="state" class="font-weight-normal">
              <?php echo $rows['State']; ?>
              </label>
            </div>
            <div class="form-group col-md-3">
              <label for="inputPincode">Pin code:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputPincode" name="pincode" id="pincode" class="font-weight-normal">
              <?php echo $rows['Pincode']; ?>
              </label>
            </div>
          </div>
          <div class="form-row font-weight-bold">
            <div class="form-group col-md-6">
              <label for="inputDtype">Donation Type:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputDtype" name="donationtype" id="donationtype" class="font-weight-normal">
              <?php echo $rows['Donation Type']; ?>
              </label>
            </div>
            <div class="form-group col-md-6">
              <label for="inputApproxWeight">Approx. Weight:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputApproxWeight" name="weight" id="weight" class="font-weight-normal">
              <?php echo $rows['Weight']; ?>
              </label>
            </div>
          </div>
          <div class="form-row font-weight-bold">
            <div class="form-group col-md-6">
              <label for="inputDtype">Volunteer Name:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputDtype" name="donationtype" id="donationtype" class="font-weight-normal">
                <?php 
                 if(empty($rows["Vid"]))
                 {
                 
                 }
                 elseif(isset($row2))
                 {
                     if(empty($row2['First Name']))
                     {
                           
                     }
                     else
                     {
                       echo $row2['First Name'] . ' ' . $row2['Last Name']; 
                     }
                 }
                 elseif(isset($rows5))
                 {
                   if(empty($rows5['First Name']))
                     {
                           
                     }
                     else
                     {
                       echo $rows5['First Name'] . ' ' . $rows5['Last Name']; 
                     }
                 }

                ?>
                
              </label>
            </div>
            <div class="form-group col-md-6">
              <label for="inputApproxWeight">Donation Status:</label>&nbsp;&nbsp;&nbsp;
              <label for="inputApproxWeight" name="weight" id="weight" class="font-weight-normal">
              <?php 
              
              if($rows['Donated']=="Donated")
              {
                echo "Donated"; 
              }
              elseif($rows['Received']=="Discard")
              {
                echo "Discarded"; 
              }
              elseif($rows['Received']=="Received")
              {
                echo "Received"; 
              }
              elseif($rows['Task Assigned']=="Accepted")
              {
                echo "Accepted";
              }

              ?>
              </label>
            </div>
          </div>
          
        </form>
      </div><br>
      <?php 
          }
        
      }
      ?>


    </section>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      
    </div>

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