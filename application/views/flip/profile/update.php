<style>
    .upProPic{
        margin: 10px 33.33333% auto 31.333%;
    }
    @media (max-width: 767px) {
        .upProPic{
            margin: 10px 33.33333% auto 15.333%;
        }
    }
    .form-group p{
        color: red;
    }
</style>
<?php $user_type = $this->session->userdata('user_type');?>
<div id="page-content">
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-cog"></i>
                Profile Manage Flip Profile
            </h1>
        </section>

        <section class="content">
            <!-- /.row -->
            <div class="row">
                <?php if($this->session->flashdata('message')){ ?>
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Your Profile Updatted Successfully.</strong>
                        </div>
                    </div>
                <?php } $this->session->unset_userdata('message'); ?>

                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('profile/flipupdate'); ?>">
                    <input type="hidden"  name="id" value="<?php echo $user_info['id']; ?>" class="form-control">
                    <input type="hidden"  name="uid" value="<?php echo $user_info['uid']; ?>" class="form-control">
                    <div class="col-lg-6 ">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Flip Personal Information</h3><i class="fa fa-user title-icon"></i>
                            </div>



                            <!-- /.box-header -->
                            <div class="padd">
                                <!-- form start -->
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input   name="email" value="<?php echo $user_info['email']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Full  Name</label>
                                    <input name="full_name" value="<?php echo $user_info['full_name']; ?>" class="form-control">
                                    <?php echo form_error('first_name');?>
                                </div>


                                <div class="form-group">
                                    <label>username</label>
                                    <input name="user_name" value="<?php echo $user_info['user_name']; ?>" class="form-control">
                                    <?php echo form_error('user_name');?>
                                </div>



                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option name="gender" value="male" <?php if($user_info['gender'] === 'male'){echo 'selected';}?>>Male</option>
                                        <option name="gender" value="female" <?php if($user_info['gender'] === 'female'){echo 'selected';}?> >Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" value="<?php echo $user_info['phone']; ?>"  class="form-control">
                                </div>


                            </div>
                        </div>
                        <!-- /.box -->

                    </div>

                    <div class="col-lg-6 ">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Address</h3></h3><i class="fa fa-user title-icon"></i>
                            </div>
                            <!-- /.box-header -->
                            <div class="padd">
                                <!-- form start -->
                                <div class="form-group">
                                    <label>Country</label>
                                    <select onchange="getComboA(this)" name="country" class="form-control">
                                        <?php
                                        if (is_array($countries)) {
                                            foreach ($countries as $country) {
                                                ?>
                                                <option <?php if ($country->id == $user_info['country']) echo 'selected'; ?> value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="result">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select name="state" class="form-control">
                                            <?php
                                            if (is_array($states)) {
                                                foreach ($states as $row) {
                                                    ?>
                                                    <option <?php if ($row->name == $user_info['state']) echo 'selected'; ?> value="<?php echo $row->name ?>"><?php echo $row->name ?> </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input name="city" value="<?php echo!empty($user_info['city']) ? $user_info['city'] : ''; ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input name="postal_code" value="<?php echo!empty($user_info['postal_code']) ? $user_info['postal_code'] : ''; ?>"  class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-lg-6 ">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Update Your Profile <small>Picture Now</small></h3><i class="fa fa-user title-icon"></i>
                            </div>
                            <!-- /.box-header -->
                            <div class="padd">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="widget-user-header" style="
                                             margin-top: -30px;">
                                            <div class="widget-user-image text-center">
                                                <?php
                                                if($user_info['profilepicture'] == 0) {?>
                                                    </br>
                                                    <div class="text-center">
                                                        <img src="<?php echo base_url() . '/assets/upload_prfl.png'?>" alt="" class="img-rounded " width="150" height="150" />
                                                    </div>
                                                    </br>
                                                <?php }
                                                else {?>
                                                    </br>

                                                    <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture'] ?>" alt="" width="170" height="170" class="img-rounded" />
                                                    </br>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group text-center" id="profilepicture">
                                            <div class="input-profile">
                                                <label>Your Profile picture Format <br><small> jpg,gif,png format </small></label>
                                                <input class="upProPic" style="" name="profilepicture" type="file">
                                            </div>
                                        </div>
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
                                                <?php echo anchor('FlipDashboard',"<i class='fa fa-undo'></i> &nbsp; &nbsp; Cancel",array('class' => 'btn btn-danger btn-small pull-left'));?>
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function() {
        //Date picker
        $('#datepicker2').datepicker({
            autoclose: true
        });
        $('#datepicker').datepicker({
            autoclose: true
        });
        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });

        $(".timepickerend").timepicker({
            showInputs: false
        });
    });
</script>
<script>
    function getComboA(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "public_web/publicweb/getStateByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#result").html(resultData);
            }
        });

    }

</script>

<script>

    function getpro(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {pro: value};



        $.ajax({
            type: 'POST',
            url: base_url + "Search/getProByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#pro").html(resultData);
            }

        });

    }










</script>
