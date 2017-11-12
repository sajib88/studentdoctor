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




<link href="<?php echo base_url('script-assets/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('script-assets/no_more_table.css');?>" rel="stylesheet">

<div id="page-wrapper">
<div class="row">

    
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List All My Personal Info</h3>
                    </div>
                    <?php if($this->session->flashdata('msg')){ ?>
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong> <?php echo $this->session->flashdata('msg'); ?></strong>
                            </div>
                        </div>
                    <?php } $this->session->unset_userdata('msg'); ?>
                    <div class="box-body no-padding">
                        <?php if(count($allpersonals)<=0){?>
                            <div class="alert alert-info">No Personal</div>
                        <?php }else{?>
                        <div id="no-more-tables">

                            <table class="table table-hover" id="js_personal_table">
                                <thead>
                                <tr>

                                    <th class="numeric">#</th>

                                    <th class="numeric"><?php echo 'title';?></th>

                                    <th class="numeric"><?php echo 'I am';?></th>

                                    <th class="numeric"><?php echo 'Interested';?></th>

                                    <th class="numeric"><?php echo 'maritalstatus';?></th>

                                    <th class="numeric"><?php echo 'age';?></th>

                                    <th class="numeric"><?php echo 'Action';?></th>

                                    <th class="numeric"><?php echo 'Remove';?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($allpersonals)) {
                                    $i = 1;
                                    foreach ($allpersonals as $row) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td data-title="<?php echo 'title'; ?>"
                                                class="numeric"><?php echo $row->title; ?></td>
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class="label label-success"><?php echo $row->iam; ?></span></td>
                                            <td data-title="<?php echo 'ethnicity'; ?>"
                                                class="numeric"><span class="label label-info"><?php echo $row->interestedin; ?></span></td>
                                            <td data-title="<?php echo 'maritalstatus'; ?>"
                                                class="numeric"><span class="label label-warning"><?php echo $row->maritalstatus; ?></span></td>
                                            <td data-title="<?php echo 'age'; ?>"
                                                class="numeric"><span class="label label-danger"><?php echo $row->age; ?></span></td>

                                            <td data-title="<?php echo 'Edit'; ?>" class="numeric"><a href="<?php echo base_url('admin/Personal/Personal/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit</a></td>
                                            
                                            <td data-title="<?php echo 'Remove'; ?>" class="numeric"><a href="<?php echo base_url('admin/Personal/Personal/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
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

    </section>
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


