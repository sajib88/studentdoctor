<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/17/2016
 * Time: 5:05 PM
 */
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-search"></i>
            Search Personals

        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="panel-body">
                            <form role="form" method="post" id="personalform" enctype="multipart/form-data" action="<?php echo base_url('personal/search'); ?>">
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
<!--                                    <div class="col-lg-12">-->
<!--                                        <div class="form-group">-->
<!--                                            <label>Profession</label><span id='profession_view-error' class='error' for='profession_view'></span>-->
<!--                                            <select name="profession" class="selectpicker form-control">-->
<!--                                                <option value="">All Profession</option>-->
<!--                                                --><?php
//                                                if (is_array($profession)) {
//                                                    foreach ($profession as $row) {
//                                                        ?>
<!--                                                        <option  value="--><?php //echo $row->id; ?><!--">--><?php //echo $row->name; ?><!--</option>-->
<!--                                                        --><?php
//                                                    }
//                                                }
//                                                ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
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
                                            <label>Interest in:</label>
                                            <?php $interestedin = array('MAN'=>'MAN','WOMAN'=>'WOMEN');?>
                                            <select name="interestedin" class="form-control chosen-select">
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
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>

                                                        <th class="numeric">#</th>

                                                        <th class="numeric"><?php echo 'Title'; ?></th>

                                                        <th class="numeric"><?php echo 'Body'; ?></th>

                                                        <th class="numeric"><?php echo 'Ethnicity'; ?></th>

                                                        <th class="numeric"><?php echo 'Maritalstatus'; ?></th>

                                                        <th class="numeric"><?php echo 'Age'; ?></th>
                                                        <th class="numeric"><?php echo 'View'; ?></th>


                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if (!empty($result)) {
                                                        $i = 1;
                                                        foreach ($result as $row) { ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td data-title="<?php echo 'title'; ?>"
                                                                    class="numeric"><?php echo (!empty($row->title))?$row->title:'<span class="badge bg-red">Not Given</span>'; ?></td>
                                                                <td data-title="<?php echo 'body'; ?>"
                                                                    class="numeric"><span
                                                                        class=""><?php echo (!empty($row->body))?$row->body:'<span class="badge bg-red">Not Given</span>'; ?></span>
                                                                </td>
                                                                <td data-title="<?php echo 'ethnicity'; ?>"
                                                                    class="numeric"><span
                                                                        class=""><?php echo (!empty($row->ethnicity))?$row->ethnicity:'<span class="badge bg-red">Not Given</span>'; ?></span>
                                                                </td>
                                                                <td data-title="<?php echo 'maritalstatus'; ?>"
                                                                    class="numeric"><span
                                                                        class=""><?php echo (!empty($row->maritalstatus))?$row->maritalstatus:'<span class="badge bg-red">Not Given</span>'; ?></span>
                                                                </td>
                                                                <td data-title="<?php echo 'age'; ?>"
                                                                    class="numeric"><span
                                                                        class=""><?php echo (!empty($row->age))?$row->age:'<span class="badge bg-red">Not Given</span>'; ?></span>
                                                                </td>
                                                                <td data-title="<?php echo 'View'; ?>" class="numeric">
                                                                    <a href="<?php echo base_url('personal/detail/' . $row->id); ?>" class="btn btn-block btn-dropbox"> View</a></td>

                                                            </tr>
                                                            <?php $i++;
                                                        }
                                                    } ?>
                                                    </tbody>
                                                </table>
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
