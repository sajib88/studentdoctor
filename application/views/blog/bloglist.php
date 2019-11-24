
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
<link href="http://[::1]/doctorsapp/script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />


<style>
    .blog-list-article{
        height: 100px;
        overflow: hidden;
        margin: 10px 0 0 0;
    }
    .blog-list-article a{
        margin-top: 10px;
        width: 100%;
    }
</style>

<div class="content-wrapper">


    <section class="content-header">
        <h4><i class="fa fa-square-o"></i>
            Article List View
        </h4>
    </section>

    <section class="content">

        <div class="row">



            <?php
            if(!empty($recent_post)){
                foreach ($recent_post as $row){
                    ?>

                    <a href="<?php echo base_url('insideblog/Insideblog/insideblogsinglepost/' . $row->id); ?>">
                        <div class="col-lg-4">

                            <div class="box box-widget">



                                <div class="box-header with-border">
                                    <div class="user-block">

                                        <span class="Title"><a href="#"><?php echo substr($row->title,0,20); ?></a></span><br>
                                        <span class="Publish Date">Shared publicly <?php echo date("m-d-Y", strtotime($row->date)); ?></span>
                                    </div>
                                    <!-- /.user-block -->
                                    <div class="box-tools">
                                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                                            <i class="fa fa-circle-o"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->

                                <div class="widget-user-header ">
                                    <div class="widget-user-image text-center">

                                        <img src="<?php echo base_url('assets/file/blog/'.$row->primary_image);?>" alt="" width="100px" height="100px" class="img-size blog-image" />
                                    </div>
                                    </br>
                                </div>
                                <div class="box-body" style="display: block;">

                                    <div class="blog-list-article">
                                        <?php echo substr($row->description,0, 150);?>

                                    </div>

                                </div>

                                <div class="box-footer">


                                    <a href="<?php echo base_url('article/' . $row->id); ?>" class="btn btn-block btn-dropbox"> Read More</a>
                                </div>
                                <!-- /.box-body -->

                            </div>

                        </div>
                    </a>
                    <?php
                }

                ?>

                <!-- /.box -->

            <?php }else{?>
                <div class="alert alert-warning text-center">No Blogs Found <i class="fa fa-info"></i> </div>
            <?php }?>

        </div>



    </section>


</div>






