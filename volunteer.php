<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);
    $key = $_SESSION['Vkey'];
    $sql = "SELECT * FROM volunteer_tb WHERE Vid='$key';";
    $sql1 = "SELECT * FROM donation_tb";
    $sql2 = "SELECT * FROM reg_tb";
    $sql3 = "SELECT * FROM vassign_tb WHERE Vid=0";
    $result = $conn->query($sql); 
    $result1 = $conn->query($sql1); 
    $result2 = $conn->query($sql2);
    $result4 = $conn->query($sql3); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Food Offerings & Other Donations | Volunteer</title>
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
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
    function Decline() {
      document.getElementById('c1').style.display = "none";
      document.getElementById("s1").innerHTML = "<center>" + "No Jobs Available!!!" + "<br><br>";
    }

    function Accept() {
      document.getElementById("msg").innerHTML = "<center>" + "Accepted!!!" + "<br><br>";
      document.getElementById('b1').style.display = "none"
      document.getElementById('b2').style.display = "block";
      document.getElementById('don').style.display = "none";
      document.getElementById('don').disabled = true;

    }
    function Received() {
      document.getElementById("msg").innerHTML = "<center>" + "Recieved!!!" + "<br><br>";
      document.getElementById('don').style.display = "block";
      document.getElementById('validate').style.display = "block";
      document.getElementById('receive').style.display = "none";
      document.getElementById('discard').style.display = "none";
      document.getElementById('don').disabled = false;

    }
    function Donated() {
      document.getElementById("msg").innerHTML = "<center>" + "Item Succesfully Donated!!!" + "<br><br>";
      document.getElementById('don').style.display = "none";
      document.getElementById('msgg').style.display = "none";
    }
    function Discard(){
      document.getElementById("msg").innerHTML = "<center>" + "Task Discarded!!!" + "<br><br>";
      document.getElementById('receive').style.display = "none";
    }
    function Validate() {
      document.getElementById("msgg").innerHTML = "<center>" + "Item Succesfully Validated!!!" + "<br><br>";
      document.getElementById('validate').style.display = "none";
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
          <li><a class="getstarted" href="logout.php">Logout</a></li>

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
          <h2>Donor Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Volunteer</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->



    <section class="inner-page" id="s1">
      <span id="span1"><center>No Jobs Available!!!<br><br></center></span>
      <?php 
          $i =0;
          if ($result->num_rows > 0) 
          {    
           if($result1->num_rows > 0)
              { 
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {  
                  while($row1 = $result1->fetch_assoc())
                    {
                          $volpin = $row['Pincode'];
                          $donpin = $row1['Pincode'];
                          $donweight = $row1['Weight'];
                          
                          if($volpin == $donpin || $volpin == $donpin + 1 || $volpin == $donpin - 1  && $donweight <= '5')
                          { 
                           
                              
      ?>
      <div class="container shadow p-3 mb-3 bg-white rounded" id="c1">
        <script>
          document.getElementById('span1').style.display = 'none';
        </script>
        <form action="accept.php" method="post" name="aform" id="aform">
        <input style="display:none" type="text" class="form-control" name="did" id="did" readonly value=" <?php echo $row1['Did']; ?>">
        <input style="display:none" type="text" class="form-control" name="dnid" id="dnid" readonly value=" <?php echo $row1['Dnid']; ?>">
          <div class="form-row mt-3 font-weight-bold">
            <div class="form-group col-md-4">
              <label for="inputFName">First Name:</label>
              <input type="text" class="form-control" name="fname" id="fname" readonly value=" <?php echo $row1['First Name']; ?>"> 
            </div>
            <div class="form-group col-md-4">
              <label for="inputLName">Last Name:</label>
              <input type="text" class="form-control" name="lname" id="lname" readonly value="<?php echo $row1['Last Name']; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="inputPhoneNumber">Phone Number:</label>
              <input type="number" class="form-control" name="phone" id="phone" readonly value="<?php echo $row1['Phone']; ?>">
            </div>
          </div>
          <div class="form-row font-weight-bold">
          <div class="form-group col-md-6">
            <label for="inputAddress">Address 1:</label>
            <input type="text" class="form-control" name="address1" id="address1" readonly value="<?php echo $row1['Address 1']; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress2">Address 2:</label>
            <input type="text" class="form-control" name="address2" id="address2" readonly value="<?php echo $row1['Address 2']; ?>">
          </div>
          </div>
          <div class="form-row font-weight-bold">
            <div class="form-group col-md-3">
              <label for="inputTown">Town:</label>
              <input type="text" class="form-control" name="town" id="town" readonly value="<?php echo $row1['Town']; ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="inputCity">City:</label>
              <input type="text" class="form-control" name="city" id="city" readonly value="<?php echo $row1['City']; ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">State:</label>
              <input type="text" class="form-control" name="state" id="state" readonly value="<?php echo $row1['State']; ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="inputPincode">Pin code:</label>
              <input type="number" class="form-control" name="pincode" id="pincode" readonly value="<?php echo $row1['Pincode']; ?>">
            </div>
          </div>
          <div class="form-row font-weight-bold">
            <div class="form-group col-md-6">
              <label for="inputDtype">Donation Type:</label>
              <input type="text" class="form-control" name="dtype" id="dtype" readonly value="<?php echo $row1['Donation Type']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="inputApproxWeight">Approx. Weight:</label>
              <input type="number" class="form-control" name="weight" id="weight" readonly value="<?php echo $row1['Weight']; ?>">
            </div>
          </div><br>
          <div class="p-3 mb-4">
            <span id="msg" style="color:green; font-size:20px; font-weight:bold"></span>
            <span id="msgg" style="color:green; font-size:20px; font-weight:bold"></span>

            <div class="text-center" id="b1">
              <button type="submit" name="accept"  id="accept" class="btn btn-success btn-lg mr-5" onclick="Accept()">Accept</button>
              <button type="button" name="decline" id="decline" class="btn btn-danger btn-danger btn-lg" onclick="Decline()">Decline</button>
            </div>

            </form>
            <div class="text-center" id="b2" style="display:none">
            <form action="receive.php" method="post" name="rform" id="rform">
              <button type="submit" name="receive" id="receive" class="btn btn-primary btn-lg" onclick="Received()">Received</button>
            </form><br>
            <form action="discard.php" method="post" name="disform" id="disform">
              <button type="submit" name="discard" id="discard" class="btn btn-danger btn-primary btn-lg" onclick="Discard()">Discard</button>
            </form><br>
            <center><form action="donate.php" method="post" name="dform" id="dform">
              <button type="submit" name="don" id="don" class="btn btn-primary btn-lg" onclick="Donated()">Donated</button>
              </form></center>
            
          </div><br><br><br>

      <div class="container p-3 mb-3 bg-white rounded" style="font-size: 20px; display: none;" id="validate">
        <form  action="validate.php" method="post" name="vform" id="vform">
          <input style="display:none" type="text" class="form-control" name="dnid" id="dnid" readonly value=" <?php echo $row1['Dnid']; ?>">
            <div class="form-group m-3">
              <label for="visibility"><b>Q1. The visual state of food that has been donated </b><span style="color:red">*</span></label><br><br>
              <select id="visibility" name="visibility" class="form-control" required>
                <option selected>Choose...</option>
                <option>Excellent</option>
                <option >Good</option>
                <option >Bad</option>
              </select>
              
            </div><hr>
            <div class="form-group m-3">
              <label for="odour"><b>Q2. The odour of food that has been donated  </b><span style="color:red">*</span></label><br><br>
              <select id="odour" name="odour" class="form-control" required>
                <option selected>Choose...</option>
                <option>Excellent</option>
                <option >Good</option>
                <option >Bad</option>
              </select>
              
            </div><hr>
            <div class="form-group m-3">
              <label for="texture"><b>Q3. The texture of the food that has been donated </b> <span style="color:red">*</span></label><br><br>
              <select id="texture" name="texture" class="form-control" required>
                <option selected>Choose...</option>
                <option>Excellent</option>
                <option >Good</option>
                <option >Bad</option>
              </select>
              
            </div><hr>
            <div class="form-group m-3">
              <label for="taste"><b>Q4. The taste of the food that has been donated </b><span style="color:red">*</span></label><br><br>
              <select id="taste" name="taste" class="form-control" required>
                <option selected>Choose...</option>
                <option>Excellent</option>
                <option >Good</option>
                <option >Bad</option>
              </select>
              
            </div><hr>
            

          <div class="form-group m-3" style="font-size: 14px;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck" required>
              <label class="form-check-label" for="gridCheck">
                <span style="color:red">*</span>I here by validate the specified item as mentioned above in safe
                and hygenic quality for a noble cause with accepting all the covid-19
                guidelines.
              </label>
            </div>
          </div><br>
          <div class="p-3 mb-4">

            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-lg" id="validate" name="validate"
                style="background:rgb(116, 115, 169); color:white; border:1px rgb(116, 115, 169);" onclick="Validate()" >Validate</button>
            </div>

          </div>
        </form>
      </div>
        
        
        <script>
                $( "#accept" ).click(function() {

                    $("#aform").submit(function (event) {
                        event.preventDefault();
                    
                    $.post(
                          'accept.php',
                          {
                              did: $("#did").val(),
                              dnid: $("#dnid").val(),
                              accept: $("#accept").val(),
                              fname: $("#fname").val(),
                              lname: $("#lname").val(),
                              phone: $("#phone").val(),
                              address1: $("#address1").val(),
                              address2: $("#address2").val(),
                              town: $("#town").val(),
                              city: $("#city").val(),
                              state: $("#state").val(),
                              pincode: $("#pincode").val(),
                              dtype: $("#dtype").val(),
                              weight: $("#weight").val() 
                          }
                          
                            );
                        });
                });
        </script>
        <script>
                $( "#receive" ).click(function() {

                    $("#rform").submit(function (event) {
                        event.preventDefault();

                    $.post(
                          'receive.php',
                          {
                              did: $("#did").val(),
                              dnid: $("#dnid").val(),
                              receive: $("#receive").val(),

                          }
                          
                            );
                        });
                    });       
        </script>
        <script>
                $( "#discard" ).click(function() {

                    $("#disform").submit(function (event) {
                        event.preventDefault();

                    $.post(
                          'discard.php',
                          {
                              did: $("#did").val(),
                              dnid: $("#dnid").val(),

                          }
                          
                            );
                        });
                    });       
        </script>
        <script>
                $( "#don" ).click(function() {

                    $("#dform").submit(function (event) {
                        event.preventDefault();

                    $.post(
                          'donate.php',
                          { 
                              did: $("#did").val(),
                              dnid: $("#dnid").val(),
                              don: $("#don").val(),

                          }
                          
                            );
                        });
                    });
                    
                  
        </script>
        <script>
                    $("#vform").submit(function (event) {
                        event.preventDefault();

                    $.post(
                          'validate.php',
                          { 
                              dnid: $("#dnid").val(),
                              visibility: $("#visibility").val(),
                              odour: $("#odour").val(),
                              texture: $("#texture").val(),
                              taste: $("#taste").val() 

                          }
                          
                            );
                        });
                    
                  
        </script>


      </div>
      <?php 
          break;
        } 

    }
  }
}      
}

?>
      


    </section>


    


                  
    


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" >

  
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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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