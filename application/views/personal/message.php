<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-user-md"></i>
             Personals
        </h1>
    </section>


    <!-- Page Content -->
    <section class="content">
        <div class="">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12 alert alert-success alert-dismissible text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h3><?php echo $message; ?> <i class="fa fa-info"></i></h3>
                        <p><?php echo (!empty($message_2))?$message_2:'';?></p>

                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.container-fluid -->
</div>