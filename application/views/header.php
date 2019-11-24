<!doctype html>
    <html class="fixed">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
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
        $phdstuff = array('411','412','413','414','415','416','417','418','419','420','421','422','423','424','425','426','427','428');


        if (in_array($user_info['profession'], $phdstuff))
        {
            $phdcheck = 100;
        }
        elseif($user_info['parent_profession'] != 6)
        {
            $phdcheck = 200;
        }
        else{
            $phdcheck = 300;
        }


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

                    <?php
                   
                if($user_info['parent_profession']==100 && $user_info['parent_profession']==7 && $user_info['parent_profession']==13 && $user_info['parent_profession']==12  )
                {

                }
                else{


                    if($user_info['user_level']==2){
                        $percent_2 = 100;
                        $percent_3 = 0;

                    }
                    else{
                        $percent_3 = 100;
                        $percent_2 = 100;
                    }


                    ?>
                    <li>
                        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                            <i class="fa fa-check-square-o"></i>

                        </a>

                        <div class="dropdown-menu notification-menu large">
                            <div class="notification-title">
                                You Level Complete
                            </div>

                            <div class="content">
                                <ul>
                                    <?php if($user_info['user_level']== 1) {?>
                                    <li>
                                        <p class="clearfix mb-xs">
                                            <span class="message pull-left">Level - 1 (Register & verify Email)</span>
                                            <span class="message pull-right text-dark">100%</span>
                                        </p>
                                        <div class="progress progress-xs light">
                                            <div class="progress-bar redp" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                        </div>
                                    </li>
                                    <?php } else{?>
                                        <li>
                                            <p class="clearfix mb-xs">
                                                <span class="message pull-left">Level:1 (Register & verify Email)</span>
                                                <span class="message pull-right text-dark">100%</span>
                                            </p>
                                            <div class="progress progress-xs light">
                                                <div class="progress-bar redp" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                            </div>
                                        </li>
                                    <li>
                                        <p class="clearfix mb-xs">
                                            <span class="message pull-left">Level:2 (Except Messaging, Patient Dealing,Personals)</span>
                                            <span class="message pull-right text-dark"><?= $percent_2 ?>%</span>
                                        </p>
                                        <div class="progress progress-xs light">
                                            <div class="progress-bar yellowp" role="progressbar2" aria-valuenow="<?= $percent_2 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent_2 ?>%;"></div>
                                        </div>
                                    </li>

                                    <li>
                                        <p class="clearfix mb-xs">
                                            <span class="message pull-left">Level:3 (Full Access)</span>
                                            <span class="message pull-right text-dark"><?=$percent_3?>%</span>
                                        </p>
                                        <div class="progress progress-xs light">
                                            <div class="progress-bar greenp" role="progressbar" aria-valuenow="<?=$percent_3?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$percent_3?>%;"></div>
                                        </div>
                                    </li>

                                <?php } ?>
                                </ul>
                            </div>
                        </div>

                    <li>

                    <?php } ?>



                        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                            <i class="fa fa-envelope"></i>
                            <span class="badge"><?php echo (!empty($notification))?count($notification):""?></span>
                        </a>

                        <div class="dropdown-menu notification-menu">
                            <div class="notification-title">
                                <span class="pull-right label label-default"><?php echo (!empty($notification))?count($notification):"0"?></span>
                                Messages
                            </div>

                            <div class="content">
                                <ul>
                                    <?php if(!empty($notification)){
                                    foreach ($notification as $row){
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url('message/read/'.$row->id.'/1');?>" class="clearfix">
                                            <figure class="image">
                                                <i class="fa fa-comments-o bg-success"></i>
                                            </figure>
                                            <span class="title"> <?php echo $row->subject;?></span>
                                            <span class="message truncate"><?php echo substr($this->encrypt->decode($row->message), 0, 20);?></span>
                                        </a>
                                    </li>
                                    <?php } }?>
                                </ul>

                                <hr />
                                <?php if(!empty($notification)){ ?>
                                <div class="text-right">
                                    <a href="<?php echo base_url('message/');?>" class="view-more">View All</a>
                                </div>
                                <?php  }?>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a  id="appointment_notification" href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <span class="badge"><?php echo (!empty($appointment_notify))?count($appointment_notify):""?></span>
                        </a>

                        <div  class="dropdown-menu notification-menu">
                            <div class="notification-title">
                                <span class="pull-right label label-default"><?php echo (!empty($appointment_notify))?count($appointment_notify):"0"?></span>
                                <?php echo (!empty($appointment_notify))?count($appointment_notify):"0"?> Notification

                            </div>

                            <div class="content">
                                <ul>


                                    <?php if(!empty($doctor_appointment)){
                                    foreach ($doctor_appointment as $row){
                                    ?>

                                    <li>
                                        <a  href="<?php echo base_url('doctor/docController/allappointment')?>" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-bell bg-danger"></i>
                                            </div>
                                            <span id="reload_appointment" class="title"><?php echo $row->email;?></span>
                                            <span class="message"><?php echo $row->message;?></span>

                                        </a>
                                    </li>
                                        <?php
                                    }
                                    }?>

                                </ul>

                                <hr />
                                <?php if(!empty($doctor_appointment)){ ?>
                                <div class="text-right">
                                    <a href="<?php echo base_url('doctor/docController/allappointment')?>" class="view-more">View All</a>
                                </div>
                                <?php

                                }?>


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
                            <span class="name"> <?php echo $user_info['email']; ?></span>
                            <span class="role">
                                <?php
                                if($user_info['profession']==100)
                                {
                                    echo "Patient Panel";
                                }
                                elseif($user_info['profession']==7){
                                    echo "Pharmacist Panel";
                                }

                                elseif($user_info['profession']==13){
                                    echo "Advertiser Panel";
                                }
                                elseif($user_info['profession']==12){
                                    echo "Publisher Panel";
                                }
                                else{
                                    echo proffesionById($user_info['id']);
                                }
                                ?>

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
                        <span style="color: #000;" class="text-white">
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
                                echo "Doctor Dashboard";
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
                                <li class="<?php if ($this->uri->segment(1)=="dashboard"){echo "nav-active";} ?>">
                                    <a  href="<?php echo base_url('dashboard'); ?>">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/home.png" height="22" width="22"  />
                                        <span>Home</span>
                                    </a>
                                </li>
                                <!-- Dashboard-->




                                <!-- ADVERTISE-->
                                <?php if($user_type == 12 || $user_type == 13){ ?>
                                    <li class="nav-parent <?php if ($this->uri->segment(1)=="advertise"){
                                        echo "nav-expanded nav-active";
                                    } ?>">
                                        <a href="#">
                                            <i class="fa fa-book"></i>
                                            <span>Advertise</span>
                                        </a>

                                        <ul class="nav nav-children">

                                            <li class="<?php if ($this->uri->segment(2)=="add"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('advertise/add'); ?>"><i class="fa fa-circle-o"></i> Create New Ad</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="list"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('advertise/list'); ?>"><i class="fa fa-circle-o"></i>
                                                    View All Advertise</a>
                                            </li>




                                        </ul>

                                    </li>
                                <?php }?>
                                <!-- ADVERTISE-->



                                <!-- hospital-->
                                <?php if( $user_type == 10){ ?>

                                    <li class="nav-parent <?php if ($this->uri->segment(1)=="pub"){
                                        echo "nav-expanded nav-active";
                                    } ?>">
                                        <a href="#">
                                            <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Patient-website.png" height="22" width="22"  />
                                            <span>Hospital Website</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if ($this->uri->segment(2)=="add"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('pub/add'); ?>"><i class="fa fa-circle-o"></i> Create Hospital
                                                    webiste</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="viewedit"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('pub/viewedit'); ?>"><i class="fa fa-circle-o"></i> Edit Hospital
                                                    webiste</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="details"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('pub/details'); ?>"> <i class="fa fa-circle-o"></i>View My
                                                    Hospital  Site</a>
                                            </li>

                                        </ul>

                                    </li>

                                <?php }?>
                                <!-- hospital-->


                                <!-- Message-->
                                <?php if($user_type != 12 && $user_type != 13  && $user_type != 10 ){ ?>
                                <li class="<?php if ($this->uri->segment(1)=="message"){
                                    echo "nav-active";
                                } ?>">
                                    <a href="<?php echo base_url('message');?>">

                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Message-Professionals.png" height="22" width="22"  />
                                        <?php if($user_type == 100){ ?><span>Message to Drs</span>
                                        <?php }else { ?>
                                            <span>All Messages</span>
                                        <?php } ?>

                                    </a>
                                </li>
                                <!-- Message-->

                                <!-- My Profile-->
                                <li class="nav-parent <?php if ($this->uri->segment(1)=="profile"){echo "nav-expanded nav-active";} ?>">
                                    <a>
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/profile.png" height="22" width="22"  />
                                        <span>Professional profile</span>
                                    </a>
                                    <ul class="nav nav-children">

                                        <li class="<?php if ($this->uri->segment(2)=="update"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('profile/update'); ?>"><i class="fa fa-circle-o"></i>
                                                Edit / Update Profile</a>
                                        </li>


                                    </ul>
                                </li>
                                <!-- My Profile-->
                                <?php if($user_type == 100 || $user_type == 13 || $user_type == 12  || $user_type == 10 || $phdcheck == 300){ }else{ ?>

                                    <!-- Message-->

                                        <li class="<?php if ($this->uri->segment(1)=="doctor/docController/allappointment"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('doctor/docController/allappointment');?>">

                                                <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/message-prof.png" height="22" width="22"  />

                                                    <span> Patient Messaging</span>


                                            </a>
                                        </li>
                                        <!-- Message-->


                                        <!-- Website-->
                                    <li class="nav-parent <?php if ($this->uri->segment(1)=="pub"){
                                        echo "nav-expanded nav-active";
                                    } ?>">
                                        <a href="#">
                                            <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Patient-website.png" height="22" width="22"  />
                                            <span>Patient Website</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if ($this->uri->segment(2)=="add"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('pub/add'); ?>"><i class="fa fa-circle-o"></i> Create Patient
                                                    webiste</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="viewedit"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('pub/viewedit'); ?>"><i class="fa fa-circle-o"></i> Edit Patient
                                                    webiste</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="details"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('pub/details'); ?>"> <i class="fa fa-circle-o"></i>View My
                                                    Patient  Site</a>
                                            </li>

                                        </ul>

                                    </li>
                                    <!-- Website-->



                                    <!-- Website-->
                                    <li class="nav-parent <?php if ($this->uri->segment(1)=="pri"){
                                        echo "nav-expanded nav-active";
                                    } ?>">
                                        <a href="#">
                                            <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/private-website.png" height="22" width="22"  />
                                            <span>Professional website</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if ($this->uri->segment(2)=="add"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('pri/add'); ?>"><i class="fa fa-circle-o"></i> Create Private
                                                    webiste</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="viewedit"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('pri/viewedit'); ?>"><i class="fa fa-circle-o"></i> Edit Private
                                                    webiste</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="details"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('pri/details/'.$loginId = $this->session->userdata('login_id')); ?>"> <i class="fa fa-circle-o"></i>View My
                                                    Private Site</a>
                                            </li>


                                            <li class="<?php if ($this->uri->segment(2)=="search"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('pri/search'); ?>"> <i class="fa fa-circle-o"></i>Search
                                                    Private Site</a>
                                            </li>


                                        </ul>

                                    </li>
                                    <!-- Website-->

                                <?php } ?>


















                                <!-- appointment-->
                                <?php if($user_type == 100){ ?>
                                        <!-- article-->
                                        <li class="<?php if ($this->uri->segment(1)=="article"){echo "nav-active";} ?>">
                                            <a  href="<?php echo base_url('article'); ?>">
                                                <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Article.png" height="22" width="22"  />
                                                <span>Articles</span>
                                            </a>
                                        </li>
                                        <!-- article-->


                                    <li class="<?php if ($this->uri->segment(1)=="Search_Appointment"){echo "nav-active";} ?>">
                                        <a  href="<?php echo base_url('Search_Appointment'); ?>">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <span>Book Appointment Online</span>
                                        </a>
                                    </li>
                                    <!-- appointment-->



                                <?php } ?>

                                <?php if($user_type != 100){ ?>
                                <!-- Search-->
                                <li class="<?php if ($this->uri->segment(1)=="Search"){
                                    echo "nav-active";
                                } ?>">
                                    <a href="<?php echo base_url('Search');?>">

                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Search-Professionals.png" height="22" width="22"  />
                                        <span>Search professionals</span>
                                    </a>
                                </li>
                                    <?php } ?>
                                <!-- Search-->
                                <?php } ?>







                                <?php if($user_type == 100 || $user_type == 13 || $user_type == 12  || $user_type == 10){ }else{ ?>



                                <!-- classifieds-->
                                <li class="nav-parent  <?php if ($this->uri->segment(1)=="classifieds"){
                                    echo "nav-expanded nav-active";
                                } ?>">
                                    <a href="#">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/classified.png" height="22" width="22"  />
                                        <span>Classified</span>
                                    </a>

                                    <ul class="nav nav-children">
                                        <li class="<?php if ($this->uri->segment(2)=="add"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('classifieds/add'); ?>"><i
                                                        class="fa fa-circle-o"></i>Add New Listing</a>
                                        </li>
                                        <li class="<?php if ($this->uri->segment(2)=="viewmyclassfied"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('classifieds/viewmyclassfied'); ?>"><i
                                                        class="fa fa-circle-o"></i>Edit My Listed</a>
                                        </li>
                                        <li class="<?php if ($this->uri->segment(2)=="all"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('classifieds/all'); ?>"><i
                                                        class="fa fa-circle-o"></i>Show All Posted</a>
                                        </li>
                                        <li class="<?php if ($this->uri->segment(2)=="search"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('classifieds/search'); ?>"><i
                                                        class="fa fa-circle-o"></i>Search All Posted</a>
                                        </li>


                                    </ul>

                                </li>
                                <!-- classifieds-->


                                <!-- Personals-->
                                <li class="nav-parent <?php if ($this->uri->segment(1)=="personal"){
                                    echo "nav-expanded nav-active";
                                } ?>">
                                    <a href="#">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/personal.png" height="22" width="22"  />
                                        <span>Personals</span>
                                    </a>

                                    <ul class="nav nav-children">

                                        <li class="<?php if ($this->uri->segment(2)=="add"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('personal/add'); ?>"><i class="fa fa-circle-o"></i>
                                                Add New Personals</a>
                                        </li>

                                        <li class="<?php if ($this->uri->segment(2)=="all"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('personal/all'); ?>"><i class="fa fa-circle-o"></i>
                                                Show All Personals</a>
                                        </li>

                                        <li class="<?php if ($this->uri->segment(2)=="list"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('personal/list'); ?>"><i class="fa fa-circle-o"></i>Manage
                                                My Personals</a>
                                        </li>


                                        <li class="<?php if ($this->uri->segment(2)=="search"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('personal/search'); ?>"><i class="fa fa-circle-o"></i>Search
                                                Personals</a>
                                        </li>


                                    </ul>

                                </li>
                                <!-- Personals-->

                                <!-- Blog-->
                                    <li class="nav-parent <?php if ($this->uri->segment(1)=="insideblog"){
                                        echo "nav-expanded nav-active";
                                    } ?>">
                                        <a href="#">
                                            <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/blog.png" height="22" width="22"  />
                                            <span>Blog</span>
                                        </a>
                                        <ul class="nav nav-children">

                                            <li class="<?php if ($this->uri->segment(2)=="create"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('insideblog/create'); ?>"><i
                                                            class="fa fa-circle-o"></i> Create New Blog</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="all"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('insideblog/all'); ?>"><i
                                                            class="fa fa-circle-o"></i>
                                                    View All Blogs</a>
                                            </li>





                                            <li class="<?php if ($this->uri->segment(2)=="list"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('insideblog/list'); ?>"><i
                                                            class="fa fa-circle-o"></i>My Blog List</a>
                                            </li>


                                        </ul>
                                    </li>
                                    <!-- Blog-->

                                    <!-- Event-->
                                    <li class="nav-parent <?php if ($this->uri->segment(1)=="event"){
                                        echo "nav-expanded nav-active";
                                    } ?>">
                                        <a href="#">
                                            <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/event.png" height="22" width="22"  />
                                            <span>Event</span>

                                        </a>

                                        <ul class="nav nav-children">
                                            <li class="<?php if ($this->uri->segment(2)=="add"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('event/add'); ?>"><i class="fa fa-circle-o"></i> Create
                                                    New Event</a>
                                            </li>
                                            <li class="<?php if ($this->uri->segment(2)=="viewall"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('event/viewall'); ?>"><i class="fa fa-circle-o"></i>
                                                    View All  Events</a>
                                            </li>


                                            <li class="<?php if ($this->uri->segment(2)=="search"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('event/search'); ?>"><i class="fa fa-circle-o"></i>
                                                    Search  Events</a>
                                            </li>



                                            <li class="<?php if ($this->uri->segment(2)=="myevent"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('event/myevent'); ?>"><i class="fa fa-circle-o"></i>Manage
                                                    Event List</a>
                                            </li>


                                        </ul>

                                    </li>
                                    <!-- Event-->


                                    <!-- flip-->
                                    <li class="<?php if ($this->uri->segment(1)=="flip"){echo "nav-active";} ?>">
                                        <a  href="<?php echo base_url('flip'); ?>">
                                            <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/dorctor-lounge.png" height="22" width="22"  />
                                            <span>Doctor’s Lounge (Flip)</span>
                                        </a>
                                    </li>
                                    <!-- flip-->

                                    <!-- Product-->
                                    <li class="nav-parent <?php if ($this->uri->segment(1)=="product"){
                                        echo "nav-expanded nav-active";
                                    } ?>">
                                        <a href="#">
                                            <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/products.png" height="22" width="22"  />
                                            <span>Products</span>

                                        </a>

                                        <ul class="nav nav-children">

                                            <li class="<?php if ($this->uri->segment(2)=="add"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('product/add'); ?>"><i class="fa fa-circle-o"></i>
                                                    Create New Product</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="all"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('product/all'); ?>"><i
                                                            class="fa fa-circle-o"></i>
                                                    View All Products</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="list"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('product/list'); ?>"><i
                                                            class="fa fa-circle-o"></i>My Product List</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="search"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('product/search'); ?>"><i
                                                            class="fa fa-circle-o"></i>Product Search</a>
                                            </li>


                                        </ul>

                                    </li>
                                    <!-- Product-->
                                <?php } ?>


                                <!-- CES-->
                                <?php if($user_type == 100 || $user_type == 13 || $user_type == 12  || $user_type == 10 ){ }else{ ?>
                                    <li class="nav-parent <?php if ($this->uri->segment(1)=="ces"){
                                        echo "nav-expanded nav-active";
                                    } ?>">
                                        <a href="#">
                                            <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/ces.png" height="22" width="22"  />
                                            <span>CES</span>
                                        </a>

                                        <ul class="nav nav-children">
                                            <?php  if($user_type == 700){ ?>
                                                <li class="<?php if ($this->uri->segment(2)=="add"){
                                                    echo "nav-active";
                                                } ?>">
                                                    <a href="<?php echo base_url('ces/add'); ?>"><i class="fa fa-circle-o"></i> Create New
                                                        CES</a>
                                                </li>

                                                <li class="<?php if ($this->uri->segment(2)=="allces"){
                                                    echo "nav-active";
                                                } ?>">
                                                    <a href="<?php echo base_url('ces/allces'); ?>"><i class="fa fa-circle-o"></i>My CES
                                                        List</a>
                                                </li>


                                            <?php  }else{ }?>

                                            <li class="<?php if ($this->uri->segment(2)=="ces_controller"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('ces/ces_controller/grid'); ?>"><i class="fa fa-circle-o"></i>
                                                    View All CES</a>
                                            </li>


                                            <li class="<?php if ($this->uri->segment(2)=="search"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('ces/search'); ?>"><i class="fa fa-circle-o"></i>Search CES
                                                </a>
                                            </li>


                                        </ul>

                                    </li>
                                    <!-- CES-->

                                    <!-- Group-->
                                    <li class="nav-parent <?php if ($this->uri->segment(1)=="group"){
                                        echo "nav-expanded nav-active";
                                    } ?>">
                                        <a href="#">
                                            <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/group.png" height="22" width="22"  />
                                            <span>Group</span>
                                        </a>

                                        <ul class="nav nav-children">
                                            <li class="<?php if ($this->uri->segment(2)=="add"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('group/add'); ?>"><i class="fa fa-circle-o"></i> Create
                                                    New Group</a>
                                            </li>
                                            <li class="<?php if ($this->uri->segment(2)=="viewall"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('group/viewall'); ?>"><i class="fa fa-circle-o"></i>
                                                    View All Group</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="mygroup"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('group/mygroup'); ?>"><i class="fa fa-circle-o"></i>My
                                                    Group List</a>
                                            </li>

                                            <li class="<?php if ($this->uri->segment(2)=="search"){
                                                echo "nav-active";
                                            } ?>">
                                                <a href="<?php echo base_url('group/search'); ?>"><i class="fa fa-circle-o"></i>
                                                    Search  Group</a>
                                            </li>


                                        </ul>

                                    </li>
                                    <!-- Group-->

                                    <!-- article-->
                                    <li class="<?php if ($this->uri->segment(1)=="article"){echo "nav-active";} ?>">
                                        <a  href="<?php echo base_url('article'); ?>">
                                            <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Article.png" height="22" width="22"  />
                                            <span>Articles</span>
                                        </a>
                                    </li>
                                    <!-- article-->
                                    <!-- Forum-->
                                <li class="nav-parent <?php if ($this->uri->segment(1)=="forum"){
                                    echo "nav-expanded nav-active";
                                } ?>">
                                    <a href="#">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Forum.png" height="22" width="22"  />
                                        <span>Forum</span>

                                    </a>

                                    <ul class="nav nav-children">
                                        <li class="<?php if ($this->uri->segment(2)=="board"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('forum/board'); ?>"><i class="fa fa-circle-o"></i> Forum
                                                Dashboard</a>
                                        </li>
                                        <li class="<?php if ($this->uri->segment(2)=="posts"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('forum/posts'); ?>"><i
                                                        class="fa fa-circle-o"></i>
                                                All My Post</a>
                                        </li>

                                        <li class="<?php if ($this->uri->segment(2)=="comments"){
                                            echo "nav-active";
                                        } ?>">
                                            <a href="<?php echo base_url('forum/comments'); ?>"><i
                                                        class="fa fa-circle-o"></i>
                                                All My Comments</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Forum-->












                                <!-- CES-->
                                <?php } ?>




                                <li class="nav">
                                    <a href="<?php echo base_url('/home/log_out'); ?>">
                                        <img class="menuimage" src="<?php echo base_url();?>/backend/menuicon/Lougout.png" height="22" width="22"  />
                                        <span>Logout</span>
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
                <?php  //echo $user_info['profession'];?>




