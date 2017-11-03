<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-calendar"></i>
            All my Events
        </h1>
    </section>

    <section class="content">
        <div class="row">

            <?php if($this->session->flashdata('success')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> <?php echo $this->session->flashdata('success');?></strong>
                    </div>
                </div>
            <?php } ?>

            <?php if(!empty($myevent)){ ?>
            <?php foreach($myevent as $row):?>


                    <div class="col-sm-4">
                        <div class="panel panel-primary event-primary">
                            <div class="panel-heading"><h2><a href="#"><?php echo $row->title; ?></a></h2></div>
                            <div class="panel-body nopadding">
                                <img src="<?php echo base_url() . '/assets/file/event/' .$row->primary_photo; ?>" alt="event image" width="100%" height="30%" class="img-responsive"/>
                                <div class="row nopadding">
                                    <div class="col-sm-6 nopadding">
                                        <time class="start pink">
                                            EVENT <span class="day">START</span>
                                            <span class="month"><?php echo date('m-d-Y', strtotime($row->start_date)); ?></span>
                                            <span class="year"><?php echo date('h:i:s A', strtotime($row->start_time)); ?></span>
                                        </time>
                                    </div>
                                    <div class="col-sm-6 nopadding">
                                        <time class="end purple">
                                            EVENT <span class="day">END</span>
                                            <span class ="month"><?php echo date('m-d-Y', strtotime($row->end_date)); ?></span>
                                            <span class="year"><?php echo date('h:i:s A', strtotime($row->end_time)); ?></span>
                                        </time>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer panel-primary">
                                <p><?php echo $row->summary; ?>
                                </p>
                                <a href="<?php echo base_url('event/edit/' . $row->id); ?>" class="btn btn-success">Edit</a>
                                <a href="<?php echo base_url('event/layoutfull/' . $row->id); ?>" class="btn btn-warning"> View Details</a>
                                <a href="<?php echo base_url('event/event/delete/' . $row->id); ?>" class="btn  btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>



                <?php endforeach;?>
            <?php }else{ ?>
                <div class="col-md-12">
                    <div class="alert alert-warning text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        No events found <i class="fa fa-info"></i>
                    </div>
                </div>
            <?php } ?>


        </div>
    </section>

</div>
