
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Users</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div id="no-more-tables">

                <table class="table table-hover" id="js_personal_table">
                    <thead>
                    <tr>

                        <th class="numeric">#</th>

                        <th class="numeric"><?php echo 'User Id';?></th>

                        <th class="numeric"><?php echo 'Usename';?></th>

                        <th class="numeric"><?php echo 'Profession';?></th>



                        <th class="numeric"><?php echo 'Join Date';?></th>

                        <th class="numeric"><?php echo 'Email Id';?></th>

                        <th class="numeric"><?php echo 'Action';?></th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($users)) {
                        $i = 1;
                        foreach ($users as $row) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>

                                <td data-title="<?php echo 'ID'; ?>"
                                    class="numeric"><?php echo $row->id; ?></td>

                                <td data-title="<?php echo 'username'; ?>"
                                    class="numeric"><?php echo $row->user_name; ?></td>
                                <td data-title="<?php echo 'profession'; ?>"
                                    class="numeric"><span class="label label-success">

                                        <?php
                                        $data = get_data('profession', array('id' => $row->profession));
                                        echo $data['name'];
                                        ?>
                                    </span></td>

                                <td data-title="<?php echo 'created'; ?>"
                                    class="numeric"><span class="label label-warning"><?php echo $row->created; ?></span></td>
                                <td data-title="<?php echo 'email'; ?>"
                                    class="numeric"><span class="label label-info"><?php echo $row->email; ?></span></td>

                                <td data-title="<?php echo 'action'; ?>" class="numeric"> <a href="<?php echo base_url('admin/users/changeUserStatus') . '/' . $row->id . '/' . $row->status; ?>">
                                        <?php
                                        if ($row->status == 1) {
                                            echo '<button class="btn btn-success">Active</button>';
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