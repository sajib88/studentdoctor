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
        <h1><i class="fa fa-calendar"></i>
           Edit Event
        </h1>
    </section>

    <section class="content">
    <div class="row">
        <?php if($this->session->flashdata('message')){ ?>
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Your Event Update successfully.</strong>
                </div>
            </div>
        <?php } ?>
        <form role="form" method="post" id="event" enctype="multipart/form-data" action="<?php echo base_url('event/edit/'. $editevent['id']); ?>">
            <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">

        <div class="col-lg-6">
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Event Info</h3></i>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label>Event Name<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                            <input name="title" value="<?php echo $editevent['title']; ?>"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Event Category <span class="error">*</span></label><span id='main_category-error' class='error' for='main_category'></span>
                            <select onchange="getSubCat(this)" name="category" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (is_array($main_cat)) {

                                    foreach ($main_cat as $eventcat) {
                                        echo $editevent['category'];
                                        ?>
                                        <option <?php if ($eventcat->id == $editevent['category']) echo 'selected'; ?> value="<?php echo $eventcat->id; ?>"><?php echo $eventcat->cat_name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Event Summary<span class="error">*</span></label><span id='Summary' class='error' for='description'></span>
                            <textarea  name="summary" class="form-control"><?php echo $editevent['summary']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Event Description<span class="error">*</span></label><span id='Description' class='error' for='description'></span>
                            <textarea  name="description" class="form-control"><?php echo $editevent['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Total Seats</span>
                            <input name="seats_no" value="<?php echo $editevent['seats_no']; ?>"  class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">Location</h3></i>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label>Event Location<span class="error">*</span></label><span id='location' class='error' for='location'></span>
                            <input name="location" value="<?php echo $editevent['location']; ?>"  class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-clock-o"></i>
                        <h3 class="box-title">Date Time</h3></i>
                    </div>
                    <div class="padd">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Event Start Date<span class="error">*</span></label><span id='start_date' class='error' for='start_date'></span>
                                <input name="start_date" type="text" value="<?php echo $editevent['start_date']; ?>" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                        <div class="col-lg-6 bootstrap-timepicker">
                            <div class="form-group">
                                <label>Event Start Time (EST)</label>

                                <div class="input-group">
                                    <input name="start_time" type="text" value="<?php echo $editevent['start_time']; ?>" class="form-control timepicker">

                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Event End Date<span class="error">*</span></label><span id='end_date' class='error' for='start_date'></span>
                                <input name="end_date" type="text" value="<?php echo $editevent['end_date']; ?>" class="form-control pull-right" id="datepicker2">
                            </div>
                        </div>
                        <div class="col-lg-6 bootstrap-timepicker">
                            <div class="form-group">
                                <label>Event End Time (EST)</label>
                                <div class="input-group">
                                    <input name="end_time" type="text" value="<?php echo $editevent['end_time']; ?>" class="form-control timepickerend">

                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                    </div>

                </div>
            </div>
            </div>
                <!-- /.box-body -->
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-picture-o"></i>
                        <h3 class="box-title">Event Pictures</h3></i>
                    </div>
                    <div class="padd">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="photo_id">
                                    <label>Picture One<span class="error">*</span></label><span id='picture1-error' class='error' for='picture1'></span>
                                    <input class="btn btn-default btn-cust" name="primary_photo" type="file">
                                    <?php if(!empty($editevent['primary_photo'])){?>
                                    <a href="<?php echo base_url() . '/assets/file/event/' .$editevent['primary_photo']; ?>" data-fancybox="images">
                                        View Picture One
                                    </a>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                    <input class="btn btn-default btn-cust" name="photo_2" type="file">
                                    <?php if(!empty($editevent['photo_2'])){?>
                                    <a href="<?php echo base_url() . '/assets/file/event/' .$editevent['photo_2']; ?>" data-fancybox="images">
                                        View Picture Tow
                                    </a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                                    <input class="btn btn-default btn-cust" name="photo_3" type="file">
                                    <?php if(!empty($editevent['photo_3'])){?>
                                    <a href="<?php echo base_url() . '/assets/file/event/' .$editevent['photo_3']; ?>" data-fancybox="images">
                                        View Picture Three
                                    </a>
                                    <?php }?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Document 1</label><span id='picture3-error' class='error' for='picture3'></span>
                                    <input class="btn btn-default btn-cust" name="file1" type="file">
                                    <?php if(!empty($editevent['photo_3'])){?>
                                        <a href="<?php echo base_url() . '/assets/file/event/' .$editevent['file1']; ?>">
                                            File Download
                                        </a>
                                    <?php }?>
                                </div>
                            </div>


                        </div>

                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Document 2</label><span id='picture3-error' class='error' for='picture3'></span>
                                    <input class="btn btn-default btn-cust" name="file1" type="file">
                                    <?php if(!empty($editevent['photo_3'])){?>
                                        <a href="<?php echo base_url() . '/assets/file/event/' .$editevent['file2']; ?>">
                                            File Download
                                        </a>
                                    <?php }?>
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
                                    <label><h4>Select profession(s) permitted to see your Event</h4></label>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <select multiple name="profession_view[]" class="selectpicker form-control">
                                            <?php
                                            if (is_array($profession)) {
                                                foreach ($profession as $row) {
                                                    $selectedProfessions = explode(',',$editevent['profession_view']);
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
                                        <i class="fa fa-check"></i> &nbsp; &nbsp; Save</button>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

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




    <script type="application/javascript">
        $('#event').validate({
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
                summary:{
                    required:true
                },

                category:{
                    required:true
                },


                start_date:{
                    required:true
                },
                end_date:{
                    required:true
                },

                'primary_photo': {

                    extension: "png,jpg,jpeg,gif"
                },
                'photo_2': {

                    extension: "png,jpg,jpeg,gif"
                },
                'photo_3': {

                    extension: "png,jpg,jpeg,gif"
                }


            },
            messages:{
                title: {
                    required: "Title is Required",},

                description: {
                    required: "Description is Required",},
                summary: {
                    required: "Summary is Required",},

                category: {
                    required: "Event Category is Required",},

                seats_no: {
                    required: "Seats no is Required, Number digit provide",
                },

                start_date: {
                    required: "Event Start Date is Required",
                },
                end_date: {
                    required: "Event End Date is Required",
                },
                'primary_photo':{

                    extension:"Only Image Format  file is allowed!"
                },
                'photo_2':{

                    extension:"Only Image Format  file is allowed!"
                },
                'photo_3':{

                    extension:"Only Image Format  file is allowed!"
                }

            }
        });
    </script>





    <link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">


