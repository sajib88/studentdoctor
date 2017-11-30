<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 09-Dec-16
 * Time: 10:31 PM
 */
/*print '<pre>';
print_r($user_info);die;*/

?>

<style>

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
        <h1><i class="fa fa-male"></i>
           New Personal
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('message');?>
                    </div>
                </div>
            <?php } $this->session->unset_userdata('message'); ?>

            <form role="form" method="post" id="personalform" enctype="multipart/form-data" action="<?php echo base_url('personal/add'); ?>">
            <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">

            <div class="col-md-6 ">
                <div class="col-md-12 no-padding">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-th"></i>
                            <h3 class="box-title">Personal Info</h3></i>
                        </div>
                        <div class="padd">
                            <div class="form-group">
                                <?php $v = (set_value('title')!='')?set_value('title'):'';?>
                                <label>Title<span class="error">*</span></label>
                                <input name="title" type="text" placeholder="Title" value="<?php echo $v?>"  class="form-control">
                            </div>
                            <div class="form-group">
                                <?php $v = (set_value('description')!='')?set_value('description'):'';?>
                                <label>Description<span class="error">*</span></label>
                                <textarea  name="description" placeholder="description" class="form-control"><?php echo $v;?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input type="number" name="age"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ethnicity</label>
                                <?php $ethnicity= array('African American','Asian','Caucasian','East Indian','Islander','Hispanic','Middle Eastern','Mixed');?>
                                <select name="ethnicity" class="form-control chosen-select">
                                    <option value="0">N/A</option>
                                    <?php foreach ($ethnicity as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Religion</label>
                                <?php $religion= array('Agnostic','Atheist','Buddhist','Catholic','Christian','Hindu','Jewish','Mormon','Muslim','Spiritual' );?>
                                <select name="religion" class="form-control chosen-select">
                                    <option value="0">N/A</option>
                                    <?php foreach ($religion as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Marital Status</label>
                                <?php $maritalstatus= array('Single','Attached','Divorced','Married','Separated','Widow','It\'s Complicated');?>
                                <select name="maritalstatus" class="form-control chosen-select">
                                    <?php foreach ($maritalstatus as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Language</label>
                                <?php $languages = array('English','Afrikaans','Arabic','Bulgarian','Burmese','Cantonese','Croatian','Danish','Dutch','Esperanto','Estonian','Finnish','French','German','Greek','Gujrati','Hebrew','Hindi','Hungarian','Icelandic','Indian','Indonesian','Italian','Japanese','Korean','Latvian','Lithuanian','Malay','Mandarin','Marathi','Moldovian','Nepalese','Norwegian','Persian','Polish','Portuguese','Punjabi','Romanian','Russian','Serbian','Spanish','Swedish','Tagalog','Taiwanese','Tamil','Telugu','Thai','Tongan','Turkish','Ukrainian','Urdu','Vietnamese','Visayan');?>
                                <select name="lang" class="form-control chosen-select">
                                    <?php foreach ($languages as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 no-padding">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-male"></i>
                            <h3 class="box-title">Body Description</h3></i>
                        </div>
                        <div class="padd">
                            <div class="form-group">
                                <label>Body</label>
                                <?php $body = array('N/A','Athletic','Average','Cuddly','Disabled','Few Extra Pounds','Full','Large','Muscular','Petit','Slim');?>
                                <select name="body" class="form-control chosen-select">
                                    <option value="">Select Body</option>
                                    <?php foreach ($body as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Height</label>
                                <?php $height = array('4-fit-7 (140cm) or below','4-fit-8 - 4-fit-11 (141-150cm)','5-fit - 5-fit-3 (151-160cm)','5-fit-4 - 5-fit-7 (161-170cm)','5-fit-8 - 5-fit-11 (171-180cm)','6-fit  - 6-fit-3 (181-190cm)','6-fit-4 (191cm) or above');?>
                                <select name="height" class="form-control chosen-select">
                                    <option value="0">N/A</option>
                                    <?php foreach ($height as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Eye Color</label>
                                <?php $eyecolor = array('Amber','Black','Blue','Brown','Gray','Green','Hazel','Red','Violet');?>
                                <select name="eyecolor" class="form-control chosen-select">
                                    <option value="0">N/A</option>
                                    <?php foreach ($eyecolor as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hair Color</label>
                                <?php $haircolor = array('Amber','Black','Blond','Brown','Chestnut','Red','Grey and white');?>
                                <select name="haircolor" class="form-control chosen-select">
                                    <option value="0">N/A</option>
                                    <?php foreach ($haircolor as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 no-padding">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-eye"></i>
                            <h3 class="box-title">Interested In</h3></i>
                        </div>
                        <div class="padd">

                            <div class="form-group">
                                <label>I AM A<span class="error">*</span></label>
                                <?php $iam= array('MAN','WOMAN');?>
                                <select name="iam" class="form-control chosen-select">
                                    <option value="">Select</option>
                                    <?php foreach ($iam as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>LOOKING FOR A<span class="error">*</span></label>
                                <?php $iam= array('MAN','WOMAN');?>
                                <select name="interestedin" class="form-control chosen-select">
                                    <option value="">Select</option>
                                    <?php foreach ($iam as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 no-padding">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-map-marker"></i>
                            <h3 class="box-title">Address</h3></i>
                        </div>
                        <div class="padd">
                            <div class="form-group">
                                <label>Country<span class="error">*</span></label>
                                <select onchange="getComboA(this)" name="country" id="js_country" class="form-control">
                                    <option value="">Select</option>
                                    <?php
                                    if (is_array($countries)) {
                                        foreach ($countries as $country) {
                                            $sel = ($country->id == set_value('country'))?'selected="selected"':'';
                                            ?>
                                            <option  value="<?php echo $country->id; ?>" <?php echo $sel;?> ><?php echo $country->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('country');?>
                            </div>
                            <div class="form-group">
                                <div id="result">
                                </div>
                            </div>


                            <div class="form-group">
                                <label>City</label>
                                <input name="city" type="text" placeholder="City" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Postal Code</label>
                                <input name="zip" type="text" placeholder="Postal Code" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 no-padding">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="glyphicon glyphicon-chevron-down"></i>
                            <h3 class="box-title">Other Info</h3></i>
                        </div>
                        <div class="padd">
                            <div class="form-group">
                                <label>Child</label>
                                <input type="number" name="child"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Smoker</label>
                                <?php $smoker = array('No','Rarely','Often','Very Often' );?>
                                <select name="smoker" class="form-control chosen-select">
                                    <?php foreach ($smoker as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Drinker</label>
                                <?php $drinker = array('No','Rarely','Often','Very Often' );?>
                                <select name="drinker" class="form-control chosen-select">
                                    <?php foreach ($drinker as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Intimacy/Preference</label>
                                <?php $intimacy = array('Like to experiment','Don\'t like to experiment','Soulmate','Lifemate but no marriage','Lifemate and marriage','Casual affair only' );?>
                                <select name="entimicyorpreference" class="form-control chosen-select">
                                    <option value="0">N/A</option>
                                    <?php foreach ($intimacy as $row) {?>
                                        <option value="<?php echo $row;?>"><?php echo $row?></option>
                                    <?php }?>
                                </select>
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
                                        <label>Picture One<span class="error">*</span></label><span id='file1-error' class='error' for='file1'></label>
                                        <?php $v = (set_value('primary_photo') != '')?set_value('primary_photo'):'';?>
                                        <input class="btn btn-default btn-cust" name="primary_photo" type="file" value="<?php echo $v;?>">
                                        <small class="label bg-green"> JPG, GIF, PNG Format Allow</small>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Video 1</label><span id='primary_video-error' class='error' for='primary_video'></span>
                                        <input class="btn btn-default btn-cust" name="primary_videos" type="file">
                                    </div>
                                </div>
                            </div>

                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Picture Two</label>
                                        <input class="btn btn-default btn-cust" name="photo1" type="file">
                                        <small class="label bg-green"> JPG, GIF, PNG Format Allow</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Videos 2</label><span id='video1-error' class='error' for='video1_video'></span>
                                        <input class="btn btn-default btn-cust" name="videos1" type="file">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Picture Three</label><span id='picture3-error' class='error' for='picture3'></span>
                                        <input class="btn btn-default btn-cust" name="photo2" type="file">
                                        <small class="label bg-green"> JPG, GIF, PNG Format Allow</small>
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
                                        <label><h4>Select profession(s) permitted to see your personals. </h4></label>
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
    </section>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>

<script type="application/javascript">
    $('#personalform').validate({
        rules: {
            title: {
                required:true
            },
            description:{
                required:true
            },
            iam:{
                required:true
            },
            interestedin:{
                required:true
            },
            country:{
                required:true
            },
            'primary_photo': {
                required: true,
                extension: "png,jpg,jpeg,gif"
            }


        },
        messages:{
            title: {
                required: "Title is Required",},

            description: {
                required: "Description is Required",
            },
            iam: {
                required: "This is Required",
            },
            interestedin: {
                required: "This is Required",
            },
            country: {
                required: "Country is Required",
            },
            'primary_photo':{
                required : "Please upload atleast 1 photo",
                extension:"Only Image Format  file is allowed!"
            }
        }
    });
</script>

<script>
    jQuery(document).ready(function() {
        $('#photo').click(function() {
            $("#photo_id").append('<input class="btn btn-default" name="photo2" type="file">');
        });

        $('#file').click(function() {
            $("#file_id").append('<input class="btn btn-default" name="file2" type="file">');
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
