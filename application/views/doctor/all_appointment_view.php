
<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-calendar"></i>
           Appointment
        </h1>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Appointment List</h3>

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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Note</th>
                                        <th>View</th>
                                    </tr>
                                    <?php $i=1;foreach($all_doctor_appointment as $row):?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><span class=""><?php echo $row->first_name;?></span></td>
                                            <td><span class=""><?php echo $row->email;?></span></td>
                                            <td><span class=""><?php echo date("M d, Y", strtotime($row->date));?></span></td>
                                            <td><span class=""><?php echo substr($row->message, 0, 50);?></span></td>
                                            <td><a href="#myModal" data-toggle="modal" data-id="<?php echo $row->id;?>" class="btn btn-block btn-dropbox singleAppointment"> View</a></td>
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

<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1"  id="myModal" class="modal fade">

    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> <i class="fa fa-calendar"></i> Appointment Details</h4>
            </div>

            <div class="modal-body">
                <div id="appointmentDetails"></div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>

</div>



<script type="text/javascript" src="<?php echo base_url('assets/datatable/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatable/dataTables.bootstrap.js');?>"></script>

<script>
    $('.singleAppointment').click(function() {

        var id = $(this).data('id');
        var site_url = "<?php echo base_url('doctor/docController/singleAppointment'); ?>/" + id; //append id at end
        $("#appointmentDetails").load(site_url);

    });
</script>