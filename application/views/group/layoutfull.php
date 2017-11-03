<style>
    .box-body img{
        padding: 5px;
    }.time{background: none;}
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-calendar"></i>
            Group Details
        </h1>



        <a data-toggle="modal" href="#myModal"  class="btn btn-warning btn-flat btn-xs pull-right">Add Your Comments</a>

    </section>

    <section class="content">
        <div class="row">
            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Your Group Comments Successfully Posted </strong>
                    </div>
                </div>
            <?php } $this->session->unset_userdata('message') ?>
            <div class="col-md-7">
                <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                        <!-- timeline time label -->
                        <li class="time-label">
                        <span class="bg-red">
                          <?php echo date('m-d-Y', strtotime($layoutfull['create_date'])); ?>
                        </span>
                            <span style="margin-right: 20px" class="pull-right">
                            <b>Added By: </b>
                            <span style="height: 25px; float: right; border-radius: 5px;" class="bg-blue">
                                <a style="color: #fff; padding: 20px;" href="<?php echo base_url('showProfile/'.$layoutfull['user_id']);?>"> <?php echo getNameById($layoutfull['user_id']);?></a>
                            </span>
                            </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-user bg-aqua"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header"><a href="#">  <?php echo $layoutfull['group_name']; ?></a> Discussion</h3>
                                <div class="timeline-body">
                                    <?php echo $layoutfull['description']; ?>
                                </div>
                                <div class="timeline-footer">
                                    <a data-toggle="modal" href="#myModal"  class="btn btn-primary btn-xs">Discuss Now</a>
                                </div>
                            </div>
                        </li>
                        <?php if (is_array($comments)) {
                        //print_r($comments);
                        foreach ($comments as $row) {
                            ?>

                            <li>
                                <i class="fa fa-comments bg-yellow"></i>

                                <div class="timeline-item">
                                    <span class="time">
                                        <i class="fa fa-user"></i> <a style="padding-right: 10px" href="<?php echo base_url('showProfile/'.$row->user_id);?>"><?php echo getNameById($row->user_id);?></a>
                                        <i class="fa fa-clock-o"></i><?php echo date('d-m-y', strtotime($row->added_date_time)); ?> </span>

                                    <h3 class="timeline-header"><a href="#"><?php echo $row->comments_title; ?></a></h3>
                                    <div class="timeline-body">
                                        <?php echo $row->comments_details; ?>
                                    </div>


                                </div>
                            </li>
                            <?php
                        }
                            if (count($comments) >= 5) {
                                ?>
                                    <div class="col-md-12" style="padding-right: 25px; margin-bottom: 50px;">
                                    <a data-toggle="modal" href="#myModal" class="btn btn-warning btn-flat btn-md pull-right">Add
                                        Your Comments</a>
                                    </div>

                                <?php
                            }

                        }
                        ?>

                    </ul>
                </div>
            </div>

            <div class="col-md-5">



                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Group Type</span>
                        <span class="info-box-number">  <?php
                            $data = get_data('group_main_cat', array('id' => $layoutfull['category']));
                            echo $data['cat_name'];
                            ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <!-- Profile Image -->


                <!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-calendar"></i></span>



                    <div class="info-box-content">
                        <span class="info-box-text">Group Start Date</span>
                        <span class="info-box-number"> <?php echo date('d-m-y', strtotime($layoutfull['create_date'])); ?></span>
                    </div>

                    <!-- /.info-box-content -->
                </div>


                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-ticket"></i>
                        <h3 class="box-title">Group Photos</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <img src="<?php echo base_url() . '/assets/file/group/' . $layoutfull['primary_image'] ?>" width="150" height="138"">
                        <?php if($layoutfull['image_2'] != 0){?>
                            <img src="<?php echo base_url() . '/assets/file/group/' . $layoutfull['image_2'] ?>" width="150" height="138">
                        <?php }?>

                    </div>
                </div>
            </div>

            <div class="clear"></div>

            <div class="col-md-12">






            </div>

        </div>

</section>

</div>


<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Discuss Topic</h4>
            </div>


            <div class="modal-body">
                <form role="form" method="post" id="post" enctype="multipart/form-data"
                      action="<?php echo base_url('group/layoutfull/' . $getid); ?>">
                    <input name="postid" value="<?php  echo $getid; ?>" type="hidden" class="form-control">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Comments Title<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
                            <input name="comments_title" value="" class="form-control" required="">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Commnets Deatils<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>

                            <textarea name="comments_details" value="" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-danger pull-left" type="button">Cancel</button>
                        <input type="submit" name="submit" class="btn  btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



