

<!--====================-->


<style>
    .box-body img{
        padding: 5px;
    }.time{background: none;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h4><i class="glyphicon glyphicon-tags"></i>
            &nbsp;Article Full Details
        </h4>
    </section>

    <section class="content">
        <div class="row">



            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img src="<?php echo base_url() . 'assets/file/blog/' .$single_post['primary_image'] ?>" alt="" width="220" height="140" class=" center-block" />
                        <h4 class="profile-username text-center"> <?php echo $single_post['title']; ?></h4>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Article Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Blog Date </b> <span class="pull-right"><?php echo date("d-m-Y", strtotime($single_post['date']));?></span>
                            </li>

                            <li class="list-group-item">
                                <b>Blog Time </b> <span class="pull-right"><?php echo $single_post['time']; ?></span>
                            </li>



                        </ul>



                    </div>
                    <!-- /.box-body -->
                </div>









            </div>



            <div class="col-lg-8">

                <div class="box box-success">
                    <div class="box-header with-border">

                        <h3 class="box-title">Article Description</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">

                        <?php echo $single_post['description'];?>

                    </div>


                </div>




            </div>




        </div>
</div>
</section>

</div>



