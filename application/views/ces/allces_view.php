


<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-book"></i>
            All CES
        </h1>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List All CES Info</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive ">
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

                                    <th class="numeric"><?php echo 'Edit';?></th>
                                    <th class="numeric"><?php echo 'View';?></th>
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
                                                class="numeric"><span><?php echo $row->ce_type; ?></span></td>
                                            <td data-title="<?php echo 'ethnicity'; ?>"
                                                class="numeric"><span ><?php echo $row->price; ?></span></td>
                                            <td data-title="<?php echo 'maritalstatus'; ?>"
                                                class="numeric"><span><?php echo countryNameByID($row->country); ?></span></td>
                                            <td data-title="<?php echo 'age'; ?>"
                                                class="numeric"><span><?php echo $row->state; ?></span></td>

                                            <td><a href="<?php echo base_url('ces/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit</a></td>
                                            <td><a href="<?php echo base_url('ces/detail/' . $row->id); ?>" class="btn btn-block btn-success"> View</a></td>
                                            <td><a href="<?php echo base_url('ces/ces_controller/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
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

    </section>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/datatable/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatable/dataTables.bootstrap.js');?>"></script>
<!--<script type="text/javascript">
    $(document).ready(function(){
        $('#all-posts').dataTable();
    });
</script>-->

