

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="glyphicon glyphicon-tags"></i>
            Product Details
        </h1>
    </section>

    <section class="content">
        <div class="row">

            <?php //print_r($layoutfull);


            ?>





            <div class="col-lg-4">
                <!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="glyphicon glyphicon-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Email</span>
                        <span class="info-box-number"><?php echo $layoutfull['seller_email']; ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                  <span class="progress-description">
                    Contact For This seller Email
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-lg-4">
                <!-- /.info-box -->
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-phone"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Contact</span>
                        <span class="info-box-number"><?php echo $layoutfull['seller_phone']; ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                  <span class="progress-description">
                   Call Now  For This Produt
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-lg-4 ">


                <!-- /.info-box -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-globe"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Location</span>
                        <span class="info-box-number"><?php
                            $data = get_data('countries', array('id' => $layoutfull['country']));
                            echo $data['name'];
                            ?>, <?php echo $layoutfull['state']; ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                  <span class="progress-description">
                   Location Of This Product
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <!-- PRODUCT LIST -->

            <!-- /.box -->


            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img src="<?php echo base_url() . '/assets/file/product/' .$layoutfull['photo_primary']; ?>" alt="" width="300" height="200" class="center-block img-size" />
                        <h3 class="profile-username text-center"> <?php echo $layoutfull['name']; ?></h3>
                        <p class="text-center"><b>Added By: </b> <span><a href="<?php echo base_url('showProfile/'.$layoutfull['uid']);?>"><?php echo getNameById($layoutfull['uid']);?></a></span></p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">

                                <b>Product Type </b>
                                <span class="pull-right">
                                    <?php
                                    $data = get_data('product_main_cat', array('id' => $layoutfull['type']));
                                    echo $data['cat_name'];
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <b>Price</b> <span class="pull-right"> <?php echo $layoutfull['special_price']; ?></span>
                            </li>

                            <li class="list-group-item">
                                <b>Special Price</b> <span class="pull-right"> <?php echo $layoutfull['price']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>	Country</b> <span class="pull-right"><?php
                                    $data = get_data('countries', array('id' => $layoutfull['country']));
                                    echo $data['name'];
                                    ?></span>
                            </li>

                            <li class="list-group-item">
                                <b>	State</b> <span class="pull-right"><?php echo $layoutfull['state']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>	City</b> <span class="pull-right"><?php echo $layoutfull['city']; ?></span>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Description</strong>

                        <p class="text-muted">
                            <?php echo (!empty($layoutfull['description']))?$layoutfull['description']:""; ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted"><?php
                            $data = get_data('countries', array('id' => $layoutfull['country']));
                            echo $data['name'];
                            ?>, <?php echo $layoutfull['state']; ?>, <?php echo $layoutfull['city']; ?></p>

                        <strong> Seller Name</strong>
                        <p> <?php echo (!empty($layoutfull['seller_name']))?$layoutfull['seller_name']:'<span class="badge bg-red">Not Given</span>'; ?></p>

                        <strong> Seller Email</strong>
                        <p> <?php echo (!empty($layoutfull['seller_email']))?$layoutfull['seller_email']:'<span class="badge bg-red">Not Given</span>'; ?></p>

                        <strong> Seller Address </strong>
                        <p> <?php echo (!empty($layoutfull['seller_address1']))?$layoutfull['seller_address1']:'<span class="badge bg-red">Not Given</span>'; ?></p>

                        <strong> Seller Website</strong>
                        <p> <?php echo (!empty($layoutfull['seller_website']))?$layoutfull['seller_website']:'<span class="badge bg-red">Not Given</span>';  ?></p>

                        <strong> Seller Phone</strong>
                        <p> <?php echo (!empty($layoutfull['seller_phone']))?$layoutfull['seller_phone']:'<span class="badge bg-red">Not Given</span>'; ?></p>

                        <strong> Seller Fax</strong>
                        <p> <?php echo (!empty($layoutfull['seller_fax']))?$layoutfull['seller_fax']:'<span class="badge bg-red">Not Given</span>';  ?></p>




                        <hr>






                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>



            <div class="col-lg-8">

                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-file-picture-o"></i>
                        <h3 class="box-title">Product Photos</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="box-header with-border img-product-layout" src="<?php echo base_url() . '/assets/file/product/' . $layoutfull['photo_primary'] ?>" width="220px;" height="180px">
                            </div>
                            <div class="col-md-6">
                                <?php if($layoutfull['photo_2'] != 0){?>
                                <img  class="box-header with-border img-product-layout" src="<?php echo base_url() . '/assets/file/product/' . $layoutfull['photo_2'] ?>" width="220px;" height="180px">
                                <?php }?>
                            </div>
                        </div>
                        <div class="visible-lg" style="margin-top: 20px"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php if($layoutfull['photo_3'] != 0){?>
                                <img  class="box-header with-border img-product-layout" src="<?php echo base_url() . '/assets/file/product/' . $layoutfull['photo_3'] ?>" width="220px;" height="180px">
                                <?php }?>
                            </div>
                            <div class="col-md-6">
                                <?php if($layoutfull['photo_4'] != 0){?>
                                    <img class="box-header with-border img-product-layout" src="<?php echo base_url() . '/assets/file/product/' . $layoutfull['photo_4'] ?>" width="220px;" height="180px">
                                <?php }?>
                            </div>
                        </div>

                    </div>


                </div>



                <?php if($layoutfull['primary_video'] != 0){?>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-file-video-o"></i>
                            <h3 class="box-title">Product Video</h3>
                        </div>
                        <div class="box-body">



                            <video id="my-video" class="video-js" controls preload="auto" width="340" height="164"
                                   poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                                <source src="<?php echo base_url() . '/assets/file/product/' . $layoutfull['primary_video'];?>" type='video/mp4'>
                                <source src="<?php echo base_url() . '/assets/file/product/' . $layoutfull['primary_video'];?>" type='video/webm'>
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                </p>
                            </video>



                        </div>


                    </div>
                <?php }
                ?>




                <?php if($layoutfull['primary_sound'] != 0){?>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-file-sound-o"></i>
                            <h3 class="box-title">Product Sound/audio</h3>
                        </div>
                        <div class="box-body">

                            <audio src="<?php echo base_url() . 'assets/file/product/' . $layoutfull['primary_sound']; ?>" preload="auto" />



                        </div>


                    </div>
                <?php }
                ?>



                <?php if($layoutfull['primary_file'] != 0){?>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-file-word-o"></i>
                            <h3 class="box-title">Product Attachment</h3>
                        </div>
                        <div class="box-body">


                                    <a href="<?php echo base_url() . '/assets/file/product/' . $layoutfull['primary_file'];?>">Download File  </a><br/>



                        </div>


                    </div>
                <?php }
                ?>



            </div>




        </div>

    </section>

</div>
<!-- THIS css/JS USE ONLY VIDEO PLAYER -->
<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
<!-- THIS css/JS USE ONLY VIDEO PLAYER -->

<!-- THIS css/JS Sound -->
<script src="<?php echo base_url(); ?>script-assets/audiojs/audio.min.js"></script>

<script>
    audiojs.events.ready(function() {
        var as = audiojs.createAll();
    });
</script>
<!-- THIS css/JS Sound -->

