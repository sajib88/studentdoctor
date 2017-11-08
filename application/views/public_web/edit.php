<style>
    .btn-cust{
        width: 95%;
    }
</style>

<div class="content-wrapper">

<section class="content-header">
    <h1><i class="fa fa-user-md"></i>
       Edit My Website
    </h1>
</section>


     <section class="content">

         <div class="row">
             <form  id="website" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('pub/edit'); ?>" >
             <div class="col-md-6">
                 <div class="box box-primary">
                     <div class="box-header with-border">
                         <i class="fa fa-th"></i>
                         <h3 class="box-title">Public Website Info</h3></i>
                     </div>
                     <div class="padd">
                         <div class="form-group">
                             <label>Your Appointment</label>
                             <select  name="appointment" class="form-control" id="appointment">
                                 <option <?php if ($website_info['appointment'] == '1') echo 'selected'; ?> value="1">Yes</option>
                                 <option <?php if ($website_info['appointment'] == '0') echo 'selected'; ?> value="0">No</option>
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
                                                 $sel = ($day == $website_info['appointment_start_day'])?'selected="selected"':'';?>
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
                                                 $sel = ($day == $website_info['appointment_end_day'])?'selected="selected"':'';?>
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
                                 </div>
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
                                 </div>
                             </div>
                            </div>
                         </div>
<!--                         <div class="form-group">-->
<!--                             <label>Do you want to add your online store?</label>-->
<!--                             <select  name="store" class="form-control" id="js_store">-->
<!--                                 <option --><?php //if ($website_info['online_store'] == '1') echo 'selected'; ?><!-- value="1">Yes</option>-->
<!--                                 <option --><?php //if ($website_info['online_store'] == '0') echo 'selected'; ?><!-- value="0">No</option>-->
<!--                             </select>-->
<!--                         </div>-->
<!--                         <div id="store_name" style="display: none">-->
<!--                             <div class="form-group">-->
<!--                                 --><?php //if(!empty($onlinestore)){
//                                     foreach ($onlinestore as $row){
//                                         ?>
<!--                                         <input type="hidden" name="store_id" value="--><?php //echo $row->id;?><!--">-->
<!--                                         <div class="alert alert-warning"> --><?php //echo "Your Store Name : ".$row->store_name;?><!--</div>-->
<!--                                     --><?php // }
//                                 }else { ?>
<!--                                     <div class="alert alert-danger"> --><?php //echo "You don't have any Store : "?><!--<a class="btn btn-info" href="--><?php //echo base_url().'store/store/'?><!--">Create Here</a></div>-->
<!--                                 --><?php //}
//                                 ?>
<!--                             </div>-->
<!--                         </div>-->
                         <div class="form-group">
                             <label>Title</label>
                             <input name="title" value="<?php echo!empty($website_info['title']) ? $website_info['title'] : ''; ?>"  class="form-control">
                         </div>
                         <div class="form-group">
                             <label>My Website URL</label>
                             <input  disabled value="<?php echo!empty($user_info['user_name']) ? $user_info['user_name'] : ''; ?>"  class="form-control">
                         </div>
                         <div class="form-group">
                             <label>Description</label>
                             <textarea  name="description" value="" class="form-control"><?php echo!empty($website_info['description']) ? $website_info['description'] : ''; ?></textarea>
                         </div>
                         <div class="form-group">
                             <label>Speciality</label>
                             <input name="specialty" value="<?php echo!empty($website_info['specialty']) ? $website_info['specialty'] : ''; ?>" class="form-control">
                         </div>
                         <div class="form-group">
                             <label>Special Interest</label>
                             <input name="special_interest" value="<?php echo!empty($website_info['special_interest']) ? $website_info['special_interest'] : ''; ?>" class="form-control">
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
                                 <input name="business_name" value="<?php
                                 echo!empty($website_info['business_name']) ? $website_info['business_name'] : '';
                                 ?>" class="form-control">
                             </div>
                             <div class="form-group">
                                 <label> Business Website </label>
                                 <input name="business_website" value="<?php echo!empty($website_info['business_website']) ? $website_info['business_website'] : ''; ?>" class="form-control">
                             </div>
                             <div class="form-group">
                                 <label>Business Email</label>
                                 <input name="business_email" value="<?php echo!empty($website_info['business_email']) ? $website_info['business_email'] : ''; ?>" class="form-control">
                             </div>
                             <div class="form-group">
                                 <label>Business Telephone</label>
                                 <input name="business_telephone" value="<?php
                                 echo!empty($website_info['business_telephone']) ? $website_info['business_telephone'] : '';
                                 ?>" class="form-control">
                             </div>
                             <div class="form-group">
                                 <label>Business Fax</label>
                                 <input name="business_fax" value="<?php
                                 echo!empty($website_info['business_fax']) ? $website_info['business_fax'] : '';
                                 ?>" class="form-control">
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
                                             $v = (set_value('country')!='')?set_value('country'):$website_info['country'];
                                             $sel = ($v == $country->id)?'selected="selected"':'';
                                             ?>
                                             <option  value="<?php echo $country->id; ?>" <?php echo $sel;?>><?php echo $country->name; ?></option>
                                             <?php
                                         }
                                     }
                                     ?>
                                 </select>
                                 <?php echo form_error('country');?>
                             </div>
                             <div id="result">
                                 <label>State<span class="error"></span></label>
                                 <select name="state"  class="form-control">
                                     <option value="">Select state</option>
                                     <?php
                                     if (is_array($states) and (!empty($states))) {
                                         foreach ($states as $row) {
                                             $v = (set_value('state')!='')?set_value('state'):$website_info['state'];
                                             $sel = ($v == $row->name)?'selected="selected"':'';
                                             ?>
                                             <option  value="<?php echo $row->name; ?>" <?php echo $sel;?>><?php echo $row->name; ?></option>
                                             <?php
                                         }
                                     }
                                     ?>
                                 </select>
                             </div>

                             <div class="form-group">
                                 <label>City</label>
                                 <input name="city" type="text" placeholder="City" value="<?php echo!empty($website_info['city']) ? $website_info['city'] : ''; ?>" class="form-control">
                             </div>
                             <div class="form-group">
                                 <label>Postal Code</label>
                                 <input name="postal" value="<?php
                                 echo!empty($website_info['postal']) ? $website_info['postal'] : '';
                                 ?>"  class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Address </label>
                                 <input name="address_1" value="<?php echo!empty($website_info['address_1']) ? $website_info['address_1'] : ''; ?>"  class="form-control">
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
                                         <input name="photo1" class="btn btn-default btn-cust" type="file" >
                                         <?php if (!empty($photos[0])) { ?>
                                             <a href="<?php echo base_url() . '/assets/file/publicweb/' . $photos[0]->name; ?>" data-fancybox="images">
                                                 View Picture Two
                                             </a>
                                         <?php }?>
                                         <small class="badge bg-green"> JPG, GIF, PNG Format allow</small>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group" id="photo_id">
                                         <label>Photo 2</label>
                                         <input name="photo2" class="btn btn-default btn-cust" type="file">
                                         <?php if (is_array($photos) && !empty($photos[1])) { ?>
                                             <a href="<?php echo base_url() . '/assets/file/publicweb/' . $photos[1]->name; ?>" data-fancybox="images">
                                                 View Picture Two
                                             </a>
                                         <?php }?>
                                         <small class="badge bg-green"> JPG, GIF, PNG Format allow</small>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group" id="file_id">
                                         <label>Files</label>
                                         <input name="file1" class="btn btn-default btn-cust" type="file" >
                                         <small class="badge bg-green"> DOCX,XLS,PDF, TXT, EXCEL Format allow</small>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group" id="file_id">
                                         <label>Files</label>
                                         <input name="file2" class="btn btn-default btn-cust" type="file">
                                         <small class="badge bg-green"> DOCX,XLS,PDF, TXT, EXCEL Format allow</small>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Audio</label>
                                         <input name="audio" class="btn btn-default btn-cust" type="file">
                                         <small class="badge bg-green btn-cust"> MP3, OGG Format allow</small>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Video</label>
                                         <input name="video" class="btn btn-default btn-cust"  type="file">
                                         <small class="badge bg-green btn-cust"> MP4, WMV Format allow</small>
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
                                             <i class="fa fa-check"></i> &nbsp; &nbsp; Update</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             </form>
         </div>


     </section>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js"></script>


<script type="text/javascript">
    $().fancybox({
        selector : '[data-fancybox="images"]',
        thumbs   : false,
        hash     : false,
    });

    $(".main-slider").slick({
        slidesToShow   : 3,
        slidesToScroll : 3,
        infinite   : true,
        dots       : false,
        arrows     : false,
        responsive : [
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
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
                 prof:{
                     required:true
                 },

                 'photo1': {

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
             
             <?php if ($website_info['appointment'] == '1'){?>
             $("#set_date_time").show('slow');
             <?php }else{ ?>
                $("#set_date_time").hide('slow');
             <?php }?>

             <?php if ($website_info['online_store'] == '1'){?>
             $("#store_name").show('slow');
             <?php }else{ ?>
             $("#store_name").hide('slow');
             <?php }?>


             //show hide time picker
             $('#appointment').on('change',function(){
                 var val =  jQuery('#appointment').val();
                 //alert(val);
                 if( val== 1){
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