<div id="page-wrapper">
<div class="row">

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
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" id="event" enctype="multipart/form-data" action="<?php echo base_url('admin/Events/Events/edit/'. $editevent['id']); ?>">
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Name<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                                        <input name="title" value="<?php echo $editevent['title']; ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Summary<span class="error">*</span></label><span id='Summary' class='error' for='description'></span>
                                        <textarea  name="summary" class="form-control"><?php echo $editevent['summary']; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Description<span class="error">*</span></label><span id='Description' class='error' for='description'></span>
                                        <textarea  name="description" class="form-control"><?php echo $editevent['description']; ?></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Category <span class="error">*</span></label><span id='main_category-error' class='error' for='main_category'></span>
                                        <select onchange="getSubCat(this)" name="category" class="form-control">
                                        <option value="<?php echo $editevent['category']; ?>"><?php echo $editevent['category']; ?></option>

                                            <option value="Conferences">Conferences</option>
                                            <option value="Education">Education</option>
                                            <option value="Fundraisers">Fundraisers</option>
                                            <option value="Health Observances">Health Observances</option>
                                            <option value="Public Events">Public Events</option>
                                            <option value="Seminars">Seminars</option>
                                            <option value="Special Events">Special Events</option>
                                            <option value="Support Groups">Support Groups</option>

                                        </select>
                                    </div>
                                </div>





                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Seats No<span class="error">*</span></label><span id='seats_no' class='error' for='seats_no'></span>
                                        <input name="seats_no" value="<?php echo $editevent['seats_no']; ?>"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Event Location/ Place<span class="error">*</span></label><span id='location' class='error' for='location'></span>
                                        <input name="location" value="<?php echo $editevent['location']; ?>"  class="form-control">
                                    </div>
                                </div>





                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>


        <div class="col-lg-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Event Date And Time Set</h3>
                </div>
                <div class="box-body">




                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Event Start Date<span class="error">*</span></label><span id='start_date' class='error' for='start_date'></span>
                            <input name="start_date" type="text" value="<?php echo $editevent['start_date']; ?>" class="form-control pull-right" id="datepicker">
                        </div>
                    </div>

                    <div class="col-lg-6 bootstrap-timepicker">
                        <div class="form-group">
                            <label>Time picker:</label>

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


                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Event End Date<span class="error">*</span></label><span id='end_date' class='error' for='start_date'></span>
                            <input name="end_date" type="text" value="<?php echo $editevent['end_date']; ?>" class="form-control pull-right" id="datepicker2">
                        </div>
                    </div>

                    <div class="col-lg-6 bootstrap-timepicker">
                        <div class="form-group">
                            <label>Time picker:</label>

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
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-lg-12">
                        <div class="form-group" id="photo_id">
                            <label>Picture One<span class="error">*</span></label><span id='picture1-error' class='error' for='picture1'></span>
                            <input class="btn btn-default" name="primary_photo" type="file">

                        </div>
                        <?php if (!empty($editevent['primary_photo'])) { ?>
                            <div class="col-lg-6 pull-right">
                                <img src="<?php echo base_url() . '/assets/file/event/' .$editevent['primary_photo']; ?>" alt="" width="100" class="img-circle img-responsive" />
                            </div>
                        <?php }
                        ?>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                            <input class="btn btn-default" name="photo_2" type="file">
                        </div>
                        <?php if (!empty($editevent['photo_2'])) { ?>
                            <div class="col-lg-6 pull-right">
                                <img src="<?php echo base_url() . '/assets/file/event/' .$editevent['photo_2']; ?>" alt="" width="100" class="img-circle img-responsive" />
                            </div>
                        <?php }
                        ?>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                            <input class="btn btn-default" name="photo_3" type="file">
                        </div>
                        <?php if (!empty($editevent['photo_3'])) { ?>
                            <div class="col-lg-6 pull-right">
                                <img style="margin-bottom: 20px" src="<?php echo base_url() . '/assets/file/event/' .$editevent['photo_3']; ?>" alt="" width="100" class="img-circle img-responsive" />
                            </div>
                        <?php }
                        ?>
                    </div>
                    <div class="col-lg-12">
                        <input type="submit" name="submit" class="btn btn-block btn-success" value="Save">

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

                seats_no:{
                    required:true
                },
                start_date:{
                    required:true
                },
                end_date:{
                    required:true
                },

                'primary_photo': {
                    required: true,
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
                    required : "<p class='text-danger'>Please upload atleast 1 photo</p>",
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


