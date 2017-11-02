<style type="text/css">
    .box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title{
        margin-left: 20px;
        margin-right: -12px;
    }
    .btn-cust{
        width: 95%;
    }
    .clear-fix{
        clear: both;
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
        <h1><i class="fa fa-square-o"></i>
            Create New Blog
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
        <?php } $this->session->unset_userdata('message'); ?>
            <?php if($this->session->flashdata('message2')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $this->session->flashdata('message2'); ?></strong>
                    </div>
                </div>
            <?php } $this->session->unset_userdata('message2'); ?>
            <form role="form" method="post" id="blogform" enctype="multipart/form-data" action="<?php echo base_url().'insideblog/create'; ?>">
                <input type="hidden" name="user_id" value="<?php echo $login_id; ?>">
                <div class="col-md-6 ">
                <div class="col-md-12 no-padding">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-th"></i>
                            <h3 class="box-title">Blog Info</h3></i>
                        </div>
                        <div class="padd">
                            <div class="form-group">
                                <?php $v = (set_value('title')!='')?set_value('title'):'';?>
                                <label>Blog Title<span class="error">*</span></label>
                                <input name="title" type="text" placeholder="Title" value="<?php echo $v?>"  class="form-control">
                                <?php echo form_error('title');?>
                            </div>
                            <div class="form-group">
                                <label>Blog Category <span class="error">*</span></label><span id='category' class='error' for='main_category'></span>
                                <select onchange="getSubCat(this)" name="cat_type"  class="form-control">
                                    <option value="">Select</option>
                                    <?php
                                    if (is_array($main_cat)) {
                                        foreach ($main_cat as $dynmic_cat) {
                                            ?>
                                            <option value="<?php echo $dynmic_cat->id; ?>"><?php echo $dynmic_cat->cat_name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>

                                <a data-toggle="modal" href="#myModal" >Create New Blog Category</a>
                            </div>
                            <div class="form-group">
                                <?php $v = (set_value('description')!='')?set_value('description'):'';?>
                                <label>Description<span class="error">*</span></label>
                                <textarea name="description" placeholder="description" class="form-control textarea"><?php echo $v;?></textarea>
                                <?php echo form_error('description');?>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <input name="tag" type="text" placeholder="Tag"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Keyword</label>
                                <input name="keyword" type="text" placeholder="Keyword"  class="form-control">
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
                                <input name="date" type="text" class="form-control pull-right date" id="datepicker">
                            </div>
                            <div class="form-group">
                                <label>Post Time :</label>
                                <div class="input-group bootstrap-timepicker">
                                    <input name="time" type="text" class="form-control timepicker">
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
                                        <label>Picture One <span class="error">*</span></label>
                                        <?php $v = (set_value('primary_image') != '')?set_value('primary_image'):'';?>
                                        <input class="btn btn-default btn-cust" name="primary_image" type="file" value="<?php echo $v;?>">
                                        <small class="label bg-green"> JPG, GIF, PNG Format Allow</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Picture Two</label>
                                        <?php $v = (set_value('image1') != '')?set_value('image1'):'';?>
                                        <input class="btn btn-default btn-cust" name="image1" type="file" value="<?php echo $v;?>">
                                        <small class="label bg-green"> JPG, GIF, PNG Format Allow</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Picture Three</label>
                                        <?php $v = (set_value('image2') != '')?set_value('image2'):'';?>
                                        <input class="btn btn-default btn-cust" name="image2" type="file" value="<?php echo $v;?>">
                                        <small class="label bg-green"> JPG, GIF, PNG Format Allow</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Picture Four</label>
                                        <?php $v = (set_value('image3') != '')?set_value('image3'):'';?>
                                        <input class="btn btn-default btn-cust" name="image3" type="file" value="<?php echo $v;?>">
                                        <small class="label bg-green"> JPG, GIF, PNG Format Allow</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File One</label>
                                        <input class="btn btn-default btn-cust" name="file1" type="file">
                                        <small class="label bg-purple"> Document Format Allow</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File Two</label>
                                        <input class="btn btn-default btn-cust" name="file2" type="file">
                                        <small class="label bg-purple"> Document Format Allow</small>
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
                                        <label class="cust-level"><h4>Select profession(s) permitted to see your blog.</h4></label>
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
                      action="<?php  echo base_url('insideblog/Insideblog/blogtcat/'); ?>">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Blog Category Name<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
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


<script type="text/javascript">


jQuery(document).ready(function() {
    //Date picker
    $('#datepicker').datepicker({
        startDate: new Date(),
        todayHighlight: true,
        defaultDate: new Date(),
        autoclose: true,
        minDate: 0,
        format: "mm/dd/yyyy"
    });

    //Timepicker
    $(".timepicker").timepicker({
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
                required: true,
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
            },
            'file1': {

                extension: "jpg,png,bmp,gif,pdf,tif,tiff,txt,csv,doc,docx,xls,xlsx,xlt,pps,ppt,pptx,ods"
            },
            'file2': {

                extension: "jpg,png,bmp,gif,pdf,tif,tiff,txt,csv,doc,docx,xls,xlsx,xlt,pps,ppt,pptx,ods"
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
                required : "<p class='text-danger'>Please upload atleast 1 photo</p>",
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
            },
            'file1':{
                extension:"Only File Format  file is allowed!"
            },
            'file2':{
                extension:"Only File Format  file is allowed!"
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