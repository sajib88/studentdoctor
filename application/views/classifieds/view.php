<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-fw fa-list-alt "></i>
            Edit My Listed
        </h1>
    </section>

    <section class="content">
        <div class="row">

            <?php if($this->session->flashdata('success')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $this->session->flashdata('success');?></strong>
                    </div>
                </div>
            <?php } ?>

            <?php if(!empty($myclassified)){ ?>
            <?php foreach($myclassified as $row):?>

        <div class="col-lg-4 col-xs-12">
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header text-center">
                <div class="widget-user-image text-center">

                        </br>
                    <img src="<?php echo base_url() . '/assets/file/classifieds/' .$row->photo_primary; ?>" alt="" width="310px" height="280px" class="img-size" />

                    </br>


                </div>
                </br>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li><a href="#">Title <span class="pull-right"><?php echo (!empty($row->title))?substr($row->title, 0, 30):'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                    <li><a href="#">Price <span class="pull-right">$<?php echo (!empty($row->price))?$row->price:'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                    <li><a href="#">Phone <span class="pull-right"><?php echo (!empty($row->phone))?$row->phone:'<span class="badge bg-red">Not Given</span>' ; ?></span></a></li>
                </ul>
            </div>

            <div class="box-footer">
                <a href="<?php echo base_url('classifieds/layoutfull/' . $row->id); ?>" class="btn btn-block btn-primary"> View</a>
                <a href="<?php echo base_url('classifieds/edit/' . $row->id); ?>" class="btn btn-block btn-success"> Edit</a>
                <a href="<?php  echo base_url('classifieds/classifieds/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a>
            </div>
         </div>
        </div>

                <?php endforeach;?>
            <?php }else{ ?>
<!--                <div class="col-md-12">-->
<!--                <div class="alert alert-warning alert-dismissible text-center">-->
<!--                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
<!--                    No classified found <i class="fa fa-info"></i>-->
<!--                </div>-->
<!--                </div>-->
            <?php } ?>


        </div>
    </section>

</div>
