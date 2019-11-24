<div class="content-wrapper">

    <section class="content-header">
      <h4><i class="fa fa-user-md"></i>
          <?php echo $user_info['email']; ?> - Website Details
      </h4>
    </section>



 <section class="content">
    <div class="row">
        <div class="col-lg-12">





         <div class="col-md-5">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">


                <?php
                            if($user_info['profilepicture'] == 0) {?>
                                <img src="<?php echo base_url() . '/assets/user-demo.jpg' ?>" alt="" class="profile-user-img img-responsive img-circle"  />
                            <?php }
                            else {?>
                                <img src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt="" width="150" height="150" class="img-circle center-block" />
                            <?php }
                            ?>



              <h3 class="profile-username text-center"><?php echo $profession_type['name']; ?></h3>

              <p class="text-muted text-center"><?php echo $user_info['first_name']; ?> <?php echo $user_info['last_name']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email </b> <a class="pull-right"><?php echo $user_info['email']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Gender </b> <a class="pull-right"><?php echo $user_info['gender']; ?></a>
                </li>

                <li class="list-group-item">
                  <b>Professional Licensing Country</b> <a class="pull-right"><?php echo $user_info['plc']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Professional Licensing State</b> <a class="pull-right"><?php echo $user_info['pls']; ?></a>
                </li>
              </ul>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->

          <!-- /.box -->
        </div>

            <div class="col-lg-7">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Public Website Information </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Description</strong>

                        <p class="text-muted">
                            <?php echo $website_info['description']; ?>
                        </p>

                        <hr>




                        <strong><i class="fa fa-medkit"></i> Business Infromation</strong>

                        <p class="text-muted">

                            <br/>           <b>  Business Country </b>  : <?php
                            $data = get_data('countries', array('id' => $website_info['country']));
                            echo $data['name'];
                            ?><br/>
                            <b>  Business State </b>  : <?php echo $website_info['state']; ?><br/>
                            <b>  Business City  </b>  : <?php echo $website_info['city']; ?><br/>
                            <b>  Business Zip  </b>  : <?php echo $website_info['postal']; ?><br/>
                            <b>  Business Name  </b>  : <?php echo $website_info['business_name']; ?><br/>
                            <b>  Business Web site  </b>  : <?php echo $website_info['business_website']; ?><br/>
                            <b>  Business Email  </b>  : <?php echo $website_info['business_email']; ?><br/>
                            <b>  Business Telephone  </b>  : <?php echo $website_info['business_telephone']; ?><br/>
                            <b>  Business Fax  </b>  : <?php echo $website_info['business_fax']; ?><br/>
                        </p>
                        <hr>

                        <strong><i class="fa fa-plus-square"></i> Specialty</strong>

                        <p>

                            <span class="label label-success"><?php echo $website_info['specialty']; ?></span>


                        </p>

                        <hr>

                        <strong><i class="glyphicon glyphicon-play"></i> Special Interest</strong>

                        <p>
                            <span class="label label-info"><?php echo $website_info['special_interest']; ?></span>
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-info">
            <div class="box-header with-border">
                <i class="fa fa-file-picture-o"></i>
              <h3 class="box-title">Public Website Photos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

              <?php
                         if (is_array($photos) && !empty($photos))
                                    foreach ($photos as $row) {
                                        {
                                            ?>
                                            <div class="col-md-6">
                                            <img class="box-header with-border" src="<?php echo base_url() . '/assets/file/publicweb/' . $row->name ?>" width="220px;" height="180px">
                                            </div>
                                            <?php
                                        }
                                    }
                                ?>

              </div>


           </div>


                 <?php
                if (is_array($video)) {
                    $explode = explode('.', $video['name']);
                    ?>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <i class="fa fa-file-video-o"></i>
                    <h3 class="box-title">Public Website Video</h3>
                    </div>
                    <div class="box-body">

                        <video width="280" height="240" controls>
                                        <source src="<?php echo base_url() . '/assets/file/publicweb/' . $video['name']; ?>" type="video/<?php echo $explode[1]; ?>">
                                    </video>

                    </div>


                </div>
                 <?php }
                ?>



                <?php
                if (is_array($audio)) {
                    $explode = explode('.', $audio['name']);
                    ?>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <i class="fa fa-file-sound-o"></i>
                    <h3 class="box-title">Public Website Sound/audio</h3>
                    </div>
                    <div class="box-body">

                        <audio controls>
                                        <source src="<?php echo base_url() . '/assets/file/publicweb/' . $audio['name']; ?>" type="audio/<?php echo $explode[1]; ?>">
                                    </audio>

                    </div>


                </div>
                 <?php }
                ?>



                 <?php
                if (is_array($files)) {
                    $explode = explode('.', $audio['name']);
                    ?>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <i class="fa fa-file-word-o"></i>
                    <h3 class="box-title">Public Website Attachment</h3>
                    </div>
                    <div class="box-body">

                        <?php
                                if (is_array($files) && !empty($files)) {
                                    $i = 1;
                                    foreach ($files as $row) {
                                        ?>
                                        <a class="btn btn-small btn-dropbox" href="<?php echo base_url() . '/assets/file/publicweb/' . $row->name ?>">Download File  <?php echo $i; //echo!empty($row->name) ? $row->name : ''   ?></a>
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>

                    </div>


                </div>
                 <?php }
                ?>



            </div>
        </div>



    </div>
</section>

</div>
<!-- /.row -->
<!-- /.container-fluid -->
</div>