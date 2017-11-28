

<div id="page-wrapper">
<div class="row">




        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List All Blogs Info</h3>
                </div>
                <?php if($data = $this->session->flashdata('message')){ ?>
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">&times;</a>
                            <strong><?php echo $data;?></strong>
                        </div>
                    </div>
                <?php } ?>
                <div class="box-body no-padding">
                    <?php if(count($allblog)<=0){?>
                        <div class="alert alert-info">No Blogs</div>
                    <?php }else{?>
                        <div id="no-more-tables">

                            <table class="table table-hover" id="js_personal_table">
                                <thead>
                                <tr>

                                    <th class="numeric">#</th>

                                    <th class="numeric"><?php echo 'Title';?></th>

                                    <th class="numeric"><?php echo 'Description';?></th>

                                    <th class="numeric"><?php echo 'Category';?></th>

                                    <th class="numeric"><?php echo 'Tme & Date';?></th>

                                    <th class="numeric"><?php echo 'Image';?></th>

                                    <th class="numeric"><?php echo 'Action';?></th>

                                    <th class="numeric"><?php echo 'Remove';?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($allblog)) {
                                    $i = 1;
                                    foreach ($allblog as $row)



                                    { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class="label label-info"><?php echo $row->title; ?></span></td>
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class="label label-success"><?php echo substr($row->description,0, 20) ?></span></td>
                                            <td data-title="<?php echo 'Category'; ?>"
                                                class="numeric"><span class="label label-info"><?php echo $row->cat_type; ?></span></td>

                                            <td data-title="<?php echo 'Date & Time'; ?>"
                                                class="numeric">
                                                <span class="label label-info">
                                                <?php echo date("d-m-Y", strtotime($row->date)); ?></span>
                                                     <br>
                                                <span class="label label-info"><?php echo date("h:i:sa", strtotime($row->time)); ?></span>
                                            </td>
                                        
                                            <td data-title="<?php echo 'Image'; ?>"
                                                class="numeric"><span class=""><img src="<?php echo base_url() . '/assets/file/blog/' .$row->primary_image; ?>" alt="" width="50" height="50" class="img-circle " /></span></td>

                                            <td data-title="<?php echo 'Edit/View'; ?>" class="numeric"><a href="<?php echo base_url('admin/Blog/Blog_controller/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit & View</a></td>

                                            <td data-title="<?php echo 'Remove'; ?>" class="numeric"><a href="<?php echo base_url('admin/Blog/Blog_controller/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
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
