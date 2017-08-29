<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 1/4/2017
 * Time: 12:03 AM
 */

?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Video Album
            <small>All videos </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">video </a></li>
            <li class="active">All video  </li>
        </ol>
    </section>


    <?php echo $this->session->flashdata('message');?>



    <section class="content">
        <!-- /.row -->
        <div class="panel panel-default">
            <div class="panel-body box box-primary">

                <div class="row">

                    <div class="col-md-8 col-md-offset-2">


                        <!-- <progress id="progress-bar" max="100" value="0"></progress> -->
                        <!--<div class="progress">
                            <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                20%
                            </div>
                        </div>-->

                        <ul class="list-group"><ul>

                    </div>

                    <?php if(!empty($allvideos)){
                        foreach ($allvideos as $row){?>
                            <div class="col-md-4">
                                <video id="my-video" class="video-js" controls preload="auto" width="340" height="164"
                                       poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                                    <source src="<?php echo base_url() . '/assets/uploads/' . $row->name;?>" type='video/mp4'>
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                </video>
                            </div>
                            <?php
                        }
                    }?>
                </div>
            </div>
        </div>
    </section>
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

