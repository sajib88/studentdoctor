

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-fw fa-list-alt "></i>
            Show All Posted
        </h1>
    </section>

    <section class="content">
        <div class="row">


            <?php if(is_array($viewallclassified) ):?>

       <?php foreach($viewallclassified as $row):?>
        <div class="col-lg-4 col-xs-12">
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header ">
                <div class="widget-user-image text-center">
                    </br>
                    <img src="<?php echo base_url() . '/assets/file/classifieds/' .$row['photo_primary']; ?>" alt="" width="310px" height="280px" class="img-size" />

                    </br>
                </div>
                </br>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li><a href="#">Title <span class="pull-right"><?php echo (!empty($row['title']))?substr($row['title'], 0, 30):'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                    <li><a href="#">Price <span class="pull-right">$<?php echo (!empty($row['price']))?$row['price']:'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                    <li><a href="#">Email Id <span class="pull-right"><?php echo (!empty($row['email']))?$row['email']:'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                    <li><a href="#">Phone <span class="pull-right"><?php echo (!empty($row['phone']))?$row['phone']:'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                </ul>
            </div>

            <div class="box-footer">

                <a href="<?php echo base_url('classifieds/layoutfull/' . $row['id']); ?>" class="btn btn-block btn-success"> Details View</a>

            </div>
         </div>
        </div>

            <?php endforeach;?>
            <?php endif; ?>
        </div>
        <?php //echo $pagging['pagging']; ?>
    </section>

</div>
