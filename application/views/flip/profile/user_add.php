<style>

</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-user"></i>
            Flip Profile info
        </h1>
    </section>

    <section class="content">

        <!-- /.row -->
        <div class="row">

            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> <?php echo $this->session->flashdata('message');?></strong>
                    </div>
                </div>
            <?php } $this->session->unset_userdata('message'); ?>

            <form role="form" method="post" id="website" enctype="multipart/form-data" action="<?php echo base_url('flip'); ?>">
                <div class="col-md-6">
                    <div class="col-md-12 no-padding">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="fa fa-th"></i>
                                <h3 class="box-title">Flip Site Profile Setup</h3></i>
                            </div>
                            <div class="padd">

                                <div class="form-group">
                                    <label>Full Name<span class="error">*</span> <small>Hide your true identity use anything you want.</small></label>
                                    <input name="full_name"  class="form-control">
                                </div>


                                <input type="hidden" name="uid" value="<?php echo!empty($user_info['id']) ? $user_info['id'] : ''; ?>" class="form-control">
                                <input type="hidden" name="profession" value="<?php echo!empty($user_info['profession']) ? $user_info['profession'] : ''; ?>" class="form-control">
                                <input type="hidden" name="parent_profession" value="<?php echo!empty($user_info['parent_profession']) ? $user_info['parent_profession'] : ''; ?>" class="form-control">
                                <input type="hidden" name="user_name" value="<?php echo!empty($user_info['user_name']) ? $user_info['user_name'] : ''; ?>" class="form-control">
                                <input type="hidden" name="email" value="<?php echo!empty($user_info['email']) ? $user_info['email'] : '0'; ?>" class="form-control">
                                <input type="hidden" name="gender" value="<?php echo!empty($user_info['profession']) ? $user_info['profession'] : ''; ?>" class="form-control">
                                <input type="hidden" name="phone" value="<?php echo!empty($user_info['phone']) ? $user_info['phone'] : '0'; ?>" class="form-control">
                                <input type="hidden" name="country" value="<?php echo!empty($user_info['country']) ? $user_info['country'] : ''; ?>" class="form-control">
                                <input type="hidden" name="state" value="<?php echo!empty($user_info['state']) ? $user_info['state'] : ''; ?>" class="form-control">
                                <input type="hidden" name="city" value="<?php echo!empty($user_info['city']) ? $user_info['city'] : 'city'; ?>" class="form-control">
                                <input type="hidden" name="postal_code" value="<?php echo!empty($user_info['postal_code']) ? $user_info['postal_code'] : '0'; ?>" class="form-control">
                                <input type="hidden" name="profilepicture" value="<?php echo!empty($user_info['profilepicture']) ? $user_info['profilepicture'] : ''; ?>" class="form-control">
                                <input type="hidden" name="status" value="1" class="form-control">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 no-padding">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="fa fa-bullhorn"></i>
                                <h3 class="box-title">Flip Site Features</h3></i>
                            </div>
                            <div class="padd">
                                <div class="callout callout-danger">
                                    <h4><i class="icon fa fa-check"></i> Full Name</h4>
                                    <p>Hide your true identity</p>
                                </div>
                                <div class="callout callout-info">
                                    <h4><i class="icon fa fa-check"></i> Anything you can post</h4>
                                    <p>Hide your true identity no one can identifying you</p>
                                </div>
                                <div class="callout callout-warning">
                                    <h4><i class="icon fa fa-check"></i> Can be change Your identity many times you want</h4>
                                    <p>Profile section You can use name like KUNG FU PANDA, TOM & JERRY .</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <?php echo anchor('profile/dashboard',"<i class='fa fa-undo'></i> &nbsp; &nbsp; Cancel",array('class' => 'btn btn-danger btn-small pull-left'));?>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <button class="btn  btn-success  btn-small pull-right"  name="submit" type="submit">
                                                <i class="fa fa-check"></i> &nbsp; &nbsp; Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>



            <!-- /.row (nested) -->




            <!-- /.col-lg-12 -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>


<script type="application/javascript">
    $('#website').validate({
        rules: {
            full_name: {
                required:true
            }
        },
        messages:{
            full_name: {
                required: "Flip Site Full Name is Required",}
        }
    });




</script>
