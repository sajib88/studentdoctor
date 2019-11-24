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
    $das ="Doctor Flip Dashboard";
}
?>
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
            <!-- small box -->
               <div class="box-header with-border">
                   <h3 class="box-title">Flip Site Profile Information</h3><i class="fa fa-user title-icon"></i>
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





              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Full  Name</b> <span class="pull-right"><?php echo (!empty($user_info['full_name']))?$user_info['full_name']:'<span class="badge bg-red">Not Given</span>'; ?></span>
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

              </ul>

              <a href="<?php echo base_url('profile/flipupdate'); ?>" class="btn btn-primary btn-block"><b>Update Your Profile</b><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.box-body -->
          </div>

          </div>



            <div class="col-md-6 col-xs-12">
            <!-- small box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Flip site Your Professional Information</h3><i class="fa fa-user title-icon"></i>
                </div>
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Profession </b>
                            <span class="pull-right badge bg-green">
                                <?php
                                    $data = get_data('profession', array('id' => $user_info['parent_profession']));
                                    echo (!empty($data['name']))?$data['name']:'<span class="badge bg-red">Not Given</span>';
                                ?>
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Professional Speciality </b> <span class="pull-right item-center">
                            <span class="pull-right badge bg-info">
                                <?php
                                $data = get_data('profession', array('id' => $user_info['profession']));
                                if($user_info['profession'] == 0){
                                   echo '<span class="badge bg-info">N/A</span>';
                                }else{
                                    echo (!empty($data['name']))?$data['name']:'<span class="badge bg-info">Not Given</span>';
                                }

                                ?>
                            </span>
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

