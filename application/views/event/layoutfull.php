<style>
    .box-body img{
        padding: 5px;
    }
    .added-by{
        margin-right: 25px;
        background: #fff;
        height: 40px;
        padding: 10px;
    }
    .added-user{
        padding: 5px;
        border-radius: 3px;
    }
    .added-user1{
        padding: 6px;
        border-radius: 3px;
        margin-top: 6px;
        height: 35px;
    }
    .added-user1 a{
        color: #fff;
    }

</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-calendar"></i>
            Event Details
        </h1>
    </section>

    <section class="content">
        <div class="row">

            <div class="col-md-7">
                <div class="visible-xs">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <i class="fa fa-user"></i>
                            <span class="added-by"><b>Added By: </b><span class="added-user1 bg-blue pull-right"><a href="<?php echo base_url('showProfile/'.$layoutfull['user_id']);?>"><?php echo getNameById($layoutfull['user_id']);?></a></span></span>
                        </div>
                    </div>
                </div>
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <i class="fa fa-paragraph"></i>
                        <h3 class="box-title">Event Summary</h3>
                        <span class="added-by pull-right hidden-xs"><b>Added By: </b><span class="added-user bg-blue"><a style="color: #fff;" href="<?php echo base_url('showProfile/'.$layoutfull['user_id']);?>"><?php echo getNameById($layoutfull['user_id']);?></a></span></span>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $layoutfull['summary']; ?>
                    </div>

                </div>
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <i class="fa fa-paragraph"></i>
                        <h3 class="box-title">Event Details Description</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>

                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $layoutfull['description']; ?>
                    </div>

                    <!-- /.box-body -->
                </div>



                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-ticket"></i>
                        <h3 class="box-title">Event Photos</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="box-header with-border img-product-layout" src="<?php echo base_url() . '/assets/file/event/' . $layoutfull['primary_photo'] ?>" width="220px;" height="180px">
                            </div>
                            <div class="col-md-6">
                                <?php if($layoutfull['photo_2'] != 0){?>
                                <img class="box-header with-border img-product-layout" src="<?php echo base_url() . '/assets/file/event/' . $layoutfull['photo_2'] ?>" width="220px;" height="180px">
                            <?php }?>
                            </div>
                        </div>
                        <div class="visible-lg" style="margin-top: 20px"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php if($layoutfull['photo_3'] != 0){?>
                                    <img class="box-header with-border img-product-layout" src="<?php echo base_url() . '/assets/file/event/' . $layoutfull['photo_3'] ?>" width="220px;" height="180px">
                                <?php }?>
                            </div>
                        </div>
                    </div>


                </div>



                <?php if($layoutfull['file1'] != 0 && $layoutfull['file1'] !=0){?>
                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-ticket"></i>
                        <h3 class="box-title">Event Files</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="col-md-6">
                        <?php if($layoutfull['file1'] != 0){?>
                        <a href="<?php echo base_url() . '/assets/file/event/' .$layoutfull['file1']; ?>">
                            File Download 1
                        </a>
                        <?php }else{}  ?>
                        </div>
                        <div class="col-md-6">
                            <?php if($layoutfull['file2'] != 0){?>
                            <a href="<?php echo base_url() . '/assets/file/event/' .$layoutfull['file2']; ?>">
                            File Download 2
                            </a>
                            <?php }else{}  ?>
                        </div>
                    </div>


                </div>
                <?php }else{}  ?>



                <!-- /.END LEFT PANEL-DIV -->
            </div>

            <div class="col-md-5 col-xs-12">

                <!-- /.info-box -->
            </div>



            <div class="col-md-5">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-ticket"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Event Type</span>
                        <span class="info-box-number">  <?php
                            $data = get_data('event_main_cat', array('id' => $layoutfull['category']));
                            echo $data['cat_name'];
                            ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <!-- Profile Image -->


                        <!-- /.info-box -->
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><b>EVENT START DATE AND TIME</b></span>
                                <span class="info-box-number"><?php echo $layoutfull['start_date']; ?></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                  <span class="progress-description">
                    Event Start Time : <b><?php echo $layoutfull['start_time']; ?></b>
                  </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>



                        <!-- /.info-box -->
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><b>EVENT END DATE AND TIME</b></span>
                                <span class="info-box-number"><?php echo $layoutfull['end_date']; ?></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                  <span class="progress-description">
                    Event End Time : <b><?php echo $layoutfull['end_time']; ?></b>
                  </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>





                        <!-- /.info-box -->
                        <div class="info-box bg-aqua">
                            <span class="info-box-icon"><i class="fa fa-location-arrow"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><b>Event Place / Location</b></span>
                        <span class="info-box-number"><?php echo $layoutfull['location']; ?></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                  <span class="progress-description">
                    Event Location Map search on Google map
                  </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>


                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><b>Total Seats</b></span>
                            <span class="info-box-number"><?php echo $layoutfull['seats_no']; ?></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                  <span class="progress-description">
                   Event total Seats
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>


                    <!-- /.box-body -->

                <!-- /.box -->
            </div>



        </div>
        </div>
    </section>

</div>



