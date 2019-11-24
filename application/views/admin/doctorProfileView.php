<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header text-center">LEVEL SET Profile </h3><span class="pull-right"><a class="btn btn-info" href="<?php echo base_url('admin/ProfileVarification') ?>">
                                           Back to verify panel
                                        </a></span>
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

                            <li class="list-group-item">
                                <b>Document 1</b> <span class="pull-right"> <a target="_blank" href="<?php echo base_url() . 'assets/file/varification/' . $doctorProfile['doc_1'] ?>">Check the Document 1</a> </span>
                            </li>
                            <?php  if(!empty($doctorProfile['doc_2'])){?>
                            <li class="list-group-item">
                                <b>Document 2</b> <span class="pull-right"> <a target="_blank" href="<?php echo base_url() . 'assets/file/varification/' . $doctorProfile['doc_2'] ?>">Check the Document 2</a> </span>
                            </li>
                            <?php }?>
                            <?php  if(!empty($doctorProfile['doc_3'])){?>
                            <li class="list-group-item">
                                <b>Document 3</b> <span class="pull-right"> <a target="_blank" href="<?php echo base_url() . 'assets/file/varification/' . $doctorProfile['doc_3'] ?>">Check the Document 3</a> </span>
                            </li>
                            <?php }?>

                            <?php  if(!empty($doctorProfile['update_doc_1'])){?>
                                <h5 class="text-center"><b>Level -3 Request New Updated Files</b></h5>
                                <li class="list-group-item">
                                    <b>Update Document 1</b> <span class="pull-right"> <a target="_blank" href="<?php echo base_url() . 'assets/file/varification/' . $doctorProfile['update_doc_1'] ?>">Update Document 1</a> </span>
                                </li>
                            <?php }?>

                            <?php  if(!empty($doctorProfile['update_doc_2'])){?>

                                <li class="list-group-item">
                                    <b>Update Document 2</b> <span class="pull-right"> <a target="_blank" href="<?php echo base_url() . 'assets/file/varification/' . $doctorProfile['update_doc_1'] ?>">Update Document 1</a> </span>
                                </li>
                            <?php }?>

                            <?php  if(!empty($doctorProfile['update_doc_3'])){?>

                                <li class="list-group-item">
                                    <b>Update Document 3</b> <span class="pull-right"> <a target="_blank" href="<?php echo base_url() . 'assets/file/varification/' . $doctorProfile['update_doc_3'] ?>">Update Document 3</a> </span>
                                </li>
                            <?php }?>

                            <?php  if(!empty($doctorProfile['update_doc_4'])){?>

                                <li class="list-group-item">
                                    <b>Update Document 4</b> <span class="pull-right"> <a target="_blank" href="<?php echo base_url() . 'assets/file/varification/' . $doctorProfile['update_doc_4'] ?>">Update Document 4</a> </span>
                                </li>
                            <?php }?>
                                <?php if($doctorProfile['is_valid'] != '1'){?>
                            <div class="col-md-12 p-10">
                                <br>
                                    <a class="btn btn-lg btn-warning pull-left" href="<?php echo base_url('admin/ProfileVarification/varify') . '/' . $doctorProfile['id'] . '/' . $doctorProfile['is_valid'] . '/' .$doctorProfile['user_id']. '/' .$doctorProfile['email'] . '/' .$doctorProfile['full_name'] . '/' . $doctorProfile['npi'];?>">Verify Level 2</a>
                                    <a class="btn btn-lg btn-success pull-right" href="<?php echo base_url('admin/ProfileVarification/varify_level3') . '/' . $doctorProfile['id'] . '/' . $doctorProfile['is_valid'] . '/' .$doctorProfile['user_id']. '/' .$doctorProfile['email'] . '/' .$doctorProfile['full_name'] . '/' . $doctorProfile['npi'];?>">Verify Level 3</a>
                            </div>
                                <?php }else{?>

                            <?php }?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<style>
    .list-group-item{
        position: relative;
        display: block;
        padding: 5px 5px;
        margin-bottom: -1px;
        background-color: #fff;
        border-top: 1px solid #ddd !important;
    }
</style>