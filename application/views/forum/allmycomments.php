<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 10-Dec-16
 * Time: 11:35 PM
 */

?>






        <div class="content-wrapper">
            <section class="content-header">

                <h1>
                    All My Comments List
                    <small>Comments List</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Forum </a></li>
                    <li class="active">Comments</li>
                </ol>
            </section>



            <section class="content">
                <!-- /.row -->


                <div class="panel panel-default">
                    <div class="panel-body box box-primary">


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



                                        <div class="col-md-2 text-center">
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
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tbody><tr>
                                        <th style="width: 10px">#</th>
                                        <th>Comments Title</th>
                                        <th>Comments Details</th>
                                        <th style="width: 140px">Date</th>
                                        <th>Comments Edit</th>
                                        <th>Comments Delete</th>

                                    </tr>
                                    <?php if(!empty($allmycomments)){ ?>
                                    <?php foreach ($allmycomments as $row){?><tr>
                                        <td>#</td>
                                        <td><?php echo $row->comments_title; ?></td>
                                        <td>
                                            <?php echo $row->comments_details; ?>
                                        </td>
                                        <td>  <?php echo $row->added_date_time; ?></td>
                                        <td><button type="button" class="btn btn-block btn-primary">Edit</button></td>
                                        <td><button type="button" class="btn btn-block btn-danger">Delete</button></td>
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
        </div>




