<header class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  text-center ptop-300">


                <h1>All Student Doctors And Doctors In The World</h1>
                <p>Can Meet, Advance Personally and Contribute Globally.</p>
                <a href="<?php echo base_url('home/registration');?>">   <input type="submit" value="Join Now Free" class="btn   btn-yellow"></a>
            </div>
        </div>
    </div>
</header>

<!--BG with 4 box -->
<header class="business-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  text-center">
                <h2 class="ptop-50">Doctor's And Student Can Join Now </h2>
                <div class="ptop-50"></div>
                <!--start box here -->
                <div class="box-design">
                    <div  class="row">
                        <!-- box 1 -->
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="card-title text-left mobiletext">Free Registration</h3>
                                    <p class="card-text text-left mobiletext free_registration">
                                        <a href="<?php echo base_url('home/registration');?>">
                                        All Doctors and Students Can</br>
                                        Join For Free. Simply Submit This</br>
                                        Short Form. (Click Here)
                                        </a>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <!-- box 1 -->
                        <!-- box 2 -->
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="card-title text-right mobiletext">Free Features</h3>
                                    <p class="card-text text-right mobiletext">
                                        Enjoy Loads Of Free Features<br>
                                        Where You Network, Learn and Exhibit<br>
                                        Your Accomplishments With Other<br>
                                         Doctors and Student Doctors.</p>

                                </div>
                            </div>
                        </div>
                        <!-- box 2 -->
                    </div>
                    <!-- image make center -->
                    <img src="<?php echo base_url(); ?>comp/img/round-box.png"  class="img-responsive center-block absulateimage" />
                    <!-- image make center -->


                    <div  class="row ptop-60">
                        <!-- box 3 -->
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-block">

                                    <h3 class="card-title text-left mobiletext">Easy to Use </h3>
                                    <p class="card-text text-left mobiletext">
                                        We Have Made It Easy To Use <br>
                                        Our Site - No Frustrations, <br>
                                        No Learning Curve. <br>
                                        It Is Easy & Free For Your Enjoyment.
                                        </p>

                                </div>
                            </div>
                        </div>
                        <!-- box 3 -->
                        <!-- box 4 -->
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-block">
                                    <h3 class="card-title text-right mobiletext">Mobile Friendly</h3>
                                    <p class="card-text text-right mobiletext">
                                        We've Done The Hard Work,<br>
                                        So You Can Easily Use <br>
                                        Our Awesome Site <br>
                                        On Just About Any Device.
                                        </p>

                                </div>
                            </div>
                        </div>
                        <!-- box 4 -->
                    </div>

                </div>

            </div>
        </div>
    </div>
</header>

<!--Start Lending style-->
<div class="col-md-12">

    <div class="ptop-30 "></div>
    <div class="mobile-200 "></div>
    <div class="widget">


        <div class="entry-head text-center">
            <h2>Meet Some Of Our Professionals</h2>
        </div>

        <div class="col-md-7 col-md-offset-3">


            <div class="widget-searchprof">

                <form action="<?php echo base_url().'publicsearch'?>" id="" class="" method="POST">




                    <div class="col-md-4">
                        <select id="" class="search"  name="profession" data-live-search="true">

                            <?php
                            if (!empty($profession)) {
                                foreach ($profession as $row) {
                                    ?>
                                    <option  value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select onchange="getComboA(this)" name="country" id="js_country"  data-style="btn-info btn-filled" class="selectpicker" >
                            <option value="">Select Country</option>
                            <?php
                            if (is_array($countries)) {
                                foreach ($countries as $country) {
                                    $sel = ($country->id == set_value('country'))?'selected="selected"':'';
                                    ?>
                                    <option  value="<?php echo $country->id; ?>" <?php echo $sel;?> ><?php echo $country->name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>


                    <div class="col-md-4">
                        <select  name="state" id="result" data-style="btn-info btn-filled"  class="selectpicker">
                            <option value="">Select State</option>

                        </select>
                    </div>


                    <div class="col-md-6 ptop-50 col-md-offset-2 mtop-30">
                        <button class="btn   btn-yellow btn-block mtop-10" name="Search" value="Search" type="submit"><span>Search Professionals</span></button>
                    </div>

                </form>
            </div>

        </div>


    </div>
</div>

<!--end Lending style-->


    <div class="advertise_div col-md-12">
        <div class="inner-item">
            <a href="#">
                <img class="center-block img-responsive"  src="<?php echo base_url().'comp/img/adcolor.jpg' ?>" alt="" >
            </a>
        </div>
    </div>




<div class="col-md-12 text-center styletext ptop-20">
    <h4>Browse Some Of Our Awesome Features.</h4>
</div>

<!--category with image-->
<section class="content">
    <div class="right-bg">
        <div class="container">
            <!--category first 5 image start-->
            <div class="row">
                <div class="cat-widget col-md-3">
                    <div class="inner-item">
                        <a href="<?php echo base_url('home/feature');?>">
                            <img  src="<?php echo base_url().'comp/img/free-classified.jpg' ?>" alt="" class="img-responsive rounded">
                        </a>
                    </div>
                </div>
                <div class="cat-widget col-md-3">
                    <div class="inner-item">
                        <a href="<?php echo base_url('home/feature/');?>">
                            <img  src="<?php echo base_url().'comp/img/free-personals.jpg' ?>" alt="" class="img-responsive rounded">
                        </a>
                    </div>
                </div>
                <div class="cat-widget col-md-3">
                    <div class="inner-item">
                        <a href="<?php echo base_url('home/feature/');?>">
                            <img  src="<?php echo base_url().'comp/img/free-forum.jpg' ?>" alt="" class="img-responsive rounded">
                        </a>
                    </div>
                </div>

                <div class="cat-widget col-md-3">
                    <div class="inner-item">
                        <a href="<?php echo base_url('home/feature/');?>">
                            <img  src="<?php echo base_url().'comp/img/free-blog.jpg' ?>" alt="" class="img-responsive rounded">
                        </a>
                    </div>
                </div>
            </div>
            <!--category first 5 image end-->

        </div>
        <!--category second 5 image end -------------------------------------------------------->


        <!--get free with image-->
        <div class="row ptop-40 ">
            <div class="col-md-6 col-md-offset-3 text-center">
                <img src="<?php echo base_url(); ?>comp/img/dimond.jpg"  class="img-responsive center-block dimond ptop-20" />
            </div>
        </div>
        <!--get free with image-->

        <!--helpig-->
        <div class="row ptop-20">
            <div class="text-center helpig-hand">
                <h2>Gives people access to  <span>shared experiences, skills and expertise.</span></h2>

            </div>
        </div>
        <!--helpig-->


        <div class="ptop-40"></div>





    </div>

</section>


<section class="content" style="background: #fff;">
    <div class="ptop-20"></div>
    <h2 class="text-center"><span class="text-primary">Our </span> Latest <span class="text-primary"> Blog</span></h2>
    <div class="ptop-20"></div>
    <div class="container">
        <div class="row">
            <?php if(!empty($allblog)){
                foreach ($allblog as $row){
            ?>
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card border-box">
                    <a href="<?php echo base_url('blog/Postlist/singlepost/' . $row->id); ?>"><img class="card-img-top" src="<?php echo base_url('assets/file/blog/'.$row->primary_image);?>" height="250px" width="100%" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="<?php echo base_url('blog/Postlist/singlepost/' . $row->id); ?>"><?php echo substr($row->title, 0, 30);?></a>
                        </h4>
                        <p class="card-text"><?php echo strip_tags(substr($row->description, 0, 100));?></p>
                    </div>
                </div>
            </div>
            <?php } }?>
        </div>
        <div class="col-md-4 ptop-50 col-md-offset-4 mtop-30">
            <a href="<?php echo base_url('blog')?>" class="btn   btn-yellow btn-block mtop-10"><span>Read More Blogs</span></a>
        </div>
    </div>
    <div class="ptop-40"></div>
</section>

<section id="news">
    <div class="jumbotron">

        <div class="slide">
            <h2 class="text-center"><span class="text-primary">Medical </span> News <span class="text-primary"> Today</span></h2>
            <?php if(!empty($hello)) {

                foreach ($hello as $row)
                { ?>
                    <div class="slider-item">

                        <h3 class="text-center"><a href="<?php echo $row['link'];?>"><?php echo substr($row['title'], 20, 200);?></a></h3>

                        <p class="text-muted text-justify" style="font-size: 20px; color: #000; text-align: center;"><?php echo $row['description'];?></p>

                        <p style="font-size: 11px; color: #000; text-align: center;" class="lead"><?php echo $row['pubDate'];?></p>

                    </div>
                    <?php
                }
            }
            ?>


        </div>

    </div>

</section>


<section class="bottom-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  text-center ptop-40">


                <h1>Only One Website</h1>
                <h3>All Student Doctors in the world</h3>
                <input type="submit" value="Join Now" class="btn btn-midum  btn-yellow">
            </div>
        </div>
    </div>
</section>





</main>