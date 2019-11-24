
<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="glyphicon glyphicon-tags"></i>
            All Advertise
        </h1>
    </section>
    <section class="content">

        <div class="row">

            <?php if($this->session->flashdata('success')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Advertise Delete successfully.</strong>
                    </div>
                </div>
            <?php } ?>
            <?php if(!empty($alladvertise)){?>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List All My Add</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <?php if(is_array($alladvertise)): ?>
                        <?php if(count($alladvertise)<=0){?>
                            <div class="alert alert-warning text-center">No Product Found <i class="fa fa-info"></i></div>
                        <?php }else{?>
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>ID</th>
                                <th>Ad Name</th>

                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                            <?php $i=1;foreach($alladvertise as $row):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $row->ad_name;?></td>
                                <td><a href="<?php echo base_url('advertise/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit</a></td>
                                <td><a href="<?php echo base_url('advertise/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
                            </tr>
                                <?php $i++;endforeach;?>
                            </tbody>
                        </table>
                        <?php }?>
                        <?php endif; ?>
                    </div>


                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <?php }else{?>
                <div class="alert alert-warning text-center">No Advertise Found <i class="fa fa-info"></i></div>
            <?php }?>
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
