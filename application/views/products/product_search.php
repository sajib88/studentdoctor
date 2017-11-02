<style type="text/css">
    .list-group{
        margin-bottom: 10px;
    }
    .no-border{
        border-top: none;
    }
    .content{
        padding-left: 0p;
    }
</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-search"></i>
            Search Product
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post"  action="<?php echo base_url('product/search'); ?>">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="name" placeholder="Product Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select onchange="getSubCat(this)" name="type" class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                            if (is_array($main_cat)) {
                                                foreach ($main_cat as $cat) {
                                                    ?>
                                                    <option value="<?php echo $cat->id; ?>"><?php echo $cat->cat_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input name="description" type="text" placeholder="Description" class="form-control">
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <?php echo anchor('profile/dashboard',"<i class='fa fa-undo'></i> &nbsp; &nbsp; Cancel",array('class' => 'btn btn-danger btn-small pull-left'));?>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <button class="btn  btn-success  btn-small pull-right"  name="submit" type="submit">
                                            <i class="fa fa-check"></i> &nbsp; &nbsp; Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <hr/>
        <div class="row">
                <?php if(isset($result)) {
                    if (empty($result)) {
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <i class="fa fa-info"></i> No Product Found</div>
                        </div>
                    <?php } else {
                        if (!empty($result)) { ?>
                                    <?php if(is_array($result)): ?>

                                        <?php foreach($result as $row):?>
                                            <div class="col-lg-4 col-xs-12">
                                                <div class="box box-widget widget-user-2">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header ">
                                                        <div class="widget-user-image text-center">
                                                            <?php
                                                            if($row->photo_primary == 0) {?>
                                                                </br>
                                                                <div class="text-center">
                                                                    <img src="<?php echo base_url() . '/assets/upload_prfl.png'?>" alt="" class="img-rounded " width="150" height="150" />
                                                                </div>
                                                                </br>

                                                            <?php }
                                                            else {?>
                                                                </br>

                                                                <img src="<?php echo base_url() . '/assets/file/product/' .$row->photo_primary; ?>" alt="" width="308" height="200" class="img-size-product" />
                                                                </br>
                                                            <?php }
                                                            ?>
                                                            <h4><?php //echo getProfessionById($row->profession); ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="box-footer no-border">
                                                        <ul class=" list-group list-group-unbordered">
                                                            <li class="list-group-item">Product Name <span class="pull-right  "><?php echo (!empty($row->name))?substr($row->name, 0, 20):''?></span></li>
                                                            <li class="list-group-item">Product Type <span class="pull-right  "><?php echo (!empty($row->type))?productCatName($row->type):'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                            <li class="list-group-item">Price <span class="pull-right  ">$<?php echo (!empty($row->price))?$row->price:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                            <li class="list-group-item">Speacial Price <span class="pull-right  ">$<?php echo (!empty($row->special_price))?$row->special_price:'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                            <li class="list-group-item">Description <span class="pull-right "><?php echo (!empty($row->description))?substr($row->description, 0 ,20):'<span class="badge bg-red">Not Given</span>' ; ?></span></li>
                                                        </ul>
                                                        <span class="show_button">
                                                                        <a href="<?php echo base_url() .'product/details/' .$row->id; ?>" class=" btn btn-block btn-dropbox">See More</a>
                                                                    </span>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach;?>
                                    <?php endif; ?>


                        <?php }
                    }
                }?>

        </div>

</section>
</div>

<script>

</script>

<script>


    function getComboA(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {state: value};
        $.ajax({
            type: 'POST',
            url: base_url + "public_web/publicweb/getStateByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#result").html(resultData);
            }
        });

    }

</script>
