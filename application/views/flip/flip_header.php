<!doctype html>
    <html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title> ForAllDoctors : <?php echo !empty($page_title) ? $page_title : ''; ?> </title>
        <meta name="keywords" content="ForallDoctors" />
        <meta name="description" content="ForallDoctors">
        <meta name="author" content="ForallDoctors">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/assets/vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/assets/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/assets/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/assets/stylesheets/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/assets/stylesheets/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/assets/stylesheets/theme-custom.css">


        <link href="<?php echo base_url(); ?>script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>



        <link href="<?php echo base_url(); ?>script-assets/custom.css" rel="stylesheet" type="text/css"/>



        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/assets/multiple/jquery.tree-multiselect.css">

















        <link href="<?php echo base_url(); ?>script-assets/slick-theme.css" rel="stylesheet" type="text/css"/>









        <!-- Head Libs -->
        <script src="<?php echo base_url(); ?>backend/assets/vendor/modernizr/modernizr.js"></script>
        <script src="<?php echo base_url(); ?>script-assets/js/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>script-assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Vendor -->

        <script src="<?php echo base_url(); ?>backend/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="<?php echo base_url(); ?>backend/assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="<?php echo base_url(); ?>backend/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>backend/assets/vendor/magnific-popup/magnific-popup.js"></script>
        <script src="<?php echo base_url(); ?>backend/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>




        <script src="<?php echo base_url(); ?>script-assets/dist/js/app.min.js" type="text/javascript"></script>
        <!-- jquery validation -->
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js"></script>
        <!-- jquery validation -->
        <!-- jquery DATE + TIME -->
        <script src="<?php echo base_url(); ?>script-assets/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>script-assets/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>



        <script src="<?php echo base_url(); ?>backend/assets/multiple/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>backend/assets/multiple/jquery.tree-multiselect.js"></script>


        <?php
        $data = array();
        $data['profession'] = $this->global_model->get('profession');
        $data1['users'] = $this->global_model->get('profession');
        $user_type = $this->session->userdata('user_type');


        ?>


    </head>
    <body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="<?php echo base_url('dashboard');?>" class="logo">
                    <img src="<?php echo base_url();?>/comp/img/logo.png" height="43" alt="Porto Admin" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">



                <span class="separator"></span>

                <ul class="notifications">




                    <li>





                        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                            <i class="fa fa-envelope"></i>
                            <span class="badge"><?php echo (!empty($notification_2))?count($notification_2):""?></span>
                        </a>

                        <div class="dropdown-menu notification-menu">
                            <div class="notification-title">
                                <span class="pull-right label label-default"><?php echo (!empty($notification_2))?count($notification_2):"0"?></span>
                                Messages
                            </div>

                            <div class="content">
                                <ul>
                                    <?php if(!empty($notification_2)){
                                    foreach ($notification_2 as $row){
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url('flip/FlipMessage/read/'.$row->id.'/1');?>" class="clearfix">
                                            <figure class="image">
                                                <i class="fa fa-comments-o bg-success"></i>
                                            </figure>
                                            <span class="title"> <?php echo $row->subject;?></span>
                                            <span class="message truncate"><?php echo substr($row->message, 0, 20);?></span>
                                        </a>
                                    </li>
                                    <?php } }?>
                                </ul>

                                <hr />
                                <?php if(!empty($notification)){ ?>
                                <div class="text-right">
                                    <a href="<?php echo base_url('FlipMessage/');?>" class="view-more">View All</a>
                                </div>
                                <?php  }?>
                            </div>
                        </div>
                    </li>


                </ul>

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <?php
                            if ($user_info['profilepicture'] == 0) { ?>
                                <img src="<?php echo base_url(); ?>assets/user-demo.jpg" alt="" class="user-image"/>
                            <?php } else { ?>
                                <img src="<?php echo base_url() . '/assets/file/' . $user_info['profilepicture']; ?>"
                                     alt="" width="160" class="user-image"/>
                            <?php }
                            ?>
                        </figure>
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                            <span class="name"> <?php echo $user_info['full_name']; ?></span>
                            <span class="role">
                                Flip Site Panel

                            </span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <?php //print_r($user_info);?>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo base_url('profile/update'); ?>"><i class="fa fa-user"></i> My Profile</a>
                            </li>

                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-arrows-h"></i> DotCom Site</a>
                            </li>

                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo base_url('home/log_out'); ?>"><i class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        <span style="color: #fff;" class="text-white">
                            <?php
                            if($user_info['profession']==100)
                            {
                                echo "Patient Dashboard";
                            }
                            elseif($user_info['profession']==7){
                                echo "Pharmacist Dashboard";
                            }

                            elseif($user_info['profession']==13){
                                echo "Advertiser Dashboard";
                            }
                            elseif($user_info['profession']==12){
                                echo "Publisher Dashboard";
                            }
                            else{
                                echo "Flip  Dashboard";
                            }
                            ?>
                        </span>
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">

                                <!-- Dashboard-->
                                <li class="<?php if ($this->uri->segment(1)=="FlipDashboard"){echo "nav-active";} ?>">
                                    <a  href="<?php echo base_url('FlipDashboard'); ?>">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/home.png" height="18" width="18"  />
                                        <span>Home</span>
                                    </a>
                                </li>
                                <!-- Dashboard-->

                                <!-- My Profile-->
                                <li class="nav-parent <?php if ($this->uri->segment(1)=="profile"){echo "nav-expanded nav-active";} ?>">
                                    <a>
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/profile.png" height="18" width="18"  />
                                        <span>My Account</span>
                                    </a>
                                    <ul class="nav nav-children">

                                        <li class="<?php if ($this->uri->segment(2)=="flipupdate"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('profile/flipupdate'); ?>"><i class="fa fa-circle-o"></i>  My
                                                Settings</a>
                                        </li>


                                    </ul>
                                </li>
                                <!-- My Profile-->


                                <!-- Search-->
                                <li class="<?php if ($this->uri->segment(1)=="flipprofile"){
                                    echo "nav-active";
                                } ?>">
                                    <a href="<?php echo base_url('flipprofile/search');?>">

                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Search-Professionals.png" height="18" width="18"  />
                                        <span>Search Profile</span>
                                    </a>
                                </li>
                                <!-- Search-->

                                <!-- Message-->
                                <li class="<?php if ($this->uri->segment(1)=="FlipMessage"){
                                    echo "nav-active";
                                } ?>">
                                    <a href="<?php echo base_url('FlipMessage');?>">

                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Message-Professionals.png" height="18" width="18"  />
                                        <span>Message</span>
                                    </a>
                                </li>
                                <!-- Message-->

                                <!-- classifieds-->
                                <li class="nav-parent  <?php if ($this->uri->segment(1)=="flipclassifieds"){
                                    echo "nav-expanded nav-active";
                                } ?>">
                                    <a href="#">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/classified.png" height="18" width="18"  />
                                        <span>Classified</span>
                                    </a>

                                    <ul class="nav nav-children">
                                        <li class="<?php if ($this->uri->segment(2)=="add"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipclassifieds/add'); ?>"><i
                                                        class="fa fa-circle-o"></i>Add New Listing</a>
                                        </li>
                                        <li class="<?php if ($this->uri->segment(2)=="viewmyclassfied"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipclassifieds/viewmyclassfied'); ?>"><i
                                                        class="fa fa-circle-o"></i>Edit My Listed</a>
                                        </li>
                                        <li class="<?php if ($this->uri->segment(2)=="all"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipclassifieds/all'); ?>"><i
                                                        class="fa fa-circle-o"></i>Show All Posted</a>
                                        </li>
                                        <li class="<?php if ($this->uri->segment(2)=="search"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipclassifieds/search'); ?>"><i
                                                        class="fa fa-circle-o"></i>Search All Posted</a>
                                        </li>


                                    </ul>

                                </li>
                                <!-- classifieds-->


                                <!-- Personals-->
                                <li class="nav-parent <?php if ($this->uri->segment(1)=="flippersonal"){
                                    echo "nav-expanded nav-active";
                                } ?>">
                                    <a href="#">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/personal.png" height="18" width="18"  />
                                        <span>Personals</span>
                                    </a>

                                    <ul class="nav nav-children">

                                        <li class="<?php if ($this->uri->segment(2)=="add"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flippersonal/add'); ?>"><i class="fa fa-circle-o"></i>
                                                Add New Personals</a>
                                        </li>

                                        <li class="<?php if ($this->uri->segment(2)=="all"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flippersonal/all'); ?>"><i class="fa fa-circle-o"></i>
                                                Show All Personals</a>
                                        </li>

                                        <li class="<?php if ($this->uri->segment(2)=="list"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flippersonal/list'); ?>"><i class="fa fa-circle-o"></i>Manage
                                                My Personals</a>
                                        </li>


                                        <li class="<?php if ($this->uri->segment(2)=="search"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flippersonal/search'); ?>"><i class="fa fa-circle-o"></i>Search
                                                Personals</a>
                                        </li>


                                    </ul>

                                </li>
                                <!-- Personals-->



                                <!-- Blog-->
                                <li class="nav-parent <?php if ($this->uri->segment(1)=="flipblog"){
                                    echo "nav-expanded nav-active";
                                } ?>">
                                    <a href="#">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/blog.png" height="18" width="18"  />
                                        <span>Blog</span>
                                    </a>
                                    <ul class="nav nav-children">

                                        <li class="<?php if ($this->uri->segment(2)=="add"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipblog/add'); ?>"><i
                                                        class="fa fa-circle-o"></i> Create New Blog</a>
                                        </li>

                                        <li class="<?php if ($this->uri->segment(2)=="bloglist"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipblog/bloglist'); ?>"><i
                                                        class="fa fa-circle-o"></i>
                                                View All Blogs</a>
                                        </li>



                                        <li class="<?php if ($this->uri->segment(2)=="mybloglist"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipblog/mybloglist'); ?>"><i
                                                        class="fa fa-circle-o"></i>My Blog List</a>
                                        </li>


                                    </ul>
                                </li>
                                <!-- Blog-->

                                <!-- Event-->
                                <li class="nav-parent <?php if ($this->uri->segment(1)=="flipevent"){
                                    echo "nav-expanded nav-active";
                                } ?>">
                                    <a href="#">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/event.png" height="18" width="18"  />
                                        <span>Event</span>

                                    </a>

                                    <ul class="nav nav-children">
                                        <li class="<?php if ($this->uri->segment(2)=="add"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipevent/add'); ?>"><i class="fa fa-circle-o"></i> Create
                                                New Event</a>
                                        </li>
                                        <li class="<?php if ($this->uri->segment(2)=="viewall"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipevent/viewall'); ?>"><i class="fa fa-circle-o"></i>
                                                View All  Events</a>
                                        </li>


                                        <li class="<?php if ($this->uri->segment(2)=="search"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipevent/search'); ?>"><i class="fa fa-circle-o"></i>
                                                Search  Events</a>
                                        </li>



                                        <li class="<?php if ($this->uri->segment(2)=="myevent"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('flipevent/myevent'); ?>"><i class="fa fa-circle-o"></i>Manage
                                                Event List</a>
                                        </li>


                                    </ul>

                                </li>
                                <!-- Event-->



                                <!-- Forum-->
                                <li class="nav-parent <?php if ($this->uri->segment(1)=="FlipForum"){
                                    echo "nav-expanded nav-active";
                                } ?>">
                                    <a href="#">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Forum.png" height="18" width="18"  />
                                        <span>Forum</span>

                                    </a>

                                    <ul class="nav nav-children">
                                        <li class="<?php if ($this->uri->segment(2)=="board"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('FlipForum/board'); ?>"><i class="fa fa-circle-o"></i> Forum
                                                Dashboard</a>
                                        </li>
                                        <li class="<?php if ($this->uri->segment(2)=="posts"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('FlipForum/posts'); ?>"><i
                                                        class="fa fa-circle-o"></i>
                                                All My Post</a>
                                        </li>

                                        <li class="<?php if ($this->uri->segment(2)=="comments"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('FlipForum/comments'); ?>"><i
                                                        class="fa fa-circle-o"></i>
                                                All My Comments</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Forum-->


                                <!-- Group-->
                                <li class="nav-parent <?php if ($this->uri->segment(1)=="FlipGroup"){
                                    echo "nav-expanded nav-active";
                                } ?>">
                                    <a href="#">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Article.png" height="18" width="18"  />
                                        <span>Group</span>
                                    </a>

                                    <ul class="nav nav-children">
                                        <li class="<?php if ($this->uri->segment(2)=="add"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('FlipGroup/add'); ?>"><i class="fa fa-circle-o"></i> Create
                                                New Group</a>
                                        </li>
                                        <li class="<?php if ($this->uri->segment(2)=="viewall"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('FlipGroup/viewall'); ?>"><i class="fa fa-circle-o"></i>
                                                View All Group</a>
                                        </li>

                                        <li class="<?php if ($this->uri->segment(2)=="mygroup"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('FlipGroup/mygroup'); ?>"><i class="fa fa-circle-o"></i>My
                                                Group List</a>
                                        </li>

                                        <li class="<?php if ($this->uri->segment(2)=="search"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('FlipGroup/search'); ?>"><i class="fa fa-circle-o"></i>
                                                Search  Group</a>
                                        </li>


                                    </ul>

                                </li>
                                <!-- Group-->
                                

                                <li class="nav">
                                    <a href="<?php echo base_url('dashboard'); ?>">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/dorctor-lounge.png" height="18" width="18"  />
                                        <span>Back To Dotcom</span>
                                    </a>
                                </li>
                                <!-- Product-->
                            </ul>
                        </nav>

                        <hr class="separator" />



                    </div>

                </div>

            </aside>

            <section role="main" class="content-body">
                <header class="page-header">
                    <h2><?php echo !empty($page_title) ? $page_title : 'Panel'; ?></h2>

                </header>




                <div class="alert alert-primary">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Welcome to Flip Site</strong> Your identity you can hide to every one,  This is a fun section call flip site enjoy it <a href="<?php echo base_url('profile/flipupdate'); ?>" class="alert-link">Change your Name</a>.
                </div>
