<style>

</style>


<?php if(!empty($advertise)){ ?>
    <?php foreach($advertise as $row):?>
        <section class="panel">
            <div class="panel-body">
                <img  src="<?php echo base_url() . '/assets/file/advertise/' .$row['ad_image']; ?>" class="img-responsive"/>
            </div>
        </section>
    <?php endforeach;?>
<?php }else{?>
<?php }?>

<div class="content-wrapper">

    <section class="content-header">
      <h1><i class="fa fa-user-md"></i>
        New My Website
      </h1>
    </section>

    <section class="content">

    <!-- /.row -->
    <div class="row">
        <form role="form" method="post" id="website" enctype="multipart/form-data" action="<?php echo base_url('public_web/Publicweb/index'); ?>">
        <div class="col-md-6">
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">My Website Info</h3></i>
                    </div>
                    <div class="padd">



                        <div class="form-group">
                            <label>Offering Appointments Via Online?</label>
                            <select name="appointment" class="form-control" id="appointment" >
                                <option value="">Please Select Appointment</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div id="set_date_time" style="display: none">

                            <?php $days = array('Sat','Sun','Mon','Tue','Wed','Thr','Fri')?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Appointment Start Day</label>
                                        <select name="appointment_start_day" class="form-control">
                                            <?php foreach ($days as $day){
                                                $sel = ($day == $website_info['appointment_day'])?'selected="selected"':'';?>
                                                <option  value="<?php echo $day?>" <?php echo $sel;?>><?php echo $day;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Appointment End Day</label>
                                        <select name="appointment_end_day" class="form-control">
                                            <?php foreach ($days as $day){
                                                $sel = ($day == $website_info['appointment_day'])?'selected="selected"':'';?>
                                                <option  value="<?php echo $day?>" <?php echo $sel;?>><?php echo $day;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                            <div class="col-lg-6 bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Start Appointment Time :</label>

                                    <div class="input-group">
                                        <input name="start_time" type="text" class="form-control timepicker" value="<?php echo !empty($website_info['start_time']) ? $website_info['start_time'] : ''; ?>" >

                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>


                            <div class="col-lg-6 bootstrap-timepicker">
                                <div class="form-group">
                                    <label>End Appointment  Time:</label>

                                    <div class="input-group">
                                        <input name="end_time" type="text" class="form-control timepickerend" value="<?php echo !empty($website_info['end_time']) ? $website_info['end_time'] : ''; ?>" >

                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                            </div>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label>Do you want to add your online store?</label>-->
<!--                            <select name="store" class="form-control" id="js_store" >-->
<!--                                <option value="">Please Select</option>-->
<!--                                <option value="1">Yes</option>-->
<!--                                <option value="0">No</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div id="store_name" style="display: none">-->
<!--                            <div class="form-group">-->
<!--                                --><?php //if(!empty($onlinestore)){
//                                    foreach ($onlinestore as $row){
//                                        ?>
<!--                                        <input type="hidden" name="store_id" value="--><?php //echo $row->id;?><!--">-->
<!--                                        <div class="alert alert-warning"> --><?php //echo "Your Store Name : ".$row->store_name;?><!--</div>-->
<!--                                    --><?php // }
//                                }else { ?>
<!--                                    <div class="alert alert-danger"> --><?php //echo "You don't have any Store : "?><!--<a class="btn btn-info" href="--><?php //echo base_url().'store/store/'?><!--">Create Here</a></div>-->
<!--                                --><?php //}
//                                ?>
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group">
                            <label>My Website Title</label>
                            <input name="title" value="<?php echo set_value('title'); ?>"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Choose My Website URL</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input disabled name="url" value="<?php echo base_url(); ?>"  class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <input name="url_name" value="<?php echo $user_info['user_name']; ?>"  class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea  name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>For serach terms</label>
                            <input name="specialty" value="<?php echo set_value('specialty'); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Special Interest</label>
                            <input name="special_interest" value="<?php echo set_value('special_interest'); ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Business Info</h3></i>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label> Business Name </label>
                            <input name="business_name" value="<?php echo set_value('business_name'); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Business Website </label>
                            <input name="business_website" value="<?php echo set_value('business_website'); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Business Email</label>
                            <input name="business_email" value="<?php echo set_value('business_email'); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Business Telephone</label>
                            <input name="business_telephone" value="<?php echo set_value('business_telephone'); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Business Fax</label>
                            <input name="business_fax" value="<?php echo set_value('business_fax'); ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">Address</h3></i>
                    </div>
                    <div class="padd">


                        <div class="form-group">
                            <label>Country<span class="error">*</span></label>
                            <select onchange="getComboA(this)" name="country" id="js_country" class="form-control">
                                <option value="">Select</option>
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
                            <?php echo form_error('country');?>
                        </div>
                        <div id="result">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input   name="city" value="<?php echo ''; ?>"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input name="postal" value="<?php echo set_value('postal'); ?>"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Address </label>
                            <input name="address_1" value="<?php echo set_value('address_1'); ?>"  class="form-control">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-user"></i>
                        <h3 class="box-title">Profile Info</h3></i>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label>First Name</label>
                            <input readonly name="first_name" value="<?php echo $user_info['first_name']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input readonly name="last_name" value="<?php echo!empty($user_info['last_name']) ? $user_info['last_name'] : ''; ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-file"></i>
                        <h3 class="box-title">Media</h3></i>
                    </div>
                    <div class="padd">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="photo_id">
                                    <label>Photo</label>
                                    <small class=""><i class="fa fa-star-o"></i>  </small>
                                    <input name="photo1" class="btn btn-default btn-cust" type="file" required>
                                    <small class="badge bg-green"> JPG, GIF, PNG Format Allow</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="photo_id">
                                    <label>Photo 2</label>
                                    <input name="photo2" class="btn btn-default btn-cust" type="file">
                                    <small class="badge bg-green"> JPG, GIF, PNG Format Allow</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" id="file_id">
                                    <label>Files</label>
                                    <input name="file1" class="btn btn-default btn-cust" type="file" >
                                    <small class="badge bg-green"> DOCX, XLS, PDF, TXT, EXCEL Format Allow</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" id="file_id">
                                    <label>Files</label>
                                    <input name="file2" class="btn btn-default btn-cust" type="file">
                                    <small class="badge bg-green"> DOCX, XLS, PDF, TXT, EXCEL Format Allow</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Audio</label>
                                    <input name="audio" class="btn btn-default btn-cust" type="file">
                                    <small class="badge bg-green btn-cust"> MP3, OGG Format Allow</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Video</label>
                                    <input name="video" class="btn btn-default btn-cust"  type="file">
                                    <small class="badge bg-green btn-cust"> MP4, WMV Format Allow</small>
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



        <!-- /.row (nested) -->




        <!-- /.col-lg-12 -->
    </div>
    <!-- /.container-fluid -->
    </section>
</div>

<script>
    jQuery(document).ready(function() {
        $('#photo').click(function() {
            $("#photo_id").append('<input name="photo2" type="file">');
        });

        $('#file').click(function() {
            $("#file_id").append('<input name="file2" type="file">');
        });
    });

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

<script type="application/javascript">
    $('#website').validate({
        rules: {
            appointment: {
                required:true
            },
            title: {
                required:true
            },
            main_category:{
                required:true
            },
            description:{
                required:true
            },

            business_name:{
                required:true
            },

            business_email:{
                required:true
            },
            country:{
                required:true
            },
            specialty:{
                required:true
            },
            prof:{
                required:true
            },

            'photo1': {
                required: true,
                extension: "png,jpg,jpeg,gif,bmp"
            },
            'photo2': {

                extension: "png,jpg,jpeg,gif,bmp"
            },
            'photo3': {

                extension: "png,jpg,jpeg,gif,bmp"
            },
            'primary_file': {

                extension: "jpg,png,bmp,gif,pdf,tif,tiff,txt,csv,doc,docx,xls,xlsx,xlt,pps,ppt,pptx,ods"
            },

            'primary_sound': {

                extension: "mp3,aac,ogg,wma"
            },
            'primary_video': {

                extension: "mp4,avi,mov"
            }


        },
        messages:{
            appointment: {
                required: "Set Appointment Yes / No ",},

            title: {
                required: "Title is Required",},

            description: {
                required: "Description is Required",},

            business_name: {
                required: "Business_name  is Required",},

            business_email: {
                required: "Business Email is Required",
            },

            country: {
                required: "Public Website Country is Required",
            },
            specialty: {
                required: "Add Your Speciality cancer, skin, tooth etc",
            },
            prof: {
                required: "prof is Required",
            },
            'photo1':{
                required : "<p class='text-danger'>Please upload atleast 1 photo</p>",
                extension:"Only Image Format  file is allowed!"
            },
            'photo2':{

                extension:"Only Image Format  file is allowed!"
            },
            'photo3':{

                extension:"Only Image Format  file is allowed!"
            },

            'primary_file':{
                extension:"Only File Format  file is allowed!"
            },
            'primary_sound':{
                extension:"Only Sound/Audio Format  file is allowed!"
            },
            'primary_video':{
                extension:"Only Video Format  file is allowed!"
            }

        }
    });

    jQuery(document).ready(function () {

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


        //show hide time picker
        $('#appointment').on('change',function(){
            //alert($(this).val());
            if( $(this).val()== 1){
                $("#set_date_time").show('slow');
            }
            else{
                $("#set_date_time").hide('slow');
            }
        });

        $('#js_store').on('change',function(){
            //alert($(this).val());
            if( $(this).val()== 1){
                $("#store_name").show('slow');
            }
            else{
                $("#store_name").hide('slow');
            }
        });

    });


</script>

<link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">