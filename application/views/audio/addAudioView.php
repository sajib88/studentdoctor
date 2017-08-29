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
            Audio Album
            <small>Create audio Album</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">audio </a></li>
            <li class="active">Create audio Album </li>
        </ol>
    </section>


    <?php echo $this->session->flashdata('message');?>



    <section class="content">
        <!-- /.row -->
        <div class="panel panel-default">
            <div class="panel-body box box-primary">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1>Upload Audio</h1>

                        <form action="<?php echo site_url("audio/audio/upload") ?>" id="form-upload">

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

                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($allvideos)){ ?>
        <div class="panel panel-default">
            <div class="panel-body box box-primary">
                <h3>My Audios</h3>
                <hr>

                <div class="row">

                <?php foreach ($allvideos as $row){?>

                    <div class="col-md-4">
                        <audio controls>
                            <source src="<?php echo base_url() . 'assets/uploads/audio/' . $row->name; ?>"
                                    type="audio/ogg">
                        </audio>
                        <p><?php echo $row->name; ?></p>
                    </div>

                    <?php
                    }?>
                </div>
            </div>
        </div>
            <?php
        }?>
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



