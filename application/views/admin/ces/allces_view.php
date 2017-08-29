<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 10-Dec-16
 * Time: 2:17 AM
 */
/*print '<pre>';
print_r($allpersonals);die;*/
?>


<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">


<div id="page-wrapper">
<div class="row">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List All CES Info</h3>

                        
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <?php if(count($allces)<=0){?>
                            <div class="alert alert-info">No Personal</div>
                        <?php }else{?>

                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th class="numeric">#</th>

                                    <th class="numeric"><?php echo 'title';?></th>

                                    <th class="numeric"><?php echo 'cs Type';?></th>

                                    <th class="numeric"><?php echo 'price';?></th>

                                    <th class="numeric"><?php echo 'country';?></th>

                                    <th class="numeric"><?php echo 'state';?></th>

                                    <th class="numeric"><?php echo 'Action';?></th>
                                    
                                    <th class="numeric"><?php echo 'Delete';?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($allces)) {
                                    $i = 1;
                                    foreach ($allces as $row) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td data-title="<?php echo 'title'; ?>"
                                                class="numeric"><?php echo $row->title; ?></td>
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class="label label-success"><?php echo $row->ce_type; ?></span></td>
                                            <td data-title="<?php echo 'ethnicity'; ?>"
                                                class="numeric"><span class="label label-info"><?php echo $row->price; ?></span></td>
                                            <td data-title="<?php echo 'maritalstatus'; ?>"
                                                class="numeric"><span class="label label-warning"><?php echo countryNameByID($row->country); ?></span></td>
                                            <td data-title="<?php echo 'age'; ?>"
                                                class="numeric"><span class="label bg-purple"><?php echo $row->state; ?></span></td>

                                            <td><a href="<?php echo base_url('admin/ces/Admin_Ces_controller/edit/'. $row->id); ?>" class="btn btn-block btn-primary"> Edit & view</a></td>
                                           
                                            <td><a href="<?php echo base_url('admin/ces/Admin_Ces_controller/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
                                        </tr>
                                        <?php $i++;
                                    }
                                }?>
                                </tbody>
                            </table>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>


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
