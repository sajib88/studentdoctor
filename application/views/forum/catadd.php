<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Forum
            <small>Create New Forum Category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forum</a></li>
            <li class="active">Category Create</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> 1 New ! Group  Create successfully.</strong>
                    </div>
                </div>
            <?php } ?>


            <div class="col-md-12">
                <div class="box box-default box-solid">
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



                        <div class="col-md-2 text-center">
                            <a  href="<?php echo base_url('forum/forum/index'); ?>" class="btn "><i class="fa fa-home"></i> Forum Home</a>

                        </div>




                        <div class="col-md-2 text-center">
                            <a data-toggle="modal" href="<?php echo base_url('forum/forum/addcat'); ?>" class="btn "><i class="fa fa-plus"></i> Add New Category</a>

                        </div>


                        <div class="col-md-2 text-center">
                            <a  href="<?php echo base_url('forum/forum/index'); ?>" class="btn "><i class="fa fa-list"></i> All My Post</a>

                        </div>


                        <div class="col-md-2 text-center">
                            <a  href="<?php echo base_url('forum/forum/index'); ?>" class="btn"><i class="fa fa-user"></i> My Comments Post</a>

                        </div>

                        <div class="col-md-2 text-center">
                            <a  href="<?php echo base_url('forum/forum/index'); ?>" class="btn"><i class="fa fa-plus"></i> Add New Topic</a>

                        </div>

                        <div class="col-md-2 text-center">
                            <a  href="<?php echo base_url('forum/forum/index'); ?>" class="btn"><i class="fa fa-plus"></i> Add New Topic</a>

                        </div>




                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-lg-7">
                <div class="box box-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="post" id="forumcat" enctype="multipart/form-data" action="<?php echo base_url('Forum/forum/addcat'); ?>">
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Category Title / Name<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                                            <input name="cat_title" value="<?php echo ''; ?>"  class="form-control">
                                        </div>
                                    </div>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-block btn-success" value="Save">

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

            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-bullhorn"></i>

                        <h3 class="box-title">Category Create Help</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-success">


                            <p>
                            </p><ul>
                                <li><b>New Category </b> &mdash; Doctors can create New Category</li>

                                <li><b>Category </b>&mdash; professions By professions Only can Discuss  </li>

                                <li><b>Secure&mdash;only </b>viewed by verified and interested individuals </li>

                                <li><b>Category</b>&mdash;Will Check admin and Approve it</li>


                            </ul>
                            <p></p>
                        </div>
                        <div class="callout callout-info">
                            <h4>More Help </h4>

                            <p>Contact Us : <b> info@foralldoctors.com</b> </p>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
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


