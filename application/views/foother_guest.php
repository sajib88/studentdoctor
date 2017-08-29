<style type="text/css">
   @media only screen and (max-width: 600px) {
    .post-mrg{
     margin-top: 245px;
    }
  }
</style>
<!-- Footer -->

 <footer id="contact" class="bg-secondary cust-footer-bg pt-50 cust-footer-text">

    <div class="container">
        <div class="row">

           <div class="col-md-4 text-left">
              <!-- Widget - Logo -->
             
             <div class="pb-30">
                         
              <ul class="page-footer-list">
                  
                  
                  <li><a href="<?php echo base_url('home'); ?>"> Home </a></li>
                    <li><a href="<?php echo base_url('home/features'); ?>"> Our FEATURES </a></li>

                    <li><a href="<?php echo base_url('home/contact'); ?>">  Contact us </a></li>
                    <li><a href="<?php echo base_url('home/terms'); ?>"> Terms  and Condition</a></li>
                    <li><a href="<?php echo base_url('home/privacy'); ?>">Privacy And Policy</a></li>

                    <li><a href="<?php echo base_url('home/disclaimer'); ?>">  Disclaimer </a></li>
                  
              </ul>
                 
            </div>
          </div>
         

            <div class="col-md-4 text-center">
              <!-- Widget - recent post -->
              <div class="widget widget-recent-posts post-mrg">
                  <h6 class="text-uppercase text-light ">Recent Posts</h6>
                  <ul class="list-posts">
                      <li>
                          <a href="#">Crazy developer ideas on 2016</a>
                          <span class="date">February 14, 2015</span>
                      </li>
                      <li>
                          <a href="#">Our road trip to London!</a>
                          <span class="date">February 14, 2015</span>
                      </li>
                      <li>
                          <a href="#">New iOS design concept</a>
                          <span class="date">February 14, 2015</span>
                      </li>
                  </ul>
              </div>
           </div>
                  
              
                  
             

            <div class="col-md-4">
                <h6 class="text-uppercase text-center">Follow Us</h6>
              <div class="widget widget-follow text-center mt-50">
						
						<a href="#" class="icon icon-circle icon-facebook icon-xs"><i class="fa fa-facebook"></i></a>
						<a href="#" class="icon icon-circle icon-twitter icon-xs"><i class="fa fa-twitter"></i></a>
						<a href="#" class="icon icon-circle icon-google-plus icon-xs"><i class="fa fa-google-plus"></i></a>
					</div>
              </div>
                
                
          </div>
        
        <div class="p-30 text-center cust-footer-bg copyright">
	      Copyright © 2010 - 2017 ForStudentDoctors.com. Patent Pending. All Rights Reserved<br>
	
	  </div>
        </div>
        

  

    </div>
</footer>



<!-- Footer / End -->
<!-- Modal -->

<div class="modal fade" id="modalBasic" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
                <h4 class="modal-title" id="myModalLabel">Conact Now</h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 ">
                    <h3>Would you like to Conact Now</h3>
                    <form class="contact-form validate-form" id="contact-form" method="POST" data-message-error="Opps... Something went wrong - please try again later" data-message-success="Thank you form your message! We will answer within 24 hours." novalidate="novalidate">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input name="name" id="name" class="form-control" placeholder="Name" required="" aria-required="true" type="text">
                            </div>
                            <div class="form-group col-sm-6">
                                <input name="email" id="email" class="form-control" placeholder="E-mail address" required="" aria-required="true" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required="" aria-required="true"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <button type="submit" class="btn btn-filled btn-submit btn-block"><span>Send it <i class="i-after ti-arrow-right"></i></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<nav id="side-panel" class="right bg-white">
  <div class="side-panel-wrapper">

    <img class="logo mb-30" src="<?php echo base_url(); ?>front/img/photos/logo.jpg" alt="Okno" width="160">

    <!-- Widget - Newsletter -->
    <div class="widget widget-newsletter">
      <h6 class="text-uppercase text-muted">SEARCH  PROFESSIONALS</h6>
      <form action="<?php echo base_url().'publicsearch'?>" id="" class="" method="POST">
               
      
            
                
                                <div class="col-md-12 form-group mb-10">
                  
                  <select class="selectpicker"  name="profession" data-style="btn-info btn-filled" style="display: none;">
                                        <option value="">All Profession</option>
                                        <?php
                                        if (!empty($profession)) {
                                            foreach ($profession as $row) {
                                                ?>
                                                <option  value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select> 
                                    
                                    
                </div>
                                
                                <div class="col-md-12 form-group mb-10">
                  <select onchange="getComboA(this)" name="country" id="js_country"  data-style="btn-info btn-filled" style="display: none;" class="selectpicker" >
                                        <option value="">Select Country</option>
                                        <?php
                                        if (is_array($countries)) {
                                            foreach ($countries as $country) {
                                                $sel = ($country->id == set_value('country'))?'selected="selected"':'';
                                                ?>
                                                <option  value="<?php echo $country->id; ?>" <?php echo $sel;?> ><?php echo $country->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                </div>
                 <div class="col-md-12 form-group mb-10">

                        <select name="state" id="result" data-style="btn-info btn-filled" style="display: none;" class="selectpicker">
                            <option value="">Select State</option>

                        </select>

                    </div>
                
                                <div class="col-md-12 form-group mb-10">
                                    <button class="btn btn-filled btn-sm btn-submit btn-block" name="Search" value="Search" type="submit"><span>Search Professionals</span></button>    
                  
                </div>
        
      </form>
    </div>
        
    <!-- Widget - Follow -->
    <div class="widget widget-social">
      <h6 class="text-uppercase text-muted">Connect Us</h6>
      <a href="#" class="icon icon-square icon-facebook icon-xs"><i class="fa fa-facebook"></i></a>
      <a href="#" class="icon icon-square icon-twitter icon-xs"><i class="fa fa-twitter"></i></a>
      <a href="#" class="icon icon-square icon-google-plus icon-xs"><i class="fa fa-google-plus"></i></a>
      
    </div>
  </div>
  <a href="#" class="close" data-toggle="side-panel"><i class="ti-close"></i></a>
</nav>



<!--  -->
<!-- JS Libraries -->
<script src="<?php echo base_url(); ?>front/js/jquery-1.12.3.min.js"></script>

<!-- JS Plugins -->
<script src="<?php echo base_url(); ?>front/js/plugins.js"></script>

<!-- JS Core -->
<script src="<?php echo base_url(); ?>front/js/core.js"></script>
<script src="<?php echo base_url(); ?>front/js/selected.js"></script>

<script type="text/javascript">
      window.onload=function(){
      $('.selectpicker').selectpicker();
      $('.rm-mustard').click(function() {
        $('.remove-example').find('[value=Mustard]').remove();
        $('.remove-example').selectpicker('refresh');
      });
      $('.rm-ketchup').click(function() {
        $('.remove-example').find('[value=Ketchup]').remove();
        $('.remove-example').selectpicker('refresh');
      });
      $('.rm-relish').click(function() {
        $('.remove-example').find('[value=Relish]').remove();
        $('.remove-example').selectpicker('refresh');
      });
      $('.ex-disable').click(function() {
          $('.disable-example').prop('disabled',true);
          $('.disable-example').selectpicker('refresh');
      });
      $('.ex-enable').click(function() {
          $('.disable-example').prop('disabled',false);
          $('.disable-example').selectpicker('refresh');
      });

      // scrollYou
      //$('.scrollMe .dropdown-menu').scrollyou();

      //prettyPrint();
      };
    </script>

<!-- JS Libraries -->
<!--<script src="<?php /*echo base_url(); */?>front/js/mydoctor.js"></script>-->


  


</body>

</html>
