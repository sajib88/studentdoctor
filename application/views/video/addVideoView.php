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
            <small>Create video Album</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">video </a></li>
            <li class="active">Create video Album </li>
        </ol>
    </section>


    <section class="content">
        <!-- /.row -->
        <div class="panel panel-default">
            <div class="panel-body box box-primary">

                <div class="row">

                    <div class="col-md-8 col-md-offset-2">
                        <h1>Video Upload</h1>

                        <form action="<?php echo site_url("video/video/upload") ?>" id="form-upload">

                            <!--<input type="hidden" name="profession_post" value="<?php /*echo $user_info['profession'];*/?>">-->
                            <input type="hidden" name="user_id_post" value="<?php echo $user_id;?>">
                            <input type="hidden" name="album_id" value="<?php echo $album_id;?>">

                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                    <span class="fileinput-filename"></span>
                                </div>
                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">
                                        <i class="glyphicon glyphicon-paperclip"></i>
                                        Select file
                                    </span>
                                    <span class="fileinput-exists">
                                        <i class="glyphicon glyphicon-repeat"></i>
                                        Change
                                    </span>
                                    <input type="file" name="file">
                                </span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove"></i> Remove</a>
                                <a href="#" id="upload-btn" class="input-group-addon btn btn-success fileinput-exists"><i class="glyphicon glyphicon-open"></i> Upload</a>
                            </div>
                        </form>

                        <!-- <progress id="progress-bar" max="100" value="0"></progress> -->
                        <!--<div class="progress">
                            <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                20%
                            </div>
                        </div>-->
                    </div>

                    <?php if(!empty($allvideos)){
                        foreach ($allvideos as $row){?>
                            <div class="col-md-4">
                                <video id="my-video" class="video-js" controls preload="auto" width="340" height="164"
                                       poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                                    <source src="<?php echo base_url() . 'assets/uploads/' . $row->name;?>" type='video/mp4'>
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

<script type="text/javascript" src="<?php echo base_url();?>script-assets/js/jasny-bootstrap.min.js"></script>
<script>
    $(function () {
        var inputFile = $('input[name=file]');
        var user_id = $('input[name=user_id_post]');
        var album_id = $('input[name=album_id]');
        var uploadURI = $('#form-upload').attr('action');

        $('#upload-btn').on('click', function(event) {
            var fileToUpload = inputFile[0].files[0];
            var id = user_id.val();

            var albumid = album_id.val();
            // make sure there is file to upload
            if (fileToUpload != 'undefined') {
                // provide the form data
                // that would be sent to sever through ajax
                var formData = new FormData();
                formData.append("file", fileToUpload);
                formData.append("userID", id);
                /*formData.append("profession", profession);*/
                formData.append("album_id", albumid);

                // now upload the file using $.ajax
                $.ajax({
                    url: uploadURI,
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        //listFilesOnServer();
                        console.log(data);
                        if(data != ""){
                            alert(data);
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1000);
                        }
                    }
                });
            }
        });

        function listFilesOnServer () {
            var items = [];
            var html = '';

            $.getJSON(uploadURI, function(data) {
                $.each(data, function(index, element) {
                    for (var i = 0; i < data.length(); i++) {

                    items.push('<li class="list-group-item">' + data[i]['name']  + '<div class="pull-right"><a href="#"><i class="glyphicon glyphicon-remove"></i></a></div></li>');
                    }

                });
                $('.list-group').html("").html(items.join(""));
            });
        }
    });

</script>

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

