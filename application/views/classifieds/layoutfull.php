

<style type="text/css">
    .page-header{
        font-size: 30px;
        margin: 0;
    }
    .page-header>h1{
        font-weight: 500;
        color: #777;
    }
    .page-header>h1>small{
        font-size: 15px;
        display: inline-block;
        padding-left: 4px;
        font-weight: 700;
        color: #777;
    }
    .slider{
        margin-bottom: 10px;
    }
    .slick-slide img{
        height: 470px;
    }
    .slider-nav-thumbnails .item img{
        height: 115px;
        width: 100%;
        padding: 0 5px;
    }

    @media (max-width: 600px) {
        .slider-nav-thumbnails .item img{
            height: 75px;
            width: 100%;
            padding: 0 5px;
        }
        .slick-slide img{
            height: 320px;
        }
    }

    .slider-nav-thumbnails{
        margin: 0px -5px;
    }
    .bar span::after {background: none;}

    .description-body{
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .tab-table{
        width: 100%;
        max-width: 72%;
    }


    .tab-nav{
        margin-bottom: 15px;
    }

    .price-tag{
        line-height: 1;
    }
    .price-tag p{
        line-height: 0;
        margin-top: 6px;
        font-size: 17px;
        font-weight: 700;
        color: #777;
    }

    .price-tag h2{
        line-height: 0;
        margin-top: 26px;
        font-size: 32px;
        font-weight: 900;
        margin-bottom: 30px;
        color: #777;
    }

    .price-tag span{
        font-size: 16px;
        font-weight: 200;
    }

    .text-clr{
        color: #e5734f;
    }

    hr {
        display: block;
        margin-top: 35px;
        margin-bottom: 25px;
        margin-left: auto;
        margin-right: auto;
        border-style: inset;
        border-width: 1px;
        color: #e0e0ea;
        border-top: 1px solid #e0e0ea;
    }

    .pdl{
        margin-left: 22px;
        margin-bottom: 14px;
        font-weight: 100 !important;
    }
    .classified-heading{
        font-size: 14px;
        font-weight: 100;
    }
    .ol-color{
        color: #777;
        font-weight: 700;
    }
    .mrg{
        font-size: 9px;
        padding: 5px;
    }
    .video-js{
        width: 100%;
    }
    .audiojs{
        width: 100%;
    }
    .audiojs .scrubber{
        width: 80%;
    }
    .audiojs .time{
        float: right;
    }
    @media only screen and (max-width: 500px) {
        .audiojs .scrubber{
            width: 47%;
        }
    }
</style>

<div class="content-wrapper">

    <section class="content">

        <div class="row">
            <div class="col-lg-12 page-header">
                <h1><?php echo (!empty($layoutfull['title']))?$layoutfull['title']:''?>
                   <br>
                <small>Classified Category:
                    <?php
                    $data = get_data('classified_main_cat', array('id' => $layoutfull['main_cat']));
                    echo '<span class="text-clr">'.$data['name'].'</span>';
                    ?>
                </small>
                </h1>
            </div>
            <div class="col-md-9">
                    <div class="slider">
                        <div data-index="1">
                            <?php if(!empty($layoutfull['photo_primary'])){ ?>
                                <img src="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['photo_primary'] ?>" width="100%" class="img-responsive" alt="One">
                            <?php }else{} ?>
                        </div>
                        <div data-index="2">
                            <?php if(!empty($layoutfull['photo_2'])){ ?>
                                <img src="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['photo_2'] ?>" width="100%" class="img-responsive" alt="One">
                            <?php }else{} ?>
                        </div>
                        <div data-index="3">
                            <?php if(!empty($layoutfull['photo_3'])){ ?>
                                <img src="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['photo_3'] ?>" width="100%" class="img-responsive" alt="One">
                            <?php }else{} ?>
                        </div>
                        <div data-index="4">
                            <?php if(!empty($layoutfull['photo_4'])){ ?>
                                <img src="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['photo_4'] ?>" width="100%" class="img-responsive" alt="One">
                            <?php }else{} ?>
                        </div>
                    </div>

                    <!-- THUMBNAILS -->
                    <div class="slider-nav-thumbnails">
                        <div class="item">
                            <?php if(!empty($layoutfull['photo_primary'])){ ?>
                                <img src="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['photo_primary'] ?>" class="img-responsive" slide="slide_1">
                            <?php }else{} ?>
                        </div>
                        <div class="item">
                            <?php if(!empty($layoutfull['photo_2'])){ ?>
                                <img src="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['photo_2'] ?>" class="img-responsive" slide="slide_2">
                            <?php }else{} ?>
                        </div>
                        <div class="item">
                            <?php if(!empty($layoutfull['photo_3'])){ ?>
                                <img src="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['photo_3'] ?>" class="img-responsive" slide="slide_3">
                            <?php }else{} ?>
                        </div>
                        <div class="item">
                            <?php if(!empty($layoutfull['photo_4'])){ ?>
                                <img src="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['photo_4'] ?>" class="img-responsive" slide="slide_4">
                            <?php }else{} ?>
                        </div>
                    </div>
                <div class="description-body">

                <div id="exTab1" class="">
                    <ul  class="nav nav-pills tab-nav">
                        <li class="active">
                            <a  href="#1a" data-toggle="tab">Description</a>
                        </li>
                        <li><a href="#2a" data-toggle="tab">Location</a>
                        </li>
                        <li><a href="#3a" data-toggle="tab">Media Files</a>
                        </li>
                    </ul>

                    <div class="tab-content clearfix">
                        <div class="tab-pane active" id="1a">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <i class="fa fa-paragraph"></i>
                                    <h3 class="box-title">Description</h3>
                                </div>
                                <div class="box-body">
                                    <p class="text-muted">
                                        <?php echo $layoutfull['description']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="2a">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <i class="fa fa-map-marker"></i>
                                    <h3 class="box-title">Location</h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped">
                                        <tbody>
                                            <?php if(!empty($layoutfull['address_1'])){?>
                                            <tr>
                                                <td>Address</td>
                                                <td><?php echo $layoutfull['address_1']; ?></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td>City</td>
                                                <td><?php echo $layoutfull['city']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>State</td>
                                                <td><?php echo $layoutfull['state']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td>
                                                    <?php
                                                    $data = get_data('countries', array('id' => $layoutfull['country']));
                                                    echo $data['name'];
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="3a">
                            <?php if(!empty($layoutfull['primary_video']) or !empty($layoutfull['primary_sound']) or !empty($layoutfull['primary_file'])) { ?>
                                <?php if ($layoutfull['primary_video'] != 0) { ?>
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <i class="fa fa-file-video-o"></i>
                                            <h3 class="box-title">Video</h3>
                                        </div>
                                        <div class="box-body">
                                            <video id="my-video" class="video-js" controls preload="auto" width="640"
                                                   height="264"
                                                   poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                                                <source src="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['primary_video']; ?>"
                                                        type='video/mp4'>
                                                <source src="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['primary_video']; ?>"
                                                        type='video/webm'>
                                                <p class="vjs-no-js">
                                                    To view this video please enable JavaScript, and consider upgrading
                                                    to a web browser that
                                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports
                                                        HTML5 video</a>
                                                </p>
                                            </video>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                                <?php if ($layoutfull['primary_sound'] != 0) { ?>
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <i class="fa fa-file-sound-o"></i>
                                            <h3 class="box-title">Audio</h3>
                                        </div>
                                        <div class="box-body">
                                            <audio src="<?php echo base_url() . 'assets/file/classifieds/' . $layoutfull['primary_sound']; ?>"
                                                   preload="auto"/>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                                <?php if ($layoutfull['primary_file'] != 0) { ?>
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <i class="fa fa-file-word-o"></i>
                                            <h3 class="box-title">Attachment</h3>
                                        </div>
                                        <div class="box-body">
                                            <a href="<?php echo base_url() . '/assets/file/classifieds/' . $layoutfull['primary_file']; ?>">Download
                                                File </a><br/>
                                        </div>
                                    </div>
                                <?php }
                            }else{
                                echo '<div class="alert alert-danger">No meadia file founded.</div>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
                </div>


            </div>

            <div class="col-md-3">
                <div class="price-tag">
                    <p>Price:</p>
                    <h2>$&nbsp<?php echo $layoutfull['price']; ?></h2>
                </div>
                <hr>
                <div class="price-tag">
                    <p><i class="glyphicon glyphicon-envelope text-clr"></i>&nbsp Contact</p><br>
                    <p class="pdl"><?php echo $layoutfull['phone']; ?></p>
                    <a target="_blank" class="ol-color pdl" href="<?php echo $layoutfull['website']; ?>" > <?php echo $layoutfull['website']; ?> </a>
                </div>
                <hr>
                <div class="price-tag">
                    <p><i class="glyphicon glyphicon-calendar text-clr"></i>&nbsp Added</p><br>
                    <p class="pdl"><?php echo date('m-d-Y', strtotime($layoutfull['added'])); ?></p>
                </div>
                <hr>
                <div class="price-tag">
                    <p><i class="glyphicon glyphicon-user text-clr"></i>&nbsp Added By</p><br>
                    <p class="pdl"><a class="btn btn-warning btn-md" style="color: #fff;" href="<?php echo base_url('showProfile/'.$layoutfull['user_id']);?>"><?php echo getNameById($layoutfull['user_id']); ?></a></p>
                </div>
                <hr>
            </div>

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
<script src="<?php echo base_url(); ?>script-assets/js/slick.min.js"></script>

<script>
    // thumbnail slider
    $('.slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        asNavFor: '.slider-nav-thumbnails',
    });

    $('.slider-nav-thumbnails').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider',
        dots: true,
        focusOnSelect: true
    });

    //remove active class from all thumbnail slides
    $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

    //set active class to first thumbnail slides
    $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

    // On before slide change match active thumbnail to current slide
    $('.slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var mySlideNumber = nextSlide;
        $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
        $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
    });

</script>

