<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:32 PM
 */
?>
<style>
    .btn-cust{
        width: 95%;
    }
    .professionView{
        margin: 15px 0px -7px 0px;
    }

    @media only screen and (max-width: 500px) {
        .professionView{

        }
        .professionView label h4{
            margin-top: 0px;
        }
    }

    .professionView label h4{
        margin-top: 5px;
        margin-left: 15px;
    }
</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-book"></i>
            New CES
        </h1>
    </section>

    <?php echo $this->session->flashdata('msg');?>
    <?php if(isset($msg) && $msg!='') echo $msg;?>

    <section class="content">
        <div class="row">
            <form role="form" method="post" id="cesform" enctype="multipart/form-data" action="<?php echo base_url().'ces/create'; ?>">
                <div class="col-md-6 ">
                    <div class="col-md-12 no-padding">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="fa fa-th"></i>
                                <h3 class="box-title">CES Info</h3></i>
                            </div>
                            <div class="padd">
                                <div class="form-group">
                                    <label>Title<span class="error">*</span></label>
                                    <input name="title" type="text" placeholder="Title"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>CES Type</label>
                                    <?php $ce_type = array('All CEs','Coupon CEs','Discounted CEs','Free CEs','Retail CEs','Special Offer CEs','Top Rated');?>
                                    <select name="ce_type" class="form-control chosen-select" id="ce_type">
                                        <option value="">Select CES</option>
                                        <?php foreach ($ce_type as $row) {?>
                                            <option value="<?php echo $row;?>"><?php echo $row?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description<span class="error">*</span></label>
                                    <textarea  name="description" placeholder="description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" placeholder="Price"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Special Price</label>
                                    <input type="number" name="special_price" placeholder="Special Price"  class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 no-padding">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="fa fa-map-marker"></i>
                                <h3 class="box-title">Address</h3></i>
                            </div>
                            <div class="padd">
                                <div class="form-group">
                                    <label>Address 1</label>
                                    <input name="address1" type="text" placeholder="Address1"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address 2</label>
                                    <input name="address2" type="text" placeholder="Address2"  class="form-control">
                                </div>
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
                                <div class="form-group">
                                    <div id="result">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Post Code</label>
                                    <input name="postcode" type="text" placeholder="Post Code"  class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 no-padding">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="glyphicon glyphicon-briefcase"></i>
                                <h3 class="box-title">Business Info</h3></i>
                            </div>
                            <div class="padd">
                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input name="business_name" type="text" placeholder="Business Name"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Business Email</label>
                                    <input name="business_email" type="text" placeholder="Business Email"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Business Phone</label>
                                    <input name="business_phone" type="text" placeholder="Business phone"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Business Fax</label>
                                    <input name="business_fax" type="text" placeholder="Business Fax"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Business Website</label>
                                    <input name="business_website" type="text" placeholder="Business website"  class="form-control">
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
                                            <label>Picture One</label>
                                            <input class="btn btn-default btn-cust" name="primary_image" type="file" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Picture Two</label>
                                            <input class="btn btn-default btn-cust" name="image2" type="file" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Picture Three</label>
                                            <input class="btn btn-default btn-cust" name="image3" type="file" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Primary Video</label>
                                            <input class="btn btn-default btn-cust" name="primary_video" type="file">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Video1</label>
                                            <input class="btn btn-default btn-cust" name="video1" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="primary_file_id">
                                            <label>File One</label>
                                            <input class="btn btn-default btn-cust" name="primary_file" type="file">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" id="file2">
                                            <label>File Two</label>
                                            <input class="btn btn-default btn-cust" name="file2" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Primary Sound</label>
                                            <input class="btn btn-default btn-cust" name="primary_sound" type="file">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sound</label><span id='audio-error' class='error' for='audio'></span>
                                            <input class="btn btn-default btn-cust" name="sound1" type="file">
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
                        <div class="">
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12 professionView">
                                        <div class="col-lg-6">
                                            <label><h4>Who can see this?</h4></label>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="form-group">
                                                <select multiple name="profession_view[]" class="selectpicker form-control">
                                                    <?php
                                                    if (is_array($profession)) {
                                                        foreach ($profession as $row) {
                                                            ?>
                                                            <option  value="<?php echo $row->id; ?>"><?php echo $row->name ; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
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
        </div>
    </section>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>



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
    $('#cesform').validate({
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
                required: "Classified Title is Required",},

            description: {
                required: "Description is Required",},

            ce_type: {
                required: "CES Type is Required",},

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

