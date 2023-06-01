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
    $result2 = $conn->query($sql);

    if (isset($_GET['update']))
    {
    //define variables and set to empty values
    $fname = $lname = $email = $phone = $upid = "";

    $fname = $_GET["regfname"];
    $lname = $_GET["reglname"];
    $email = $_GET["regemailid"];
    $phone = $_GET["regphonenumber"];
    $upid = $_GET['upid'];
   
    $sql = "UPDATE `donor_tb` SET `First Name`='$fname',`Last Name`='$lname',`Email`='$email',`Phone Number`='$phone' WHERE `Did`= '$upid'";
    
    if ($conn->query($sql) === TRUE) 
    {
        echo '<script>'; 
        echo 'alert("Record Updated Successfully");'; 
        echo 'window.location.href = "ddetails.php";';
        echo '</script>';

      } 
      else 
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

  }

  if (isset($_GET['delete']))
    {
    //define variables and set to empty values
    $dlid = "";

    $dlid = $_GET['dlid'];
   
    $sql = "DELETE FROM `donor_tb` WHERE `Did`= '$dlid'";
    
    if ($conn->query($sql) === TRUE) 
    {
        echo '<script>'; 
        echo 'alert("Record Deleted Successfully");'; 
        echo 'window.location.href = "ddetails.php";';
        echo '</script>';

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

  <title>Food Offerings & Other Donations | Admin</title>
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
          <li><a class="nav-link" href="admin.php">Dashboard</a></li>
          <li><a class="nav-link" href="regvol.php">Register Volunteer</a></li>
          <li class="dropdown" style="color:rgb(116, 115, 169);">
            <a><span id="user">Details</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="vdetails.php">Helper Volunteers</a></li>
              <li><a href="rdetails.php">Organization Volunteers</a></li>
            </ul>
          </li>
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
            <li>Admin</li>
            <li>Donor Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container p-3 mb-3 shadow bg-white rounded table-responsive">
        <table class="table text-nowrap">
          <thead>
            <tr>
              <th scope="col">Donor Id</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Email Id</th>
              <th scope="col">Password</th>
            </tr>
          </thead>
          <tbody>
            <?php 
    
    if ($result->num_rows > 0)
    {
        // output data of each row
        while($rows = $result->fetch_assoc()) 
        {
    
    ?>
            <tr>
              <th scope="row">
                <?php echo $rows['Did']; ?>
              </th>
              <td>
                <?php echo $rows['First Name']; ?>
              </td>
              <td>
                <?php echo $rows['Last Name']; ?>
              </td>
              <td>
                <?php echo $rows['Phone Number']; ?>
              </td>
              <td>
                <?php echo $rows['Email']; ?>
              </td>
              <td>
                <?php echo $rows['Password']; ?>
              </td>
            </tr>
            <?php 
                    }
                }
              ?>

          </tbody>
        </table>

      </div>

      <div class="container p-3 mb-3 bg-white rounded table-responsive">
        <h4>Select Action :</h4>
        <select class="form-select" id="myaction" onchange="action()">
          <option value="">Choose... </option>
          <option value="Update">Update</option>
          <option value="Delete">Delete</option>
        </select>

        <script>
          function action() {
            var x = document.getElementById("myaction").value;
            if (x == "Update") {
              document.getElementById("update").style.display = "block";
              document.getElementById("delete").style.display = "none";

            }
            else if (x == "Delete") {
              document.getElementById("delete").style.display = "block";
              document.getElementById("update").style.display = "none";
            }
            else {
              document.getElementById("update").style.display = "none";
              document.getElementById("delete").style.display = "none";
            }
          }


        </script>
        <br><br>
      </div>

            <!-- --------------------------------------------------------------
            # UPDATE
      -------------------------------------------------------------- -->

      <div class="container shadow p-3 mb-5 bg-white rounded" id="update"
        style="width: 600px; height: auto; display: none;">
        <form action="" method="get">
          <h1 class="mt-2 mb-3" style="color:rgb(116, 115, 169); ">
            <center>Update Record</center>
          </h1>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="regfname">Donor Id</label>
              <select class="form-select" name="upid" id="upid" onchange="myupdate(this.value)">
                <option value="">Select Id</option>
                <?php 
    
                if ($result1->num_rows > 0)
                    {
                        // output data of each row
                        while($rows = $result1->fetch_assoc()) 
                        {
                
                ?>

                <option value="<?php echo $rows['Did']; ?>">
                  <?php echo $rows['Did']; ?>
                </option>

                <?php 
                        }
                    }
                ?>

              </select>
            </div>

          </div>

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

          <center>
            <!--<span id="msg" style="color:green; font-size:20px; font-weight:bold"></span>-->
            <button type="submit" class="btn btn-primary btn-lg mt-3 mb-3" name="update"
              style="background:rgb(116, 115, 169); color:white; border:1px rgb(116, 115, 169); ">Update</button><br>
        </form>
      </div>

            <!-- --------------------------------------------------------------
            # DELETE
      -------------------------------------------------------------- -->

      <div class="container p-3 mb-3 shadow bg-white rounded table-responsive" id="delete"
        style="width: 600px; height: auto; display: none;">
        <form action="" method="get">
          <center>
            <h1 class="mt-2 mb-5" style="color:rgb(116, 115, 169); ">
              Delete Record
            </h1>

            <label for="regfname" style="font-size:20px;">Donor Id</label>
            <select class="form-select mb-5" name="dlid" id="dlid" style="width: 300px;">
              <option value="">Select Id</option>
              <?php 
    
                if ($result2->num_rows > 0)
                    {
                        // output data of each row
                        while($rows = $result2->fetch_assoc()) 
                        {
                
                ?>

              <option value="<?php echo $rows['Did']; ?>">
                <?php echo $rows['Did']; ?>
              </option>

              <?php 
                        }
                    }
                ?>

            </select>


            <center> <button type="submit" class="btn btn-primary btn-lg mt-3 mb-3" name="delete"
                style="background:rgb(116, 115, 169); color:white; border:1px rgb(116, 115, 169); ">Delete</button>

        </form>
      </div>



    </section>

    <script>

      function myupdate(data) {

            var req = new XMLHttpRequest();
            req.open("GET","dupdate.php?idvalue="+data,true);
            req.send();


            req.onreadystatechange = function() {
              
              if(req.readyState == 4 && req.status==200){

                values = req.responseText.split(",");
                document.getElementById("regfname").value=values[0];
                document.getElementById("reglname").value=values[1];
                document.getElementById("regemailid").value=values[2];
                document.getElementById("regphonenumber").value=values[3];


              }
            }


      }


    </script>






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