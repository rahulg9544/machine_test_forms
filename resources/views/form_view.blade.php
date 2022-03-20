<!DOCTYPE html>
<html lang="en">

<head>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Forms</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
         
          <li><a class="nav-link scrollto" href="/">Home</a></li>
          @auth
            
            <li class="dropdown"><a href="#"><span>Form</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="/home">Add Form</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="/logout">Logout</a></li>
          @else
            <li><a class="nav-link scrollto " href="/register">Register</a></li>
            <li><a class="nav-link scrollto" href="/login">Login</a></li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  

  <main id="main">

   
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
    <div class="container">
      <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">

            <div class="form">

              <h4>Add Form</h4>


            
            <div id="form-create">  
              
            </div>
               
        <br>
        <input type="hidden" name="field_count" id="field_count" value="1" />
        <input type="hidden" name="static_field_count" id="static_field_count" value="1" />
   

            </div>

          </div>
          @auth
          <div class="col-lg-3"><button type="button" style="background-color:red" title="delete"  onclick="deleteForm()">Delete This Form</button></div>
          @endauth
        </div>

</div>
    </section><!-- End Services Section -->

    

  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/view_form.js"></script>

</body>

</html>