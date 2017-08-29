<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/17/2016
 * Time: 5:05 PM
 */


/*print '<pre>';
print_r($result);
exit();*/
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Search Profile
            <small>search</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Profile</a></li>
            <li class="active">search</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post"  action="<?php echo base_url('profile/profile/search'); ?>">

                                <div class="col-lg-6">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>First name</label>
                                            <?php $v = (set_value('first_name') != '')?set_value('first_name'):'';?>
                                            <input type="text" name="first_name" value="<?php echo $v;?>" placeholder="First Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <?php $v = (set_value('last_name') != '')?set_value('last_name'):'';?>
                                            <input type="text" name="last_name" value="<?php echo $v;?>" placeholder="Last Name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Profession</label><span id='profession_view-error' class='error' for='profession_view'></span>
                                            <select name="profession" class="selectpicker form-control">
                                                <option value="">All Profession</option>
                                                <?php
                                                if (is_array($profession)) {
                                                    foreach ($profession as $row) {
                                                        $v = (set_value('profession')!='')?set_value('profession'):'';
                                                        $sel = ($v==$row->id)?'selected="selected"':'';
                                                        ?>
                                                        <option value="<?php echo $row->id; ?>" <?php echo $sel;?>><?php echo $row->name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6">

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
                                            <?php $v = (set_value('city') != '')?set_value('city'):'';?>
                                            <input name="city" type="text" value="<?php echo $v;?>" placeholder="City" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>



                            </form>



                        </div>
                        <hr/>

                        <div class="box-body table-responsive no-padding">
                            <?php if(isset($result)) {
                                if (count($result) <= 0) {
                                    ?>
                                    <div class="alert alert-info">No Profile Found !</div>
                                <?php } else {
                                    if (!empty($result)) { ?>

                                        <section class="content">
                                            <div class="row">
                                                <?php if(is_array($result)): ?>

                                                    <?php foreach($result as $row):?>
                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="box box-widget widget-user-2">
                                                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                                                <div class="widget-user-header ">
                                                                    <div class="widget-user-image text-center">


                                                                        <?php
                                                                        if($row->profilepicture == 0) {?>
                                                                            </br>
                                                                        <div class="text-center">
                                                                            <img src="<?php echo base_url() . '/assets/upload_prfl.png'?>" alt="" class="img-rounded " width="150" height="150" />
                                                                        </div>
                                                                            </br>

                                                                        <?php }
                                                                        else {?>
                                                                             </br>

                                                                                <img src="<?php echo base_url() . '/assets/file/' .$row->profilepicture; ?>" alt="" width="170" height="170" class="img-circle " />
                                                                            </br>
                                                                        <?php }
                                                                        ?>





                                                                    </div>
                                                                    </br>
                                                                </div>
                                                                <div class="box-footer no-padding">
                                                                    <ul class="nav nav-stacked">
                                                                        <li><a href="#">First Name <span class="pull-right badge bg-blue"><?php echo $row->first_name; ?></span></a></li>
                                                                        <li><a href="#">Last Name <span class="pull-right badge bg-aqua"><?php echo $row->last_name; ?></span></a></li>
                                                                        <li><a href="#">Email Id <span class="pull-right badge bg-green"><?php echo $row->email; ?></span></a></li>
                                                                        <li><a href="#">Phone <span class="pull-right badge bg-red"><?php echo $row->phone; ?></span></a></li>
                                                                        <li><a href="#">Profession <span class="pull-right badge bg-red"><?php echo getProfessionById($row->profession); ?></span></a></li>
                                                                    </ul>
                                                                </div>

                                                                <div class="box-footer">

                                                                    <a href="#" class="btn btn-block btn-success"> Details View</a>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php endforeach;?>
                                                <?php endif; ?>
                                            </div>
                                        </section>
                                    <?php }
                                }
                            }?>
                        </div>
                    </div>
                </div>
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
