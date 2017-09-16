<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 13-Dec-16
 * Time: 12:15 PM
 */

$this->load->helper('global_helper');
?>
<link href="http://[::1]/doctorsapp/script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<style>

    .circular {
        width: 120px;
        height: 120px;
        border-radius: 150px;
        -webkit-border-radius: 150px;
        -moz-border-radius: 150px;
        padding: 3px;
        border: 3px solid #d2d6de;
    }
</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="fa fa-book"></i>
            All CES
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <?php if(!empty($allcesGrid)){
                foreach ($allcesGrid as $row){?>
            <div class="col-md-4">
                    <div class="box box-danger">
                        <div class="box-body box-profile">
                            <div style="text-align: center;">
                                <!--<img class="profile-user-img img-responsive img-circle" src="<?php /*echo base_url().'assets/file/'*/?>" alt="User profile picture">-->
                                <img src="<?php echo base_url() . 'assets/file/ces/' .$row['primary_image']; ?>" alt="" class="circular" />
                            </div>

                            <h3 class="profile-username text-center"><?php echo (!empty($row['title']))?$row['title']:''?></h3>

                            <p class="text-muted text-center"><?php echo (!empty( $row['ethnicity']))? $row['ce_type']:''?></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Price</b> <span class="pull-right "><?php echo (!empty( $row['price']))? $row['price']:''?></span>
                                </li>
                                <li class="list-group-item">
                                    <b>Special Price</b> <span class="pull-right "><?php echo (!empty( $row['special_price']))? $row['special_price']:''?></span>
                                </li>
                                <li class="list-group-item">
                                    <b>Country</b> <span class="pull-right "><?php echo (!empty( $row['country']))? countryNameByID($row['country']):''?></span>
                                </li>
                                <li class="list-group-item">
                                    <b>Business Name</b> <span class="pull-right "><?php echo (!empty( $row['business_name']))? $row['business_name']:''?></span>
                                </li>
                                <li class="list-group-item">
                                    <b>Business phone</b> <span class="pull-right "><?php echo (!empty( $row['business_phone']))? $row['business_phone']:''?></span>
                                </li>
                                <li class="list-group-item">
                                    <b>Business Email</b> <span class="pull-right "><?php echo (!empty( $row['business_email']))? $row['business_email']:''?></span>
                                </li>
                                <li class="list-group-item">
                                    <b>Business website</b> <span class="pull-right "><?php echo (!empty( $row['business_website']))? $row['business_website']:''?></span>
                                </li>
                            </ul>

                            <a href="<?php echo base_url() . 'ces/detail/' .$row['id']; ?>" class="btn btn-primary btn-block"><b>View Detail</b></a>
                        </div>
                        <!-- /.box-body -->
                    </div>
             </div>

            <?php }
            }?>
           
        </div>

       </section>
</div>

