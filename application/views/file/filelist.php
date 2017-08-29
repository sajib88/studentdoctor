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

        <?php if(!empty($allfiles)){ ?>
            <div class="panel panel-default">
                <div class="panel-body box box-primary">
                    <h3>My Files</h3>
                    <hr>

                    <div class="row">



                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tbody><tr>
                                            <th style="width: 10px">#</th>
                                            <th>File Name</th>
                                            <th>Download</th>
                                            <th style="width: 40px">Date</th>
                                        </tr>
                                        <?php foreach ($allfiles as $row){?><tr>
                                            <td>1.</td>
                                            <td><a target="_blank" href="<?php echo base_url() . 'assets/uploads/file/' . $row->name; ?>"><?php echo $row->name; ?></a></td>
                                            <td>
                                                <a class="btn alert-info" target="_blank" href="<?php echo base_url() . 'assets/uploads/file/' . $row->name; ?>">Download</a>
                                            </td>
                                            <td><span class="badge bg-red">1-1-2017</span></td>
                                        </tr>
                                        <?php
                                        }?>

                                        </tbody></table>
                                </div>
                                <!-- /.box-body -->
<!--                                <div class="box-footer clearfix">-->
<!--                                    <ul class="pagination pagination-sm no-margin pull-right">-->
<!--                                        <li><a href="#">«</a></li>-->
<!--                                        <li><a href="#">1</a></li>-->
<!--                                        <li><a href="#">2</a></li>-->
<!--                                        <li><a href="#">3</a></li>-->
<!--                                        <li><a href="#">»</a></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
                            </div>





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



