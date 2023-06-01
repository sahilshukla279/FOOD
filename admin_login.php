<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    $email = $_POST["emailid"];
    $pass = $_POST["password"];
    $key = "admin";
   
    $sql = "SELECT Email, Password FROM admin_tb";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            if ($email == $row["Email"] && $pass == $row["Password"])
            {
                echo "Login successfully";
                $_SESSION['Akey'] = $key;
                header("Location: aform.php");
                exit();
            }
            else
            {
                echo '<script type="text/javascript">'; 
                echo 'alert("Invalid Credentials!");'; 
                echo 'window.location.href = "admin_login.php";';
                echo '</script>';

            }
        }
    } 
    else 
    {
        echo "<script>alert('Invalid Credentials!')</script>";

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
          <h2>Admin | Login Page</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Admin | Login Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">

      <!-- --------------------------------------------------------------
            # LOGIN
      -------------------------------------------------------------- -->
      <div class="container shadow p-3 mb-5 bg-white rounded" id="login" style="width: 500px; height: auto;">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
          <h1 class="mt-2" style="color:rgb(116, 115, 169); ">
            <center>LOGIN</center>
          </h1>
          <div class="form-group">
            <label class="mb-3 mt-3" for="emailid">Email address</label>
            <input type="email" class="form-control mb-3" name="emailid" id="emailid" aria-describedby="emailHelp"
              placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label class="mb-3" for="password">Password</label>
            <input type="password" class="form-control mb-3" name="password" id="password" placeholder="Password"
              required>
          </div>
          <center>
            <button type="submit" class="btn btn-primary btn-lg mt-3 mb-3"
              style="background:rgb(116, 115, 169); color:white; border:1px rgb(116, 115, 169); ">Login</button><br>

          <a  href="qrlogin.html">  <button type="button" onclick="qrcode()" class="btn btn-lg mt-1 mb-3"
              style="background:white; color:rgb(116, 115, 169); border:0px;"><i>Login Using QR Code</i></button></a>
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