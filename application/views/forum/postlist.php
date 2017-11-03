<link href="<?php echo base_url('script-assets/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('script-assets/no_more_table.css');?>" rel="stylesheet">

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
                                    <div id="no-more-tables">
                                    <table class="table table-hover" id="js_personal_table">
                                        <thead>
                                        <tr>
                                            <th class="numeric">#</th>
                                            <th class="numeric">Post Title</th>
                                            <th class="numeric">Post Details</th>
                                            <th class="numeric" >Date</th>
                                            <th class="numeric">Post Edit</th>
                                            <th class="numeric">Post Delete</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($allmypostlist as $row){?>
                                            <tr>
                                                <td data-title="#" class="numeric"><?php echo $i; ?></td>
                                                <td data-title="Post Title" class="numeric"><?php echo $row->title; ?></td>
                                                <td data-title="Post Details" class="numeric">
                                                    <?php echo $row->deatils; ?>
                                                </td>
                                                <td data-title="Date" class="numeric"><?php echo date('d-m-Y', strtotime($row->datetime)); ?></td>
                                                <td data-title="Post Edit" class="numeric">
                                                    <a href="<?php echo base_url('forum/editPost/'.$row->post_id);?>" type="button" class="btn btn-block btn-primary">
                                                        Edit
                                                    </a>
                                                </td>
                                                <td data-title="Post Delete" class="numeric"><a href="<?php echo base_url('forum/forum/deletePost/'.$row->post_id.'/'.$row->cat_id);?>" type="button" class="btn btn-block btn-danger">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++;

                                        }  ?>

                                        </tbody>
                                    </table>
                                    </div>
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


<script type="text/javascript" src="<?php echo base_url();?>script-assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>script-assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script rel="stylesheet" href="<?php echo base_url();?>script-assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css"></script>
<script type="text/javascript" src="<?php echo base_url();?>script-assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var personaltable = document.getElementById("js_personal_table");
        $(personaltable).dataTable();
    });
</script>