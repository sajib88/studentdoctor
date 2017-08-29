<!--breadcrumbs start-->
<!-- Page Title -->
<div id="page-title" class="page-title page-title-1 bg-secondary dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><i class="ti-layout-menu"></i>Registration</h1>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home Page</a></li>
                    <li class="active">Register</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <!--breadcrumbs end-->
<section class="section-double right">

		<div class="col-md-7 content">
			
			
             <?php
                    if (!empty($error)) {
                        showErrorMessage($error);
                    } else {
                        if ($this->session->flashdata('success')) {
                            showSuccessMessage();
                        }
                    }
                    ?>

		
				
					<div class=" rounded">
						<h2>Register now!</h2>
						<?php echo $this->session->flashdata('msg');?>
                           
							<div class="row">
                               <form id="login-form" action="<?php echo base_url('home/registration'); ?>" method="post" enctype="multipart/form-data">
                                
                                 <div class="col-md-12 form-group mb-10">
                                     
                                       <div class="col-md-6">
                                                <label>Selects Your Profession First</label>
                                     </div>
                             <div class="col-md-6">         
                                <select class="selectpicker"  name="profession"  data-style="btn-info btn-filled" style="display: none;" required>
                                                    <option value="">Select  Your Profession</option>
                                                    <option value="8">Physician</option>
                                                    <option value="1">Attorney</option>
                                                    <option value="2">Chiropractor</option>
                                                    <option value="3">Dentist</option>
                                                    <option value="4">Optometrist</option>
                                                    <option value="5">Osteopathist</option>
                                                    <option value="6">Ph.D</option>
                                                    <option value="7">Pharmacist</option>
                                                    <option value="9">Podiatrist</option>
                                                    <option value="11">Veterinarian</option>
                                                    <option value="10">POI</option>
                                                    <option value="12">Publisher</option>
                                                    <option value="13">Advertiser</option>
                                 </select>
                        </div>
                                                
                                    
                                     </div>
                                
                                

								<div class="col-md-6 form-group mb-10">
									<label for="name">First Name:</label>
									 <input required=""  type="text" name="first_name" class="form-control" placeholder="First Name" autofocus="">
								</div>
								<div class="col-md-6 form-group mb-10">
									<label for="login">Last Name:</label>
									 <input  required="" type="text" name="last_name" class="form-control" placeholder="Last Name" autofocus="">
								</div>

                                <div class="col-md-6 form-group mb-10">
									<label for="login">Your E-mail:</label>
									 <input required  type="email" name="email" class="form-control" placeholder="Your E-mail" autofocus="">
								</div>

                                <div class="col-md-6 form-group mb-10">
									<label for="login">User Name:</label>
									<input required="" type="text" name="user_name" class="form-control" placeholder="User Name" autofocus="">
								</div>
                                
								<div class="col-md-6 form-group mb-10">
									<label for="password">Password:</label>
									<input  required="" type="password" name="password" class="form-control" placeholder="Password" autofocus="">
								</div>
								<div class="col-md-6 form-group mb-10">
									<label for="password-repeat">Repeat password:</label>
									 <input   required type="password" name="conf" class="form-control" placeholder="Confirm Password" autofocus="">
								</div>
                                
                                <div class="col-md-6 form-group mb-10">
									<label for="password-repeat">Upload your Professional Documents</label>
									
                                    <input name="image" type="file" class="btn-info btn btn-filled" >
								</div>
                                
                                <div class="col-md-6 form-group mb-10">
									<label for="password-repeat"></label>
                                    </br></br>
                                   <input required="" type="checkbox" value="agree this condition"> I agree to the <a class="text-info" href="<?php echo base_url('home/terms'); ?>"> Terms of condition</a> and <a class="text-info" href="<?php echo base_url('home/privacy'); ?>"> Privacy Policy</a>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-6 col-md-push-3">
									
                                      <input type="submit" name="submit" class="btn btn-filled btn-primary btn-block" value="Register">
								</div>
							</div>
						</form>
					</div>
				
            
            
		</div>
		<div class="col-md-5 image">
			<div class="bg-image"><img src="<?php echo base_url(); ?>front/img/photos/classic_photo03.jpg" alt=""></div>
		</div>
		
	</section>

	<!-- Section -->
	
	
         

<!-- Content / End -->
    




    
    
