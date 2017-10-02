


<!-- Content -->
<div id="content">

    <!-- Section -->
    <section class="bg-black fullheight dark">
        <?php if (!empty($error)) {
            showErrorMessage($error);
        } else {
            if ($this->session->flashdata('success')) {
                showSuccessMessage();
            }
        }
        ?>
        <div class="container v-center text-center">
            <div class="row">
                <div class="col-lg-6 col-lg-push-3">
                    <div class="bordered-box rounded animated reset-pass" data-animation="fadeInDown">

                        <?php echo $this->session->flashdata('msg');?>
                        <div class="reset-pass-content">
                        <h2>Recover</h2>
                            <p>If you forgot your password or want to reset it again, just type your account email to do so. </p>
                            <form id="login-form" class="form-signin wow text-center mb-30" method="post" action="<?php echo base_url('home/recoverpassword'); ?>" role="form">

                                <div class="form-group mb-10">
                                    <input id="login" name="user_email"  placeholder="Email ID / User Name" type="text" class="form-control input-2">
                                </div>

                                <input type="submit" class="btn btn-filled btn-primary btn-block" name="submit" value="Recover" >

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<!-- Content / End -->


<!--container start-->



     
  


