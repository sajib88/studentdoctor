<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   
       <!-- =========================================================== -->

    <div class="row">
    <div class="col-lg-6">
        <div class="col-md-6 col-sm-6 col-xs-12">
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
                     Classified
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="glyphicon glyphicon-picture"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Photos</span>
                    <span class="info-box-number"> <?php
                        if (!empty($photos)) {
                            echo $photos;
                        } else {
                            echo '0';
                        }

                        ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                  <span class="progress-description">
                   Total Photos
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="glyphicon glyphicon-tags"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Product</span>
                    <span class="info-box-number">

                        <?php
                        if (!empty($product)) {
                            echo $product;
                        } else {
                            echo '0';
                        }

                        ?>

                    </span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                  <span class="progress-description">
                    Total Product
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-book"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">CES</span>
                    <span class="info-box-number">
                         <?php
                         if (!empty($ces)) {
                             echo $ces;
                         } else {
                             echo '0';
                         }

                         ?>

                    </span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                  <span class="progress-description">
                   Total Product
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6 col-xs-6">
          <!-- small box -->



          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php
                  if (!empty($appointment)) {
                      echo $appointment;
                  } else {
                      echo '0';
                  }

                  ?></h3>

              <p>Appointment</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-calendar"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>
                  <?php
                  if (!empty($privatewebsite)) {
                      echo $privatewebsite;
                  } else {
                      echo '0';
                  }

                  ?>
                  <sup style="font-size: 20px"></sup></h3>

              <p>Private Profile</p>
            </div>
            <div class="icon">
              <i class="fa fa-shield"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php
                  if (!empty($users)) {
                      echo $users;
                  } else {
                      echo '0';
                  }

                  ?></h3>

              <p>Doctor Registered</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php
                  if (!empty($public_website)) {
                      echo $public_website;
                  } else {
                      echo '0';
                  }

                  ?></h3>

              <p>Public Website</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-user-md"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

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
                margin-left: 83px;
              }
            }

          </style>
           <div class="col-md-6 col-xs-12">
            <!-- small box -->
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

              <h3 class="profile-username text-center"><?php echo $user_info['user_name']; ?></h3>

              <p class="text-muted text-center">
                <i class="glyphicon glyphicon-gift"></i> <b>  Profession: </b> 
                              <?php
                                $data = get_data('profession', array('id' => $user_info['profession']));
                                echo $data['name'];?>
                            &nbsp&nbsp
              <i class="glyphicon glyphicon-envelope"></i>&nbsp&nbsp<?php echo $user_info['email']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>First Name</b> <a class="pull-right"><?php echo $user_info['first_name']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Last Name</b> <a class="pull-right"><?php echo $user_info['last_name']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Professional Licensing Country </b> <a class="pull-right"><?php echo $user_info['plc']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Professional Licensing State </b> <a class="pull-right"><?php echo $user_info['pls']; ?></a>
                </li>
                 <li class="list-group-item">
                  <b>NPI </b> <a class="pull-right"><?php echo $user_info['npi']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Professional License Number </b> <a class="pull-right"><?php echo $user_info['pln']; ?></a>
                </li>
                </li>
                 <li class="list-group-item">
                  <b>Gender </b> <a class="pull-right"><?php echo ucfirst($user_info['gender']); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Country</b> <a class="pull-right"><?php
                  $data = get_data('countries', array('id' => $user_info['country']));
                  echo $data['name'];
                  ?></a>
                </li>
                <li class="list-group-item">
                  <b>State </b> <a class="pull-right"><?php echo $user_info['state']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>City</b> <a class="pull-right"><?php echo $user_info['city']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right"><?php echo $user_info['phone']; ?></a>
                </li>
              </ul>

              <a href="<?php echo base_url('profile/profile/index'); ?>" class="btn btn-primary btn-block"><b>Update Your Profile</b><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.box-body -->
          </div>

          </div>
          <!-- user info -->
    </div>
    <!-- /.row -->

    <!-- =========================================================== -->




      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
       
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>