<main class="main-wrapper">
<div id="content">

  <!-- Section -->
  
  <section  class="content-wrapper">
    <div class="container">
      <div class="row">
          <div class="col-md-5">
              <ul class="list-lined ">
                  <div class="text-left helpig-hand">
                      <h2>Get in <span> touch</span></h2>
                  </div>
                  <ul class="list-lined ">
                      <li><i class="glyphicon glyphicon-th-large"></i> Make your Free, turnkey ready website in minutes.</li>
                      <li><i class="glyphicon glyphicon-th-large"></i> Claim your custom URL NOW.</li>
                      <li><i class="glyphicon glyphicon-th-large"></i> Let the world find you through verified Directory Listings</li>
                      <li><i class="glyphicon glyphicon-th-large"></i> Free, Secure &amp; HIPAA Compliant  Email with 250 MB attachment capability.</li>
                      <li><i class="glyphicon glyphicon-th-large"></i> Free Classifieds&mdash;posted by doctors, viewed by doctors.</li>
                      <li><i class="glyphicon glyphicon-th-large"></i> Find your soul-mate or a casual date from the profession of your choice.</li>
                  </ul>
                  <span class="i-before"></span>
              </ul>
          </div>


          <div class="col-lg-7 col-lg-push-1">
              <?php if(!empty($this->session->flashdata('msg'))){
                  echo $this->session->flashdata('msg');
              }?>
              <?php echo $this->session->flashdata('error_msg'); ?>
              <div class="text-left helpig-hand contact-us">
                  <h2>Contact With<span> Us</span></h2>
              </div>

              <form action="<?php echo base_url('home/contact'); ?>" class="contact-form validate-form" id="contact-form" method="POST"
                    data-message-error="Opps... Something went wrong - please try again later"
                    data-message-success="Thank you form your message! We will answer within 24 hours."
              >

                  <div class="form-group col-sm-6">
                      <input name="name" id="name" type="text" class="form-control" placeholder="Name" required>
                  </div>
                  <div class="form-group col-sm-6">
                      <input name="email" id="email" type="text" class="form-control" placeholder="E-mail address" required>
                  </div>

                  <div class="form-group col-sm-12">
                      <textarea name="message" id="message" cols="30" rows="9" class="form-control" placeholder="Message" required></textarea>
                  </div>
                  <div class="row">
                      <div class="col-md-12 col-sm-6">
                          <button type="submit" class="btn   btn-yellow"><span>Send it <i class="i-after ti-arrow-right"></i></span></button>
                      </div>
                  </div>

              </form>
          </div>

      </div>
    </div>
  </section>
</div>
</main>
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