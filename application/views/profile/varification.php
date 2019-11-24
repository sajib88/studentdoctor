<style>

</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-user-md"></i>
           Level 3 Profile Verification File Upload Panel
        </h1>
    </section>

    <section class="content">

        <!-- /.row -->
        <div class="row">

            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> <?php echo $this->session->flashdata('message');?></strong>
                    </div>
                </div>
            <?php } $this->session->unset_userdata('message'); ?>

            <form role="form" method="post" id="website" enctype="multipart/form-data" action="<?php echo base_url('varify'); ?>">
                <div class="col-md-6">
                    <div class="col-md-12 no-padding">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="fa fa-th"></i>
                                <h3 class="box-title">My Profile Verification File Upload Panel</h3></i>
                            </div>
                            <?php /// print_r($user_profile_verify)?>

                            <input type="hidden" name="full_name" value="<?= $user_profile_verify['full_name']?>"  class="form-control">
                            <input type="hidden" name="email" value="<?= $user_profile_verify['email']?>"  class="form-control">
                            <input type="hidden" name="profession" value="<?= $user_profile_verify['profession']?>"  class="form-control">
                            <input type="hidden" name="npi" value="<?= $user_profile_verify['npi']?>"  class="form-control">
                            <input type="hidden" name="country" value="<?= $user_profile_verify['country']?>"  class="form-control">
                            <input type="hidden" name="state" value="<?= $user_profile_verify['state']?>"  class="form-control">
                            <input type="hidden" name="city" value="<?= $user_profile_verify['city']?>"  class="form-control">
                            <input type="hidden" name="university" value="<?= $user_profile_verify['university']?>"  class="form-control">


                            <div class="padd">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="photo_id">
                                            <label>Update Document 1<span class="error">*</span></label>
                                            <input name="update_doc_1" class="btn btn-default btn-cust" type="file" required>
                                            <small class="bg-red"><i class="fa fa-star-o"></i> Must be Upload 1 Document </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="photo_id">
                                            <label>Update Document 2</label>
                                            <input name="update_doc_2" class="btn btn-default btn-cust" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="file_id">
                                            <label>Update Document 3</label>
                                            <input name="update_doc_3" class="btn btn-default btn-cust" type="file" >
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="file_id">
                                            <label>Update Document 4</label>
                                            <input name="update_doc_4" class="btn btn-default btn-cust" type="file" >
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 no-padding">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="fa fa-bullhorn"></i>
                                <h3 class="box-title">Document</h3></i>
                            </div>
                            <div class="padd">

                                <div class="callout callout-success">
                                    <h4><i class="icon fa fa-check"></i> Document</h4>
                                    <p>Please upload atleast one Document to varify your profile. Document formats are </p>
                                    <p>   (jpg, jpeg, png, bmp, gif, pdf, tif, tiff, txt, csv, doc, docx, xls, xlsx, xlt, pps, ppt, pptx, ods)</p>

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



            <!-- /.row (nested) -->




            <!-- /.col-lg-12 -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

<script>
    jQuery(document).ready(function() {
        $('#photo').click(function() {
            $("#photo_id").append('<input name="photo2" type="file">');
        });

        $('#file').click(function() {
            $("#file_id").append('<input name="file2" type="file">');
        });
    });

    function getComboA(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "profile/Profile/getStateByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#result").html(resultData);
            }
        });

    }

</script>

<script type="application/javascript">
    $('#website').validate({
        rules: {
            full_name: {
                required:true
            },
            npi: {
                required:true
            },
            country:{
                required:true
            },
            city:{
                required:true
            },

            university:{
                required:true
            },


            'doc_1': {
                required: true,
                extension: "jpg,jpeg,png,bmp,gif,pdf,tif,tiff,txt,csv,doc,docx,xls,xlsx,xlt,pps,ppt,pptx,ods"
            },
            'doc_2': {

                extension: "jpg,jpeg,png,bmp,gif,pdf,tif,tiff,txt,csv,doc,docx,xls,xlsx,xlt,pps,ppt,pptx,ods"
            },
            'doc_3': {

                extension: "jpg,jpeg,png,bmp,gif,pdf,tif,tiff,txt,csv,doc,docx,xls,xlsx,xlt,pps,ppt,pptx,ods"
            }
        },
        messages:{
            full_name: {
                required: "Full Name is Required",},

            npi: {
                required: "NPI is Required",},

            country: {
                required: "Country is Required",},

            city: {
                required: "City is Required",},

            university: {
                required: "College/University Name is Required",
            },
            'doc_1':{
                required : "<p class='text-danger'>Please Upload atleast 1 Document</p>",
                extension:"Only supported file Format is Allowed!"
            },
            'doc_2':{
                extension:"Only supported file Format is Allowed!"
            },
            'doc_3':{
                extension:"Only supported file Format is Allowed!"
            }
        }
    });

    jQuery(document).ready(function () {

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


        //show hide time picker
        $('#appointment').on('change',function(){
            //alert($(this).val());
            if( $(this).val()== 1){
                $("#set_date_time").show('slow');
            }
            else{
                $("#set_date_time").hide('slow');
            }
        });

        $('#js_store').on('change',function(){
            //alert($(this).val());
            if( $(this).val()== 1){
                $("#store_name").show('slow');
            }
            else{
                $("#store_name").hide('slow');
            }
        });

    });


</script>

<link rel="stylesheet" href="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.css">