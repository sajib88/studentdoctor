<style type="text/css">
    .box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title{
        margin-left: 20px;
        margin-right: -12px;
    }
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

<div class="content-wrapper" id="page-wrapper">


    <section class="content-header">
        <h1><i class="fa fa-square-o"></i>
            Edit Blog
        </h1>
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
            <form role="form" method="post" id="blogform" enctype="multipart/form-data" action="<?php echo base_url('insideblog/edit/'. $editblog['id']); ?>">
                <input type="hidden" name="id" value="<?php echo $editblog['id']; ?>">

            <div class="col-md-6 ">
                <div class="col-md-12 no-padding">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-th"></i>
                            <h3 class="box-title">Blog Info</h3></i>
                        </div>
                        <div class="padd">
                            <div class="form-group">
                                <?php $v = (set_value('title')!='')?set_value('title'):$editblog['title'];?>
                                <label>Title<span class="error">*</span></label>
                                <input name="title" type="text" placeholder="Title" value="<?php echo $v?>"  class="form-control">
                                <?php echo form_error('title');?>
                            </div>
                            <div class="form-group">
                                <label>Blog Category </label>
                                <?php $cat_type = array('General surgery','Radiation therapy','Neurosociology','Neurosurgery','Medical genetics','Dermatology','Cardiologists‎','Plastic surgery','Vaginogram');?>
                                <select name="cat_type" class="form-control chosen-select" id="cat_type">
                                    <option value="">Select</option>
                                    <?php
                                    if (is_array($main_cat)) {

                                        foreach ($main_cat as $eventcat) {
                                            echo $editblog['cat_type'];
                                            ?>
                                            <option <?php if ($eventcat->id == $editblog['cat_type']) echo 'selected'; ?> value="<?php echo $eventcat->id; ?>"><?php echo $eventcat->cat_name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <?php $v = (set_value('description')!='')?set_value('description'):$editblog['description'];?>
                                <label>Description<span class="error">*</span></label>
                                <textarea rows="6" cols="50"  name="description" placeholder="description" class="form-control"><?php echo $v;?></textarea>
                                <?php echo form_error('description');?>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <input name="tag" value="<?php echo $editblog['tag']; ?>" type="text" placeholder="Tag"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Keyword</label>
                                <input name="keyword" value="<?php echo $editblog['keyword']; ?>" type="text" placeholder="Keyword"  class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="col-md-12 no-padding">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-calendar"></i>
                            <h3 class="box-title">Date Time</h3></i>
                        </div>
                        <div class="padd">
                            <div class="form-group">
                                <label>Post Date</label><span id='date' class='error' for='start_date'></span>
                                <input name="date" value="<?php echo $editblog['date']; ?>" type="text" class="form-control pull-right" id="datepicker">
                            </div>
                            <div class="form-group">
                                <label>Post Time :</label>
                                <div class="input-group bootstrap-timepicker">
                                    <input name="time" value="<?php echo $editblog['time']; ?>" type="text" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <!-- /.input group -->
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
                                        <input class="btn btn-default btn-cust" name="primary_image" type="file">
                                        <?php if(!empty($editblog['primary_image'])){ ?>
                                            <a href="<?php echo base_url() . 'assets/file/insideblog/' .$editblog['primary_image']; ?>" data-fancybox="images">
                                                View Picture One
                                            </a>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Picture Two</label>
                                        <input class="btn btn-default btn-cust" name="image1" type="file">
                                        <?php if(!empty($editblog['image1'])){ ?>
                                            <a href="<?php echo base_url() . 'assets/file/insideblog/' .$editblog['image1']; ?>" data-fancybox="images">
                                                View Picture Two
                                            </a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Picture Three</label>
                                        <input class="btn btn-default btn-cust" name="image2" type="file" >
                                        <?php if(!empty($editblog['image2'])){ ?>
                                            <a href="<?php echo base_url() . 'assets/file/insideblog/' .$editblog['image2']; ?>" data-fancybox="images">
                                                View Picture Three
                                            </a>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Picture Four</label>
                                        <input class="btn btn-default btn-cust" name="image3" type="file" >
                                        <?php if(!empty($editblog['image3'])){ ?>
                                            <a href="<?php echo base_url() . 'assets/file/insideblog/' .$editblog['image3']; ?>" data-fancybox="images">
                                                View Picture Four
                                            </a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File One</label>
                                        <input class="btn btn-default btn-cust" name="file1" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File Two</label>
                                        <input class="btn btn-default btn-cust" name="file2" type="file">
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
                                        <label><h4>Select profession(s) permitted to see your blog.</h4></label>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="form-group">

                                            <select multiple name="profession_view[]" class="selectpicker form-control">
                                                <?php
                                                if (is_array($profession)) {
                                                    foreach ($profession as $row) {
                                                        $selectedProfessions = explode(',',$editblog['profession_view']);
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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

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


<script type="text/javascript">


jQuery(document).ready(function() {
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true,
        startDate: new Date(),
        todayHighlight: true,
        minDate: new Date()
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
            cat_type:{
                required:true
            },
            description:{
                required:true
            },

            'primary_image': {
                extension: "png,jpg,jpeg,gif,bmp"
            },
            'image1': {
                extension: "png,jpg,jpeg,gif,bmp"
            },
            'image2': {
                extension: "png,jpg,jpeg,gif,bmp"
            },
            'image3': {
                extension: "png,jpg,jpeg,gif,bmp"
            }
        },
        messages:{
            title: {
                required: "Blog Title is Required",},

            cat_type: {
                required: "Category is Required",},

            description: {
                required: "Description is Required",},

            'primary_image':{
                extension:"Only Image Format  file is allowed!"
            },

            'image1':{

                extension:"Only Image Format  file is allowed!"
            },
            'image2':{

                extension:"Only Image Format  file is allowed!"
            },
            'image3':{
                extension:"Only Image Format  file is allowed!"
            }
        }
    });


</script>


<link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">
