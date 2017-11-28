<div id="page-wrapper">
<div class="row">

     <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List All  event Info</h3>
                </div>

                <?php if($this->session->flashdata('success')){ ?>
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><?php echo $this->session->flashdata('success'); ?></strong>
                        </div>
                    </div>
                <?php } ?>

                <div class="box-body no-padding">
                    <?php if(count($myevent)<=0){?>
                        <div class="alert alert-info">No evnets</div>
                    <?php }else{?>
                        <div id="no-more-tables">

                            <table class="table table-hover" id="js_personal_table">
                                <thead>
                                <tr>

                                    <th class="numeric">#</th>

                                    <th class="numeric"><?php echo 'Title';?></th>

                                    <th class="numeric"><?php echo 'Summary';?></th>

                                    <th class="numeric"><?php echo 'Seat No';?></th>

                                    <th class="numeric"><?php echo 'Start Time';?></th>
                                    
                                    <th class="numeric"><?php echo 'End Time';?></th>

                                    <th class="numeric"><?php echo 'Image';?></th>


                                    <th class="numeric"><?php echo 'Action';?></th>

                                    <th class="numeric"><?php echo 'Remove';?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($myevent)) {
                                    $i = 1;
                                    foreach ($myevent as $row)



                                    { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td data-title="<?php echo 'title'; ?>"
                                                class="numeric"><?php echo (!empty($row->title))?substr($row->title, 0,30):'Not Given'; ?></td>
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class="label label-success"><?php echo (!empty($row->summary))?substr ($row->summary, 0,30):'Not Given'; ?></span></td>
                                            
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class="label label-success"><?php echo (!empty($row->seats_no))?$row->seats_no:'Not Given'; ?></span></td>

                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class="label label-success"><?php echo (!empty($row->start_time))?$row->start_time:'Not Given'; ?></span></td>
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class="label label-success"><?php echo (!empty($row->end_time))?$row->end_time:'Not Given'; ?></span></td>

                                            
                                            <td data-title="<?php echo 'Image'; ?>"
                                                class="numeric"><span><img src="<?php echo base_url() . '/assets/file/event/' .$row->primary_photo; ?>" alt="" width="50" height="50" class="img-circle " /></span></td>

                                            <td data-title="<?php echo 'Edit/View'; ?>" class="numeric"><a href="<?php echo base_url('admin/Events/Events/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit & View</a></td>

                                            <td data-title="<?php echo 'Remove'; ?>" class="numeric"><a href="<?php echo base_url('admin/Events/Events/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
                                        </tr>
                                        <?php $i++;
                                    }
                                }?>
                                </tbody>
                            </table>
                        </div>
                    <?php }?>
                </div>
            </div>
    </div>
</div>
</div>


<link href="<?php echo base_url('script-assets/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('script-assets/no_more_table.css');?>" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url();?>script-assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>script-assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script rel="stylesheet" href="<?php echo base_url();?>script-assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"></script>
<script type="text/javascript" src="<?php echo base_url();?>script-assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var personaltable = document.getElementById("js_personal_table");
        $(personaltable).dataTable();
    });
</script>

       
