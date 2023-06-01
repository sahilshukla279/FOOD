<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql3 = "SELECT Pincode FROM reg_tb";
    $result3 = $conn->query($sql3); 

    $sql4 = "SELECT Pincode FROM volunteer_tb";
    $result4 = $conn->query($sql4); 
    

    if(isset($_POST['donate']))
    { 

                    
                  // define variables and set to empty values
                  $fname = $lname= $phone = $address = $address2 = $town = $city = $state =$pincode = $dtype = $weight = "";

                  $Did = $_SESSION['Dkey'];
                  $fname = $_POST["fname"];
                  $lname = $_POST["lname"];
                  $phone = $_POST["phonenumber"];
                  $address = $_POST["address1"];
                  $address2 = $_POST["address2"];
                  $town = $_POST["town"];
                  $city = $_POST["city"];
                  $state = $_POST["state"];
                  $pincode = $_POST["pincode"];
                  $dtype = $_POST["dtype"];
                  $weight = $_POST["approxweight"];

                
                if($result4->num_rows > 0)
                { 
                  // output data of each row
                  while($row = $result4->fetch_assoc()) 
                  {  
                      $volpin = $row['Pincode'];
                      $add = $pincode + 1;
                      $sub = $pincode - 1;
                      
                      if($volpin == $pincode || $volpin == $add || $volpin == $sub)
                      { 

                  
                          $sql = "INSERT INTO donation_tb 
                          (`Did`,`First Name`, `Last Name`, `Phone`,`Address 1`, `Address 2`,`Town`,`City`,`State`,`Pincode`,`Donation Type`, `Weight`)
                          VALUES ('$Did','$fname', '$lname', '$phone','$address','$address2', '$town', '$city', '$state', '$pincode', '$dtype', '$weight')";

                            if ($conn->query($sql) === TRUE) 
                            {
                              echo '<script type="text/javascript">'; 
                              echo 'alert("Donation Form Filled Succesfully!");'; 
                              echo 'window.location.href = "history.php";';
                              echo '</script>';
                              } 
                              else 
                              {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                              }
                          $sql1 = "SELECT * FROM donation_tb ORDER BY Dnid DESC LIMIT 1";
                          $result = $conn->query($sql1); 
                          if ($result->num_rows > 0) 
                          {
                              while($row = $result->fetch_assoc())
                                  { 
                                    $Vid = "";
                                    $tass = "";
                                    $rec = "";
                                    $don = "";
                                    $dnid = $row['Dnid']; 
                                  }
                                $sql2 = "INSERT INTO vassign_tb 
                                    (`Dnid`,`Did`,`Vid`,`First Name`, `Last Name`, `Phone`,`Address 1`, `Address 2`,`Town`,`City`,`State`,`Pincode`,`Donation Type`, `Weight`,`Task Assigned`,`Received`,`Donated`)
                                    VALUES ('$dnid','$Did','$Vid','$fname', '$lname', '$phone','$address','$address2', '$town', '$city', '$state', '$pincode', '$dtype', '$weight','$tass','$rec','$don')";
                                    $conn->query($sql2);
                          }
                          return false;
                      }
                      elseif($result3->num_rows > 0)
                      { 
                        // output data of each row
                        while($row5 = $result3->fetch_assoc()) 
                        { 
                            $regpin = $row5['Pincode']; //6
                            $regadd1 = $pincode + 1;
                            $regsub1 = $pincode - 1;
                            $regadd2 = $pincode + 2;
                            $regsub2 = $pincode - 2;
                            $regadd3 = $pincode + 3;
                            $regsub3 = $pincode - 3;
                            $regadd4 = $pincode + 4;
                            $regsub4 = $pincode - 4;
                            $regadd5 = $pincode + 5;
                            $regsub5 = $pincode - 5;
                            
        
        
                                //6       //2         //6        //7          //6       //-3
                            if($regpin == $pincode || $regpin == $regadd1 || $regpin == $regsub1 || $regpin == $regadd2 || $regpin == $regsub2 || $regpin == $regadd3 || $regpin == $regsub3 || $regpin == $regadd4 || $regpin == $regsub4 || $regpin == $regadd5 || $regpin == $regsub5)
                            { 

                                  $sql = "INSERT INTO donation_tb 
                                  (`Did`,`First Name`, `Last Name`, `Phone`,`Address 1`, `Address 2`,`Town`,`City`,`State`,`Pincode`,`Donation Type`, `Weight`)
                                  VALUES ('$Did','$fname', '$lname', '$phone','$address','$address2', '$town', '$city', '$state', '$pincode', '$dtype', '$weight')";

                                    if ($conn->query($sql) === TRUE) 
                                    {
                                      echo '<script type="text/javascript">'; 
                                      echo 'alert("Donation Form Filled Succesfully!");'; 
                                      echo 'window.location.href = "history.php";';
                                      echo '</script>';
                                      } 
                                      else 
                                      {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                      }
                                  $sql1 = "SELECT * FROM donation_tb ORDER BY Dnid DESC LIMIT 1";
                                  $result = $conn->query($sql1); 
                                  if ($result->num_rows > 0) 
                                  {
                                      while($row = $result->fetch_assoc())
                                          { 
                                            $Vid = "";
                                            $tass = "";
                                            $rec = "";
                                            $don = "";
                                            $dnid = $row['Dnid']; 
                                          }
                                        $sql2 = "INSERT INTO vassign_tb 
                                            (`Dnid`,`Did`,`Vid`,`First Name`, `Last Name`, `Phone`,`Address 1`, `Address 2`,`Town`,`City`,`State`,`Pincode`,`Donation Type`, `Weight`,`Task Assigned`,`Received`,`Donated`)
                                            VALUES ('$dnid','$Did','$Vid','$fname', '$lname', '$phone','$address','$address2', '$town', '$city', '$state', '$pincode', '$dtype', '$weight','$tass','$rec','$don')";
                                            $conn->query($sql2);
                                  }
                                  return false;
                            }
                          }
                          if($regpin != $pincode)
                          {
                            echo '<script type="text/javascript">'; 
                            echo 'alert("We are really sorry for your inconvienice. There is no service available in your area.");'; 
                            echo 'window.location.href = "donor_form.php";';
                            echo '</script>';
                            return false;

                          }
                      
                      }
                    }

                  }
    }

      $conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Food Offerings & Other Donations | Donation Form</title>
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
          <li><a class="nav-link" href="index.php">Home</a></li>
          <li><a class="nav-link" href="history.php">History</a></li>
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
          <h2>Donation Form</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Donor Form</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container shadow p-3 mb-3 bg-white rounded">
        <form  action="" method="post">
          <div class="form-row mt-3">
            <div class="form-group col-md-4">
              <label for="fname">First Name <span style="color:red">*</span></label>
              <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required>
              
            </div>
            <div class="form-group col-md-4">
              <label for="lname">Last Name<span style="color:red">*</span></label>
              <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required>
              
            </div>
            <div class="form-group col-md-4">
              <label for="phonenumberr">Phone Number<span style="color:red">*</span></label>
              <input type="number" class="form-control" name="phonenumber" id="phonenumber" placeholder="Phone Number" required>
              
            </div>
          </div>
          <div class="form-group">
            <label for="address1">Address 1<span style="color:red">*</span></label>
            <input type="text" class="form-control" name="address1" id="address1" placeholder="Apartment, studio, or floor"
              required>
            
          </div>
          <div class="form-group">
            <label for="address2">Address 2</label>
            <input type="text" class="form-control" name="address2" id="address2" placeholder="Street,Area">
          </div>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="town">Town<span style="color:red">*</span></label>
              <input type="text" class="form-control" name="town" id="town" placeholder="Enter Town" required>
             
            </div>
            <div class="form-group col-md-3">
              <label for="city">City<span style="color:red">*</span></label>
              <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" required>
              
            </div>
            <div class="form-group col-md-3">
              <label for="state">State<span style="color:red">*</span></label>
              <select id="state" name="state" class="form-control" required>
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
              <label for="pincode">Pin code<span style="color:red">*</span></label>
              <input type="number" class="form-control" name="pincode"  id="pincode" placeholder="Enter Pin Code" required>
              
            </div>
          </div>


          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="dtype">Donation Type<span style="color:red">*</span></label>
              <select id="dtype" name="dtype" class="form-control" required>
                <option selected>Choose...</option>
                <option>Food</option>
                <option >Clothes</option>
                <option >Utensils</option>
                <option >Other Items</option>
              </select>
             
            </div>

            <div class="form-group col-md-6">
              <label for="approxweight">Approx. Weight<span style="color:red">*</span></label>
              <input type="number" class="form-control" name="approxweight" id="approxweight" placeholder="Approx. weight in kg"
                required>
            </div>



          </div><br>

          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck" required>
              <label class="form-check-label" for="gridCheck">
                <span style="color:red">*</span>I here by donate the specified item as mentioned above in safe
                and hygenic quality for a noble cause with accepting all the covid-19
                guidelines.
              </label>
            </div>
          </div><br>
          <div class="p-3 mb-4">

            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-lg" id="donate" name="donate"
                style="background:rgb(116, 115, 169); color:white; border:1px rgb(116, 115, 169); ">Donate</button>
            </div>

          </div>
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