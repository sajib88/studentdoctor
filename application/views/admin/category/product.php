
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Product Category Manage </h3>
        </div>
    </div>
    <div class="row">
        <?php if($this->session->flashdata('message')){ ?>
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> <?php echo $this->session->flashdata('message'); ?></strong>
                </div>
            </div>
        <?php } $this->session->unset_userdata('message'); ?>

        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1default" data-toggle="tab">Pending Product Category</a></li>
                        <li><a href="#tab2default" data-toggle="tab">Active Product Category</a></li>

                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">

                            <div class="col-lg-12">

                                <div id="no-more-tables">

                                    <table class="table table-hover" id="js_personal_table">
                                        <thead>
                                        <tr>

                                            <th class="numeric">#</th>

                                            <th class="numeric"><?php echo 'Category Name';?></th>

                                            <th class="numeric"><?php echo 'Create by ';?></th>


                                            <th class="numeric"><?php echo 'Action';?></th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($eventpending)) {
                                            $i = 1;
                                            foreach ($eventpending as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>

                                                    <td data-title="<?php echo 'ID'; ?>"
                                                        class="numeric"><?php echo $row->cat_name; ?></td>

                                                    <td data-title="<?php echo 'profession'; ?>"
                                                        class="numeric"><span class="label label-success">

                                        <?php
                                        $data = get_data('users', array('id' => $row->created_by));
                                        echo (!empty($data['user_name']))?$data['user_name']:"Admin";
                                        ?>
                                    </span></td>




                                                    <td data-title="<?php echo 'action'; ?>" class="numeric"> <a href="<?php echo base_url('admin/Category/eventupdate') . '/' . $row->id . '/' . $row->status .'/product_main_cat'; ?>">
                                                            <?php
                                                            if ($row->status == 1) {
                                                                echo '<button class="btn btn-success">Active</button>';
                                                            } else {
                                                                echo '<button class="btn btn-danger">Not Approved </button>';
                                                            }
                                                            ?>
                                                        </a></td>

                                                </tr>
                                                <?php $i++;
                                            }
                                        }?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            <div class="col-lg-12">

                                <div id="no-more-tables">

                                    <table class="table table-hover" id="js_personal_table">
                                        <thead>
                                        <tr>

                                            <th class="numeric">#</th>

                                            <th class="numeric"><?php echo 'Category Name';?></th>

                                            <th class="numeric"><?php echo 'Create by ';?></th>


                                            <th class="numeric"><?php echo 'Action';?></th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($eventactive)) {
                                            $i = 1;
                                            foreach ($eventactive as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>

                                                    <td data-title="<?php echo 'ID'; ?>"
                                                        class="numeric"><?php echo $row->cat_name; ?></td>

                                                    <td data-title="<?php echo 'profession'; ?>"
                                                        class="numeric"><span class="label label-success">

                                        <?php
                                        $data = get_data('users', array('id' => $row->created_by));
                                        echo (!empty($data['user_name']))?$data['user_name']:"Admin";
                                        ?>
                                    </span></td>




                                                    <td data-title="<?php echo 'action'; ?>" class="numeric"> <a href="<?php echo base_url('admin/Category/eventupdate') . '/' . $row->id . '/' . $row->status . '/product_main_cat'; ?>">
                                                            <?php
                                                            if ($row->status == 1) {
                                                                echo '<button class="btn btn-info">Approved</button>';
                                                            } else {
                                                                echo '<button class="btn btn-danger">Inactive</button>';
                                                            }
                                                            ?>
                                                        </a></td>

                                                </tr>
                                                <?php $i++;
                                            }
                                        }?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>



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