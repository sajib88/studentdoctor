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
    <h1>
        <i class="glyphicon glyphicon-tags"></i>  &nbsp;New Product
    </h1>
</section>

<section class="content">
<div class="row">
    <?php if($this->session->flashdata('message')){ ?>
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success! New Product Added Successfully.</strong>
            </div>
        </div>
    <?php } ?>

    <?php if($this->session->flashdata('message2')){ ?>
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('message2'); ?></strong>
            </div>
        </div>
    <?php } $this->session->unset_userdata('message2'); ?>

    <form role="form" method="post" id="classifiedform" enctype="multipart/form-data" action="<?php echo base_url('product/add'); ?>">
        <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">

        <div class="col-md-6 ">
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Product Info</h3></i>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <?php $v = (set_value('name')!='')?set_value('name'):'';?>
                            <label>Product Name<span class="error">*</span></label>
                            <input name="name" type="text" id="name" placeholder="Name" value="<?php echo $v?>"  class="form-control">
                            <?php echo form_error('name');?>
                        </div>
                        <div class="form-group">
                            <label>Product Type<span class="error">*</span></label><span id='type-error' class='error' for='type'></span>

                            <select onchange="getSubCat(this)" name="type" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (is_array($main_cat)) {
                                    foreach ($main_cat as $cat) {
                                        ?>
                                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->cat_name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <a data-toggle="modal" href="#myModal" >Create New Product Category</a>
                        </div>
                        <div class="form-group">
                            <?php $v = (set_value('description')!='')?set_value('description'):'';?>
                            <label>Description<span class="error">*</span></label>
                            <textarea  name="description" class="form-control"><?php echo $v?></textarea>
                            <?php echo form_error('description');?>
                        </div>
                        <div class="form-group">
                            <label>Price<span class="error">*</span> (USD)</label><span id='price-error' class='error' for='price'></span>
                            <input type="number" name="price"  class="form-control" id="price">
                        </div>
                        <div class="form-group">
                            <label>Special Price<span class="error">*</span> (USD)</label><span id='special-price-error' class='error' for='special_price'></span>
                            <input type="number" name="special_price"  class="form-control"  id="special_price">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Seller Info</h3></i>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label>Seller Name</label>
                            <input name="seller_name" value="<?php echo '';?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Seller Email</label>
                            <input name="seller_email" value="<?php echo '';?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Seller Phone</label>
                            <input name="seller_phone" type="tel" value="<?php echo '';?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Seller Website</label>
                            <input name="seller_website" value="<?php echo '';?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Seller Fax</label>
                            <input name="seller_fax" value="<?php echo ''; ?>" class="form-control">
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
                        <h3 class="box-title">Product Location</h3></i>
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
                        <div class="form-group">
                            <div id="result">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input name="city" value="<?php echo '';?>" id="city" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input name="zip" value="<?php echo ''; ?>"  class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">Seller Location</h3></i>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label>Seller Address</label>
                            <input name="seller_address1" value="<?php echo '';?>"  class="form-control">
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
                                    <label>Picture One<span class="error">*</span></label><span id='picture1-error' class='error' for='picture1'></span>
                                    <input class="btn btn-default btn-cust" name="photo_primary" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                    <input class="btn btn-default btn-cust" name="photo_2" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                                    <input class="btn btn-default btn-cust" name="photo_3" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Primary Video</label><span id='primary_video-error' class='error' for='primary_video'></span>
                                    <input class="btn btn-default btn-cust" name="primary_video" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="primary_file_id">
                                    <label>File One</label><span id='file1-error' class='error' for='file1'></span>
                                    <input class="btn btn-default btn-cust" name="primary_file" type="file">
                                </div>
                                <div class="form-group" id="file_2">
                                    <label>File Two</label><span id='file1-error' class='error' for='file1'></span>
                                    <input class="btn btn-default btn-cust" name="file_2" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Primary Audio</label><span id='primary_audio-error' class='error' for='audio'></span>
                                    <input class="btn btn-default btn-cust" name="primary_sound" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Audio</label><span id='audio-error' class='error' for='audio'></span>
                                    <input class="btn btn-default btn-cust" name="sound1" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Video</label><span id='video1-error' class='error' for='video1_video'></span>
                                    <input class="btn btn-default btn-cust" name="video1" type="file">
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
                                    <label><h4>Select profession(s) permitted to see your products. </h4></label>
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

<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Category</h4>
            </div>


            <div class="modal-body">
                <form role="form" method="post" id="post" enctype="multipart/form-data"
                      action="<?php  echo base_url('product/Products/addCat/'); ?>">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Product Category Name<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
                            <input name="cat_name" value="" class="form-control" required="">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-danger pull-left" type="button">Cancel</button>
                        <input type="submit" name="submit" class="btn  btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>


<script type="application/javascript">
    $('#classifiedform').validate({
        rules: {
            name: {
                required:true
            },
            main_category:{
                required:true
            },
            description:{
                required:true
            },

            category:{
                required:true
            },

            type:{
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

            seller_name:{
                required:true

            },

            seller_email:{
                required:true

            },

            seller_phone:{
                required:true

            },



            'photo_primary': {
                required: true,
                extension: "png,jpg,jpeg,gif,bmp"
            },
            'photo_2': {

                extension: "png,jpg,jpeg,gif,bmp"
            },
            'photo_3': {

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
            name: {
                required: "Product Name is Required",},

            description: {
                required: "Description is Required",},

            category: {
                required: "Classified Category is Required",},

            type: {
                required: "Type  is Required",
            },

            country: {
                required: "Product Country is Required",
            },

            city: {
                required: "City is Required",
            },
            price: {
                required: "Price is Required, 0-9 Number digit only allow",
            },

            special_price: {
                required: "Special Price is Required, 0-9 Number digit only allow",
            },




            'photo_primary':{
                required : "<p class='text-danger'>Please upload atleast 1 photo</p>",
                extension:"Only Image Format  file is allowed!"
            },
            'photo_2':{

                extension:"Only Image Format  file is allowed!"
            },
            'photo_3':{

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

<script>



    function getSubCat(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "classifieds/classifieds/getSubCatByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#subcat").html(resultData);
            }
        });

    }

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
