
<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="glyphicon glyphicon-tags"></i>
            All Products
        </h1>
    </section>
    <section class="content">

        <div class="row">

            <?php if($this->session->flashdata('success')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Product Delete successfully.</strong>
                    </div>
                </div>
            <?php } ?>
            <?php if(!empty($allproducts)){?>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List All My Product</h3>

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
                        <?php if(is_array($allproducts)): ?>
                        <?php if(count($allproducts)<=0){?>
                            <div class="alert alert-warning text-center">No Product Found <i class="fa fa-info"></i></div>
                        <?php }else{?>
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Product Type</th>
                                <th>Price</th>
                                <th>Special Price</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>

                            </tr>
                            <?php $i=1;foreach($allproducts as $row):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $row->name;?></td>
                                <td><span class=""><?php $data = get_data('product_main_cat', array('id' => $row->type));
                                                    echo $data['cat_name']; ?></span></td>
                                <td><span class="">$<?php echo $row->price;?></span></td>
                                <td><span class="">$<?php echo $row->special_price;?></span></td>
                                <td><a href="<?php echo base_url('product/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit</a></td>
                                <td><a href="<?php echo base_url('product/details/' . $row->id); ?>" class="btn btn-block btn-success"> View</a></td>
                                <td><a href="<?php echo base_url('product/products/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
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
                <div class="alert alert-warning text-center">No Product Found <i class="fa fa-info"></i></div>
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
