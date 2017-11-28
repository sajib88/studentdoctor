<style>
    @media (max-width: 600px) {
        .item-center{
            margin-top: -12px;
        }
    }

</style>
<div id="page-content">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Dashboard
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
   
       <!-- =========================================================== -->
    <div class="row">
    <div class="box box-primary">
        <div class="col-md-3 col-xs-6">
            <!-- small box -->



            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php
                        if (!empty($gorup)) {
                            echo $gorup;
                        } else {
                            echo '0';
                        }

                        ?></h3>

                    <p>Group</p>
                </div>
                <div class="icon">
                    <i class="fa fa-group"></i>
                </div>
                <a href="<?php echo base_url('group/viewall');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>
                        <?php
                        if (!empty($events)) {
                            echo $events;
                        } else {
                            echo '0';
                        }

                        ?>
                        <sup style="font-size: 20px"></sup></h3>

                    <p>Event</p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar-o"></i>
                </div>
                <a href="<?php echo base_url('event/viewall');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php
                        if (!empty($product)) {
                            echo $product;
                        } else {
                            echo '0';
                        }

                        ?></h3>

                    <p>Product</p>
                </div>
                <div class="icon">
                    <i class="fa fa-tags"></i>
                </div>
                <a href="<?php echo base_url('product/all');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php
                        if (!empty($blog)) {
                            echo $blog;
                        } else {
                            echo '0';
                        }

                        ?></h3>

                    <p>Blog</p>
                </div>
                <div class="icon">
                    <i class="fa fa-square-o"></i>
                </div>
                <a href="<?php echo base_url('insideblog/all');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 on-hover">
            <a href="<?php echo base_url('classifieds/all');?>">
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-fw fa-list-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <span class="info-box-number">

                        <?php
                                if (!empty($classified)) {
                                    echo $classified;
                                } else {
                                    echo '0';
                                }

                        ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                  <span class="progress-description">
                     Classifieds
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>

            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo base_url('personal/all');?>">
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-heart-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <span class="info-box-number"> <?php
                        if (!empty($personals)) {
                            echo $personals;
                        } else {
                            echo '0';
                        }

                        ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                  <span class="progress-description">
                   Personals
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo base_url('forum/posts');?>">
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="glyphicon glyphicon-bullhorn"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <span class="info-box-number">

                        <?php
                        if (!empty($forumPost)) {
                            echo $forumPost;
                        } else {
                            echo '0';
                        }

                        ?>

                    </span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                  <span class="progress-description">
                    Forum Post
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo base_url('forum/board');?>">
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-book"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <span class="info-box-number">
                         <?php
                         if (!empty($forum)) {
                             echo $forum;
                         } else {
                             echo '0';
                         }

                         ?>

                    </span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                  <span class="progress-description">
                   Forums
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->


    </div>
          <!-- user info -->
          <style type="text/css">
            .profile_pic{
              margin-left: 174px;
              height: 150px;
              width: 150px;
              margin-bottom: -17px;
            }
            @media (max-width: 600px) {
              .profile_pic {
                margin-left: 25%;
              }
            }

          </style>
           <div class="col-md-6 col-xs-12">
            <!-- small box -->
               <div class="box-header with-border">
                   <h3 class="box-title">Profile Information</h3><i class="fa fa-user title-icon"></i>
               </div>
            <div class="box box-primary">
            <div class="box-body box-profile">
              <?php
                if($user_info['profilepicture'] == 0) {?>
                    <img src="<?php echo base_url() . '/assets/user-demo.jpg'?>" alt="" class="img-rounded img-responsive profile_pic" />
                <?php }
                else {?>
                   <img class="profile-user-img img-responsive img-circle text-center profile_pic"  src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt=""  />   
              <?php }
              ?>

              <h3 class="profile-username text-center"><?php echo (!empty($user_info['user_name']))?$user_info['user_name']:'<span class="badge bg-red">Not Given</span>'; ?></h3>

              <p class="text-muted text-center">

              <i class="glyphicon glyphicon-envelope"></i>&nbsp&nbsp<?php echo (!empty($user_info['email']))?$user_info['email']:'<span class="badge bg-red">Not Given</span>'; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>First Name</b> <span class="pull-right"><?php echo (!empty($user_info['first_name']))?$user_info['first_name']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                </li>
                <li class="list-group-item">
                  <b>Last Name</b> <span class="pull-right"><?php echo (!empty($user_info['last_name']))?$user_info['last_name']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                </li>
                </li>
                 <li class="list-group-item">
                  <b>Gender </b> <span class="pull-right"><?php echo (!empty($user_info['gender']))?$user_info['gender']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                </li>
                <li class="list-group-item">
                  <b>Country</b> <span class="pull-right"><?php
                  $data = get_data('countries', array('id' => $user_info['country']));
                  echo (!empty($data['name']))?$data['name']:'<span class="badge bg-red">Not Given</span>';
                  ?></span>
                </li>
                <li class="list-group-item">
                  <b>State </b> <span class="pull-right"><?php echo (!empty($user_info['state']))?$user_info['state']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                </li>
                <li class="list-group-item">
                  <b>City</b> <span class="pull-right"><?php echo (!empty($user_info['city']))?$user_info['city']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <span class="pull-right"><?php echo (!empty($user_info['phone']))?$user_info['phone']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                </li>
                  <li class="list-group-item">
                      <b>University / College Name</b> <span class="pull-right"><?php echo (!empty($user_info['university_clg']))?$user_info['university_clg']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                  </li>
              </ul>

              <a href="<?php echo base_url('profile/update'); ?>" class="btn btn-primary btn-block"><b>Update Your Profile</b><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.box-body -->
          </div>

          </div>

        <div class="col-md-6 col-xs-12">
            <!-- small box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Professional Information</h3><i class="fa fa-user title-icon"></i>
                </div>
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Profession </b>
                            <span class="pull-right">
                                <?php
                                    $data = get_data('profession', array('id' => $user_info['profession']));
                                    echo (!empty($data['name']))?$data['name']:'<span class="badge bg-red">Not Given</span>';
                                ?>
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Professional <br class="visible-xs">Licensing Country </b> <span class="pull-right item-center"><?php echo (!empty($user_info['plc']))?$user_info['plc']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Professional <br class="visible-xs">Licensing State </b> <span class="pull-right item-center"><?php echo (!empty($user_info['pls']))?$user_info['pls']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>NPI </b> <span class="pull-right"><?php echo (!empty($user_info['npi']))?$user_info['npi']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Professional <br class="visible-xs">License Number </b> <span class="pull-right item-center"><?php echo (!empty($user_info['pln']))?$user_info['pln']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
          <!-- user info -->
    </div>
    <!-- /.row -->


    <!-- /.content -->
  </section>
</div>
</div>