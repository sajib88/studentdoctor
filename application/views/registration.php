<!--breadcrumbs end-->
<main class="main-wrapper">


    <section class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pdl">
                    <div class="tab-wrapper row">
                        <!--container start-->
                        <div class="registration-bg">
                            <div class="advertise_div col-md-4">
                                <div class="inner-item">
                                    <a href="#">
                                        <img class="center-block img-responsive"  src="<?php echo base_url().'comp/img/300x250.gif' ?>" alt="" >
                                    </a>
                                </div>


                            </div>

                            <div class="container col-md-4">
                                <?php
                                if (!empty($error)) {
                                    showErrorMessage($error);
                                } else {
                                    if ($this->session->flashdata('success')) {
                                        showSuccessMessage();
                                    }
                                }
                                ?>

                                <?php if(!empty($this->session->flashdata('msg'))){
                                    echo $this->session->flashdata('msg');
                                }?>

                                <form class="form-signin wow fadeInUp" action="<?php echo base_url('home/registration'); ?>" method="post" enctype="multipart/form-data">


                                    <div class="login-wrap">

                                        <div class="form-group mb-10">
                                            <a href="<?php echo base_url('home/newaccount/fb');?>" class="btn btn-small btn-block btn-fb"><i class="pull-cnter fa fa-facebook"></i>&nbsp &nbsp Facebook Login</a>
                                            <h5 class="text-center">or</h5>
                                            <a href="<?php echo base_url('home/newaccount/google_plus');?>" class="btn btn-filled btn-danger btn-block"><i class="fa fa-google-plus"></i> &nbsp; Login with Google</a>
                                            <h5 class="text-center">or</h5>
                                            <div class="hr-text">
                                                <hr>
                                            </div>
                                        </div>

                                        <div  class="form-group">
                                            <p>Select  Your Profession First </p>
                                            <select required="required" name="profession" class="form-control">
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
                                        <div class="form-group mb-10">
                                            <input required=""  type="text" name="first_name" class="form-control" placeholder="First Name" autofocus="">
                                        </div>
                                        <div class="form-group mb-10">
                                            <input  required="" type="text" name="last_name" class="form-control" placeholder="Last Name" autofocus="">
                                        </div>
                                        <div class="form-group mb-10">
                                            <input required  type="email" name="email" class="form-control" placeholder="Your E-mail" autofocus="">
                                        </div>


                                        <div class="form-group mb-10">
                                            <input required="" type="text" name="user_name" class="form-control" placeholder="User Name" autofocus="">
                                        </div>

                                        <div class="form-group mb-10">
                                            <input  required="" type="password" name="password" class="form-control" placeholder="Password" autofocus="">
                                        </div>

                                        <div class="form-group mb-10">

                                            <input   required type="password" name="conf" class="form-control" placeholder="Confirm Password" autofocus="">
                                        </div>

                                        <div class="form-group mb-10">
                                        <div required="" class="g-recaptcha" data-sitekey="6LciozgUAAAAABs4Yxkpqgqq7JGayumkDLG10LBV" autofocus=""></div>
                                        </div>


                                        <div class="form-group mb-10">

                                            <input required="" type="checkbox" value="agree this condition"> I agree to the <a href="<?php echo base_url('home/terms');?>">Terms & Conditions </a> and
                                            <a href="<?php echo base_url('home/privacy');?>">Privacy Policy </a>

                                        </div>
                                        <div class="form-group mb-10">
                                            <input type="submit" name="submit" class="btn btn-mid btn-yellow btn-block" value="Sign Up">
                                        </div>
                                        <div class="registration">
                                            Already Registered?
                                            <a class="" href="<?php echo base_url(); ?>home/login">
                                                Login Here
                                            </a>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="advertise_div col-md-4">


                                <div class="inner-item">
                                    <a href="#">
                                        <img class="center-block img-responsive"  src="<?php echo base_url().'comp/img/300x250.png' ?>" alt="" >
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--container end-->



                    </div>
                </div>

            </div>
        </div><!--container-->
    </section>

</main>
<script src='https://www.google.com/recaptcha/api.js'></script>



    




    
    
