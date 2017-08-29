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
            File
            <small>Create file</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">File </a></li>
            <li class="active">Upload  file </li>
        </ol>
    </section>



    <section class="content">
        <!-- /.row -->
        <div class="panel panel-default">
            <div class="panel-body box box-primary">

                <div class="row">
                    <div class="col-md-6">
                        <h1>Upload File</h1>

                        <form action="<?php echo site_url("file/file/upload") ?>" id="form-upload">

                            <!--<input type="hidden" name="profession_post" value="<?php /*echo $user_info['profession'];*/?>">-->
                            <input type="hidden" name="user_id_post" value="<?php echo $user_id;?>">

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


                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <i class="fa fa-bullhorn"></i>

                                <h3 class="box-title">Document  Upload Help </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="fa fa-file-pdf-o"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Upload Files</span>
                                        <span class="info-box-number">File Upload</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                      <span class="progress-description">
                                      DOCX,XLS,PDF, TXT, EXCEL
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>





                                <div class="callout callout-info">
                                    <h4>More Help </h4>

                                    <p>Contact Us : <b> info@foralldoctors.com</b> </p>
                                </div>

                            </div>


                            <!-- /.box-body -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php if(!empty($allfiles)){ ?>
            <div class="panel panel-default">
                <div class="panel-body box box-primary">
                    <h3>My Files</h3>
                    <hr>

                    <div class="row">
                        <?php foreach ($allfiles as $row){?>

                            <div class="col-md-6">
                                <div class="alert alert-info">
                                    <a target="_blank" href="<?php echo base_url() . 'assets/uploads/file/' . $row->name; ?>"><?php echo $row->name; ?></a>
                                    <a href="<?php echo base_url('file/file/delete/' . $row->id); ?>" style="float: right" class="btn btn-sm btn-danger">Delete</a>
                                </div>

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



