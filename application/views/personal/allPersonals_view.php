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

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-male"></i>
            All Personals

        </h1>
    </section>
    <section class="content">

        <div class="row">
            <?php if($this->session->flashdata('success')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('success');?>
                    </div>
                </div>
            <?php } $this->session->unset_userdata('success'); ?>

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Personal List</h3>
                    </div>
                    <div class="box-body">
                        <?php if(count($allpersonals)<=0){?>
                            <div class="alert alert-warning">No Personal</div>
                        <?php }else{?>
                        <div id="no-more-tables">

                            <table class="table table-hover" id="js_personal_table">
                                <thead>
                                <tr>

                                    <th class="numeric">#</th>

                                    <th class="numeric"><?php echo 'Title';?></th>

                                    <th class="numeric"><?php echo 'I am';?></th>

                                    <th class="numeric"><?php echo 'Interested In A';?></th>

                                    <th class="numeric"><?php echo 'Maritalstatus';?></th>

                                    <th class="numeric"><?php echo 'Age';?></th>
                                    <th class="numeric"><?php echo 'Posting Date';?></th>

                                    <th class="numeric"><?php echo 'Edit';?></th>
                                    <th class="numeric"><?php echo 'View';?></th>
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
                                                class="numeric"><?php echo (!empty($row->title))?$row->title:'<span class="badge bg-red">Not Given</span>'; ?></td>
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class=""><?php echo (!empty($row->iam))?$row->iam:'<span class="badge bg-red">Not Given</span>'; ?></span></td>
                                            <td data-title="<?php echo 'ethnicity'; ?>"
                                                class="numeric"><span class=""><?php echo (!empty($row->interestedin))?$row->interestedin:'<span class="badge bg-red">Not Given</span>'; ?></span></td>
                                            <td data-title="<?php echo 'maritalstatus'; ?>"
                                                class="numeric"><span class=""><?php echo (!empty($row->maritalstatus))?$row->maritalstatus:'<span class="badge bg-red">Not Given</span>'; ?></span></td>
                                            <td data-title="<?php echo 'age'; ?>"
                                                class="numeric"><span class=""><?php echo (!empty($row->age))?$row->age:'<span class="badge bg-red">Not Given</span>'; ?></span></td>

                                            <td data-title="<?php echo 'age'; ?>"
                                                class="numeric"><span class=""><?php echo  date('m-d-Y', strtotime($row->datetime)); ?></span></td>

                                            <td data-title="<?php echo 'Edit'; ?>" class="numeric"><a href="<?php echo base_url('personal/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit</a></td>
                                            <td data-title="<?php echo 'Detail'; ?>" class="numeric"><a href="<?php echo base_url('personal/detail/' . $row->id); ?>" class="btn btn-block btn-success"> View</a></td>
                                            <td data-title="<?php echo 'Remove'; ?>" class="numeric"><a href="<?php echo base_url('personal/Personal/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
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


