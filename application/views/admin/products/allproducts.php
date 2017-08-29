
<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div id="page-wrapper">
<div class="row">


    


        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List All My Product</h3>

                      
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <?php if(is_array($allproducts)): ?>
                        <?php if(count($allproducts)<=0){?>
                            <div class="alert alert-info">No Product</div>
                        <?php }else{?>
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Special Price</th>
                                <th>Action</th>
                                <th>Delete</th>

                            </tr>
                            <?php $i=1;foreach($allproducts as $row):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $row->name;?></td>
                                <td><span class="label bg-purple"><?php echo $row->type;?></span></td>
                                <td><span class="label label-warning"><?php echo $row->price;?></span></td>
                                <td><span class="label label-info"><?php echo $row->special_price;?></span></td>
                                <td><a href="<?php echo base_url('admin/product/Products/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit & View</a></td>
                                
                                <td><a href="<?php echo base_url('admin/product/Products/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
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