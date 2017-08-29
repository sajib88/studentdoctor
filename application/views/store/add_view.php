<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:32 PM
 */
?>
<style>
    .error{
        color: red;
        font-size: 12px;
    }
</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Online Store
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Online Store</a></li>
            <li class="active">Add</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-7">
                <?php echo $this->session->flashdata('msg');?>
                <?php if(isset($msg) && $msg!='') echo $msg;?>
                <div class="box box-primary">
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo base_url('store/store/add'); ?>">
                            <div class="row">
                            <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Store Name<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                                    <input name="store_name" value="<?php echo ''; ?>"  class="form-control">
                                </div>
                                <?php echo form_error('store_name');?>
                            </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Store Logo<span class="error">*</span><small>use logo 200px x 200px </small></label><span id='title-error' class='error' for='title'></span>
                                        <input name="storelogo" value="<?php echo ''; ?>" type="file"  class="">
                                    </div>
                                    <?php echo form_error('store_name');?>
                                </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Business Detials</label><span id='title-error' class='error' for='title'></span>

                                    <textarea name="business" class="form-control"></textarea>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Store Phone</label><span id='title-error' class='error' for='title'></span>
                                    <input name="store_phone" value="<?php echo ''; ?>"   class="form-control">

                                </div>
                            </div>



                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Store E-mail</label><span id='title-error' class='error' for='title'></span>
                                        <input name="store_email" value="<?php echo ''; ?>"   class="form-control">

                                    </div>
                                </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Store Category</label><span id='title-error' class='error' for='title'></span>
                                    <?php $category = array('Business','Doctor','pharmacy') ?>
                                    <select name="product_id" class="form-control">
                                        <?php
                                        if (is_array($category)) {
                                            foreach ($category as $row) {
                                                ?>
                                                <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button class="btn btn-info btn-lg" type="submit"> Save </button>
                                </div>
                            </div>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-bullhorn"></i>

                        <h3 class="box-title">Store Create Help</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-success">


                            <p>
                            <ul>
                                <li><b>Store Name </b> — You must Be select Your Store name</li>

                                <li><b>Store Logo </b>— Your Store Logo Size 200px x 200px Will be good size </li>

                                <li><b>Store Details </b>Your Store Intro you can type here </li>

                                <li><b>Store Contact Info</b> Add phone, email , website for your Online store</li>


                            </ul>
                            </p>
                        </div>
                        <div class="callout callout-info">
                            <h4>More Help </h4>

                            <p>Contact Us : <b> info@foralldoctors.com</b> </p>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </section>
</div>