<style>
    .info-circle{
        height: 50px;
        width: 50px;
        background: #fff;
        clear: right;
        color: #000;
        float: left;
        border-radius: 50%;
        text-align: center;
    }
    .font-circle{
        font-size: 35px;
        margin: 10px auto;
    }
</style>
<div id="page-wrapper">
    <div class="row">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo (!empty($newComments))?count($newComments):"0";?></div>
                            <div>New Comments!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">12</div>
                            <div>New Tasks!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">124</div>
                            <div>New Orders!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">13</div>
                            <div>Support Tickets!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                       <span class="info-circle"> <i class="fa fa-fw fa-list-alt font-circle"></i> </span>

                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Classifieds</h3>
                    <h5 class="widget-user-desc">Lead Classifieds List</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <?php if(!empty($leadClassified)){
                            foreach ($leadClassified as $row){?>
                                <li><a href="<?=base_url('admin/Classifieds/Classifieds/viewmyclassfied');?>"><?php echo substr($row->title, 0, 30);?> <span class="pull-right badge bg-yellow"><?=date('m-d-Y',strtotime($row->added))?></span></a></li>
                        <?php
                            }
                        }?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-green">
                    <div class="widget-user-image">
                        <span class="info-circle"> <i class="fa fa-user font-circle"></i> </span>

                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Personals</h3>
                    <h5 class="widget-user-desc">Lead Personals List</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <?php if(!empty($leadPersonals)){
                            foreach ($leadPersonals as $row){?>
                                <li><a href="<?=base_url('admin/Personal/Personal/all');?>"><?php echo substr($row->title, 0, 30);?> <span class="pull-right badge bg-green"><?=$row->iam?></span></a></li>
                                <?php
                            }
                        }?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                    <div class="widget-user-image">
                        <span class="info-circle"> <i class="fa fa-tags font-circle"></i> </span>

                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Products</h3>
                    <h5 class="widget-user-desc">Lead Products List</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <?php if(!empty($leadProduct)){
                            foreach ($leadProduct as $row){?>
                                <li><a href="<?=base_url('admin/Product/Products/myproduct');?>"><?php echo substr($row->name, 0, 30);?> <span class="pull-right badge bg-blue">$<?=$row->price?></span></a></li>
                                <?php
                            }
                        }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-navy">
                    <div class="widget-user-image">
                        <span class="info-circle"> <i class="fa fa-calendar font-circle"></i> </span>

                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Events</h3>
                    <h5 class="widget-user-desc">Lead Events List</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <?php if(!empty($leadEvent)){
                            foreach ($leadEvent as $row){?>
                                <li><a href="<?=base_url('admin/Events/Events/myevent');?>"><?php echo substr($row->title, 0, 30);?> <span class="pull-right badge bg-navy"><?=$row->seats_no?> Seats</span></a></li>
                                <?php
                            }
                        }?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-olive">
                    <div class="widget-user-image">
                        <span class="info-circle"> <i class="fa fa-square-o font-circle"></i> </span>
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Blogs</h3>
                    <h5 class="widget-user-desc">Lead Blogs List</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <?php if(!empty($leadBlog)){
                            foreach ($leadBlog as $row){?>
                                <li><a href="<?=base_url('admin/Blog/Blog_controller/blog');?>"><?php echo substr($row->title, 0, 30);?> <span class="pull-right badge bg-olive"><?=date('m-d-Y',strtotime($row->date))?></span></a></li>
                                <?php
                            }
                        }?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-orange">
                    <div class="widget-user-image">
                        <span class="info-circle"> <i class="fa fa-user-md font-circle"></i> </span>
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Public Websites</h3>
                    <h5 class="widget-user-desc">Lead Public Websites List</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <?php if(!empty($leadPub)){
                            foreach ($leadPub as $row){?>
                                <li><a href="#"><?php echo substr($row->title, 0, 30);?> <span class="pull-right badge bg-orange"><?=date('m-d-Y',strtotime($row->added))?></span></a></li>
                                <?php
                            }
                        }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- /.row -->
</div>