<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Group
            <small>All My Group</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Group</a></li>
            <li class="active">My View</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">



            <?php if(is_array($mygroup)): ?>
            <?php foreach($mygroup as $row):?>


                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <h4 class="text-center"><span class="label label-info"><?php echo $row->group_name; ?></span></h4>
                            <img src="<?php echo base_url() . '/assets/file/group/' .$row->primary_image; ?>" alt="event image" width="320" height="250" class="img-responsive"/>
                            <div class="caption">
                                <div class="row">



                                    <ul class="nav nav-stacked">
                                        <li><a href="#">Group Category <span class="pull-right badge bg-blue"><?php echo $row->category; ?></span></a></li>
                                        <li><a href="#">Group  Date <span class="pull-right badge bg-aqua"><?php echo $row->create_date; ?></span></a></li>

                                    </ul>

                                </div>
                                <p><?php echo $row->description; ?></p>
                                <div class="row">

                                    <div class="box-footer">

                                        <a href="<?php echo base_url('group/group/edit/' . $row->id); ?>" class="btn btn-block btn-success"> Edit</a>
                                        <a href="<?php echo base_url('group/group/delete/' . $row->id); ?>" class="btn btn-block btn-danger">Remove</a>
                                    </div>


                                </div>

                                <p> </p>
                            </div>
                        </div>
                    </div>


                <?php endforeach;?>
            <?php endif; ?>


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
