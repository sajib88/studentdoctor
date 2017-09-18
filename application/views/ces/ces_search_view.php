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
            Search personal
        </h1>
    </section>
    <section class="content">
        <div class="row">


            <form role="form" method="post" id="personalform" enctype="multipart/form-data" action="<?php echo base_url('ces/search'); ?>">

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
                                    <label>Post Code</label>
                                    <input name="postcode" type="text" placeholder="Postcode" class="form-control">
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

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box box-primary">
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input name="business_name" type="text" placeholder="Business Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Business phone</label>
                                    <input name="business_phone" type="text" placeholder="Business Phone" class="form-control">
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


                <?php if(isset($result)) {
                if (count($result) > 0)  {
                if (!empty($result)) {
                ?>

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

                                    <th class="numeric"><?php echo 'title'; ?></th>

                                    <th class="numeric"><?php echo 'Country'; ?></th>

                                    <th class="numeric"><?php echo 'State'; ?></th>

                                    <th class="numeric"><?php echo 'Price'; ?></th>

                                    <th class="numeric"><?php echo 'Special Price'; ?></th>
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
                                                class="numeric"><?php echo $row->title; ?></td>
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span
                                                        class=""><?php echo countryNameByID($row->country); ?></span>
                                            </td>
                                            <td data-title="<?php echo 'ethnicity'; ?>"
                                                class="numeric"><span
                                                        class=""><?php echo (!empty($row->state)?$row->state:''); ?></span>
                                            </td>
                                            <td data-title="<?php echo 'maritalstatus'; ?>"
                                                class="numeric"><span
                                                        class=""><?php echo (!empty($row->price)?$row->price:''); ?></span>
                                            </td>
                                            <td data-title="<?php echo 'age'; ?>"
                                                class="numeric"><span
                                                        class=""><?php echo (!empty($row->special_price)?$row->special_price:'') ; ?></span>
                                            </td>
                                            <td><a href="<?php echo base_url('ces/detail/' . $row->id); ?>" class="btn btn-block btn-dropbox"> View</a></td>

                                        </tr>
                                        <?php $i++;
                                    }
                                } ?>
                                </tbody>
                            </table>

                            <?php }else{?>
                    <div class="col-lg-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="fa fa-search"></i>
                                <h3 class="box-title">Search Result</h3></i>
                            </div>
                            <div class="panel-body">
                                <div class="box-body table-responsive no-padding">
                                    <div class="alert alert-danger"> No search result found</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                            </div>
                            </div>
                            </div>
                            </div>
                            <?php  }
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
