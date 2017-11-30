<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 13-Dec-16
 * Time: 12:15 PM
 */

$this->load->helper('global_helper');
?>

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
        <h1><i class="fa fa-male"></i>
            All Personals

        </h1>
    </section>
    <section class="content">

        <div class="row">


            <?php if(is_array($allpersonals) ):?>

                <?php foreach($allpersonals as $row):?>



                    <div class="col-lg-4 col-xs-12">
                        <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header ">
                                <div class="widget-user-image text-center">
                                    </br>
                                    <img src="<?php echo base_url() . 'assets/file/personals/' .$row['primary_photo']; ?>" alt="" width="310px" height="280px" class="img-size" />

                                    </br>
                                </div>
                                </br>
                            </div>
                            <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                    <li><a href="#">I am a <span class="pull-right"><?php echo (!empty($row['iam']))?substr($row['iam'], 0, 30):'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                                    <li><a href="#">Intested in a <span class="pull-right"><?php echo (!empty($row['interestedin']))?$row['interestedin']:'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                                    <li><a href="#">Country   <span class="pull-right"><?php echo (!empty( $row['country']))? countryNameByID($row['country']).'':''?></span></a></li>
                                    <li><a href="#">State <span class="pull-right"><?php echo (!empty($row['state']))?$row['state']:'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                                    <li><a href="#">Age <span class="pull-right"><?php echo (!empty($row['age']))?$row['age']:'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                                    <li><a href="#">Body Type <span class="pull-right"><?php echo (!empty($row['body']))?$row['body']:'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                                    <li><a href="#">Language <span class="pull-right"><?php echo (!empty($row['lang']))?$row['lang']:'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                                    <li><a class="pull-right" style="color: goldenrod;" href="<?php echo base_url('showProfile/'.$row['uid']);?>"> &nbsp Added By <?php echo getNameById($row['uid']); ?></a></li>

                                </ul>
                            </div>

                            <div class="box-footer">

                                <a href="<?php echo base_url() . 'personal/detail/' .$row['id']; ?>" class="btn btn-block btn-success"> Details View</a>

                            </div>
                        </div>
                    </div>

                <?php endforeach;?>
            <?php endif; ?>
        </div>






       </section>
</div>

