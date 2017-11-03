<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="glyphicon glyphicon-bullhorn"></i>
            New Category
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> 1 New ! Category Create successfully.</strong>
                    </div>
                </div>
            <?php } ?>


            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Forum Board</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">



                        <div class="col-md-3 text-center">
                            <a  href="<?php echo base_url('forum/board'); ?>" class="btn "><i class="fa fa-home"></i> Forum Home</a>

                        </div>




                        <div class="col-md-3 text-center">
                            <a data-toggle="modal" href="<?php echo base_url('forum/addCategory'); ?>" class="btn "><i class="fa fa-plus"></i> Add New Category</a>

                        </div>


                        <div class="col-md-3 text-center">
                            <a  href="<?php echo base_url('forum/posts'); ?>" class="btn "><i class="fa fa-list"></i> All My Posts</a>

                        </div>


                        <div class="col-md-3 text-center">
                            <a  href="<?php echo base_url('forum/comments'); ?>" class="btn"><i class="fa fa-user"></i> My Posted Comments</a>

                        </div>



                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-lg-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Add New Category</h3></i>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="post" id="forumcat" enctype="multipart/form-data" action="<?php echo base_url('forum/addCategory'); ?>">
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Category Title / Name<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                                            <input name="cat_title" value="<?php echo ''; ?>"  class="form-control">
                                        </div>
                                    </div>


                                    <?php


                                    ?>



                                    <div col-lg-12>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="reset" name="reset" class="btn btn-small btn-danger" value="Cancel">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group pull-right">
                                                <input type="submit" name="submit" class="btn btn-small btn-success" value="Save">
                                            </div>
                                        </div>
                                    </div>


                            </div>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>





    </section>
    </form>
    <!-- /.col-lg-12 -->
</div>
<!-- /.container-fluid -->
</div>


<script type="text/javascript">


    $(function() {
        $("#forumcat").validate({
            rules: {
                cat_title: {
                    required:true
                }

            },
            messages: {
                cat_title: {
                    required: "Category name is Required",}
            }
        });

    });


</script>


