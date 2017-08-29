<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Video Album
            <small>All video</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Video </a></li>
            <li class="active">My videos Album </li>
        </ol>
    </section>

    <section class="content">
        <!-- /.row -->
        <div class="panel panel-default">
            <div class="panel-body box box-primary">

                <div class="row">
                    <div class="col-md-12">




                        <?php

                        foreach ($album as $row) { ?>
                        <div class="col-md-4">

                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $row->album_name; ?></h3>

                                <p>Video Album</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file-video-o"></i>
                            </div>
                            <a href="<?php echo base_url('video/video/alluservideo/' . $row->album_id); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>

                        </div>
                        <?php } ?>
                    </div>



                </div>
            </div>
        </div>
    </section>
</div>


