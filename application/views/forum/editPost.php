

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="glyphicon glyphicon-bullhorn"></i>
            Edit Post
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- /.MENU FORUM SAJIB -->
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
                        <h3 class="box-title">Update Post</h3></i>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php if($this->session->flashdata('message')){ ?>
                                <div class="col-lg-12">
                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong> <?php echo $this->session->flashdata('message'); ?></strong>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-lg-12">
                                <form role="form" method="post" id="forumPost" enctype="multipart/form-data" action="<?php echo base_url('forum/editPost/'.$editMyPost['post_id']); ?>">
                                    <input type="hidden" name="login_id" value="<?php echo $login_id; ?>">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Title<span class="error">*</span></label><span id='title-error' class='error' for='title'></span>
                                            <input name="title" value="<?php echo $editMyPost['title']; ?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Details<span class="error">*</span></label><span id='deatils-error' class='error' for='deatils'></span>
                                            <textarea name="deatils" class="form-control"><?php echo $editMyPost['deatils']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Attachment</label><span id='attachment-error' class='error' for='attachment'></span>
                                                <input style="width: 95%" class="btn btn-default" name="attachment" type="file">
                                            </div>
                                        </div>
                                            <?php if(!empty($editMyPost['attachment'])){?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>See Attachment</label><br>
                                            <a class="btn bg-aqua "  href="<?php echo base_url() . '/assets/file/forum/' .$editMyPost['attachment']; ?>">Attachment</a>
                                            </div>
                                        </div>
                                            <?php }?>
                                        </div>
                                    </div>


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



        </div>
    </section>
</div>

<script type="text/javascript">


    $(function() {
        $("#forumPost").validate({
            rules: {
                title: {
                    required:true
                },
                deatils: {
                    required:true
                }

            },
            messages: {
                title: {
                    required: "Post title name is Required",}
            },
                deatils: {
                    required: "Post details name is Required",}
            }
        });

    });


</script>

