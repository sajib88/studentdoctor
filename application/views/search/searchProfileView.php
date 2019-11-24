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

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-user "></i>
            Profile Details
        </h1>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6 col-xs-12 col-md-offset-3">
                <!-- small box -->
                <div class="box-header with-border">
                    <h3 class="box-title">Profile Information</h3><i class="fa fa-user title-icon"></i>
                </div>
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="widget-user-header ">
                            <div class="widget-user-image text-center">
                                <?php
                                if($user_data['profilepicture'] == 0) {?>
                                    </br>
                                    <div class="text-center">
                                        <img src="<?php echo base_url() . '/assets/upload_prfl.png'?>" alt="" class="img-rounded " width="150" height="150" />
                                    </div>
                                    </br>
                                <?php }
                                else {?>
                                    </br>

                                    <img src="<?php echo base_url() . '/assets/file/' .$user_data['profilepicture'] ?>" alt="" width="170" height="170" class="img-rounded" />
                                    </br>
                                <?php }
                                ?>
                            </div>
                            <h3 class="profile-username text-center"><?php echo $user_data['user_name']; ?></h3>
                            <h4 class="text-muted text-center">
                                <?php
                                $data = get_data('profession', array('id' => $user_data['profession']));
                                echo $data['name'];
                                ?>
                            </h4>
                        </div>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>First Name</b> <span class="pull-right"><?php echo (!empty($user_data['first_name']))?$user_data['first_name']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Last Name</b> <span class="pull-right"><?php echo (!empty($user_data['last_name']))?$user_data['last_name']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <span class="pull-right"><?php echo (!empty($user_data['email']))?$user_data['email']:'<span class="badge bg-red">Not Given</span>';?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Professional Licensing Country</b> <span class="pull-right"><?php echo (!empty($user_data['plc']))?$user_data['plc']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Professional Licensing State</b> <span class="pull-right"><?php echo (!empty($user_data['pls']))?$user_data['pls']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>NPI</b> <span class="pull-right"><?php echo (!empty($user_data['npi']))?$user_data['npi']:'<span class="badge bg-red">Not Given</span>'?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Professional License Number</b> <span class="pull-right"><?php echo (!empty($user_data['pln']))?$user_data['pln']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Gender </b> <span class="pull-right"><?php echo ucfirst(!empty($user_data['gender']))?$user_data['gender']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Country</b> <span class="pull-right"><?php
                                    $data = get_data('countries', array('id' => $user_data['country']));
                                    echo (!empty($data['name']))?$data['name']:'<span class="badge bg-red">Not Given</span>';
                                    ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>State </b> <span class="pull-right"><?php echo (!empty($user_data['state']))?$user_data['state']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>City</b> <span class="pull-right"><?php echo (!empty($user_data['city']))?$user_data['city']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Phone</b> <span class="pull-right"><?php echo (!empty($user_data['phone']))?$user_data['phone']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                            </li>

                            <li class="list-group-item">
                                <b>University / College Name</b> <span class="pull-right"><?php echo (!empty($user_data['university_clg']))?$user_info['university_clg']:'<span class="badge bg-red">Not Given</span>'; ?></span>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

        </div>


    </section>


</div>




<style>
    .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

    small {
        display: block;
        line-height: 1.428571429;
        color: #999;
    }
</style>


<style>
    .glyphicon { margin-right:5px; }
    .thumbnail
    {
        margin-bottom: 20px;
        padding: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
    }

    .item.list-group-item
    {
        float: none;
        width: 100%;
        background-color: #fff;
        margin-bottom: 10px;
    }
    .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
    {
        background: #428bca;
    }

    .item.list-group-item .list-group-image
    {
        margin-right: 10px;
    }
    .thumbnail img
    {
        height: 407px;
    }
    .item.list-group-item .thumbnail
    {
        margin-bottom: 0px;
    }
    .item.list-group-item .caption
    {
        padding: 9px 9px 0px 9px;
    }
    .item.list-group-item:nth-of-type(odd)
    {
        background: #eeeeee;
    }

    .item.list-group-item:before, .item.list-group-item:after
    {
        display: table;
        content: " ";
    }

    .item.list-group-item img
    {
        float: left;
    }
    .item.list-group-item:after
    {
        clear: both;
    }
    .list-group-item-text
    {
        margin: 0 0 11px;
    }

</style>


