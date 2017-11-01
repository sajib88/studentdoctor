<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-group"></i>
            All Group
        </h1>
    </section>

    <section class="content">
        <div class="row">

            <?php if(!empty($viewallevent)){ ?>
                <?php foreach($viewallevent as $row):?>

                    <div class="col-lg-4 col-xs-12">
                        <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header ">
                                <div class="widget-user-image text-center">
                                    </br>
                                    <img src="<?php echo base_url() . '/assets/file/group/' .$row['primary_image']; ?>" alt=""  />

                                    </br>
                                </div>
                                </br>
                            </div>
                            <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                    <li><a href="#"><b>Group Name</b> <span class="pull-right"><?php echo substr( $row['group_name'],0,30).'More..'; ?></a></span></a></li>
                                    <li><a href="#"><b>Group Category </b><span class="pull-right"><?php
                                                $data = get_data('group_main_cat', array('id' => $row['category']));
                                                echo $data['cat_name'];
                                                ?></span></a></li>
                                    <li><a href="#"><b>Group  Date </b><span class="pull-right"><?php echo date('d-m-y', strtotime($row['create_date'])); ?></span></a></li>
                                    <li><a><?php echo substr( $row['description'],0,90).'.....'; ?></a></li>

                                </ul>
                            </div>

                            <div class="box-footer">


                                <a href="<?php echo base_url('group/layoutfull/' . $row['id']); ?>" class="btn btn-block btn-dropbox"> Discussion</a>
                            </div>
                        </div>
                    </div>





                <?php endforeach;?>
            <?php }else{ ?>
                <div class="col-lg-12">
                    <div class="alert alert-warning text-center alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> No Group Found <i class="fa fa-info"></i> </strong>
                    </div>
                </div>
            <?php } ?>


        </div>
    </section>

</div>

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
        height: 245px;
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

