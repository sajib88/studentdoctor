<style type="text/css">
    .list-group{
       margin-bottom: 10px;
    }
</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-search"></i>
            Search Profile
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post"  action="<?php echo base_url('profile/search'); ?>">

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
        </div>
                    <hr/>
                    <div class="row">
                        <div class=" table-responsive no-padding">

                            <?php if(isset($result)) {
                                if (empty($result)) {
                                    ?>
                                    <div class="col-md-12">
                                    <div class="alert alert-danger text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <i class="fa fa-info"></i> No Profile Found</div>
                                    </div>
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

                                                                                <img src="<?php echo base_url() . '/assets/file/' .$row->profilepicture; ?>" alt="" width="170" height="170" class="img-rounded" />
                                                                            </br>
                                                                        <?php }
                                                                        ?>
                                                                        <h4><?php echo getProfessionById($row->profession); ?></h4>
                                                                    </div>
                                                                    </br>
                                                                </div>
                                                                <div class="box-footer ">
                                                                    <ul class=" list-group list-group-unbordered">
                                                                        <li class="list-group-item">First Name <span class="pull-right  "><?php echo (!empty($row->first_name))?$row->first_name:''?></span></li>
                                                                        <li class="list-group-item">Last Name <span class="pull-right  "><?php echo (!empty($row->last_name))?$row->last_name:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                        <li class="list-group-item">Email <span class="pull-right  "><?php echo (!empty($row->email))?$row->email:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                        <li class="list-group-item">Phone <span class="pull-right "><?php echo (!empty($row->phone))?$row->phone:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                    </ul>
                                                                    <span class="show_button">
                                                                        <a href="<?php echo base_url() .'showProfile/' .$row->id; ?>" class=" btn btn-block btn-success">See More</a>
                                                                    </span>
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



    </section>
</div>

<script>

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
