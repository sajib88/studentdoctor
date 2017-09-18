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
        <?php if($this->session->flashdata('success')){ ?>
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> <?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            </div>
        <?php } ?>

        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Forum Category List</h3>
                        </div>
                        <div class="box-body no-padding">
                            <?php if(count($allforum)<=0){?>
                                <div class="alert alert-info">No Forum List Found</div>
                            <?php }else{?>
                                <div id="no-more-tables">

                                    <table class="table table-hover" id="js_personal_table">
                                        <thead>
                                        <tr>

                                            <th class="numeric">#</th>

                                            <th class="numeric"><?php echo 'Name';?></th>
                                            <th class="numeric"><?php echo 'date';?></th>

                                            <th class="numeric"><?php echo 'Action';?></th>

                                            <th class="numeric"><?php echo 'Remove';?></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($allforum)) {
                                            $i = 1;
                                            foreach ($allforum as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td data-title="<?php echo 'title'; ?>"
                                                        class="numeric"><?php echo $row->cat_title; ?></td>
                                                    <td data-title="<?php echo 'title'; ?>"
                                                        class="numeric"><?php echo date('d-m-Y', strtotime($row->added_date_time)); ?></td>

                                                    <td data-title="<?php echo 'Action'; ?>" class="numeric">
                                                        <?php if($row->status != 1){?>
                                                        <a href="<?php echo base_url('admin/forum/Forum/changeStatus/' . $row->cat_id . '/1'); ?>" class="btn btn-small btn-primary">
                                                            Show Category
                                                        </a>
                                                        <?php }else{ ?>
                                                            <a href="<?php echo base_url('admin/forum/Forum/changeStatus/' . $row->cat_id . '/0'); ?>" class="btn btn-small btn-warning">
                                                                Hide Category
                                                            </a>
                                                        <?php }?>
                                                    </td>

                                                    <td data-title="<?php echo 'Remove'; ?>" class="numeric"><a href="<?php echo base_url('admin/forum/Forum/delete/' . $row->cat_id); ?>" class="btn btn-block btn-danger">Remove</a></td>
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


