
<style type="text/css">
    .list-group{
       margin-bottom: 10px;
    }
</style>

<div class="content-wrapper">

    <section class="content-header">
        <h4><i class="fa fa-search"></i>
            Search Doctor's For Appointment
        </h4>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post"  action="<?php echo base_url('Search_Appointment'); ?>">

                                <div class="col-lg-6">



                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Profession</label><span id='profession_view-error' class='error' for='profession_view'></span>

                                            <select onchange="getpro(this)"  name="profession" id="profession" class="selectpicker form-control">
                                                <option value="">Select</option>
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

                                    <div class="col-lg-12">
                                        <div id="pro">
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
                                            <label>Postal Code / Zip code</label>
                                            <?php $v = (set_value('postal') != '')?set_value('postal'):'';?>
                                            <input name="postal" type="text" value="<?php echo $v;?>" placeholder="Postal Code" class="form-control">
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
                                                <?php if(is_array($result)):
                                                   // echo "<pre>";
                                                   // print_r($result);
                                                   //echo "<pre>";
                                                    ?>

                                                    <?php foreach($result as $row):

                                                        ?>
                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="box box-widget widget-user-2">
                                                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                                                <div class="widget-user-header ">
                                                                    <div class="widget-user-image text-center">


                                                                    </div>
                                                                    </br>
                                                                </div>
                                                                <div class="box-footer ">
                                                                    <ul class=" list-group list-group-unbordered">
                                                                        <li class="list-group-item">
                                                                            <?php

                                                                            // print_r($row);
                                                                            if($row->photo == '') {?>

                                                                                <div class="text-center">
                                                                                    <img src="<?php echo base_url() . '/assets/upload_prfl.png'?>" alt="" class="img-rounded " width="30" height="30" />
                                                                                </div>
                                                                                </br>

                                                                            <?php }
                                                                            else {?>


                                                                                <img src="<?php echo base_url() . '/assets/file/' .$row->photo; ?>" alt="" width="30" height="30" class="img-rounded" />
                                                                                </br>
                                                                            <?php }
                                                                            ?>

                                                                        </li>
                                                                        <li class="list-group-item">Profession <span class="pull-right  small"><?php echo getProfessionById($row->parent_profession); ?></span></li>
                                                                        <li class="list-group-item">Speciality <span class="pull-right small "><?php echo (!empty(getsubProId($row->profession)))?getsubProId($row->profession):'<span class="badge bg-red">Not Given</span>' ; ?></span></li>

                                                                        <li class="list-group-item">Email :  <span class="pull-right  small"><?php echo (!empty($row->email))?$row->email:''?></span></li>
                                                                        <?php if($row->appointment == 1) {
                                                                            ?>
                                                                            <li class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i> <small>Appointment ( Yes )</small> </li>
                                                                       <? }else{?>
                                                                            <li class="list-group-item"> <small>No Appointment</small> </li>



                                                                        <? }?>



                                                                        <li class="list-group-item"><a href="<?php echo base_url('Search/details_appointment/').'/'.$row->id; ?>">More Detials</a> </li>
                                                                    </ul>

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




<!--match Home page modal-->
<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="search_doctors" class="modal fade">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-cog"></i> &nbsp;Quick Messge to Doctors</h4>
            </div>

            <form role="form" name="search_form" method="post" id="search_form" enctype="multipart/form-data" action="#">
                <div class="modal-body">
                    <div class="col-md-12 no-padding" >
                        <section class="panel">
                            <div class="panel-body">
                                <div id="loadhtmldoctors"></div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button data-dismiss="modal" class="btn btn-danger btn-lg pull-left" type="button">
                                <i class="fa fa-undo"></i> &nbsp; &nbsp; Cancel</button>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" name="submit" class="btn  btn-success  btn-lg"  id="updatedoctors" name="loginStatus" > </input>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
<!--match Home page  modal-->


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


    function getpro(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {pro: value};
        $.ajax({
            type: 'POST',
            url: base_url + "Search/getProByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#pro").html(resultData);
            }

        });

    }

</script>






<script type="application/javascript">


    $(function(){
        $('.searching').click(function(){
            var base_url = '<?php echo base_url() ?>';
            var id=$(this).data('id');

            $.ajax({
                type: 'POST',
                url: base_url + "Search/get_user_modal/"+id,
                data: $("#search_form").serialize(),
                datatype: "text",
                success: function(viewstml){
                    $('#loadhtmldoctors').html(viewstml);
                }
            });
        });

    });


    $(function(){
        $("#updatedoctors").click(function(e){
            var base_url = '<?php  echo base_url() ?>';
            $.ajax({
                url:base_url + "Search/new_appoinment/",
                type: 'POST',
                data: $("#search_form").serialize(),
                dataType: "json",
                success: function (data) {

                    if(data.status == "success")
                    {

                        var homepage = data.datahome.is_homepage;
                        if(homepage != 0)
                        {
                            swal("Your Request Send successfully", "Thanks for  Message this Doctors", "success");
                            setTimeout(function(){
                                window.location.reload(1000);
                            }, 10000);
                        }
                        else{

                        }
                    }

                },

            });
            e.preventDefault();

        });

    });






</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>