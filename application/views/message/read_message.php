
<link href="http://[::1]/doctorsapp/script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>script-assets/plugins/iCheck/flat/blue.css">
<link rel="stylesheet" href="<?php echo base_url();?>script-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


<div class="content-wrapper">


    <section class="content-header">
        <h1><i class="fa fa-square-o"></i>
            Message
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="<?php echo base_url('message/compose');?>" class="btn btn-danger btn-block margin-bottom">Compose</a>

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
                            <li class="active"><a href="<?php echo base_url('message');?>"><i class="fa fa-inbox"></i> Inbox
                                    <span class="label label-primary pull-right">12</span></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Read Mail</h3>

                        <div class="box-tools pull-right">
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3><?php echo $read_message['subject'];?></h3>
                            <h5>From: <?php echo getNameById($read_message['sender_id']);?>
                                <span class="mailbox-read-time pull-right"><?php echo $read_message['timestamp'];?></span></h5>
                        </div>
                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                            <div class="btn-group">
                                <a href="<?php echo base_url('message/delete/'.$read_message['id']);?>" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                    <i class="fa fa-trash-o"></i></a>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                                    <i class="fa fa-reply"></i></button>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                                    <i class="fa fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button onclick="PrintDiv();" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                                <i class="fa fa-print"></i></button>
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <?php echo $read_message['message'];?>
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.box-body -->
                    <?php if(!empty($read_message['attachment'])){?>
                    <div class="box-footer">
                        <ul class="mailbox-attachments clearfix">
                            <li>
                                <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                                <div class="mailbox-attachment-info">
                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo $read_message['attachment'];?></a>
                          <a href="<?php echo base_url('/assets/file/message/'.$read_message['attachment']);?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>

                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                            <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                        </div>
                        <a href="<?php echo base_url('message/delete/'.$read_message['id']);?>" type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</a>
                        <button onclick="PrintDiv();" type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>

                    </div>

                </div>

            </div>

<!--            <div class="col-md-9 pull-right">-->
<!--                <form role="form" method="post" id="message_form" enctype="multipart/form-data" action="--><?php //echo base_url('message/compose'); ?><!--">-->
<!--                    <div class="box box-primary">-->
<!--                        <div class="box-header with-border">-->
<!--                            <h3 class="box-title">Compose New Message</h3>-->
<!--                        </div>-->

<!--                        <div class="box-body">-->
<!--                            <div class="form-group">-->
<!--                                <label>Profession</label>-->
<!--                                <select onchange="getComboA(this)" id="js_profession" name="profession" class=" form-control">-->
<!--                                    <option value="">Select Profession</option>-->
<!--                                    --><?php
//                                    if (is_array($profession)) {
//                                        foreach ($profession as $row) {
//                                            ?>
<!--                                            <option  value="--><?php //echo $row->id; ?><!--">--><?php //echo $row->name ; ?><!--</option>-->
<!--                                            --><?php
//                                        }
//                                    }
//                                    ?>
<!--                                </select>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <div id="result">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <input class="form-control" name="subject" placeholder="Subject:">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                    <textarea id="compose-textarea" required name="message"  placeholder="Type your message here..." class="form-control" style="height: 300px">-->
<!---->
<!--                    </textarea>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <div class="btn btn-default btn-file">-->
<!--                                    <i class="fa fa-paperclip"></i> Attachment-->
<!--                                    <input type="file" name="attachment">-->
<!--                                </div>-->
<!--                                <p class="help-block">Max. 10MB</p>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="box-footer">-->
<!--                            <div class="pull-right">-->
<!--                                <!--                            <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>-->-->
<!--                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>-->
<!--                            </div>-->
<!--                            <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Discard</button>-->
<!--                        </div>-->

<!--                    </div>-->
<!--                </form>-->

<!--            </div>-->
        </div>
        <!-- /.row -->
        <div id="divToPrint" style="display:none;">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                        <h3><?php echo $read_message['subject'];?></h3>
                        <h5>From: <?php echo getNameById($read_message['sender_id']);?>
                            <span class="mailbox-read-time pull-right"><?php echo $read_message['timestamp'];?></span></h5>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        <?php echo $read_message['message'];?>
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
            </div>
        </div>
    </section>


</div>



<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=500,height=500');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>

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










