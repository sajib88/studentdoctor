


<!-- Content -->
<div id="content">

    <!-- Section -->
    <section class="bg-black fullheight dark">

        <div class="container v-center text-center">
            <div class="row">

                <div class="col-lg-6 col-lg-push-3">
                    <div class="bordered-box rounded animated reset-pass" data-animation="fadeInDown">
                        <?php if (!empty($error)) {
                            showErrorMessage($error);
                        } else {
                            if ($this->session->flashdata('success')) {
                                showSuccessMessage();
                            }
                        }
                        ?>
                        <div class="reset-pass-content">
                        <h2>Password Reset</h2>
                        <?php echo $this->session->flashdata('msg');?>


                        <form  class="text-center mb-30" method="post" action="<?php echo base_url('home/update_password'); ?>" role="form">

                            <?php if($this->session->userdata('recovery')!='yes'){?>
                                <p>Please set your new password</p>
                                <div class="form-group mb-10">
                                    <label for="login">Current password:</label>
                                    <input required="" type="password"  name="current_password" placeholder="Current password" class="form-control input-2">
                                </div>
                            <?php }else{?>
                                <div class="alert alert-warning"><?php echo 'Please set your new password';?></div>
                            <?php }?>


                            <div class="form-group mb-10">
                                <label for="login">New password:</label>
                                <input required="" type="password"  name="new_password" placeholder="New password" class="form-control input-2">
                            </div>


                            <div class="form-group mb-10">
                                <label for="login">Retype password:</label>
                                <input required="" type="password"  name="re_password" placeholder="Retype Password" class="form-control input-2">
                            </div>

                            <input type="submit" class="btn btn-filled btn-primary btn-block" name="submit" value="Reset Password" >

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







