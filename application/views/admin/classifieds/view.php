

<div id="page-wrapper">
<div class="row">

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List All  classified Info</h3>
                </div>

                <?php if($this->session->flashdata('message')){ ?>
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> <?php echo $this->session->flashdata('message'); ?></strong>
                        </div>
                    </div>
                <?php } $this->session->unset_userdata('message'); ?>

                <div class="box-body no-padding">
                    <?php if(count($myclassified)<=0){?>
                        <div class="alert alert-info">No classified</div>
                    <?php }else{?>
                        <div id="no-more-tables">

                            <table class="table table-hover" id="js_personal_table">
                                <thead>
                                <tr>

                                    <th class="numeric">#</th>

                                    <th class="numeric"><?php echo 'Title';?></th>

                                    <th class="numeric"><?php echo 'Price';?></th>

                                    <th class="numeric"><?php echo 'Email';?></th>

                                    <th class="numeric"><?php echo 'phone';?></th>

                                    <th class="numeric"><?php echo 'Image';?></th>

                                    <th class="numeric"><?php echo 'Action';?></th>

                                    <th class="numeric"><?php echo 'Remove';?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($myclassified)) {
                                    $i = 1;
                                    foreach ($myclassified as $row)



                                    { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td data-title="<?php echo 'title'; ?>"
                                                class="numeric"><?php echo (!empty($row->title))?$row->title:'<span>Not Given</span>'; ?></td>
                                            <td data-title="<?php echo 'body'; ?>"
                                                class="numeric"><span class="label label-success">$<?php echo (!empty($row->price))?$row->price:'<span>Not Given</span>'; ?></span></td>
                                            <td data-title="<?php echo 'Price'; ?>"
                                                class="numeric"><span class="label label-info"><?php echo (!empty($row->email))?$row->email:'<span>Not Given</span>'; ?></span></td>
                                            <td data-title="<?php echo 'Email'; ?>"
                                                class="numeric"><span class="label label-warning"><?php echo (!empty($row->phone))?$row->phone:'<span>Not Given</span>'; ?></span></td>
                                            <td data-title="<?php echo 'Phone'; ?>"
                                                class="numeric"><span class=""><img src="<?php echo base_url() . '/assets/file/classifieds/' .$row->photo_primary; ?>" alt="" width="50" height="50" class="img-circle " /></span></td>

                                            <td data-title="<?php echo 'Edit/View'; ?>" class="numeric"><a href="<?php echo base_url('admin/Classifieds/Classifieds/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit & View</a></td>

                                            <td data-title="<?php echo 'Remove'; ?>" class="numeric"><a href="<?php echo base_url('admin/Classifieds/Classifieds/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
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
