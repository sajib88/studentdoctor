<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:32 PM
 */
?>
<style>
    .error{
        color: red;
        font-size: 12px;
    }
</style>

<div id="page-wrapper">
<div class="row">

    <section class="content-header">
        <h1>
            Blog
            <small>Add Blog</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Blog</a></li>
            <li class="active">Add Blog</li>
        </ol>
    </section>

    <!--  -->
    <section class="content">
    
        <div class="row">
        <?php if($data = $this->session->flashdata('message')){ ?>
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">&times;</a>
                    <strong><?php echo $data;?></strong>
                </div>
            </div>
        <?php } ?>
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" id="blogform" enctype="multipart/form-data" action="<?php echo base_url().'admin/Blog/Blog_controller/create'; ?>">
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?php $v = (set_value('title')!='')?set_value('title'):'';?>
                                            <label>Title<span class="error">*</span></label>
                                            <input name="title" type="text" placeholder="Title" value="<?php echo $v?>"  class="form-control">
                                            <?php echo form_error('title');?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?php $v = (set_value('description')!='')?set_value('description'):'';?>
                                            <label>Description<span class="error">*</span></label>
                                            <textarea  name="description" placeholder="description" class="form-control textarea"><?php echo $v;?></textarea>
                                            <?php echo form_error('description');?>
                                        </div>
                                    </div>




                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Category </label>
                                            <?php $cat_type = array('General surgery','Radiation therapy','Neurosociology','Neurosurgery','Medical genetics','Dermatology','Cardiologists‎','Plastic surgery','Vaginogram');?>
                                            <select name="cat_type" class="form-control chosen-select" id="cat_type">
                                                <option value="">Select Category</option>
                                                <?php foreach ($cat_type as $row) {?>
                                                    <option value="<?php echo $row;?>"><?php echo $row?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                   
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Post Date<span class="error">*</span></label><span id='date' class='error' for='start_date'></span>
                                        <input name="date" type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>


                                 <div class="col-lg-6 bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Post Time :</label>

                                        <div class="input-group">
                                            <input name="time" type="text" class="form-control timepicker">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Tag</label>
                                            <input name="tag" type="text" placeholder="Tag"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Keyword</label>
                                            <input name="keyword" type="text" placeholder="Keyword"  class="form-control">
                                        </div>
                                    </div>

                                    

                                   <div class="col-lg-12">
                                        <div class="form-group" id="photo_id">
                                            <label>Picture One<span class="error">*</span></label>
                                            <?php $v = (set_value('primary_image') != '')?set_value('primary_image'):'';?>
                                            <input class="btn btn-default" name="primary_image" type="file" value="<?php echo $v;?>">
                                            <?php echo form_error('primary_image');?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Picture Two</label>
                                            <?php $v = (set_value('image1') != '')?set_value('image1'):'';?>
                                            <input class="btn btn-default" name="image2" type="file" value="<?php echo $v;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Picture Two</label>
                                            <?php $v = (set_value('image2') != '')?set_value('image2'):'';?>
                                            <input class="btn btn-default" name="image2" type="file" value="<?php echo $v;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Picture Three</label>
                                            <?php $v = (set_value('image3') != '')?set_value('image3'):'';?>
                                            <input class="btn btn-default" name="image3" type="file" value="<?php echo $v;?>">
                                        </div>
                                    </div>
                                   
                                  

                                

                                <div class="col-lg-12">
                                    <div style="text-align: center">
                                        <input type="submit" name="submit" class="btn btn-info" value="Save">
                                        
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>


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
    jQuery(document).ready(function() {
        /*$('#photo').click(function() {
            $("#photo_id").append('<input class="btn btn-default" name="photo2" type="file">');
        });

        $('#file').click(function() {
            $("#file_id").append('<input class="btn btn-default" name="file2" type="file">');
        });*/
        $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
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
    $('#blogform').validate({
        rules: {
            title: {
                required:true
            },
            main_category:{
                required:true
            },
            description:{
                required:true
            },

            ce_type:{
                required:true
            },

            country:{
                required:true
            },
            price:{
                required:true,
                number: true
            },
            special_price:{
                required:true,
                number: true
            },
            city:{
                required:true

            },
            validateprof:{
                required:true
            },

            'primary_image': {
                required: true,
                extension: "png,jpg,jpeg,gif,bmp"
            },
            'image2': {

                extension: "png,jpg,jpeg,gif,bmp"
            },
            'image3': {

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
            title: {
                required: "Blog Title is Required",},

            description: {
                required: "Description is Required",},

            country: {
                required: "Product Country is Required",
            },
            price: {
                required: "Price is Required, 0-9 Number digit only allow",
            },
            city: {
                required: "City is Required",
            },


            special_price: {
                required: "Special Price is Required, 0-9 Number digit only allow",
            },
            validateprof: {
                required: "prof is Required",
            },
            'primary_image':{
                required : "<p class='text-danger'>Please upload atleast 1 photo</p>",
                extension:"Only Image Format  file is allowed!"
            },
            'image2':{

                extension:"Only Image Format  file is allowed!"
            },
            'image3':{

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


</script>


<link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="<?php echo base_url(); ?>script-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(function () {
        $(".textarea").wysihtml5();
    });
</script>