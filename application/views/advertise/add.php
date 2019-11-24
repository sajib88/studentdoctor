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
    <h3>
        <i class="glyphicon glyphicon-tags"></i>  &nbsp;New Advertise
    </h3>
</section>

<section class="content">
<div class="row">
    <?php if($this->session->flashdata('message')){ ?>
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success! New  Advertise Successfully.</strong>
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

    <form role="form" method="post" id="adform" enctype="multipart/form-data" action="<?php echo base_url('advertise/add'); ?>">
        <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">

        <div class="col-md-12">

            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Advertise  Info</h3></i>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label>Ad Name</label>
                            <input name="ad_name"  class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Start Date</label><span id='date' class='error' for='start_date'></span>
                            <input name="start_date" type="text" class="form-control pull-right date" id="datepicker">
                        </div>

                        <div class="form-group">
                            <label>End Date</label><span id='date' class='error' for='start_date'></span>
                            <input name="end_date" type="text" class="form-control pull-right date" id="datepicker2">
                        </div>

                        <div class="form-group">
                            <label>Ad Image</label>
                            <input class="btn btn-default btn-cust" name="ad_image" type="file" >
                        </div>


                        <div class="box box-primary">
                            <!-- /.box-header -->
                            <div class="">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-12 professionView">
                                            <div class="col-lg-6">
                                                <label><h4>Select Pages You want show your Advertise</h4></label>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <div class="form-group">
                                                    <select multiple name="ad_view[]" class="selectpicker form-control">
                                                        <?php
                                                        if (is_array($ad_place)) {
                                                            foreach ($ad_place as $row) {
                                                                ?>
                                                                <option  value="<?php echo $row->p_id; ?>"><?php echo $row->page_name ; ?></option>
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


                                    <div class="">
                                        <div class="row">
                                            <div class="col-lg-12 professionView">

                                                <label><h4>Select profession(s) permitted to see your Advertise. </h4></label>
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
        $('#datepicker2').datepicker({
            startDate: new Date(),
            todayHighlight: true,
            defaultDate: new Date(),
            autoclose: true,
            minDate: 0,
            format: "mm/dd/yyyy"
        });




    });



</script>
<script type="application/javascript">
    $('#adform').validate({
        rules: {
            ad_name: {
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



            'ad_image': {
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
            ad_name: {
                required: "Add  Name is Required",},

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




            'ad_image':{
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




