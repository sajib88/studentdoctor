
<link href="http://[::1]/doctorsapp/script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>script-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<div class="content-wrapper">


    <section class="content-header">
        <h1><i class="fa fa-square-o"></i>
            Message
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('message');?>
                    </div>
                </div>
            <?php } $this->session->unset_userdata('message'); ?>

            <div class="col-md-3">
                <a href="<?php echo base_url('message');?>" class="btn btn-danger btn-block margin-bottom">Back to Inbox</a>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?php echo base_url('message');?>"><i class="fa fa-inbox"></i> Inbox
                                    <span class="label label-primary pull-right"></span></a></li>
                            <li><a href="<?php echo base_url('message/sentMessages');?>"><i class="fa fa-envelope-o"></i> Sent</a></li>
<!--                            <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>-->
<!--                            <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>-->
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <form role="form" method="post" id="message_form" enctype="multipart/form-data" action="<?php echo base_url('message/compose'); ?>">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Compose New Message</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Profession</label>
                            <select onchange="getComboA(this)" id="js_profession" name="profession" class=" form-control">
                                <option value="">Select Profession</option>
                                <?php
                                if (is_array($profession)) {
                                    foreach ($profession as $row) {
                                        ?>
                                        <option  value="<?php echo $row->id; ?>"><?php echo $row->name ; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div id="result">
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="subject" placeholder="Subject:">
                        </div>
                        <div class="form-group">
                    <textarea id="compose-textarea" required name="message"  placeholder="Type your message here..." class="form-control" style="height: 300px">

                    </textarea>
                        </div>
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Attachment
                                <input type="file" name="attachment">
                            </div>
                            <p class="help-block">Max. 10MB</p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-right">
<!--                            <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>-->
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                        </div>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Discard</button>
                    </div>
                    <!-- /.box-footer -->
                </div>
                </form>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


</div>
<script src="<?php echo base_url();?>script-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>
<script>
    function getComboA(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "message/getProfessionByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#result").html(resultData);
            }
        });

    }
</script>

<script>
    $('#message_form').validate({
        rules: {
            profession:{
                required:true
            },
            receiver_id:{
                required:true
            },

            subject:{
                required:true
            },

            message:{
                required:true
            }
        },
        messages:{
            profession: {
                required: "Profession is Required",},

            receiver_id: {
                required: "Message Receiver field is Required",},

            subject: {
                required: "Message Subject is Required",
            },

            message: {
                required: "Message Description is Required",}
        }
    });


</script>