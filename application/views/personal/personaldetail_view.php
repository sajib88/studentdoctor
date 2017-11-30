<style>

    .circular {
        width: 120px;
        height: 120px;
        border-radius: 150px;
        -webkit-border-radius: 150px;
        -moz-border-radius: 150px;
        padding: 3px;
        border: 3px solid #d2d6de;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-male"></i>
            Personal Details
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div style="text-align: center">
                            <img  src="<?php echo base_url() . 'assets/file/personals/' .$layoutfull['primary_photo']; ?>" alt="User profile picture"  class="circular">
                        </div>

                        <h3 class="profile-username text-center"><?php echo (!empty($layoutfull['title']))?$layoutfull['title']:'<span class="badge bg-red">Not Given</span>'?></h3>

                        <p class="text-muted text-center"><a  style="color: goldenrod;" href="<?php echo base_url('showProfile/'.$layoutfull['uid']);?>"> &nbsp Added By <?php echo getNameById($layoutfull['uid']); ?></a></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Title</b> <span class="pull-right"><?php echo (!empty( $layoutfull['title']))? $layoutfull['title']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>


                        </ul>
                        <p class="text-muted text-left"><?php echo (!empty( $layoutfull['description']))? $layoutfull['description']:'<span class="badge bg-red">Not Given</span>'?></p>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Personal Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">
                                <b>Age</b> <span class="pull-right "><?php echo (!empty( $layoutfull['age']))? $layoutfull['age']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Ethnicity</b> <span class="pull-right "><?php echo (!empty( $layoutfull['ethnicity']))? $layoutfull['ethnicity']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Religion</b> <span class="pull-right "><?php echo (!empty( $layoutfull['religion']))? $layoutfull['religion']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Marital Status </b> <span class="pull-right "><?php echo (!empty( $layoutfull['maritalstatus']))? $layoutfull['maritalstatus']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Language</b> <span class="pull-right "><?php echo (!empty( $layoutfull['lang']))? $layoutfull['lang']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                        </ul>


                    </div>


                </div>


                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">Address</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Country</b> <span class="pull-right "><?php echo (!empty($layoutfull['country']))?countryNameByID($layoutfull['country']):'<span class="badge bg-red">Not Given</span>' ; ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>State</b> <span class="pull-right "><?php echo (!empty( $layoutfull['state']))? $layoutfull['state']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>City</b> <span class="pull-right "><?php echo (!empty( $layoutfull['city']))? $layoutfull['city']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Postal Code</b> <span class="pull-right "><?php echo (!empty( $layoutfull['zip']))? $layoutfull['zip']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>

                        </ul>


                    </div>


                </div>



                <!-- /.box -->
            </div>




            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-male"></i>
                        <h3 class="box-title">Body Description</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Body</b> <span class="pull-right "><?php echo (!empty( $layoutfull['body']))? $layoutfull['body']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Height</b> <span class="pull-right "><?php echo (!empty( $layoutfull['height']))? $layoutfull['height']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Eye Color</b> <span class="pull-right "><?php echo (!empty( $layoutfull['eyecolor']))? $layoutfull['eyecolor']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Hair Color</b> <span class="pull-right "><?php echo (!empty( $layoutfull['haircolor']))? $layoutfull['haircolor']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>

                        </ul>


                    </div>


                </div>
            </div>


            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="glyphicon glyphicon-chevron-down"></i>
                        <h3 class="box-title">Other Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Child</b> <span class="pull-right "><?php echo (!empty( $layoutfull['child']))? $layoutfull['child']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Smoker</b> <span class="pull-right "><?php echo (!empty( $layoutfull['smoker']))? $layoutfull['smoker']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Drinker</b> <span class="pull-right "><?php echo (!empty( $layoutfull['drinker']))? $layoutfull['drinker']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Intimacy/Preference</b> <span class="pull-right "><?php echo (!empty( $layoutfull['entimicyorpreference']))? $layoutfull['entimicyorpreference']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>

                        </ul>


                    </div>


                </div>
            </div>


            <!-- /.col -->
            <div class="col-lg-8">










                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-file-picture-o"></i>
                        <h3 class="box-title">Personals Photos</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <img src="<?php echo base_url() . '/assets/file/personals/' . $layoutfull['primary_photo'] ?>" width="130" height="130"">


                        <?php if($layoutfull['photo1'] != 0){?>
                            <img src="<?php echo base_url() . '/assets/file/personals/' . $layoutfull['photo1'] ?>" width="130" height="130">
                        <?php }?>
                        <?php if($layoutfull['photo2'] != 0){?>
                            <img src="<?php echo base_url() . '/assets/file/personals/' . $layoutfull['photo2'] ?>" width="130" height="130"">
                        <?php }?>


                    </div>


                </div>



                <?php if($layoutfull['primary_videos'] != 0){?>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-file-video-o"></i>
                            <h3 class="box-title">Personals Videos</h3>
                        </div>
                        <div class="box-body">



                            <video id="my-video" class="video-js" controls preload="auto" width="340" height="164"
                                   poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                                <source src="<?php echo base_url() . '/assets/file/personals/' . $layoutfull['primary_videos'];?>" type='video/mp4'>
                                <source src="<?php echo base_url() . '/assets/file/personals/' . $layoutfull['primary_videos'];?>" type='video/webm'>
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                </p>
                            </video>



                        </div>


                    </div>
                <?php }
                ?>











            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
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