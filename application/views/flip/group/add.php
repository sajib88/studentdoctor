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
            New Group
        </h1>
    </section>

    <section class="content">
    <div class="row">
        <?php if($this->session->flashdata('message')){ ?>
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> 1 New ! Group  Create successfully.</strong>
                </div>
            </div>
        <?php } $this->session->unset_userdata('message') ?>

        <?php if($this->session->flashdata('message2')){ ?>
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>  Group Category Create successfully.</strong>
                </div>
            </div>
        <?php } $this->session->unset_userdata('message2') ?>
        <form role="form" method="post" id="event" enctype="multipart/form-data" action="<?php echo base_url('FlipGroup/add'); ?>">
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
                                <input name="group_name" value="<?php echo ''; ?>"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Group Category <span class="error">*</span></label><span id='category' class='error' for='main_category'></span>
                                <select onchange="getSubCat(this)" name="category"  class="form-control">
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
                               <!-- <a data-toggle="modal" href="#myModal" >Create New Group Category</a>-->
                            </div>
                            <div class="form-group">
                                <label>Group Description<span class="error">*</span></label><span id='Description' class='error' for='description'></span>
                                <textarea  name="description" class="form-control" minlength=150></textarea>
                            </div>
                            <div class="form-group">
                                <label>Group Discussion<span class="error">*</span></label><span id='discussion' class='error' for='discussion'></span>
                                <textarea  name="discussion" class="form-control"></textarea>
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
                                <input name="create_date" type="text" class="form-control " id="datepicker">
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
                            </div>
                            <div class="form-group">
                                <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                <input class="btn btn-default" name="image_2" type="file">
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

                                    <label><h4>Select profession(s) permitted to see your group. </h4></label>
                                    <div class="form-group">
                                        <select id="test-select-4" name="profession_view[]" multiple="multiple">
                                            <?php
                                            if (is_array($profession_by_profession)) {
                                                foreach ($profession_by_profession as $row) {
                                                    if($row['sub_prof_id'] == 0 && $row['sub_yes_no'] == 0 ) {
                                                        ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                                                        <?php
                                                    }else{
                                                        if($row['sub_yes_no'] == 1 ){
                                                            $subPrefession = getSubPrefessionByPreofession($row['id']);

                                                            foreach ($subPrefession as $row2) {?>
                                                                <option value="<?php echo $row2['id']; ?>" data-section="<?php echo $row['name'] ; ?>"   data-index="1"><?php echo $row2['name'] ; ?></option>
                                                            <?php }
                                                        }
                                                    }
                                                    ?>

                                                    <?php
                                                    //}

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


            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <?php echo anchor('FlipDashboard',"<i class='fa fa-undo'></i> &nbsp; &nbsp; Cancel",array('class' => 'btn btn-danger btn-small pull-left'));?>
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
        </section>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.container-fluid -->
</div>





<div aria-hidden="false" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Category</h4>
            </div>
            <?php if($this->session->flashdata('message2')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>  Group Category Create successfully.</strong>
                    </div>
                </div>
            <?php } $this->session->unset_userdata('message2') ?>

            <div class="modal-body">
                <form role="form" method="post" id="post" enctype="multipart/form-data"
                      action="<?php  echo base_url('Group/group/grouptcat/'); ?>">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Group Category Name<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
                            <input name="cat_name" value="" class="form-control" required="required">
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
    <script type="text/javascript">


        jQuery(document).ready(function() {
            //Date picker
            $('#datepicker2').datepicker({
                startDate: new Date(),
                todayHighlight: true,
                autoclose: true
            });
            $('#datepicker').datepicker({
                startDate: new Date(),
                todayHighlight: true,
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
                group_name: {
                    required:true
                },
                main_category:{
                    required:true
                },
                description:{
                    required:true
                },
                summary:{
                    required:true
                },

                category:{
                    required:true
                },

                datepicker:{
                    required:true
                },

                primary_image:{
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
                group_name: {
                    required: "Group name is Required",},

                description: {
                    required: "Description is Required",},
                summary: {
                    required: "Summary is Required",},

                category: {
                    required: "Group Category is Required",},

                datepicker: {
                    required: "Group Create Date is Required",},
                primary_image: {
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




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">

<!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>


