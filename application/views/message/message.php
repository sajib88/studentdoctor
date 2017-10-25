
<link href="http://[::1]/doctorsapp/script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>script-assets/plugins/iCheck/flat/blue.css">

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
                            <li class="<?php if($this->uri->segment(1)=='message'){echo 'active';}?>"><a href="<?php echo base_url('message');?>"><i class="fa fa-inbox"></i> Inbox
                                    <span class="label label-primary pull-right"></span></a></li>
                            <li class="<?php if($this->uri->segment(1)=='message' && $this->uri->segment(2)=='sentMessages'){echo 'active';}?>"><a href="<?php echo base_url('message/sentMessages');?>"><i class="fa fa-envelope-o"></i> Sent</a></li>
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
                        <h3 class="box-title">Inbox</h3>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Search Mail">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" name="delete" id="delete" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" id="refresh" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                <?php if(!empty($message)){
                                foreach ($message as $row){
                                    ?>
                                    <a href="<?php echo base_url('message/read/'. $row->id);?>">
                                        <tr id="<?php echo $row->id?>">
                                            <td><input type="checkbox" name="id[]" value="<?php echo $row->id?>"></td>

                                            <td class="mailbox-name"><a href="<?php echo base_url('message/read/'. $row->id);?>">
                                                    <?php $data = get_data('users', array('id' => $row->sender_id)); ?>
                                                    <?php echo $data['user_name'];?></a>
                                            </td>
                                            <td class="mailbox-subject"><b><?php echo $row->subject?></b> - <?php echo strip_tags(substr($row->message, 0, 50))?>...
                                            </td>
                                            <?php if(!empty($row->attachment)){?>
                                                <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                            <?php }else{
                                                echo '<td class="mailbox-attachment"></td>';
                                            }?>
                                            <td class="mailbox-date"><?php echo date('m-d-Y', strtotime($row->timestamp));?></td>
                                        </tr>
                                    </a>
                                <?php }
                                 }else{
                                    echo '<div style="padding: 50px;text-align: center;opacity: 0.3">You do not have any messages.</div>';
                                } ?>
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                            <div class="pull-right">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                    </div>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


</div>

<script src="<?php echo base_url();?>script-assets/plugins/iCheck/icheck.min.js"></script>

<script>
    $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('.mailbox-messages input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
            var clicks = $(this).data('clicks');
            if (clicks) {
                //Uncheck all checkboxes
                $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                //Check all checkboxes
                $(".mailbox-messages input[type='checkbox']").iCheck("check");
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function (e) {
            e.preventDefault();
            //detect type
            var $this = $(this).find("a > i");
            var glyph = $this.hasClass("glyphicon");
            var fa = $this.hasClass("fa");

            //Switch states
            if (glyph) {
                $this.toggleClass("glyphicon-star");
                $this.toggleClass("glyphicon-star-empty");
            }

            if (fa) {
                $this.toggleClass("fa-star");
                $this.toggleClass("fa-star-o");
            }
        });
    });

</script>


<script>

       $('#delete').click(function () {
          if(confirm("Are you sure you want to delete this?"))
          {
              var id = [];
              $(':checkbox:checked').each(function (i) {
                 id[i] = $(this).val();
              });
              if(id.length === 0)
              {
                  alert('Please select atleast one item');
              }
              else
              {
                  var base_url = '<?php echo base_url() ?>';
                  $.ajax({
                      url: base_url + "message/delete/",
                      type: 'POST',
                      data:{id:id},
                      success:function () {
                          for(var i=0; i<id.length; i++){
                            $('tr#'+id[i]+'').css('background-color', '#ccc');
                            $('tr#'+id[i]+'').fadeOut('slow');
                          }
                      }
                  })
              }
          }
          else
          {
              return false;
          }
       });

       $('#refresh').click(function () {
           location.reload(true);
       });




</script>

