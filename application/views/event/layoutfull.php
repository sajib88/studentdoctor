<style>
    .box-body img{
        padding: 5px;
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
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Event Summary</h3>

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

                        <img src="<?php echo base_url() . '/assets/file/event/' . $layoutfull['primary_photo'] ?>" width="130" height="138"">


                        <?php if($layoutfull['photo_2'] != 0){?>
                            <img src="<?php echo base_url() . '/assets/file/event/' . $layoutfull['photo_2'] ?>" width="130" height="138">
                        <?php }?>
                        <?php if($layoutfull['photo_3'] != 0){?>
                            <img src="<?php echo base_url() . '/assets/file/event/' . $layoutfull['photo_3'] ?>" width="130" height="138"">
                        <?php }?>
                    </div>


                </div>


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
                        <span class="info-box-number"> <?php echo $layoutfull['category']; ?></span>
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
                            <span class="info-box-text"><b>Total Seats No</b></span>
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
