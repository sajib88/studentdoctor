<style type="text/css">
    .box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title{
        margin-left: 20px;
        margin-right: -12px;
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
        <h1><i class="fa fa-fw fa-list-alt "></i>
            Add New Listing
        </h1>
    </section>
    <form role="form" method="post" id="classifiedform" enctype="multipart/form-data" action="<?php echo base_url('classifieds/add'); ?>">
        <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
    <section class="content">
    <div class="row">

    <?php if($this->session->flashdata('message')){ ?>
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> 1 New ! Classified  Create successfully.</strong>
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

        <div class="col-md-6 ">
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Classified Info</h3></i>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label>Classified Title<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                            <input name="title" value="<?php echo ''; ?>"  class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Classified Category <span class="error">*</span></label><span id='main_category-error' class='error' for='main_category'></span>
                            <select onchange="getSubCat(this)" name="main_category" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (is_array($main_cat)) {
                                    foreach ($main_cat as $cat) {
                                        ?>
                                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <a data-toggle="modal" href="#myModal" >Create New Classified Category</a>
                        </div>
                        <div class="form-group">
                            <label>Description<span class="error">*</span></label><span id='description-error' class='error' for='description'></span>
                            <textarea  name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Price<span class="error">*</span> (USD)</label><span id='price-error' class='error' for='price'></span>
                            <input type="number" name="price"  class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-plus-square"></i>
                        <h3 class="box-title">Contact</h3>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" value="<?php echo $user_info['first_name']; ?>" class="form-control" readonly >
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" value="<?php echo $user_info['email']; ?>" class="form-control" readonly >
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input name="phone" name="phone" value="<?php echo ''; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Fax</label>
                            <input name="fax" value="<?php echo ''; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Website </label>
                            <input name="website" value="<?php echo ''; ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6 ">
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">Address</h3>
                    </div>
                    <div class="padd">
                        <div class="form-group">
                            <label>Address</label>
                            <input name="address_1" value="<?php echo ''; ?>"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Country<span class="error">*</span></label>
                            <select onchange="getComboA(this)" name="country" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (is_array($countries)) {
                                    foreach ($countries as $country) {
                                        ?>
                                        <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div id="result">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>City<span class="error">*</span></label>
                            <input name="city" value="<?php echo ''; ?>"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input name="postal" value="<?php echo ''; ?>"  class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 no-padding">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-file"></i>
                        <h3 class="box-title">Media</h3>
                    </div>
                    <div class="padd">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" id="photo_id">
                                    <label>Picture One<span class="error">*</span></label><span id='Picture-error' class='error' for='Picture'></span>
                                    <input class="btn btn-default btn-cust" id='primary_photo' name="photo_primary" onchange="validateImage()" type="file">
                                    <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                </div>
                                <div class="form-group">
                                    <label>Picture Two</label><span id='picture2-error' class='error' for='picture2'></span>
                                    <input class="btn btn-default btn-cust" name="photo_2" onchange="validateImage()" type="file">
                                    <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                </div>
                                <div class="form-group">
                                    <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                                    <input class="btn btn-default btn-cust" name="photo_3" onchange="validateImage()" type="file">
                                    <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                </div>
                                <div class="form-group">
                                    <label>Picture Four</label><span id='picture4-error' class='error' for='picture3'></span>
                                    <input class="btn btn-default btn-cust" name="photo_4" type="file">
                                    <small class="label bg-green"> JPG, GIF, PNG Format allow</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" id="file_id">
                                    <label>File One</label><span id='file1-error' class='error' for='file1'></span>
                                    <input class="btn btn-default btn-cust" name="primary_file" type="file">
                                    <small class="label bg-green"> PDF, txt, doc Format allow</small>
                                </div>
                                <div class="form-group">
                                    <label>Audio</label><span id='audio-error' class='error' for='audio'></span>
                                    <input class="btn btn-default btn-cust" name="primary_sound" type="file">
                                    <small class="label bg-green"> mp3 Format allow</small>
                                </div>
                                <div class="form-group">
                                    <label>Video</label><span id='videos-error' class='error' for='videos'></span>
                                    <input class="btn btn-default btn-cust" name="primary_video" type="file">
                                    <small class="label bg-green"> mp4 Format allow</small>
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
                                        <label><h4>Select profession(s) permitted to see your classifieds.</h4></label>
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



    </div>
        </section>
        <!-- /.col-lg-12 -->
    </form>
    </div>
    <!-- /.container-fluid -->

<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Category</h4>
            </div>


            <div class="modal-body">
                <form role="form" method="post" id="post" enctype="multipart/form-data"
                      action="<?php  echo base_url('classifieds/Classifieds/addCat/'); ?>">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Classified Category Name<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
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
    <script type="application/javascript">
        $('#classifiedform').validate({
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

                category:{
                    required:true
                },
                price:{
                    required:true,
                    number: true
                },
                seats_no:{
                    required:true
                },
                country:{
                    required:true
                },
                city:{
                    required:true

                },

                prof:{
                    required:true
                },

                'photo_primary': {
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
                title: {
                    required: "Classified Title is Required",},

                main_category: {
                    required: "Classified Category is Required",},

                description: {
                    required: "Description is Required",},

                price: {
                    required: "Price is Required, 0-9 Number digit only allow",
                },

                seats_no: {
                    required: "Seats no is Required, Number digit provide",
                },

                country: {
                    required: "Classified Country is Required",
                },
                city: {
                    required: "City is Required",
                },
                prof: {
                    required: "prof is Required",
                },
                'photo_primary':{
                    required : "Please upload atleast 1 photo",
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





