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
        <h1><i class="fa fa-group"></i>
            Edit Gorup
        </h1>
    </section>

    <section class="content">
    <div class="row">

        <?php if($this->session->flashdata('message')){ ?>
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Group Update successfully.</strong>
                </div>
            </div>
        <?php } $this->session->unset_userdata('message')?>

        <form role="form" method="post" id="event" enctype="multipart/form-data" action="<?php echo base_url('group/edit/'. $editgroup['id']); ?>">
            <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">

        <div class="col-md-6 ">
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Group Info</h3></i>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label>Group Name<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                            <input name="group_name" value="<?php echo $editgroup['group_name']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Group Category <span class="error">*</span></label><span id='category' class='error' for='main_category'></span>


                            <select onchange="getSubCat(this)" name="category" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (is_array($main_cat)) {

                                    foreach ($main_cat as $eventcat) {
                                        ?>
                                        <option <?php if ($eventcat->id == $editgroup['category']) echo 'selected'; ?> value="<?php echo $eventcat->id; ?>"><?php echo $eventcat->cat_name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>


                        </div>
                        <div class="form-group">
                            <label>Group Description<span class="error">*</span></label><span id='Description' class='error' for='description'></span>
                            <textarea  name="description" class="form-control"><?php echo $editgroup['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Group Discussion<span class="error">*</span></label><span id='discussion' class='error' for='discussion'></span>
                            <textarea  name="discussion" class="form-control"><?php echo $editgroup['discussion']; ?></textarea>
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
                            <h3 class="box-title">Group Start Date</h3></i>
                        </div>
                        <div class="padd">
                            <div class="form-group">
                                <label>Group Start Date<span class="error">*</span></label><span  class='error' for='start_date'></span>
                                <input name="create_date" type="text" value="<?php echo $editgroup['create_date']; ?>" class="form-control " id="datepicker">
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
                            <div class="form-group" id="photo_id">
                                <label>Picture One<span class="error">*</span></label><span  class='error' for='picture1'></span>
                                <input class="btn btn-default" id='primary_image' name="primary_image" type="file">
                                <?php if(!empty($editgroup['primary_image'])){ ?>
                                    <a href="<?php echo base_url() . '/assets/file/group/' .$editgroup['primary_image']; ?>" data-fancybox="images">
                                        View Picture One
                                    </a>
                                <?php }?>
                            </div>
                            <div class="form-group">
                                <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                <input class="btn btn-default" name="image_2" type="file">
                                <?php if(!empty($editgroup['image_2'])){ ?>
                                    <a href="<?php echo base_url() . '/assets/file/group/' .$editgroup['image_2']; ?>" data-fancybox="images">
                                        View Picture Three
                                    </a>
                                <?php }?>
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
                                        <label><h4>Select profession(s) permitted to see your group.</h4></label>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="form-group">

                                            <select multiple name="profession_view[]" class="selectpicker form-control">
                                                <?php
                                                if (is_array($profession)) {
                                                    foreach ($profession as $row) {
                                                        $selectedProfessions = explode(',',$editgroup['profession_view']);
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




        </section></form>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.container-fluid -->
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

<script type="text/javascript">


$(function() {
       $("#event").validate({
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
                price:{
                    required:true
                },
                picture1:{
                    required:true,
                    accept:"image/jpeg,image/gif,image/png",
                },
                picture2:{
                    accept:"image/jpeg,image/gif,image/png",
                },
                picture3:{
                    accept:"image/jpeg,image/gif,image/png",
                },
                file1:{
                   required:true,
                    extension: 'docx|doc|pdf|csv|xlsx|xls',
               },
                file2:{
                    extension: 'docx|doc|pdf|csv|xlsx|xls',
                },
                audio:{
                    accept: 'audio/*',
                },
                videos:{
                   accept: 'video/x-msvideo|video/x-ms-wmv|video/x-m4v|video/x-flv|video/webm|video/quicktime|video/mpeg|video/mp4|video/3gpp',
               }

            },
            messages: {
                title: {
                    required: "Title is Required",},
                main_category: {
                    required: "Main Category is Required",},
                description: {
                    required: "Description is Required",},
                price: {
                    required: "Price is Required",},
                picture1: {
                    required: "Picture is Required",
                    accept:"Please Select Appropiate File",
                },
                picture2: {
                    accept:"Please Select Appropiate File",
                },
                picture3: {
                    accept:"Please Select Appropiate File",
                },
                file1: {
                    required: "File is Required",
                    extension:"Please Select Appropiate File",
                },
                file2: {
                    extension:"Please Select Appropiate File",
                },
                audio: {
                    accept:"Please Select audios File",
                },
                videos: {
                    accept:"Please Select videos File",
                }
            }
        });

    });


</script>

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
<style>
    .error{
        color: red;
        font-size: 12px;
    }
</style>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">

<!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>


