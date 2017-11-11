
<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div id="page-wrapper">
<div class="row">


    <div class="row">
        <div class="col-lg-12">
            <h3 class="box-title">List All My Product</h3>
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


                        <?php if(is_array($allproducts)): ?>
                        <?php if(count($allproducts)<=0){?>
                            <div class="alert alert-info">No Product</div>
                        <?php }else{?>
                        <div id="no-more-tables">
                        <table class="table table-hover" id="js_personal_table">

                            <thead>
                            <tr>
                                <th class="numeric">#</th>
                                <th class="numeric">Product Name</th>
                                <th class="numeric">Type</th>
                                <th class="numeric">Price</th>
                                <th class="numeric">Special Price</th>
                                <th class="numeric">Action</th>
                                <th class="numeric">Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($allproducts as $row):?>
                            <tr>
                                <td data-title="#" class="numeric"><?php echo $i;?></td>
                                <td data-title="Product Name" class="numeric"><?php echo $row->name;?></td>
                                <td data-title="Type" class="numeric"><span class="">
                                        <?php $data = $this->global_model->get_data('product_main_cat', array('id'=>$row->type));?>
                                        <?php echo $data['cat_name']?>
                                    </span>
                                </td>
                                <td data-title="Price" class="numeric"><span class="">$<?php echo $row->price;?></span></td>
                                <td data-title="Special Price" class="numeric"><span class="">$<?php echo $row->special_price;?></span></td>
                                <td data-title="Action" class="numeric"><a href="<?php echo base_url('admin/Product/Products/edit/' . $row->id); ?>" class="btn btn-block btn-primary"> Edit & View</a></td>
                                
                                <td data-title="Delete" class="numeric"><a href="<?php echo base_url('admin/Product/Products/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a></td>
                            </tr>
                                <?php $i++;endforeach;?>
                            </tbody>
                        </table>
                        </div>
                        <?php }?>
                        <?php endif; ?>

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