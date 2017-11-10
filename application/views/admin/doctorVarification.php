
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Manage Doctor Profile </h3>
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

        <?php if($this->session->flashdata('message1')){ ?>
            <div class="col-lg-12">
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> <?php echo $this->session->flashdata('message1'); ?></strong>
                </div>
            </div>
        <?php } $this->session->unset_userdata('message1'); ?>

        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1default" data-toggle="tab">Varification Request</a></li>
                        <li><a href="#tab2default" data-toggle="tab">Varified Doctor Profiles</a></li>

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

                                            <th class="numeric"><?php echo 'Full Name';?></th>

                                            <th class="numeric"><?php echo 'Profession ';?></th>
                                            <th class="numeric"><?php echo 'NPI / NID Number';?></th>


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
                                                        class="numeric"><?php echo $row->full_name; ?></td>

                                                    <td data-title="<?php echo 'profession'; ?>"
                                                        class="numeric"><span class="">

                                        <?php
                                        $data = get_data('profession', array('id' => $row->profession));
                                        echo $data['name'];
                                        ?>
                                    </span></td>
                                                    <td data-title="<?php echo 'npi'; ?>"
                                                        class="numeric"><?php echo $row->npi; ?></td>




                                                    <td data-title="<?php echo 'action'; ?>" class="numeric"> <a href="<?php echo base_url('admin/DoctorVarification/varify') . '/' . $row->id . '/' . $row->is_valid . '/'. $row->user_id . '/' .$row->email . '/' . $row->full_name . '/' . $row->npi;?>">
                                                            <?php
                                                            if ($row->is_valid != 1) {
                                                                echo '<button class="btn btn-success">Varify</button>';
                                                            }
                                                            ?>
                                                        </a>
                                                        <a class="btn btn-info" href="<?php echo base_url('admin/DoctorVarification/view/'.$row->id);?>">View</a>
                                                    </td>

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

                                    <table class="table table-hover" id="js_personal_table2">
                                        <thead>
                                        <tr>

                                            <th class="numeric">#</th>

                                            <th class="numeric"><?php echo 'Full Name';?></th>

                                            <th class="numeric"><?php echo 'Profession';?></th>
                                            <th class="numeric"><?php echo 'NPI / NID Number';?></th>


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
                                                        class="numeric"><?php echo $row->full_name; ?></td>

                                                    <td data-title="<?php echo 'profession'; ?>"
                                                        class="numeric"><span class="">

                                        <?php
                                        $data = get_data('profession', array('id' => $row->profession));
                                        echo $data['name'];
                                        ?>
                                    </span></td>
                                                    <td data-title="<?php echo 'npi'; ?>"
                                                        class="numeric"><?php echo $row->npi; ?></td>




                                                    <td data-title="<?php echo 'action'; ?>" class="numeric"> <a href="<?php echo base_url('admin/DoctorVarification/varify') .'/'. $row->id . '/' . $row->is_valid . '/' . $row->user_id; ?>">
                                                            <?php
                                                            if ($row->is_valid == 1) {
                                                                echo '<button class="btn btn-danger">unverified</button>';
                                                            }
                                                            ?>
                                                        </a>
                                                        <a class="btn btn-info" href="<?php echo base_url('admin/DoctorVarification/view/'.$row->id);?>">View</a>
                                                    </td>

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

<script type="text/javascript">
    $(document).ready(function(){
        var personaltable = document.getElementById("js_personal_table2");
        $(personaltable).dataTable();
    });
</script>