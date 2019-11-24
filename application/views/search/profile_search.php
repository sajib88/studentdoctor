<style type="text/css">
    .list-group{
       margin-bottom: 10px;
    }
</style>


<?php if(!empty($advertise)){ ?>
    <?php foreach($advertise as $row):?>
        <section class="panel">
            <div class="panel-body">
                <img  src="<?php echo base_url() . '/assets/file/advertise/' .$row['ad_image']; ?>" class="img-responsive"/>
            </div>
        </section>
    <?php endforeach;?>
<?php }else{?>
<?php }?>

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-search"></i>
            Search Professionals
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" id="search" method="post"  action="<?php echo base_url('Search'); ?>">

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

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Specialty <small>Key word By search</small> </label>
                                            <?php $v = (set_value('specialty') != '')?set_value('specialty'):'';?>
                                            <input id="special" name="specialty" type="text" value="<?php echo $v;?>" placeholder="cancer, skin, tooth, etc… " class="form-control">
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
                                                <?php if(is_array($result)): ?>

                                                    <?php foreach($result as $row):?>
                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="box box-widget widget-user-2">
                                                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                                                <div class="widget-user-header ">
                                                                    <div class="widget-user-image text-center">
                                                                        <?php
                                                                        if($row->photo == '') {?>
                                                                            </br>
                                                                        <div class="text-center">
                                                                            <img src="<?php echo base_url() . '/assets/upload_prfl.png'?>" alt="" class="img-rounded " width="150" height="150" />
                                                                        </div>
                                                                            </br>

                                                                        <?php }
                                                                        else {?>
                                                                             </br>

                                                                                <img src="<?php echo base_url() . '/assets/file/' .$row->photo; ?>" alt="" width="170" height="170" class="img-rounded" />
                                                                            </br>
                                                                        <?php }
                                                                        ?>
                                                                        <h5 class="badge bg-green"><?php echo getProfessionById($row->parent_profession); ?></h5>
    <h6><span class="text-center badge bg-black"><?php echo (!empty(getsubProId($row->profession)))?getsubProId($row->profession):'<span class="badge bg-red">Not Given</span>' ; ?></h6>
                                                                    </div>
                                                                    </br>
                                                                </div>
                                                                <div class="box-footer ">
                                                                    <ul class=" list-group list-group-unbordered">
                                                                        <li class="list-group-item">First Name <span class="pull-right  "><?php echo (!empty($row->first_name))?$row->first_name:''?></span></li>
                                                                        <li class="list-group-item">Last Name <span class="pull-right  "><?php echo (!empty($row->last_name))?$row->last_name:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                        <li class="list-group-item">Email <span class="pull-right  "><?php echo (!empty($row->email))?$row->email:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                        <li class="list-group-item">Phone <span class="pull-right "><?php echo (!empty($row->phone))?$row->phone:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                                        <li class="list-group-item">Specialty <span class="pull-right "><?php echo (!empty($row->specialty))?$row->specialty:'<span class="badge bg-red">Not Given</span>' ; ?></span></li></li>
                                                                        <li class="list-group-item"><a href="<?php echo base_url('Search/details_profile/').'/'.$row->id; ?>">Profile Detials</a> </li>
                                                                    </ul>
                                                                <?php
                                                                    if($user_info['profession'] !=100) {
                                                                        ?>
                                                                        <span class="show_button">
                                                                       <a data-toggle="modal" data-id="<?= $row->id; ?>"
                                                                          class=" btn btn-block btn-success searching"
                                                                          href="#search_doctors">Send Request </a>
                                                                    </span>


                                                                        <?php
                                                                    }else{}
                                                                    ?>

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
                url: base_url + "Search/get_doctors_modal/"+id,
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
                url:base_url + "Search/setrequest/",
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

<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var base_url = '<?php echo base_url() ?>';

        $( "#special" ).autocomplete({
            source:base_url + "Search/get_autocomplete/?"

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#special').autocomplete({
            source:base_url + "Search/get_autocomplete"

            select: function (event, ui) {
                $(this).val(ui.item.label);
                $("#form_search").submit();
            }
        });

    });
</script>