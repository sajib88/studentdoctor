<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 10-Dec-16
 * Time: 11:35 PM
 */

?>
<style>
    .glyphicon { margin-right:5px; }
    .thumbnail
    {
        margin-bottom: 20px;
        padding: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
    }

    .item.list-group-item
    {
        float: none;
        width: 100%;
        background-color: #fff;
        margin-bottom: 10px;
    }
    .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
    {
        background: #428bca;
    }

    .item.list-group-item .list-group-image
    {
        margin-right: 10px;
    }
    .thumbnail img
    {
        height: 171px;
    }
    .item.list-group-item .thumbnail
    {
        margin-bottom: 0px;
    }
    .item.list-group-item .caption
    {
        padding: 9px 9px 0px 9px;
    }
    .item.list-group-item:nth-of-type(odd)
    {
        background: #eeeeee;
    }

    .item.list-group-item:before, .item.list-group-item:after
    {
        display: table;
        content: " ";
    }

    .item.list-group-item img
    {
        float: left;
    }
    .item.list-group-item:after
    {
        clear: both;
    }
    .list-group-item-text
    {
        margin: 0 0 11px;
    }
    .img-product{
        height: 200px;
        width: 308px;
    }

</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="glyphicon glyphicon-tags"></i>
            All Products
        </h1>
    </section>

    <section class="content">

        <div class="row">

                <?php if(is_array($allproducts)): ?>
                <?php if(count($allproducts)<=0){?>
                    <div class="alert alert-warning text-center">No Product Found <i class="fa fa-info"></i></div>
                <?php }else{
                foreach($allproducts as $row){
                ?>

            <div class="col-lg-4">
                <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $row['name'];?></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <img class="img-responsive img-product" src="<?php echo base_url().'assets/file/product/'.$row['photo_primary'];?>" alt="" />
                                    </div>
                                    <!-- ./chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-12">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active"><a href="#"> Special Price<span class=" pull-right">$<?php echo $row['special_price'];?></span></a></li>
                                        <li><a href="#"> Old Price<span class=" pull-right">$<?php echo $row['price'];?></span></a></li>

                                        <li><a href="#"> Product Type <span class=" pull-right">
                                                    <?php
                                                    $data = get_data('product_main_cat', array('id' => $row['type']));
                                                    echo $data['cat_name'];
                                                    ?>
                                                </span></a>
                                        </li>
                                        <li><a href="#"> Seller Name<span class=" pull-right"><?php echo (!empty( $row['seller_name']))? $row['seller_name']:'<span class="badge bg-red">Not Given</span>';?></span></a></li>
                                        <li><a href="#"> Seller Email <span class=" pull-right"><?php echo (!empty( $row['seller_email']))? $row['seller_email']:'<span class="badge bg-red">Not Given</span>';?></span></a></li>
                                        <li><a href="#"> Seller Phone <span class=" pull-right"><?php echo (!empty( $row['seller_phone']))? $row['seller_phone']:'<span class="badge bg-red">Not Given</span>';?></span> </a></li>
                                    </ul>

                                    <a href="<?php echo base_url('product/details/' . $row['id']); ?>" class="btn btn-block btn-success"> View</a>

                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <?php } }?>
                <?php endif; ?>


        </div>
    </section>
</div>



