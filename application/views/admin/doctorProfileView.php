<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Doctor Profile Details</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php
            //print_r($doctorProfile);
            ?>
            <div class="col-md-6 col-xs-12 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Full Name</b> <span class="pull-right"><?php echo (!empty($doctorProfile['full_name']))?$doctorProfile['full_name']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Email Address</b> <span class="pull-right"><?php echo (!empty($doctorProfile['email']))?$doctorProfile['email']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Profession</b> <span class="pull-right"><?php echo (!empty($doctorProfile['profession']))?getProfessionById($doctorProfile['profession']):'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Country</b> <span class="pull-right">
                                    <?php
                                    $data = get_data('countries', array('id' => $doctorProfile['country']));
                                    echo $data['name'];
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <b>State</b> <span class="pull-right"><?php echo (!empty($doctorProfile['state']))?$doctorProfile['state']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>City</b> <span class="pull-right"><?php echo (!empty($doctorProfile['city']))?$doctorProfile['city']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>NPI</b> <span class="pull-right"><?php echo (!empty($doctorProfile['npi']))?$doctorProfile['npi']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>College/University</b> <span class="pull-right"><?php echo (!empty($doctorProfile['university']))?$doctorProfile['university']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item text-center">
                                <?php if($doctorProfile['university'] != 1){?>
                                    <a class="btn btn-lg btn-success" href="<?php echo base_url('admin/DoctorVarification/varify') . '/' . $doctorProfile['id'] . '/' . $doctorProfile['is_valid'] . '/' .$doctorProfile['user_id'];?>">Varify</a>
                                <?php }?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

