<style>
    @media (max-width: 600px) {
        .item-center{
            margin-top: -12px;
        }
    }

</style>
<?php  $user_type = $this->session->userdata('user_type');
?>

<?php
if($user_type==100)
{
    $das = "Patient Dashboard";
}
elseif($user_type==7){
    $das = "Pharmacist Dashboard";
}

elseif($user_type==13){
    $das = "Advertiser Dashboard";
}
elseif($user_type==12){
    $das ="Publisher Dashboard";
}
else{
    $das ="Doctor Dashboard";
}
?>


<?php if(!empty($advertise)){ ?>
    <?php foreach($advertise as $row):?>
        <section class="panel">
            <div class="panel-body">
                <img  src="<?php echo base_url() . '/assets/file/advertise/' .$row['ad_image']; ?>" class="img-responsive"/>
            </div>
        </section>
    <?php endforeach;?>
<?php }else{?>
<?php }?>

<div id="page-content">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">


       <!-- =========================================================== -->
    <div class="row">

           <div class="col-md-6 col-xs-12">
               <div class="box box-primary">
               <!-- small box -->
               <div class="box-header with-border">
                   <h3 class="box-title">Profile Information</h3><i class="fa fa-user title-icon"></i>
               </div>

            <div class="box-body box-profile">
              <?php
                if($user_info['profilepicture'] == 0) {?>
                    <img src="<?php echo base_url() . '/assets/user-demo.jpg'?>" alt="" class="img-rounded img-responsive profile_pic" />
                <?php }
                else {?>
                   <img class="profile-user-img img-responsive img-circle text-center profile_pic"  src="<?php echo base_url() . '/assets/file/' .$user_info['profilepicture']; ?>" alt=""  />
              <?php }
              ?>



              <p class="text-muted text-center">

              <i class="glyphicon glyphicon-envelope"></i>&nbsp&nbsp<?php echo (!empty($user_info['email']))?$user_info['email']:'<span class="">Not Given</span>'; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>First Name</b> <span class="pull-right"><?php echo (!empty($user_info['first_name']))?$user_info['first_name']:'<span class="">Not Given</span>'; ?></span>
                </li>
                <li class="list-group-item">
                  <b>Last Name</b> <span class="pull-right"><?php echo (!empty($user_info['last_name']))?$user_info['last_name']:'<span class="">Not Given</span>'; ?></span>
                </li>
                </li>
                 <li class="list-group-item">
                  <b>Gender </b> <span class="pull-right"><?php echo (!empty($user_info['gender']))?$user_info['gender']:'<span class="">Not Given</span>'; ?></span>
                </li>
                <li class="list-group-item">
                  <b>Country</b> <span class="pull-right"><?php
                  $data = get_data('countries', array('id' => $user_info['country']));
                  echo (!empty($data['name']))?$data['name']:'<span class="badge bg-red">Not Given</span>';
                  ?></span>
                </li>
                <li class="list-group-item">
                  <b>State </b> <span class="pull-right"><?php echo (!empty($user_info['state']))?$user_info['state']:'<span class="">Not Given</span>'; ?></span>
                </li>
                <li class="list-group-item">
                  <b>City</b> <span class="pull-right"><?php echo (!empty($user_info['city']))?$user_info['city']:'<span class="">Not Given</span>'; ?></span>
                </li>


                  <li class="list-group-item">
                      <b>Zip code / Postal code</b> <span class="pull-right"><?php echo (!empty($user_info['postal_code']))?$user_info['postal_code']:'<span class="">Not Given</span>'; ?></span>
                  </li>


                  <li class="list-group-item">
                  <b>Phone</b> <span class="pull-right"><?php echo (!empty($user_info['phone']))?$user_info['phone']:'<span class="">Not Given</span>'; ?></span>
                </li>

              </ul>

              <a href="<?php echo base_url('profile/update'); ?>" class="btn btn-primary btn-block"><b>Update Your Profile </b><i class="fa fa-arrow-circle-right"></i></a>
            </div>
         
            <!-- /.box-body -->
          </div>

          </div>


        <?php if($user_type == 100 || $user_type == 7 || $user_type == 12 || $user_type == 13){ }else{ ?>
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
                            <span class="pull-right ">
                                <?php
                                    $data = get_data('profession', array('id' => $user_info['parent_profession']));
                                    echo (!empty($data['name']))?$data['name']:'<span class="">Not Given</span>';
                                ?>
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b> Speciality </b> <span class="pull-right item-center">
                            <span class="pull-right">
                                <?php
                                $data = get_data('profession', array('id' => $user_info['profession']));
                                if($user_info['profession'] == 0){
                                   echo '<span class="">N/A</span>';
                                }else{
                                    echo (!empty($data['name']))?$data['name']:'<span class="">Not Given</span>';
                                }

                                ?>
                            </span>
                        </li>

                        <li class="list-group-item">
                            <b>Professional <br class="visible-xs">Licensing Country </b> <span class="pull-right item-center"><?php echo (!empty($user_info['plc']))?$user_info['plc']:'<span class="">Not Given</span>'; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Professional <br class="visible-xs">Licensing State </b> <span class="pull-right item-center"><?php echo (!empty($user_info['pls']))?$user_info['pls']:'<span class="">Not Given</span>'; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>NPI </b> <span class="pull-right"><?php echo (!empty($user_info['npi']))?$user_info['npi']:'<span class="">Not Given</span>'; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Professional <br class="visible-xs">License Number </b> <span class="pull-right item-center"><?php echo (!empty($user_info['pln']))?$user_info['pln']:'<span class="">Not Given</span>'; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
          <!-- user info -->
    </div>
    <!-- /.row -->


    <!-- /.content -->
  </section>
</div>
</div>

