

        <div class="content-wrapper">
            <section class="content-header">
                <h1><i class="glyphicon glyphicon-bullhorn"></i>
                    All My Post List
                </h1>
            </section>

            <section class="content">
                        <div class="row">

                            <?php if($this->session->flashdata('success')){ ?>
                                <div class="col-lg-12">
                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong> <?php echo $this->session->flashdata('success');?></strong>
                                    </div>
                                </div>
                            <?php } $this->session->unset_userdata('success'); ?>

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
                                            <a  href="<?php echo base_url('forum/posts'); ?>" class="btn "><i class="fa fa-list"></i> All My Post</a>

                                        </div>
                                        <div class="col-md-3 text-center">
                                            <a  href="<?php echo base_url('forum/comments'); ?>" class="btn"><i class="fa fa-user"></i> My Comments Post</a>

                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>

                            <!-- /.MENU FORUM SAJIB -->

                            <!-- /.box-header -->
                            <?php if(!empty($allmypostlist)){?>
                                <div class="col-lg-12">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Post List</h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <!-- /.box-tools -->
                                        </div>
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tbody><tr>

                                            <th>Post Title</th>
                                            <th>Post Details</th>
                                            <th style="width: 140px">Date</th>
                                            <th>Post Edit</th>
                                            <th>Post Delete</th>

                                        </tr>

                                        <?php foreach ($allmypostlist as $row){?><tr>

                                            <td><?php echo $row->title; ?></td>
                                            <td>
                                                <?php echo $row->deatils; ?>
                                            </td>
                                            <td><?php echo date('d-m-Y', strtotime($row->datetime)); ?></td>
                                            <td>
                                                <a href="<?php echo base_url('forum/editPost/'.$row->post_id);?>" type="button" class="btn btn-block btn-primary">
                                                    Edit
                                                </a>
                                            </td>
                                            <td><a href="<?php echo base_url('forum/forum/deletePost/'.$row->post_id);?>" type="button" class="btn btn-block btn-danger">
                                                    Delete
                                                </a>
                                            </td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                </div>
                            <?php }else{?>
                                <div class="col-lg-12">
                                    <div class="alert alert-warning alert-dismissible text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong> No post found <i class="fa fa-info"></i> </strong>
                                    </div>
                                </div>
                            <?php }?>


        </div>
            </section>

        </div>


