<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";


    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql11 = "SELECT * FROM donation_tb";
    $sql21 = "SELECT * FROM reg_tb";
    $sql31 = "SELECT * FROM vassign_tb WHERE Vid=0";
    $result11 = $conn->query($sql11); 
    $result21 = $conn->query($sql21);
    $result41 = $conn->query($sql31);

    while($row11 = $result11->fetch_assoc())
    {
          $row61=$result41->fetch_assoc();
          $dnid = $row61["Dnid"];
                

          if($result21->num_rows > 0)
          { 
            // output data of each row
            while($row51 = $result21->fetch_assoc()) 
            { 
                $regpin = $row51['Pincode']; //6
                $donpin = $row11['Pincode']; //2
            
                for ($x = 1; $x <= 5; $x++)
                {
                    if($regpin == $donpin || $regpin == $donpin + $x || $regpin == $donpin - $x )
                    { 
                      $Rid = $row51['Rid'];
                      $tass = "Accepted";
                      $rec = "-";
                      $don = "-";
                      $sql100 = "UPDATE `vassign_tb` SET `Vid`='$Rid',`Task Assigned`='$tass',`Received`='$rec',`Donated`='$don' WHERE `Dnid`='$dnid'";
                      $conn->query($sql100);

                      $sql200 = "DELETE FROM `donation_tb` WHERE `Dnid`= '$dnid'";
                      $conn->query($sql200);
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
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
          <li><a class="nav-link" href="regvol.php">Register Volunteer</a></li>
          <li class="dropdown" style="color:rgb(116, 115, 169);">
            <a><span id="user">Details</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="ddetails.php">Donor</a></li>
              <li><a href="vdetails.php">Helper Volunteers</a></li>
              <li><a href="rdetails.php">Organization Volunteers</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="qrcode.html">Generate QR Code</a></li>
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
          <h2>Dashboard</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Admin</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <section class="inner-page">

      <div class="row mb-5" style="margin-right: 16px; margin-left: 15px;">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card card1 border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold font-primary-color text-uppercase mb-1">
                   <p> Total Donations</p></div>
                  <div class="h5 mb-0 font-weight-bold font-primary-third">90+</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x font-primary-sec"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card card1 border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold font-primary-color text-uppercase mb-1">
                    Total Donor</div>
                  <div class="h5 mb-0 font-weight-bold font-primary-third">3+</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x font-primary-sec"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card card1 border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold font-primary-color text-uppercase mb-1">Helper Volunteer
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold font-primary-third">3+</div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-user fa-2x font-primary-sec"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card card1 border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold font-primary-color text-uppercase mb-1">
                    Organization Volunteer</div>
                  <div class="h5 mb-0 font-weight-bold font-primary-third">5+</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-user fa-2x font-primary-sec"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-5" style="margin-right: 16px; margin-left: 15px;">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4" style="height:325px;">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold font-primary-color">Donation Overview</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" style="padding: 1.25rem;">
              <div class="chart-area" style="height:210px;">
                <canvas id="myAreaChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold font-primary-color">Revenue Sources</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
              </div>
              <div class="mt-4 text-center small">
                <span class="mr-2">
                  <i class="fas fa-circle text-primary"></i> Organization Volunteer
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-success"></i> Donor
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-info"></i> Helper Volunteer
                </span>
                <style>
                  .font-primary-color{
                        color: #7473a9;
                  }
                  .font-primary-sec{
                        color:  #a1a0c5;
                  }
                  .font-primary-third{
                        color: #4e4e7e;
                  }
                  .card1:hover{
                    background-color: #efeff5;
                    color: #fff;
                    transition:0.3s;
                  }
              
                </style>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card shadow mb-5" style="margin-right:30px; margin-left:30px">
        <div class="card-header py-3 mb-5">
          <h6 class="m-0 font-weight-bold font-primary-color">Donor & Volunteer Registration</h6>
        </div>
        <div class="card-body"style="height:400px;">
          <div class="chart-bar" style="height:350px;">
            <canvas id="myBarChart"></canvas>
          </div>
        </div>
      </div>




      <div class="container shadow p-3 mb-3 bg-white rounded table-responsive" style="margin-top:5%;max-width:96%;margin-left:30px;margin-right:30px">
        <table class="table w-auto text-nowrap">
        <h2 class="m-2 font-weight-bold font-primary-color">Donation Details</h2>
          <thead>
            <tr>
              <th scope="col">Donation Id</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Donor Phone No.</th>
              <th scope="col">Address 1</th>
              <th scope="col">Address 2</th>
              <th scope="col">Donor Town</th>
              <th scope="col">Donor City</th>
              <th scope="col">Donor State</th>
              <th scope="col">Donor Pincode</th>
              <th scope="col">Donation Type</th>
              <th scope="col">Weight in kg</th>
              <th scope="col">Volunteer Name</th>
              <th scope="col">Volunteer Phone No.</th>
              <th scope="col">Volunteer Town</th>
              <th scope="col">Volunteer Pincode</th>
              <th scope="col">Task Assigned</th>
              <th scope="col">Recieved</th>
              <th scope="col">Donated</th>
            </tr>
          </thead>
          <tbody>
            <?php 

          
    $sql1 = "SELECT * FROM vassign_tb";
    $result1 = $conn->query($sql1); 
    
      if ($result1->num_rows > 0)
      {
          // output data of each row
          $row1 = $result1->fetch_all(MYSQLI_ASSOC);
          foreach ($row1 as $rows) 
          {
                if(empty($rows["Vid"]))
                {
                }
                else
                {
                      $Vid = $rows["Vid"];
                      $sql = "SELECT * FROM `volunteer_tb` WHERE `Vid` = '$Vid'";
                      $sql2 = "SELECT * FROM `reg_tb` WHERE `Rid` = '$Vid'";

                        $result = $conn->query($sql);
                        $rows3 = $result->fetch_assoc();
                        $result5 = $conn->query($sql2);
                        $rows5 = $result5->fetch_assoc();
                        
                
                }
    
    ?>
            <tr>
              <th scope="row">
                <?php echo $rows['Dnid']; ?>
              </th>
              <td>
                <?php echo $rows['First Name']; ?>
              </td>
              <td>
                <?php echo $rows['Last Name']; ?>
              </td>
              <td>
                <?php echo $rows['Phone']; ?>
              </td>
              <td>
                <?php echo $rows['Address 1']; ?>
              </td>
              <td>
                <?php echo $rows['Address 2']; ?>
              </td>
              <td>
                <?php echo $rows['Town']; ?>
              </td>
              <td>
                <?php echo $rows['City']; ?>
              </td>
              <td>
                <?php echo $rows['State']; ?>
              </td>
              <td>
                <?php echo $rows['Pincode']; ?>
              </td>
              <td>
                <?php echo $rows['Donation Type']; ?>
              </td>
              <td>
                <?php echo $rows['Weight']; ?>
              </td>
              <td>
                <?php 
                  if(empty($rows["Vid"]))
                  {
                  
                  }
                  elseif(isset($rows3))
                  {
                      if(empty($rows3['First Name']))
                      {
                            
                      }
                      else
                      {
                        echo $rows3['First Name'] . ' ' . $rows3['Last Name']; 
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
              </td>
              <td>
                <?php 
                  if(empty($rows["Vid"]))
                  {
                  
                  }
                  elseif(isset($rows3))
                  {
                      if(empty($rows3['Phone Number']))
                      {
                            
                      }
                      else
                      {
                        echo $rows3['Phone Number']; 
                      }
                  }
                  elseif(isset($rows5))
                  {
                    if(empty($rows5['Phone Number']))
                      {
                            
                      }
                      else
                      {
                        echo $rows5['Phone Number']; 
                      }
                  }
                  ?>
              </td>
              <td>
                <?php 
                  if(empty($rows["Vid"]))
                  {
                  
                  }
                  elseif(isset($rows3))
                  {
                      if(empty($rows3['Town']))
                      {
                            
                      }
                      else
                      {
                        echo $rows3['Town']; 
                      }
                  }
                  elseif(isset($rows5))
                  {
                    if(empty($rows5['Town']))
                      {
                            
                      }
                      else
                      {
                        echo $rows5['Town']; 
                      }
                  }
                  ?>
              </td>
              <td>
                <?php 
                  if(empty($rows["Vid"]))
                  {
                  
                  }
                  elseif(isset($rows3))
                  {
                      if(empty($rows3['Pincode']))
                      {
                            
                      }
                      else
                      {
                        echo $rows3['Pincode']; 
                      }
                  }
                  elseif(isset($rows5))
                  {
                    if(empty($rows5['Pincode']))
                      {
                            
                      }
                      else
                      {
                        echo $rows5['Pincode']; 
                      }
                  }
                  ?>
              </td>
              <td>
                <?php echo $rows['Task Assigned']; ?>
              </td>
              <td>
                <?php echo $rows['Received']; ?>
              </td>
              <td>
                <?php echo $rows['Donated']; ?>
              </td>
            </tr>
            <?php   
          }
        
      }
      
      ?>
          </tbody>
        </table>

      </div>


<center>
      <div class="container shadow p-3 mb-3 bg-white rounded table-responsive" style="margin-top:5%;max-width:35%;margin-left:30px;margin-right:30px">
        <table class="table w-auto text-nowrap">
        <h2 class="m-2 font-weight-bold font-primary-color">Food Quality Details</h2>
          <thead>
            <tr>
              <th scope="col">Donation Id</th>
              <th scope="col">Visibility</th>
              <th scope="col">Odour</th>
              <th scope="col">Texture</th>
              <th scope="col">Taste</th>
            </tr>
          </thead>
          <tbody>
            <?php 

          
    $sql1 = "SELECT * FROM validate_tb";
    $result1 = $conn->query($sql1); 
    
      if ($result1->num_rows > 0)
      {
          // output data of each row
          $row1 = $result1->fetch_all(MYSQLI_ASSOC);
          foreach ($row1 as $rows) 
          {
                
    
    ?>
            <tr>
              <th scope="row">
                <?php echo $rows['Dnid']; ?>
              </th>
              <td>
                <?php echo $rows['Visibility']; ?>
              </td>
              <td>
                <?php echo $rows['Odour']; ?>
              </td>
              <td>
                <?php echo $rows['Texture']; ?>
              </td>
              <td>
                <?php echo $rows['Taste']; ?>
              </td>
              
            </tr>
            <?php   
          }
        
      }
      $conn->close();
      ?>
          </tbody>
        </table>

      </div>


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

  <!-- Core plugin JavaScript-->
  <script src="assets//vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/chart-area-demo.js"></script>
  <script src="assets/js/chart-pie-demo.js"></script>
  <script src="assets/js/chart-bar-demo.js"></script>
</body>

</html>