<style>
    .box-body img{
        padding: 5px;
    }.time{background: none;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="glyphicon glyphicon-tags"></i>
            &nbsp;Blog Full Details
        </h1>
    </section>

    <section class="content">
        <div class="row">

            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Your Blog Comments Successfully Posted </strong>
                    </div>
                </div>
            <?php } $this->session->unset_userdata('message') ?>


            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img src="<?php echo base_url() . 'assets/file/insideblog/' .$single_post['primary_image'] ?>" alt="" width="150" height="150" class="blog-image center-block" />
                        <h4 class="profile-username text-center"> <?php echo $single_post['title']; ?></h4>
                        <p class="text-center"><b>Added By : </b> <span><a href="<?php echo base_url('showProfile/'.$single_post['user_id']);?>"><?php echo getNameById($single_post['user_id']);?></a></span></p>
                        <br>
                        <a data-toggle="modal" href="#myModal" href="#" class="btn btn-primary btn-block"><b>Dicsuss</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Blog Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Blog Date </b> <span class="pull-right"><?php echo date("d-m-Y", strtotime($single_post['date'])); ?></span>
                            </li>

                            <li class="list-group-item">
                                <b>Blog Time </b> <span class="pull-right"><?php echo $single_post['time']; ?></span>
                            </li>

                            <li class="list-group-item">
                                <b>Blog keyword </b> <span class="pull-right"><?php echo (!empty($single_post['keyword']))?$single_post['keyword']:"<span class='badge bg-red'>Not Given</span>" ?></span>
                            </li>

                            <li class="list-group-item">
                                <b>Blog tag </b> <span class="pull-right"><?php echo (!empty($single_post['tag']))?$single_post['tag']:"<span class='badge bg-red'>Not Given</span>"; ?></span>
                            </li>

                        </ul>



                    </div>
                    <!-- /.box-body -->
                </div>





                <div class="box box-success">
                    <div class="box-header with-border">

                        <h3 class="box-title">Blog Photos</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <img src="<?php echo base_url() . '/assets/file/insideblog/' . $single_post['primary_image'] ?>" width="265" height="200"">


                        <?php if($single_post['image1'] != 0){?>
                            <img src="<?php echo base_url() . '/assets/file/insideblog/' . $single_post['image1'] ?>" width="130" height="130">
                        <?php }?>

                        <?php if($single_post['image2'] != 0){?>
                            <img src="<?php echo base_url() . '/assets/file/insideblog/' . $single_post['image2'] ?>" width="130" height="130">
                        <?php }?>


                    </div>


                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Blog Files</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <?php if($single_post['file1'] != 0){?>
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <i class="fa fa-file-word-o"></i>
                                    <h3 class="box-title">Blog Attachment</h3>
                                </div>
                                <div class="box-body">


                                    <a href="<?php echo base_url() . '/assets/file/insideblog/' . $single_post['file1'];?>">Download File  </a><br/>



                                </div>


                            </div>
                        <?php }
                        ?>


                        <?php if($single_post['file2'] != 0){?>
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <i class="fa fa-file-word-o"></i>
                                    <h3 class="box-title">Blog Attachment</h3>
                                </div>
                                <div class="box-body">


                                    <a href="<?php echo base_url() . '/assets/file/insideblog/' . $single_post['file2'];?>">Download File  </a><br/>



                                </div>


                            </div>
                        <?php }
                        ?>


                    </div>
                    <!-- /.box-body -->
                </div>

                <!-- /.box -->
            </div>



            <div class="col-lg-8">

                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-file-picture-o"></i>
                        <h3 class="box-title">Blog Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <?php echo $single_post['description'];?>

                    </div>


                </div>


                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-file-picture-o"></i>
                        <h3 class="box-title">DISCUSS</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <div class="tab-pane" id="timeline">


                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-red">
                        Blog Posted Date <?php echo date("m-d-Y", strtotime($single_post['date'])); ?>

                        </span>
                                    <div class="visible-xs" style="margin-top: 10px;"></div>

                                    <a data-toggle="modal" href="#myModal"  class="btn btn-warning btn-flat btn-md pull-right">Add Your Comments</a>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->


                                <?php if (is_array($comments)) {
                                    //print_r($comments);
                                    foreach ($comments as $row) {
                                        ?>
                                        <li>
                                            <i class="fa fa-comments bg-yellow"></i>
                                            <div class="timeline-item">
                                                <span class="time">
                                                    <i class="fa fa-user"></i> <a style="padding-right: 10px" href="<?php echo base_url('showProfile/'.$row->user_id);?>"><?php echo getNameById($row->user_id);?></a>
                                                    <i class="fa fa-clock-o"></i> <?php echo date('m-d-y', strtotime($row->added_date_time)); ?>
                                                </span>
                                                <h3 class="timeline-header"><a
                                                            href="#"><?php echo $row->comments_title; ?></a></h3>
                                                <div class="timeline-body">
                                                    <?php echo $row->comments_details; ?>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    if (count($comments) >= 5) {
                                    ?>
                                    <div class="timeline-footer pull-right">
                                        <a data-toggle="modal" href="#myModal" class="btn btn-warning btn-flat btn-md">Add
                                            Your Comments</a>
                                    </div>
                                    <?php
                                    }
                                }
                                ?>

                            </ul>
                        </div>

                    </div>


                </div>

            </div>




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
                      action="<?php echo base_url('insideblog/details/' . $getid); ?>">
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
