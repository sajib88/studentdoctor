<style>

    .btn-cust{
        width: 95%;
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
        <h3>
            <i class="glyphicon glyphicon-tags"></i>  &nbsp;Edit Advertise
        </h3>
    </section>

    <section class="content">
        <div class="row">
            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success! Edit  Advertise Successfully.</strong>
                    </div>
                </div>
            <?php } ?>

            <?php if($this->session->flashdata('message2')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $this->session->flashdata('message2'); ?></strong>
                    </div>
                </div>
            <?php } $this->session->unset_userdata('message2'); ?>

            <form role="form" method="post" id="adform" enctype="multipart/form-data" action="<?php echo base_url('advertise/edit/'.$editad['id']); ?>">
                <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">

                <div class="col-md-12">
<?php //btn-dangerprint_r($ad_place);?>
                    <div class="col-md-12 no-padding">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="fa fa-th"></i>
                                <h3 class="box-title">Advertise  Info</h3></i>
                            </div>
                            <div class="padd">
                                <div class="form-group">
                                    <label>Ad Name</label>
                                    <input name="ad_name" value="<?= $editad['ad_name'] ?>"  class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label>Start Date</label><span id='date' class='error' for='start_date'></span>
                                    <input name="start_date" value="<?= $editad['start_date'] ?>"  type="text" class="form-control pull-right date" id="datepicker">
                                </div>

                                <div class="form-group">
                                    <label>End Date</label><span id='date' class='error' for='start_date'></span>
                                    <input name="end_date" value="<?= $editad['end_date'] ?>" type="text" class="form-control pull-right date" id="datepicker2">
                                </div>

                                <div class="form-group">
                                    <label>Ad Image</label>
                                    <input class="btn btn-default btn-cust" name="ad_image" type="file" >
                                    <?php if(!empty($editad['ad_image'])){?>
                                        <a href="<?php echo base_url() . '/assets/file/advertise/' .$editad['ad_image']; ?>" data-fancybox="images">
                                            View Picture One
                                        </a>
                                    <?php }?>
                                </div>



                                <div class="box box-primary">
                                        <!-- /.box-header -->
                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-lg-12 professionView">
                                                        <div class="col-lg-6">
                                                            <label><h4>Select Pages You want show your Advertise</h4></label>
                                                        </div>
                                                        <div class="col-lg-6 ">
                                                            <div class="form-group">
                                                                <select multiple name="ad_view[]" class="selectpicker form-control">
                                                                    <?php
                                                                    if (is_array($ad_place)) {
                                                                        foreach ($ad_place as $row) {
                                                                            $selectedad = explode(',',$editad['ad_view']);
                                                                            $ifExist = in_array($row->p_id,$selectedad);
                                                                            if($ifExist){
                                                                                $selected = 'Selected';
                                                                            }else
                                                                                $selected = '';
                                                                            ?>
                                                                            <option value="<?php echo $row->p_id; ?>" <?=$selected?>><?php echo $row->page_name; ?></option>
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


                                <div class="row">
                                    <div class="col-lg-12 professionView">

                                        <label><h4>Select profession(s) permitted to see your AD. </h4></label>
                                        <div class="form-group">
                                            <select id="test-select-4" name="profession_view[]" multiple="multiple">
                                                <?php
                                                if (is_array($profession_by_profession)) {
                                                    foreach ($profession_by_profession as $row) {
                                                        ///// selected
                                                        $selectedProfessions = explode(',',$editad['profession_view']);
                                                        $ifExist = in_array($row['id'],$selectedProfessions);
                                                        if($ifExist){
                                                            $selected = 'Selected';
                                                        }else
                                                            $selected = '';
                                                        ///// selected


                                                        if($row['sub_prof_id'] == 0 && $row['sub_yes_no'] == 0 ) {
                                                            ?>
                                                            <option value="<?php echo $row['id']; ?>"  <?=$selected?>  ><?php echo $row['name']; ?></option>

                                                            <?php
                                                        }else{
                                                            if($row['sub_yes_no'] == 1 ){
                                                                $subPrefession = getSubPrefessionByPreofession($row['id']);

                                                                foreach ($subPrefession as $row2) {
                                                                    ///// selected
                                                                    $selectedProfessions = explode(',',$editad['profession_view']);
                                                                    $ifExist = in_array($row2['id'],$selectedProfessions);
                                                                    if($ifExist){
                                                                        $selected = 'Selected';
                                                                    }else
                                                                        $selected = '';
                                                                    ///// selected

                                                                    ?>



                                                                    <option value="<?php echo $row2['id']; ?>" data-section="<?php echo $row['name'] ; ?>" <?=$selected?>   data-index="1"><?php echo $row2['name'] ; ?></option>
                                                                <?php }
                                                            }
                                                        }
                                                        ?>

                                                        <?php
                                                        //}

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

        </div>
    </section>

</div>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>



<script type="text/javascript">


    jQuery(document).ready(function() {
        //Date picker
        $('#datepicker').datepicker({
            startDate: new Date(),
            todayHighlight: true,
            defaultDate: new Date(),
            autoclose: true,
            minDate: 0,
            format: "mm/dd/yyyy"
        });
        $('#datepicker2').datepicker({
            startDate: new Date(),
            todayHighlight: true,
            defaultDate: new Date(),
            autoclose: true,
            minDate: 0,
            format: "mm/dd/yyyy"
        });




    });


</script>
