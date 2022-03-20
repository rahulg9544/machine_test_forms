<!DOCTYPE html>
<html lang="en">

<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@include('header')
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
  <section id="about" class="about">

<div class="container" data-aos="fade-up">
  <main id="main">
    <div class="container">
      <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">

            <div class="form">

              <h4>Add Form</h4>


              <form id="service_form" method="POST" action="api/html_fields/">
                
                <div id="form-create">  
                <div class="form-group">
                  <label><b>Form Name</b></label>
                  <input type="text" name="form_label" class="form-control" id="form_label" placeholder="Form Name" required>
                </div>

                <div class="form-group">
                    <div class="row">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-2"><label>&nbsp;</label>
                    <div class="text-center"><button type="button" onclick="addmores();" style="background-color:green">Add More</button></div>
                    </div>
                    </div>
                </div>
                
                
            <!-- <div class="form-group">
                <div class="row">
                <div class="col-md-5"><label><b>Select HTML Field</b></label>
                <select class="form-control sel-html-field" attr-count="1" id="html_field1" name="html_field[]">
                <option value="1" selected>Text Field</option>
                <option value="2">Text Field (Numbers Only)</option>
                <option value="3">Select Box</option>
                </select>
                </div>
                <div class="col-md-5"><label><b>Label Name</b></label>
                <input type="text" name="form_name[]" class="form-control" id="form_name1" attr-count="1" placeholder="Label Name" required>
                </div>
                <div class="col-md-2"><label>&nbsp;</label>
                <div class="text-center"></div>
                </div>

                </div>

                <div class="row" >
                <div class="col-md-1"></div>
                <div class="col-md-4"><label>&nbsp;</label>
                <input type="text" name="select_option_value1[]" class="form-control" id="select_option_value1" attr-count="1" placeholder="Value" >
                </div>
                <div class="col-md-4"><label>&nbsp;</label>
                <input type="text" name="select_option_label1[]" class="form-control" id="select_option_label1" attr-count="1" placeholder="Label" >
                </div>
                <div class="col-md-1"><label>&nbsp;</label>
                <div class="text-center"><button type="button" onclick="addmoreoption();">+</button></div>
                </div>
                
                </div>
                <div class="row" >
                <div class="col-md-1"></div>
                <div class="col-md-4"><label>&nbsp;</label>
                <input type="text" name="select_option_value1[]" class="form-control" id="select_option_value1" attr-count="1" placeholder="Value" >
                </div>
                <div class="col-md-4"><label>&nbsp;</label>
                <input type="text" name="select_option_label1[]" class="form-control" id="select_option_label1" attr-count="1" placeholder="Label" >
                </div>
                <div class="col-md-1"><label>&nbsp;</label>
                <div class="text-center"><button type="button" onclick="addmoreoption();">+</button></div>
                </div>
                
                </div>
                
            </div> -->


                <div class="append-data">
                
                </div>
            </div>
               
        <br>
        <input type="hidden" name="field_count" id="field_count" value="1" />
        <input type="hidden" name="static_field_count" id="static_field_count" value="1" />
        <div class="text-center"><button type="submit" title="Send Message">Submit</button></div>
    </form>


            </div>

          </div>

        </div>

      </div>
</section>
</div>
  </main>



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/add_form.js"></script>

</body>

</html>
