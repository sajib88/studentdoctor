<div class="content-wrapper">

    <section class="content-header">
        <h4><i class="fa fa-user-md"></i>
             Doctor Website Details
        </h4>
    </section>



    <section class="content">
        <div class="row">
            <div class="col-lg-12">






                <?php

                if(!empty($searchData)) {
                    foreach ($searchData as $row) {
                     //   print_r($row);
                        ?>
                <div class="col-md-5">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">


                            <img  class="img-responsive" src="<?php echo (!empty($row->photo))? base_url().'assets/file/'.$row->photo:'';?><?php echo (empty($row->photo))? base_url().'assets/user-demo.png':'';?>" alt="" />



                            <h5 class="profile-username text-center"><?= $row->email; ?></h5>


                            <hr>
                            <dl class="description-2">
                                <dt>Profession</dt>
                                <dd><?php echo getProfessionById($row->profession) ?></dd>
                                <dt>Specialty</dt>
                                <dd><?php echo (!(empty($row->specialty)) ? $row->specialty : '') ?></dd>
                            </dl>
                            <hr>
                            <dl class="description-2">
                                <dt>Gender</dt>
                                <dd><?php echo (!(empty($row->gender)) ? $row->gender : '') ?></dd>
                                <dt>Location</dt>
                                <dd><?php echo (!(empty($row->country)) ? countryNameByID($row->country) : '') ?>,
                                    <?php echo (!(empty($row->state)) ? $row->state : '') ?>,
                                    <?php echo (!(empty($row->city)) ? $row->city : '') ?></dd>
                            </dl>
                            <hr>
                            <dl class="description-2">
                                <dt>Join Date</dt>
                                <dd><?php echo date('F d, Y', strtotime(!(empty($row->created)) ? $row->created : ''));   ?></dd>
                            </dl>




                        </div>
                        <!-- /.box-body -->
                    </div>

                    <?php if($row->appointment == 1){ ?>

                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Appointment Information </h3>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-sm-6">
                                        <div class="event">
                                            <h5 class="mb-0">Start Day &amp; Time</h5>
                                            <div style="color: #00a157;"  class="date"><?php echo !(empty($row->appointment_start_day))?$row->appointment_start_day.' - ' : ''; ?> <?php echo (!(empty($row->start_time)) ? $row->start_time : '') ?></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="event">
                                            <h5 class="mb-0">End  Day &amp; Time</h5>
                                            <div style="color: #00a157;" class="date"><?php echo !(empty($row->appointment_end_day))? $row->appointment_end_day.' - ' : ''; ?> <?php echo (!(empty($row->end_time)) ? $row->end_time : '') ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <hr>

                                    <a data-toggle="modal" data-id="<?= $row->id; ?>" class=" btn btn-block btn-info searching" href="#search_doctors">Send Appointment Request </a>
                                </div>


                            </div>

                        </div>


                    <?php } ?>


                    <!-- /.box -->

                    <!-- About Me Box -->

                    <!-- /.box -->
                </div>

                <div class="col-lg-7">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> More Information </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i> Description</strong>

                            <p class="text-muted">
                                <?php echo $row->description; ?>
                            </p>

                            <hr>




                            <strong><i class="fa fa-medkit"></i> Business Infromation</strong>

                            <ul>
                                <li><i class="i-before ti-check text-primary"></i>Business Name : <b><?php echo (!(empty($row->business_name)) ? $row->business_name : '') ?> </b></li>
                                <li><i class="i-before ti-check text-primary"></i>Business E-mail : <b><?php echo (!(empty($row->business_email)) ? $row->business_email : '') ?> </b></li>
                                <li><i class="i-before ti-check text-primary"></i>Business Phone : <b> <?php echo (!(empty($row->business_telephone)) ? $row->business_telephone : '') ?></b></li>
                                <li><i class="i-before ti-check text-primary"></i>Business FAX : <b> <?php echo (!(empty($row->business_fax)) ? $row->business_fax : '') ?></b></li>
                                <li><i class="i-before ti-check text-primary"></i>Business Country : <b> <?php echo (!(empty($row->country)) ? countryNameByID($row->country) : '')?></b></li>
                                <li><i class="i-before ti-check text-primary"></i>Business State : <b> <?php echo (!(empty($row->state)) ? $row->state : '') ?></b></li>
                                <li><i class="i-before ti-check text-primary"></i>Business City : <b> <?php echo (!(empty($row->city)) ? $row->city : '') ?></b></li>
                                <li><i class="i-before ti-check text-primary"></i>Business Zip / Postal code : <b> <?php echo (!(empty($row->postal)) ? $row->postal : '') ?></b></li>
                                <li><i class="i-before ti-check text-primary"></i>Business Address  : <b> <?php echo (!(empty($row->address_1)) ? $row->address_1 : '') ?></b></li>
                            </ul>
                            <hr>

                            <strong><i class="fa fa-plus-square"></i> Specialty</strong>

                            <p>

                                <span class="label label-success"><?php echo $row->specialty; ?></span>


                            </p>

                            <hr>

                            <strong><i class="glyphicon glyphicon-play"></i> Special Interest</strong>

                            <p>
                                <span class="label label-info"><?php echo $row->special_interest; ?></span>
                            </p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <i class="fa fa-file-picture-o"></i>
                            <h3 class="box-title">Public Website Photos</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">

                            <?php
                            if (is_array($photos) && !empty($photos))
                                foreach ($photos as $row) {
                                    {
                                        ?>
                                        <div class="col-md-6">
                                            <img class="box-header with-border" src="<?php echo base_url() . '/assets/file/publicweb/' . $row->name ?>" width="220px;" height="180px">
                                        </div>
                                        <?php
                                    }
                                }
                            ?>

                        </div>


                    </div>


                    <?php
                    if (is_array($video)) {
                        $explode = explode('.', $video[0]->name);
                        //print_r($video);
                       //echo $video[0]->name;
                       echo  $explode[0];
                        ?>
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <i class="fa fa-file-video-o"></i>
                                <h3 class="box-title">Public Website Video</h3>
                            </div>
                            <div class="box-body">

                                <video width="280" height="240" controls>
                                    <source src="<?php echo base_url() . '/assets/file/publicweb/' . $video[0]->name; ?>" type="video/<?php echo  $video[0]->name; ?>">
                                </video>

                            </div>


                        </div>
                    <?php }
                    ?>



                    <?php
                    if (is_array($audio)) {
                        $explode = explode('.', $audio[0]->name);
                        echo $audio[0]->name;
                        ?>
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <i class="fa fa-file-sound-o"></i>
                                <h3 class="box-title">Public Website Sound/audio</h3>
                            </div>
                            <div class="box-body">

                                <audio controls>
                                    <source src="<?php echo base_url() . '/assets/file/publicweb/' . $audio[0]->name; ?>" type="audio/<?php echo $explode[0]; ?>">
                                </audio>

                            </div>


                        </div>
                    <?php }
                    ?>



                    <?php
                    if (is_array($files)) {
                        $explode = explode('.', $files[0]->name);
                        ?>
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <i class="fa fa-file-word-o"></i>
                                <h3 class="box-title">Public Website Attachment</h3>
                            </div>
                            <div class="box-body">

                                <?php
                                if (is_array($files) && !empty($files)) {
                                    $i = 1;
                                    foreach ($files as $row) {
                                        ?>
                                        <a class="btn btn-small btn-dropbox" href="<?php echo base_url() . '/assets/file/publicweb/' . $row->name ?>">Download File  <?php echo $i; //echo!empty($row->name) ? $row->name : ''   ?></a>
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>

                            </div>


                        </div>
                    <?php }
                    ?>



                </div>
                    <?php }}?>
            </div>



        </div>
    </section>

</div>
<!-- /.row -->
<!-- /.container-fluid -->
</div>



<!--match Home page modal-->
<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="search_doctors" class="modal fade">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-cog"></i> &nbsp;Appointment Set  to Doctors</h4>
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

























<!-- Section -->


<!-- Section -->



</div>




<!-- //The Team -->
<!-- THIS css/JS USE ONLY VIDEO PLAYER -->
<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
<!-- THIS css/JS USE ONLY VIDEO PLAYER -->

<!-- THIS css/JS Sound -->
<script src="<?php echo base_url(); ?>script-assets/audiojs/audio.min.js"></script>

<script>
    audiojs.events.ready(function() {
        var as = audiojs.createAll();
    });
</script>
<!-- THIS css/JS Sound -->



<?php $userid=$this->uri->segment('3')?>

<!-- JS Libraries -->








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













