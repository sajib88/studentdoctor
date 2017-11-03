<link href="<?php echo base_url('script-assets/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('script-assets/no_more_table.css');?>" rel="stylesheet">



        <div class="content-wrapper">
            <section class="content-header">
                <h1><i class="glyphicon glyphicon-bullhorn"></i>
                    All My Comments List
                </h1>
            </section>



            <section class="content">
                <!-- /.row -->





                        <div class="row">

                            <?php if($this->session->flashdata('success')){ ?>
                                <div class="col-lg-12">
                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong> <?php echo $this->session->flashdata('success');?></strong>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- /.MENU FORUM SAJIB -->
                            <div class="col-md-12">
                                <div class="box box-default ">
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
                            <?php if(!empty($allmycomments)){ ?>
                            <div class="col-lg-12">
                                <div class="box box-default ">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Comment List</h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <div id="no-more-tables">
                                    <table class="table table-hover" id="js_personal_table">
                                    <thead>
                                    <tr>
                                        <th class="numeric">#</th>
                                        <th class="numeric">Comments Title</th>
                                        <th class="numeric">Comments Details</th>
                                        <th class="numeric">Date</th>
                                        <th class="numeric">Comments Edit</th>
                                        <th class="numeric">Comments Delete</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($allmycomments as $row){?>
                                            <tr>
                                                <td data-title="#" class="numeric"><?php echo $i; ?></td>
                                                <td data-title="Comments Title" class="numeric"><?php echo $row->comments_title; ?></td>
                                                <td data-title="Comments Details" class="numeric">
                                                    <?php echo $row->comments_details; ?>
                                                </td>
                                                <td data-title="Date" class="numeric">  <?php echo date('d-m-Y', strtotime($row->added_date_time)); ?></td>
                                                <td data-title="Comments Edit" class="numeric">
                                                    <a href="<?php echo base_url('forum/editComment/'.$row->comment_id);?>" type="button" class="btn btn-block btn-primary">
                                                        Edit
                                                    </a>
                                                </td>
                                                <td data-title="Comments Delete" class="numeric">
                                                    <a href="<?php echo base_url('forum/forum/deleteComment/'.$row->comment_id);?>" type="button" class="btn btn-block btn-danger">
                                                        Delete
                                                    </a>
                                                </td>
                                        </tr>
                                    <?php
                                    $i++;
                                    }?>

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
                                        <strong> No comment found <i class="fa fa-info"></i> </strong>
                                    </div>
                                </div>
                            <?php }?>





                    </div>

            </section></div>

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