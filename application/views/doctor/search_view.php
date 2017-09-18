


<style>
    .feature{margin-bottom: 20px;}
    .glyphicon { margin-right:5px; }
    .thumbnail
    {
        background: #fff none repeat scroll 0 0;
        border: 1px solid #f0f0f0;
        border-radius: 0;
        margin-bottom: 20px;
        padding: 0px 0 0;
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
        height: 203px;
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
    .thumbnail a > img, .thumbnail > img{border-top-left-radius:0px;border-top-right-radius:0px;}

</style>


<main class="main-wrapper">


    <section class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pdl">
                    <div class="tab-wrapper row">
                        <!-- Nav tabs -->


                        <!-- Tab panes -->



                        <section class="section-sm border-bottom">
                            <div class="container">
                                <div class="row first-col-title">

                                    <div class="col-lg-10 col-lg-push-1">

                                        <div class="row">
                                            <div class="text-center helpig-hand">
                                                <h2>Meet our <span>Professionals.</span></h2>

                                            </div>
                                            <div class="ptop-40"></div>

                                            <?php

                                            if(!empty($searchData)) {

                                                foreach ($searchData as $row) {
                                                    ?>
                                                    <div class="col-md-3 col-sm-6 feature  ">

                                                        <div class="text-center mb-50">
                                                            <a href="<?php echo base_url('doctor/docController/details_profile/' . $row->id); ?>"
                                                               class="">
                                                            <div class="thumbnail">
                                                                <img class="mb-20" src="<?php echo (!empty($row->photo))? base_url().'assets/file/'.$row->photo:'';?><?php echo (empty($row->photo))? base_url().'assets/user-demo.png':'';?>" alt="">
                                                            </div>
                                                            </a>
                                                            <h5 class="mb-0 text-md"><?php echo (!empty($row->first_name) or (!empty($row->last_name)))?$row->first_name.'-'.$row->last_name: '' ?></h5>
                                                            <span class="text-info"><?php echo getProfessionById($row->profession) ?></span>

                                                            <a href="<?php echo base_url('doctor/docController/details_profile/' . $row->id); ?>"
                                                               class="btn btn-block btn-filled btn-primary btn-flat">

                                                                View Profile
                                                            </a>

                                                        </div>


                                                    </div>
                                                <?php }
                                            }else{?>
                                                <div class="alert alert-danger">No Search Result Found </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>

            </div>
        </div><!--container-->
    </section>

</main>











