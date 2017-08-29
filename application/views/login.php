<!--breadcrumbs start-->
<!-- Page Title -->
<div id="page-title" class="page-title page-title-1 bg-secondary dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><i class="ti-layout-menu"></i>Login</h1>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home Page</a></li>
                    <li class="active">Login</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <!--breadcrumbs end-->
<section class="section-double right">

		<div class="col-md-6 content">
			<?php if (!empty($error)) {
                            showErrorMessage($error);
                        } else {
                            if ($this->session->flashdata('success')) {
                                showSuccessMessage();
                            }
                        }
                        ?>
			<div class="col-md-12">
					<div class="bordered-box rounded " data-animation="fadeInDown">
						<h2>Log in!</h2>
                        <?php echo $this->session->flashdata('msg');?>
						
<form id="login-form" class=" text-center mb-30" method="post" action="<?php echo base_url('home/login'); ?>" role="form"> 

							<div class="form-group mb-10">
								<label for="login">Login:</label>
								<input id="login" name="email"  placeholder="Email ID / User Name" type="text" class="form-control input-2">
							</div>
							<div class="form-group mb-10">
								<label for="password">Password:</label>
								<input id="password" name="password"  class="form-control input-2"  placeholder="Password" type="password" >
							</div>
							
                        <input type="submit" class="btn btn-filled btn-primary btn-block" name="submit" value="Login" >

						</form>
                        <a href="<?php echo base_url('home/newaccount/fb');?>" class="btn btn-filled btn-info btn-block"><i class="fa fa-facebook"></i> &nbsp; Login with Facebook</a>
                        <a href="<?php echo base_url('home/newaccount/google_plus');?>" class="btn btn-filled btn-danger btn-block"><i class="fa fa-google-plus"></i> &nbsp; Login with Google</a>

						<a data-toggle="modal" href="<?php echo base_url('home/forgotpassword')?>" class="link-underline">Forgot my password</a>
					</div>
				</div>
            
            
		</div>
		<div class="col-md-6 image">
			<div class="bg-image"><img src="<?php echo base_url(); ?>front/img/photos/loginbg.jpg" alt=""></div>
		</div>
		
	</section>

	<!-- Section -->
	


<!-- Content / End -->
 <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">

                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Forgot Password ?</h4>
                              </div>
                              <form id="js_form_id" method="post" action="<?php echo base_url('home/recoverpassword')?>" >
                                  <div class="modal-body">
                                      <p>Enter your e-mail address below to reset your password.</p>
                                      <input type="text" name="user_email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                                  </div>
                                  <div class="modal-footer">
                                      <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                      <button class="btn btn-success" type="button">Submit</button>
                                  </div>
                              </form>

                          </div>

                  </div>
              </div>
              <!-- modal -->
        
         <!--container start-->



     
  


