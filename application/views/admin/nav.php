
<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">All Doctors</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo base_url('admin/login/log_out_admin'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/users'); ?>"><i class="fa fa-table fa-fw"></i> Users</a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/Classifieds/Classifieds/viewmyclassfied'); ?>"><i class="fa fa-fw fa-list-alt"></i> Classifieds</a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/Events/Events/myevent'); ?>">
                    <i class="fa fa-fw fa-calendar"></i> Events</a>
                </li>

<!--                <li>-->
<!--                    <a href="--><?php //echo base_url('admin/Ces/Admin_Ces_controller/allces'); ?><!--">-->
<!--                    <i class="fa fa-fw fa-book"></i> CES</a>-->
<!--                </li>-->

                <li>
                    <a href="<?php echo base_url('admin/Product/Products/myproduct'); ?>">
                    <i class="fa fa-fw fa-tags"></i> Products</a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/Personal/Personal/all'); ?>">
                    <i class="fa fa-fw fa-user"></i> Personals</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/Forum/Forum/all'); ?>">
                        <i class="fa fa-fw fa-bullhorn"></i> Forum</a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/Group/Group/viewall'); ?>">
                    <i class="fa fa-fw fa-group"></i> Groups</a>
                </li>

<!--                <li>-->
<!--                    <a href="--><?php //echo base_url('admin/Video/Video/viewall'); ?><!--">-->
<!--                    <i class="fa fa-fw fa-file-video-o"></i> Videos</a>-->
<!--                </li>-->

<!--                 <li>-->
<!--                    <a href="--><?php //echo base_url('admin/File/File/listallfiles'); ?><!--">-->
<!--                    <i class="fa fa-fw fa-file-video-o"></i> Files</a>-->
<!--                </li>-->

                 <li class="treeview">
                    <a href="#">
                    <i class="fa fa-fw fa-square-o"></i> Blogs</a>

                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(4)=="index"){echo "active";}?>">
                            <a href="<?php echo base_url('admin/Blog/Blog_controller/create'); ?>"><i class="fa fa-square-o"></i> Create New Blog</a>
                        </li>
                        <li class="<?php if($this->uri->segment(4)=="viewall"){echo "active";}?>">
                         <a href="<?php echo base_url('admin/Blog/Blog_controller/blog');?>"><i class="fa fa-square-o"></i>
                             View All Blog</a>
                         </li>

                        <li class="<?php if($this->uri->segment(4)=="mygroup"){echo "active";}?>">
                            <a href="<?php echo base_url('admin/Blog/Blog_controller/blog'); ?>"><i class="fa fa-square-o"></i>My Blog List</a>
                        </li>
                         

                    </ul>
                 </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-fw fa-square-o"></i> Manage Category</a>

                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(3)=="event_main_cat"){echo "active";}?>">
                            <a href="<?php echo base_url('admin/category/event_main_cat'); ?>"><i class="fa fa-square-o"></i> Event</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="classified_main_cat"){echo "active";}?>">
                            <a href="<?php echo base_url('admin/category/classified_main_cat');?>"><i class="fa fa-square-o"></i>
                                Classified</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="group_main_cat"){echo "active";}?>">
                            <a href="<?php echo base_url('admin/category/group_main_cat'); ?>"><i class="fa fa-square-o"></i>Group</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="product_main_cat"){echo "active";}?>">
                            <a href="<?php echo base_url('admin/category/product_main_cat'); ?>"><i class="fa fa-square-o"></i>Product</a>
                        </li>
                        <li class="<?php if($this->uri->segment(3)=="insideblog_cat"){echo "active";}?>">
                            <a href="<?php echo base_url('admin/category/insideblog_cat'); ?>"><i class="fa fa-square-o"></i>Blog</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/DoctorVarification'); ?>">
                        <i class="fa fa-fw fa-user-md"></i> Doctor Varification</a>
                </li>
                


                <!--                <li>
                                    <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                                </li>
                
                                <li class="active">
                                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a class="active" href="blank.html">Blank Page</a>
                                        </li>
                                        <li>
                                            <a href="login.html">Login Page</a>
                                        </li>
                                    </ul>
                                     /.nav-second-level 
                                </li>-->
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
