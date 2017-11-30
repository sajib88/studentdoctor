<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/17/2016
 * Time: 5:05 PM
 */
?>
<style type="text/css">
    .list-group{
        margin-bottom: 10px;
    }
    .no-border{
        border-top:none;
    }
</style>
<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-search"></i>
            Search Personals

        </h1>
    </section>
    <form role="form" method="post" id="personalsearch" name="personalsearch" enctype="multipart/form-data" action="<?php echo base_url('personal/search'); ?>">
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="panel-body">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Country</label>
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
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="result">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input name="city" type="text" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Language</label>
                                            <?php $languages = array('English','Afrikaans','Arabic','Bulgarian','Burmese','Cantonese','Croatian','Danish','Dutch','Esperanto','Estonian','Finnish','French','German','Greek','Gujrati','Hebrew','Hindi','Hungarian','Icelandic','Indian','Indonesian','Italian','Japanese','Korean','Latvian','Lithuanian','Malay','Mandarin','Marathi','Moldovian','Nepalese','Norwegian','Persian','Polish','Portuguese','Punjabi','Romanian','Russian','Serbian','Spanish','Swedish','Tagalog','Taiwanese','Tamil','Telugu','Thai','Tongan','Turkish','Ukrainian','Urdu','Vietnamese','Visayan');?>
                                            <select name="lang" class="form-control chosen-select">
                                                <?php foreach ($languages as $row) {?>

                                                    <option value="">Select</option>
                                                    <option value="<?php echo $row;?>"><?php echo $row?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                    <div class="box box-primary">
                        <div class="panel-body">


                                    <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>I AM A</label>
                                        <?php $iam= array('MAN','WOMAN');?>
                                        <select name="iam" class="form-control chosen-select">
                                            <option value="">Select</option>
                                            <?php foreach ($iam as $row) {?>
                                                <option value="<?php echo $row;?>"><?php echo $row?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>







                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Interested in</label>
                                            <?php $interestedin = array('MAN'=>'MAN','WOMAN'=>'WOMEN');?>
                                            <select  name="interestedin"  class="form-control chosen-select">
                                                <option value="">Select</option>
                                                <?php foreach ($interestedin as $key=>$value) {?>
                                                    <option value="<?php echo $key;?>"><?php echo $value?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Marital status</label>
                                            <?php $maritalstatus= array('Single','Attached','Divorced','Married','Separated','Widow','It\'s Complicated');?>
                                            <select name="maritalstatus" class="form-control chosen-select">
                                                <option value="">Select</option>
                                                <?php foreach ($maritalstatus as $row) {?>
                                                    <option value="<?php echo $row;?>"><?php echo $row?></option>
                                                <?php }?>
                                            </select>
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
                                            <i class="fa fa-check"></i> &nbsp; &nbsp; Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
                        <hr/>

                            <?php if(isset($result)) {
                                if (count($result) <= 0) {
                                    ?>

                                <?php } else {
                                    if (!empty($result)) { ?>
                                <div class="col-lg-12">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <i class="fa fa-search"></i>
                                            <h3 class="box-title">Search Result</h3></i>
                                        </div>
                                        <div class="panel-body">
                                            <div class="box-body table-responsive no-padding">

                                                    <?php if (!empty($result)) {

                                                        foreach ($result as $row) { ?>


                                                            <div class="col-lg-4 col-xs-12">
                                                                <div class="box box-widget widget-user-1">
                                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                                    <div class="widget-user-header ">
                                                                        <div class="widget-user-image text-center">
                                                                            <?php
                                                                            if($row->primary_photo != 0) {?>
                                                                                <br />
                                                                                <img src="<?php echo base_url() . '/assets/file/personals/' .$row->primary_photo; ?>" alt="" width="220" height="200px" class="img-size" />

                                                                            <?php }?>


                                                                        </div>
                                                                        </br>
                                                                    </div>
                                                                    <div class="box-footer no-border">
                                                                        <ul class=" list-group list-group-unbordered">
                                                                            <li class="list-group-item">Personals Title <span class="pull-right  "><?php echo (!empty($row->title))?substr($row->title, 0, 20):''?></span></li>

                                                                            <li class="list-group-item">Country <span class="pull-right  "><?php echo (!empty($row->country))?countryNameByID($row->country):'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                            <li class="list-group-item">State <span class="pull-right  "><?php echo (!empty($row->state))?$row->state:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                            <li class="list-group-item">City <span class="pull-right  "><?php echo (!empty($row->city))?$row->city:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                            <li class="list-group-item">Language <span class="pull-right  "><?php echo (!empty($row->lang))?$row->lang:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                            <li class="list-group-item">Marital status <span class="pull-right  "><?php echo (!empty($row->maritalstatus))?$row->maritalstatus:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                            <li class="list-group-item">I am a <span class="pull-right  "><?php echo (!empty($row->iam))?$row->iam:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                            <li class="list-group-item">Interest in a <span class="pull-right  "><?php echo (!empty($row->interestedin))?$row->interestedin:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                        </ul>
                                                                        <span class="show_button">
                                                                        <a href="<?php echo base_url() .'personal/detail/' .$row->id; ?>" class=" btn btn-block btn-success">See Details</a>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <?php
                                                        }
                                                    } ?>

                                                <?php }else{?>
                                                        <div class="col-lg-12">
                                                            <div class="box-body table-responsive no-padding">
                                                                <div class="alert alert-danger text-center">
                                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                    No search result found <i class="fa fa-info"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                            }?>


         </div>


         </div>
    </section>
</div>







<script type="application/javascript">
    $('#personalsearch').validate({
        rules: {

            iam:{
                required:true
            },
            interestedin:{
                required:true
            }


        },
        messages:{
            iam: {
                required: "i am a filed is required",
            },
            interestedin: {
                required: "Interest filed  is required",
            }

        }
    });
</script>


<script>


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
