<style>

@media only screen and (max-width: 700px) {
       
}


    </style>
<!-- Page Title -->
<!-- Page Title -->
<div id="" class="page-title page-title-3 bg-black dark text-facebook2">
  <div class="bg-image"><img src="<?php echo base_url();?>front/img/photos/stock-photo-medical-student-smiling-at-the-camera.jpg" alt=""></div>
  <div class="container">
    <h1 class="cont">Contact Us</h1>
  </div>
  <div class="breadcrumb-wrapper border-top">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="index.html">Home Page</a></li>
        <li class="active">Contact Us</li>
      </ol>
    </div>
  </div>
</div>
<!-- Page Title / End -->
<!-- Content -->
<div id="content">

  <!-- Section -->
  
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <ul class="list-lined ">

            <h3>Get in touch!</h3>
            <li><i class="ti-check  i-before"></i>Make your Free, turnkey ready website in minutes.</li>
            <li><i class="ti-check  i-before"></i>Claim your custom URL NOW.</li>
            <li><i class="ti-check  i-before"></i>Let the world find you through verified Directory Listings</li>
            <li><i class="ti-check  i-before"></i>Free, Secure &amp; HIPAA Compliant  Email with 250 MB attachment capability.</li>
            <li><i class="ti-check  i-before"></i>Free Classifieds&mdash;posted by doctors, viewed by doctors.</li>
            <li><i class="ti-check  i-before"></i>Find your soul-mate or a casual date from the profession of your choice.</li>
            
            <span class="i-before"></span>
        </ul>
        </div>
        <div class="col-lg-8 col-lg-push-1 col-md-9">
          <h3>Would you like to join to our team? Check our current openings...</h3>
          <form class="contact-form validate-form" id="contact-form" method="POST" 
          data-message-error="Opps... Something went wrong - please try again later"
          data-message-success="Thank you form your message! We will answer within 24 hours."
          >
            <div class="row">
              <div class="form-group col-sm-6">
                <input name="name" id="name" type="text" class="form-control" placeholder="Name" required>
              </div>
              <div class="form-group col-sm-6">
                <input name="email" id="email" type="text" class="form-control" placeholder="E-mail address" required>
              </div>
            </div>
            <div class="form-group">
              <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <button type="submit" class="btn btn-filled btn-info-cust"><span>Send it <i class="i-after ti-arrow-right"></i></span></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


</div>
<!-- Content / End -->
<script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCdthlhhiCJvx5SrR2eSDHhUHHZXBcTlg&callback=initMap">
    </script>