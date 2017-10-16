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
<div id="page-content">
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-cog"></i>
                Profile Manage
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

                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('profile/profile/index'); ?>">

                    <div class="col-lg-6 ">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Personal Information</h3><i class="fa fa-user title-icon"></i>
                            </div>
                            <!-- /.box-header -->
                            <div class="padd">
                                <!-- form start -->
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input disabled  name="email" value="<?php echo $user_info['email']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input name="first_name" value="<?php echo $user_info['first_name']; ?>" class="form-control">
                                    <?php echo form_error('first_name');?>
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="last_name" value="<?php echo!empty($user_info['last_name']) ? $user_info['last_name'] : ''; ?>" class="form-control">
                                    <?php echo form_error('last_name');?>
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option name="gender" value="male" <?php if($user_info['gender'] === 'male'){echo 'selected';}?>>Male</option>
                                        <option name="gender" value="female" <?php if($user_info['gender'] === 'female'){echo 'selected';}?> >Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Professional Licensing Country</label>
                                    <input name="plc" value="<?php echo!empty($user_info['plc']) ? $user_info['plc'] : ''; ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Professional Licensing State</label>
                                    <input name="pls" value="<?php echo!empty($user_info['pls']) ? $user_info['pls'] : ''; ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>NPI</label>
                                    <input name="npi" value="<?php echo!empty($user_info['npi']) ? $user_info['npi'] : ''; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Professional License Number</label>
                                    <input name="pln" value="<?php echo!empty($user_info['pln']) ? $user_info['pln'] : ''; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" value="<?php echo $user_info['phone']; ?>"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>University / College Name</label>
                                    <input name="university_clg" value="<?php echo $user_info['university_clg']; ?>"  class="form-control">
                                </div>

                            </div>
                        </div>
                        <!-- /.box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Change Password</h3></h3><i class="fa fa-user title-icon"></i>
                            </div>
                            <div class="padd">
                                <div class="form-group">
                                    <label>Change Password</label>
                                    <input name="password" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <!--           <label>Password</label>
                                                                       <input name="password" class="form-control" disabled>-->
                                    <button class="btn btn-success">Change Your Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Basic Information</h3><i class="fa fa-user title-icon"></i>
                            </div>
                            <div class="padd">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input name="user_name" value="<?php echo $user_info['user_name']; ?>" disabled class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input disabled  name="email" value="<?php echo $user_info['email']; ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Profession Type</label>
                                    <select disabled name="profession" class="form-control">

                                        <?php
                                        if (is_array($profession)) {
                                            foreach ($profession as $row) {
                                                ?>
                                                <option <?php if ($row->id == $user_info['profession']) echo 'selected'; ?>  value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
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
