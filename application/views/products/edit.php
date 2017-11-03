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
            <i class="glyphicon glyphicon-tags"></i>  &nbsp;Edit Product
        </h1>
    </section>



    <section class="content">

        <div class="row">
            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Product Updated Successfully.</strong>
                    </div>
                </div>
            <?php } ?>

            <form role="form" method="post" id="editProductForm" enctype="multipart/form-data" action="<?php echo base_url('product/edit/' . $editProduct['id']); ?>">
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
                                <label>Product Name<span class="error">*</span></label>
                                <input name="name" type="text" id="name" placeholder="Name" value="<?php echo $editProduct['name']; ?>"  class="form-control">
                                <?php echo form_error('name');?>
                            </div>
                            <div class="form-group">
                                <label>Product Type<span class="error">*</span></label><span id='type-error' class='error' for='type'></span>


                                <select  name="type" class="form-control">
                                    <option value="">Select</option>
                                    <?php
                                    if (is_array($main_cat)) {

                                        foreach ($main_cat as $eventcat) {

                                            ?>
                                            <option <?php if ($eventcat->id == $editProduct['type']) echo 'selected'; ?> value="<?php echo $eventcat->id; ?>"><?php echo $eventcat->cat_name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>


                            </div>
                            <div class="form-group">
                                <label>Description<span class="error">*</span></label>
                                <textarea  name="description" class="form-control"><?php echo $editProduct['description']; ?></textarea>
                                <?php echo form_error('description');?>
                            </div>
                            <div class="form-group">
                                <label>Price<span class="error">*</span> (USD)</label><span id='price-error' class='error' for='price'></span>
                                <input type="number" name="price"  class="form-control" value="<?php echo $editProduct['price']; ?>"  id="price">
                            </div>
                            <div class="form-group">
                                <label>Special Price<span class="error">*</span> (USD)</label><span id='special-price-error' class='error' for='special_price'></span>
                                <input type="number" name="special_price"  class="form-control" value="<?php echo $editProduct['special_price']; ?>"  id="special_price">
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
                                <input name="seller_name" value="<?php echo $editProduct['seller_name']; ?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Seller Email</label>
                                <input name="seller_email" value="<?php echo $editProduct['seller_email']; ?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Seller Phone</label>
                                <input name="seller_phone" type="tel" value="<?php echo $editProduct['seller_phone']; ?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Seller Website</label>
                                <input name="seller_website" value="<?php echo $editProduct['seller_website']; ?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Seller Fax</label>
                                <input name="seller_fax" value="<?php echo $editProduct['seller_fax']; ?>" class="form-control">
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
                                    <select onchange="getComboA(this)" onload="getComboA($editProduct['country'])" name="country" id="js_country" class="form-control">
                                        <option value="">Select</option>
                                        <?php
                                        if (is_array($countries)) {
                                            foreach ($countries as $country) {
                                                ?>
                                                <option <?php if ($country->id == $editProduct['country']) echo 'selected'; ?> value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('country');?>
                                </div>
                                <div class="form-group">
                                    <div id="result">
                                        <label>State<span class="error"></span></label>
                                        <select name="state"  class="form-control">
                                            <option value="">Select state</option>
                                            <?php
                                            if (is_array($states) and (!empty($states))) {
                                                foreach ($states as $row) {
                                                    $v = (set_value('state')!='')?set_value('state'):$editProduct['state'];
                                                    $sel = ($v == $row->name)?'selected="selected"':'';
                                                    ?>
                                                    <option  value="<?php echo $row->name; ?>" <?php echo $sel;?>><?php echo $row->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input name="city" value="<?php echo $editProduct['city']; ?>" id="city" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input name="zip" value="<?php echo $editProduct['zip']; ?>" class="form-control">
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
                                    <input name="seller_address1" value="<?php echo $editProduct['seller_address1']; ?>"  class="form-control">
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
                                            <?php if(!empty($editProduct['photo_primary'])){ ?>
                                                <a href="<?php echo base_url() . '/assets/file/product/' .$editProduct['photo_primary']; ?>" data-fancybox="images">
                                                    View Picture One
                                                </a>
                                            <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                            <input class="btn btn-default btn-cust" name="photo_2" type="file">
                                            <?php if(!empty($editProduct['photo_2'])){ ?>
                                                <a href="<?php echo base_url() . '/assets/file/product/' .$editProduct['photo_2']; ?>" data-fancybox="images">
                                                    View Picture Two
                                                </a>
                                            <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                                            <input class="btn btn-default btn-cust" name="photo_3" type="file">
                                            <?php if(!empty($editProduct['photo_3'])){ ?>
                                                <a href="<?php echo base_url() . '/assets/file/product/' .$editProduct['photo_3']; ?>" data-fancybox="images">
                                                    View Picture Three
                                                </a>
                                            <?php }?>
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
                                            <label><h4>Select profession(s) permitted to see your products.</h4></label>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="form-group">

                                                <select multiple name="profession_view[]" class="selectpicker form-control">
                                                    <?php
                                                    if (is_array($profession)) {
                                                        foreach ($profession as $row) {
                                                            $selectedProfessions = explode(',',$editProduct['profession_view']);
                                                            $ifExist = in_array($row->id,$selectedProfessions);
                                                            if($ifExist){
                                                                $selected = 'Selected';
                                                            }else
                                                                $selected = '';
                                                            ?>
                                                            <option value="<?php echo $row->id; ?>" <?=$selected?>><?php echo $row->name; ?></option>
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>

<script type="text/javascript">
    $(function() {
        $("#editProductForm").validate({
            rules: {
                name: {
                    required:true
                },
                description:{
                    required:true
                },
                type:{
                    required:true
                },
                price:{
                    required:true
                },
                special_price:{
                    required:true
                },
                photo_primary:{
                    accept:"image/jpeg,image/gif,image/png",
                },
                photo_2:{
                    accept:"image/jpeg,image/gif,image/png",
                },
                photo_3:{
                    accept:"image/jpeg,image/gif,image/png",
                },
                primary_file:{
                    extension: 'docx|doc|pdf|csv|xlsx|xls',
                },
                file_2:{
                    extension: 'docx|doc|pdf|csv|xlsx|xls',
                },
                primary_sound:{
                    accept: 'audio/*',
                },
                sound1:{
                    accept: 'audio/*',
                },
                primary_video:{
                    accept: 'video/x-msvideo|video/x-ms-wmv|video/x-m4v|video/x-flv|video/webm|video/quicktime|video/mpeg|video/mp4|video/3gpp',
                },
                video1:{
                    accept: 'video/x-msvideo|video/x-ms-wmv|video/x-m4v|video/x-flv|video/webm|video/quicktime|video/mpeg|video/mp4|video/3gpp',
                }

            },
            messages: {
                title: {
                    required: "Product Name is Required",},
                description: {
                    required: "Description is Required",},
                type: {
                    required: "Type is Required",},
                price: {
                    required: "Price is Required",},
                special_price: {
                    required: "Special price is Required",},


                photo_primary: {
                    accept:"Please Select Only Image file for this input.",
                },
                photo_2: {
                    accept:"Please Select Only Image file for this input.",
                },
                photo_3: {
                    accept:"Please Select Only Image file for this input.",
                },
                primary_file: {
                    required: "File is Required",
                    extension:"Please Select Appropiate File",
                },
                file_2: {
                    extension:"Please Select Appropiate File",
                },
                primary_sound: {
                    accept:"Please Select a audio File",
                },
                sound1: {
                    accept:"Please Select a audio File",
                },
                primary_video: {
                    accept:"Please Select a video File",
                },
                video1: {
                    accept:"Please Select a video File",
                }
            }
        });

    });
</script>

<script>
    function getComboA(sel) {
        //alert(sel.value);
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "product/products/getStateByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#result").html(resultData);
            }
        });

    }

</script>


