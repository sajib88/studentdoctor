<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> ForStudentDoctors : <?php echo!empty($page_title) ? $page_title : ''; ?> </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>script-assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>script-assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>script-assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>script-assets/dist/css/skins/skin-green-light.css" rel="stylesheet" type="text/css" />


    <link href="<?php echo base_url(); ?>script-assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

      <link href="<?php echo base_url(); ?>script-assets/slick.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>script-assets/slick-theme.css" rel="stylesheet" type="text/css" />

      <link href="<?php echo base_url(); ?>script-assets/custom.css" rel="stylesheet" type="text/css" />

       <!-- Time pick Css-->
    
     <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->

   
    <script src="<?php echo base_url(); ?>script-assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>script-assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>script-assets/dist/js/app.min.js" type="text/javascript"></script>
       <!-- jquery validation -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/additional-methods.js" ></script>
       <!-- jquery validation -->
     <!-- jquery DATE + TIME -->
    <script src="<?php echo base_url(); ?>script-assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>script-assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>script-assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>


      <!-- jquery DATE + TIME -->
    <?php
      $data = array();
        $data['profession'] = $this->global_model->get('profession');
        $data1['users'] = $this->global_model->get('profession');

    ?>
    </head>

  <body class="skin-black-light sidebar-mini">
    <div class="wrapper">



      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>ST</b>D</span>
          <!-- logo for regular state and mobile devices -->
            <span class="logo-md"><b>Student Doctors</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?php echo (!empty($doctor_appointment))?count($doctor_appointment):""?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <?php echo (!empty($doctor_appointment))?count($doctor_appointment):""?> appointment</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php if(!empty($doctor_appointment)){
                                    foreach ($doctor_appointment as $row){
                                ?>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> <?php echo $row->first_name;?> appointment request to you
                                    </a>
                                </li>
                                <?php
                                  }
                                }?>
                            </ul>
                        </li>
                        <li class="footer"><a href="<?php echo base_url('doctor/docController/allappointment')?>">View all</a></li>
                    </ul>
                </li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <?php
                    if($user_info['profilepicture'] == 0) {?>
                    <img src="<?php echo base_url(); ?>assets/user-demo.jpg" alt="" class="user-image" />
                    <?php }
                    else {?>
                    <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt="" width="160" class="user-image" />
                    <?php }
                    ?>

                  <span class="hidden-xs"> <?php echo $user_info['user_name']; ?><?php //print_r($user_info);?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                    <?php
                   if($user_info['profilepicture'] == 0) {?>
                    <img src="<?php echo base_url(); ?>assets/user-demo.jpg" alt="" class="img-circle" />
                    <?php }
                    else {?>
                    <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt="" width="160" class="img-circle" />
                    <?php }
                    ?>
                    <p>
                      User Name :<?php echo $user_info['user_name']; ?>

                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url('profile/profile/index'); ?>" class="btn btn-default btn-flat">Update Information</a>


                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('home/log_out'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
       <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <?php if(!$user_info['profession'] == 1 or 2 ) {?>
            <li class="treeview <?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>">
              <a href="<?php echo base_url('dashboard'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <?php } else{}?>

            <li class="treeview <?php if($this->uri->segment(1)=="profile"){echo "active";}?>">
              <a href="#" >
                <i class="fa fa-globe"></i>
                <span>My Profile</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
                
                <ul class="treeview-menu">

                    <li class="<?php if($this->uri->segment(2)=="myprofile"){echo "active";}?>">
                        <a href="<?php echo base_url('profile/myprofile'); ?>"><i class="fa fa-circle-o"></i>View Profile</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2)=="update"){echo "active";}?>">
                        <a href="<?php echo base_url('profile/update'); ?>"><i class="fa fa-circle-o"></i> Update My Profile</a>
                    </li>

                    <li class="<?php if($this->uri->segment(2)=="search" or $this->uri->segment(3)=="search"){echo "active";}?>">
                        <a href="<?php echo base_url('profile/search'); ?>"><i class="fa fa-circle-o"></i> Search Profile</a>
                    </li>

                </ul>

            </li>

            <li class="treeview <?php if($this->uri->segment(1)=="pub"){echo "active";}?>">
              <a href="#">
                <i class="fa fa-fw fa-user-md"></i>
                <span>Public Web Site</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(2)=="add"){echo "active";}?>">
                            <a href="<?php echo base_url('pub/add'); ?>"><i class="fa fa-circle-o"></i> Create Public webiste</a>
                        </li>

                        <li class="<?php if($this->uri->segment(2)=="viewedit"){echo "active";}?>">
                            <a href="<?php echo base_url('pub/viewedit'); ?>"><i class="fa fa-circle-o"></i> Edit  Public webiste</a>
                        </li>

                        <li class="<?php if($this->uri->segment(2)=="details"){echo "active";}?>">
                            <a href="<?php echo base_url('pub/details'); ?>"> <i class="fa fa-circle-o"></i>View My Public Site</a>
                        </li>


                    </ul>

            </li>

          
         
            <li class="treeview <?php if($this->uri->segment(2)=="classifieds"){echo "active";}?>">
              <a href="#">
                <i class="fa fa-fw fa-list-alt "></i>
                <span>Classified</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
                
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)=="add"){echo "active";}?>">
                            <a href="<?php echo base_url('classifieds/classifieds/add'); ?>"><i class="fa fa-circle-o"></i>Add New Classified</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="viewmyclassfied"){echo "active";}?>">
                            <a href="<?php echo base_url('classifieds/classifieds/viewmyclassfied'); ?>"><i class="fa fa-circle-o"></i>Manage All My Classified</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="viewall"){echo "active";}?>">
                         <a href="<?php echo base_url('classifieds/classifieds/viewall'); ?>"><i class="fa fa-circle-o"></i>Show All List Classified</a>
                         </li>


                    </ul>
                
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                    <span>Online Store</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="<?php echo base_url('store/Store/'); ?>"><i class="fa fa-circle-o"></i>Add New Store</a>
                    </li>
                </ul>
            </li>

          <li class="treeview <?php if($this->uri->segment(2)=="event"){echo "active";}?>">
              <a href="#">
                <i class="fa fa-calendar"></i>
                <span>Event</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
                
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                            <a href="<?php echo base_url('event/event/index'); ?>"><i class="fa fa-circle-o"></i> Create New Event</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="viewall"){echo "active";}?>">
                         <a href="<?php echo base_url('event/event/viewall'); ?>"><i class="fa fa-circle-o"></i>
                             View All Events</a>
                         </li>

                        <li class="<?php if($this->uri->segment(3)=="myevent"){echo "active";}?>">
                            <a href="<?php echo base_url('event/event/myevent'); ?>"><i class="fa fa-circle-o"></i>Manage Event List</a>
                        </li>
                         

                    </ul>
                
            </li>
          
                <li class="treeview <?php if($this->uri->segment(2)=="Personal"){echo "active";}?>">
              <a href="#">
                <i class="glyphicon glyphicon-user"></i>
                <span>Personals</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
           
                    <ul class="treeview-menu">

                        <li class="<?php if($this->uri->segment(3)=="add"){echo "active";}?>">
                            <a href="<?php echo base_url('personal/Personal/add'); ?>"><i class="fa fa-circle-o"></i> Add New Personals</a>
                        </li>

                        <li class="<?php if($this->uri->segment(3)=="grid"){echo "active";}?>">
                         <a href="<?php echo base_url('personal/Personal/grid'); ?>"><i class="fa fa-circle-o"></i>
                             Show All Personals</a>
                         </li>

                        <li class="<?php if($this->uri->segment(3)=="all"){echo "active";}?>">
                            <a href="<?php echo base_url('personal/Personal/all'); ?>"><i class="fa fa-circle-o"></i>Manage My Personals</a>
                        </li>


                        <li class="<?php if($this->uri->segment(3)=="search"){echo "active";}?>">
                            <a href="<?php echo base_url('personal/Personal/search'); ?>"><i class="fa fa-circle-o"></i>Search Personals</a>
                        </li>


                    </ul>
                
            </li>




            <li class="treeview <?php if($this->uri->segment(2)=="forum"){echo "active";}?>">
                <a href="#">
                    <i class="glyphicon glyphicon-bullhorn"></i>
                    <span>Forum</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                        <a href="<?php echo base_url('forum/forum/index'); ?>"><i class="fa fa-circle-o"></i> Forum Dashboard</a>
                    </li>
                    <li class="<?php if($this->uri->segment(3)=="allmypostlist"){echo "active";}?>">
                        <a href="<?php echo base_url('forum/forum/allmypostlist'); ?>"><i class="fa fa-circle-o"></i>
                            All My Post</a>
                    </li>

                    <li class="<?php if($this->uri->segment(3)=="allmycomments"){echo "active";}?>">
                        <a href="<?php echo base_url('forum/forum/allmycomments'); ?>"><i class="fa fa-circle-o"></i>
                            All My Comments</a>
                    </li>



                </ul>


            </li>









            <li class="treeview <?php if($this->uri->segment(1)=="ces"){echo "active";}?>">
              <a href="#" >
                <i class="fa fa-book"></i>
                <span>CES</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
                
                    <ul class="treeview-menu">

                        <li class="<?php if($this->uri->segment(2)=="add"){echo "active";}?>">
                            <a href="<?php echo base_url('ces/add'); ?>"><i class="fa fa-circle-o"></i> Create New CES</a>
                        </li>

                        <li class="<?php if($this->uri->segment(2)=="ces_controller"){echo "active";}?>">
                         <a href="<?php echo base_url('ces/ces_controller/grid'); ?>"><i class="fa fa-circle-o"></i>
                             View All CES</a>
                         </li>

                        <li class="<?php if($this->uri->segment(2)=="allces"){echo "active";}?>">
                            <a href="<?php echo base_url('ces/allces'); ?>"><i class="fa fa-circle-o"></i>My CES List</a>
                        </li>

                        <li class="<?php if($this->uri->segment(2)=="search"){echo "active";}?>">
                            <a href="<?php echo base_url('ces/search'); ?>"><i class="fa fa-circle-o"></i>Search CES </a>
                        </li>
                         

                    </ul>
                
            </li>


            <li class="treeview <?php if($this->uri->segment(2)=="insideblog"){echo "active";}?>">
                <a href="#">
                    <i class="glyphicon glyphicon-unchecked"></i>
                    <span>Blog</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                 <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)=="insideblogcreate"){echo "active";}?>">
                            <a href="<?php echo base_url('insideblog/insideblog/insideblogcreate'); ?>"><i class="fa fa-circle-o"></i> Create New Blog</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="insidebloglist"){echo "active";}?>">
                         <a href="<?php echo base_url('insideblog/insideblog/insidebloglist'); ?>"><i class="fa fa-circle-o"></i>
                             View All Blog</a>
                         </li>

                        <li class="<?php if($this->uri->segment(3)=="insideblogmylist"){echo "active";}?>">
                            <a href="<?php echo base_url('insideblog/insideblog/insideblogmylist'); ?>"><i class="fa fa-circle-o"></i>My Blog List</a>
                        </li>


                    </ul>
            </li>
          <li class="treeview <?php if($this->uri->segment(2)=="group"){echo "active";}?>">
              <a href="#">
                <i class="fa fa-group"></i>
                <span>Group</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
                
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                            <a href="<?php echo base_url('group/group/index'); ?>"><i class="fa fa-circle-o"></i> Create New Group</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="viewall"){echo "active";}?>">
                         <a href="<?php echo base_url('group/group/viewall'); ?>"><i class="fa fa-circle-o"></i>
                             View All Group</a>
                         </li>

                        <li class="<?php if($this->uri->segment(3)=="mygroup"){echo "active";}?>">
                            <a href="<?php echo base_url('group/group/mygroup'); ?>"><i class="fa fa-circle-o"></i>My Group List</a>
                        </li>
                         

                    </ul>
                
            </li>
          
          
          <li class="treeview <?php if($this->uri->segment(2)=="products"){echo "active";}?>">
              <a href="#">
                <i class="glyphicon glyphicon-tags"></i>
                <span>Product</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>

                    <ul class="treeview-menu">

                        <li class="<?php if($this->uri->segment(3)=="add"){echo "active";}?>">
                            <a href="<?php echo base_url('product/products/add'); ?>"><i class="fa fa-circle-o"></i> Create New Product</a>
                        </li>

                        <li class="<?php if($this->uri->segment(3)=="allProductGrid"){echo "active";}?>">
                         <a href="<?php echo base_url('product/products/allProductGrid'); ?>"><i class="fa fa-circle-o"></i>
                             View All Product</a>
                         </li>

                        <li class="<?php if($this->uri->segment(3)=="myproduct"){echo "active";}?>">
                            <a href="<?php echo base_url('product/products/myproduct'); ?>"><i class="fa fa-circle-o"></i>My Product List</a>
                        </li>



                    </ul>

            </li>

            <li class="treeview <?php if($this->uri->segment(2)=="privateweb"){echo "active";}?>">
              <a href="#" >
                <i class="fa fa-shield"></i>
                <span>Private Profile</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
                <ul class="treeview-menu">
                     <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                            <a href="<?php echo base_url('private_web/privateweb/index'); ?>"><i class="fa fa-circle-o"></i> Create Private  webiste</a>
                        </li>
                     <li class="<?php if($this->uri->segment(3)=="search"){echo "active";}?>">
                            <a href="<?php echo base_url('private_web/privateweb/search'); ?>"> <i class="fa fa-circle-o"></i>Search Private Profile</a>
                        </li>

                      <li class="<?php if($this->uri->segment(3)=="viewForEdit"){echo "active";}?>">
                            <a href="<?php echo base_url('private_web/privateweb/viewForEdit'); ?>"><i class="fa fa-circle-o"></i> View  Private  webiste</a>
                        </li>

                      <li class="<?php if($this->uri->segment(3)=="view"){echo "active";}?>">
                            <a href="<?php echo base_url('private_web/privateweb/view'); ?>"> <i class="fa fa-circle-o"></i>View My Private Site</a>
                        </li>
                    
                       
                    </ul>
                
                
            </li>


            <li class="treeview <?php if($this->uri->segment(2)=="Photo" && "video"){echo "active";}else{echo " ";}?>">
              <a href="#" >
                <i class="fa fa-file-audio-o"></i>
                <span>Media</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>

                <ul class="treeview-menu">
                  <li class="<?php if($this->uri->segment(2)=="Photo"){echo "active";}?>">
                    <a  href="<?php echo base_url('photo/Photo/index'); ?>"><i class="fa fa-circle-o"></i> Photo</a>
                    <ul class="treeview-menu">
                      <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                          <a href="<?php echo base_url('photo/Photo/index'); ?>"><i class="fa fa-circle-o"></i> Create New Album</a>
                      </li>
                      <li class="<?php  if($this->uri->segment(3)=="viewall"){echo "active";}?>">
                       <a href="<?php echo base_url('photo/Photo/viewall'); ?>"><i class="fa fa-circle-o"></i>
                           View All Photos</a>
                      </li>

                  </ul>
                  <li class="<?php if($this->uri->segment(2)=="video"){echo "active";}?>">
                      <a href="#"><i class="fa fa-circle-o"></i>
                          Video</a>
                      <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                            <a href="<?php echo base_url('video/video/index'); ?>"><i class="fa fa-circle-o"></i> Create Video Album</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="viewall"){echo "active";}?>">
                            <a href="<?php echo base_url('video/video/viewall'); ?>"><i class="fa fa-circle-o"></i>
                                All My Album</a>
                        </li>

                        <li class="<?php if($this->uri->segment(3)=="listofalbum"){echo "active";}?>">
                            <a href="<?php echo base_url('video/video/listofalbum'); ?>"><i class="fa fa-circle-o"></i>
                                All Videos</a>
                        </li>
                      </ul>

                  </li>
                  <li class="<?php if($this->uri->segment(2)=="file"){echo "active";}?>">
                      <a href="#"><i class="fa fa-circle-o"></i>
                         File</a>
                      <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                            <a href="<?php echo base_url('file/file/index'); ?>"><i class="fa fa-circle-o"></i> Upload File</a>
                        </li>

                        <li class="<?php if($this->uri->segment(3)=="listallfiles"){echo "active";}?>">
                            <a href="<?php echo base_url('/file/file/listallfiles'); ?>"><i class="fa fa-circle-o"></i> ALL Files</a>
                        </li>
                    </ul>
                  </li>
                  <li class="<?php if($this->uri->segment(2)=="audio"){echo "active";}?>">
                      <a href="#"><i class="fa fa-circle-o"></i>
                         Lecture/Audio</a>
                      <ul class="treeview-menu">
                          <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>">
                              <a  href="<?php echo base_url('audio/audio/index'); ?>"><i class="fa fa-circle-o"></i> Create Audio Album</a>
                          </li>
                          <li class="<?php if($this->uri->segment(3)=="viewall"){echo "active";}?>">
                              <a href="<?php echo base_url('audio/audio/viewall'); ?>"><i class="fa fa-circle-o"></i>
                                  All Audio Album</a>
                          </li>
                          <li class="<?php if($this->uri->segment(3)=="myaudio"){echo "active";}?>">
                              <a href="<?php echo base_url('audio/audio/myaudio'); ?>"><i class="fa fa-circle-o"></i>
                                  My Audio</a>
                          </li>


                      </ul>
                  </li>


              </ul>
            </li>
          
          
          
           
          <li class="treeview">
              <a href="<?php echo base_url('/home/log_out'); ?>" >
                <i class="fa fa-sign-out text-red"></i>
                <span>Logout</span>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>