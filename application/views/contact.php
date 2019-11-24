<ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li class="active"><a href="#">Contact With Us</a></li>

</ol>



    <div class="container">
      <div class="row">



          <div class="col-lg-7">
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

                      <div class="col-md-12 col-sm-6">
                          <button type="submit" class="btn btn-info btn-yellow "><span>Send it <i class="i-after ti-arrow-right"></i></span></button>
                      </div>
                 

                  <div class="form-group col-sm-12">

                      </div>

              </form>
          </div>

      </div>
    </div>


