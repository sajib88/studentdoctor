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
            Edit CES
        </h1>
    </section>

    <section class="content">
        <?php echo $this->session->flashdata('msg');?>
        <div class="row">
            <form role="form" method="post" id="personalform" enctype="multipart/form-data" action="<?php echo base_url('ces/updateCES'); ?>">
                <input type="hidden" name="uid" value="<?php echo $value['uid']; ?>">
                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
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
                                <input name="title" type="text" placeholder="Title" value="<?php echo $value['title']; ?>"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>CES Type</label>
                                <?php $ce_type = array('All CEs','Coupon CEs','Discounted CEs','Free CEs','Retail CEs','Special Offer CEs','Top Rated');?>
                                <select name="ce_type" class="form-control chosen-select">
                                    <option value="">Select Body</option>
                                    <?php foreach ($ce_type as $row) {
                                        $v = (set_value('ce_type')!='')?set_value('ce_type'):$value['ce_type'];
                                        $sel = ($v == $row)?'selected="selected"':'';?>
                                        <option value="<?php echo $row;?>" <?php echo $sel;?>><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description<span class="error">*</span></label>
                                <textarea  name="description" placeholder="description" class="form-control"><?php echo $value['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" placeholder="Price" value="<?php echo $value['price']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Special Price</label>
                                <input type="number" name="special_price" placeholder="Special Price" value="<?php echo $value['special_price']; ?>" class="form-control">
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
                                <input name="address1" type="text" placeholder="Address1" value="<?php echo $value['address1']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address 2</label>
                                <input name="address2" type="text" placeholder="Address2" value="<?php echo $value['address2']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Country<span class="error">*</span></label>
                                <select onchange="getComboA(this)" name="country" id="js_country" class="form-control">
                                    <option value="">Select</option>
                                    <?php
                                    if (is_array($countries)) {
                                        foreach ($countries as $country) {
                                            $v = (set_value('country')!='')?set_value('country'):$value['country'];
                                            $sel = ($v == $country->id)?'selected="selected"':'';
                                            ?>
                                            <option  value="<?php echo $country->id; ?>" <?php echo $sel;?>><?php echo $country->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div id="result">
                                    <label>State<span class="error"></span></label>
                                    <select name="state"  class="form-control">
                                        <option value="">Select state</option>
                                        <?php
                                        if (is_array($states) and (!empty($states))) {
                                            foreach ($states as $row) {
                                                $v = (set_value('state')!='')?set_value('state'):$value['state'];
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
                                <label>Post Code</label>
                                <input name="postcode" type="text" placeholder="Post Code" value="<?php echo $value['postcode']; ?>" class="form-control">
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
                                <input name="business_name" type="text" placeholder="Business Name" value="<?php echo $value['business_name']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Business Email</label>
                                <input name="business_email" type="text" placeholder="Business Email" value="<?php echo $value['business_email']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Business Phone</label>
                                <input name="business_phone" type="text" placeholder="Business phone" value="<?php echo $value['business_phone']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Business Fax</label>
                                <input name="business_fax" type="text" placeholder="Business Fax" value="<?php echo $value['business_fax']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Business Website</label>
                                <input name="business_website" type="text" placeholder="Business website" value="<?php echo $value['business_website']; ?>" class="form-control">
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
                                        <?php if(!empty($value['primary_image'])){ ?>
                                            <a href="<?php echo base_url() . '/assets/file/ces/' .$value['primary_image']; ?>" data-fancybox="images">
                                                View Picture One
                                            </a>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Picture Two</label>
                                        <input class="btn btn-default btn-cust" name="image2" type="file" >
                                        <?php if(!empty($value['image2'])){ ?>
                                            <a href="<?php echo base_url() . '/assets/file/ces/' .$value['image2']; ?>" data-fancybox="images">
                                                View Picture One
                                            </a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Picture Three</label>
                                        <input class="btn btn-default btn-cust" name="image3" type="file" >
                                        <?php if(!empty($value['image3'])){ ?>
                                            <a href="<?php echo base_url() . '/assets/file/ces/' .$value['image3']; ?>" data-fancybox="images">
                                                View Picture One
                                            </a>
                                        <?php }?>
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
                                                            $selectedProfessions = explode(',',$value['profession_view']);
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
            <!-- /.panel -->
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


<script>
    jQuery(document).ready(function() {
        $('#photo').click(function() {
            $("#photo_id").append('<input class="btn btn-default" name="photo1" type="file">');
        });

        $('#file').click(function() {
            $("#file_id").append('<input class="btn btn-default" name="file2" type="file">');
        });

        $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });


    });


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
