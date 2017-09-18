

        <div class="content-wrapper">
            <section class="content-header">
                <h1><i class="glyphicon glyphicon-bullhorn"></i>
                    All My Post List
                </h1>
            </section>

            <section class="content">
                        <div class="row">
                            <!-- /.MENU FORUM SAJIB -->
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
                                        <div class="col-md-2 text-center col-md-offset-1">
                                            <a  href="<?php echo base_url('forum/forum/index'); ?>" class="btn "><i class="fa fa-home"></i> Forum Home</a>

                                        </div>
                                        <div class="col-md-2 text-center">
                                            <a data-toggle="modal" href="<?php echo base_url('forum/forum/addcat'); ?>" class="btn "><i class="fa fa-plus"></i> Add New Category</a>

                                        </div>
                                        <div class="col-md-2 text-center">
                                            <a  href="<?php echo base_url('forum/forum/allmypostlist'); ?>" class="btn "><i class="fa fa-list"></i> All My Post</a>

                                        </div>
                                        <div class="col-md-2 text-center">
                                            <a  href="<?php echo base_url('forum/forum/allmycomments'); ?>" class="btn"><i class="fa fa-user"></i> My Comments Post</a>

                                        </div>
                                        <div class="col-md-2 text-center">

                                            <a  href="<?php echo base_url('forum/forum/index'); ?>" class="btn"><i class="fa fa-backward"></i> Go Back Forum</a>

                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>

                            <!-- /.MENU FORUM SAJIB -->

                            <!-- /.box-header -->
                                <div class="col-lg-12">
                                    <div class="box box-default box-solid">
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
                                        <?php if(!empty($allmypostlist)){ ?>
                                        <?php foreach ($allmypostlist as $row){?><tr>

                                            <td><?php echo $row->title; ?></td>
                                            <td>
                                                <?php echo $row->deatils; ?>
                                            </td>
                                            <td><?php echo date('d-m-Y', strtotime($row->datetime)); ?></td>
                                            <td>
                                                <a href="<?php echo base_url('forum/forum/editPost/'.$row->post_id);?>" type="button" class="btn btn-block btn-primary">
                                                    Edit
                                                </a>
                                            </td>
                                            <td><a href="<?php echo base_url('forum/forum/deletePost/'.$row->post_id);?>" type="button" class="btn btn-block btn-danger">
                                                    Delete
                                                </a>
                                            </td>
                                            </tr>
                                        <?php
                                        }?> <?php
                                        }?>

                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                </div>


        </div>
            </section>

        </div>


