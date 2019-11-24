
<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h4><i class="fa fa-calendar"></i>
            Patient Notification Center
        </h4>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Patient Notification List</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <?php if(is_array($all_doctor_appointment)): ?>
                            <?php if(count($all_doctor_appointment)<=0){?>
                                <div class="alert alert-info">No Product</div>
                            <?php }else{?>
                                <table class="table table-hover">
                                    <tbody><tr>
                                        <th>ID</th>
                                        <th>Patient Email ID</th>
                                        <th>Doctors Email ID</th>

                                        <th>Patient Message</th>
                                        <th>Date</th>
                                        <th>View</th>
                                    </tr>
                                    <?php $i=1;foreach($all_doctor_appointment as $row):?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><span class=""><?php echo getemailById($row->pat_id);?></span></td>
                                            <td><span class=""><?php echo $row->email;?></span></td>
                                            <td><span class=""><?php echo substr($row->message, 0, 50);?></span></td>
                                            <td><span class=""><?php echo ($row->date);?></span></td>
                                            <td>
                                                <a data-toggle="modal" data-id="<?= $row->id; ?>"
                                                   class="btn btn-block btn-dropbox singleAppointment"
                                                   href="#search_doctors">Reply </a>

                                                </td>
                                        </tr>
                                        <?php $i++;endforeach;?>
                                    </tbody>
                                </table>
                            <?php }?>
                        <?php endif; ?>
                    </div>


                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>


<!--match Home page modal-->
<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="search_doctors" class="modal fade">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-cog"></i> &nbsp;Quick Messge</h4>
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
                            <input type="submit" name="submit" class="btn  btn-success  btn-lg"  id="msgsend" name="loginStatus" > </input>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
<!--match Home page  modal-->

<script>

    $(function(){
        $('.singleAppointment').click(function(){
            var base_url = '<?php echo base_url() ?>';
            var id=$(this).data('id');

            $.ajax({
                type: 'POST',
                url: base_url + "doctor/docController/singleAppointment/"+id,
                data: $("#search_form").serialize(),
                datatype: "text",
                success: function(viewstml){
                    $('#loadhtmldoctors').html(viewstml);
                }
            });
        });

    });


    $(function(){
        $("#msgsend").click(function(e){
            var base_url = '<?php  echo base_url() ?>';
            $.ajax({
                url:base_url + "doctor/docController/appmsg/",
                type: 'POST',
                data: $("#search_form").serialize(),
                dataType: "json",
                success: function (data) {

                    if(data.status == "success")
                    {

                        var homepage = data.datahome.is_homepage;
                        if(homepage != 0)
                        {
                            swal("Your Message Send successfully", "Thanks for message", "success");
                            setTimeout(function(){
                                window.location.reload(10000);
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




<script type="text/javascript" src="<?php echo base_url('assets/datatable/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatable/dataTables.bootstrap.js');?>"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
