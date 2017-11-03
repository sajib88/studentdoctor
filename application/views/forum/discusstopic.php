
<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="glyphicon glyphicon-bullhorn"></i>
           Discuss Topic
        </h1>
    </section>
    <section class="content">





        <div class="row">
            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> Comment Reply Successful</strong>
                    </div>
                </div>
            <?php } ?>




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


            <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Discussion <?php
                  $data = get_data('forum_category', array('cat_id' => $postdeatils['cat_id'])); echo $data['cat_title'];

                  ?> Forum</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="pull-left">
                <h4><?php  echo $postdeatils['title']; ?></h4>
                </div>
                <div class="pull-right">
                <a data-toggle="modal" href="#myModal" type="button" class="btn  btn-warning btn-md pull-right"><i class="fa fa-share"></i> Reply To This Topic</a>
                </div>
                </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

           <!-- /.GREEN BOX SAJIB -->




    <div class="col-md-12">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">

                  <h3 class="box-title"> Post Detils</h3>
                 </div>
              <!-- /.user-block -->
              <div class="box-tools">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">






                <table class="table table-bordered">
                    <tbody>
                    <tr>

                        <th style="width: 260px">Author</th>
                        <th>Post Details</th>
                        <th style="width: 100px">Date</th>
                    </tr>
                    <tr>

                        <td>
                            <div class="col-lg-12 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h4><?php
                                            $data = get_data('profession', array('id' => $user_post_info['profession']));
                                            echo $data['name'];
                                            ?></h4>

                                        <p><?php echo $user_post_info['first_name']; ?><?php echo $user_post_info['last_name']; ?></p>
                                    </div>
                                    <div class="icon">
                                        <i class="glyphicon glyphicon-bullhorn"></i>
                                    </div>
                                    <a href="<?php echo base_url('showProfile/'.$postdeatils['author_id']);?>" class="small-box-footer">
                                        Author info <i class="fa fa-arrow-circle-right"></i>
                                    </a>



                                </div>
                            </div>

                        </td>
                        <td>
                            <?php  echo $postdeatils['deatils']; ?>
                        </td>
                        <td><?php echo date('m-d-Y', strtotime($postdeatils['datetime']));?></td>
                    </tr></br>



                    </tbody>
                </table>
                <?php if(!empty($postdeatils['attachment'])) { ?>
                <div class="box-footer ">
                <a class="btn bg-aqua pull-right"  href="<?php echo base_url() . '/assets/file/forum/' .$postdeatils['attachment']; ?>">Attachment</a>
                </div>
                <?php }?>

                <div class="box-footer box-comments">
                    <div class="box-comment">
                <button data-toggle="modal" href="#myModal" type="button" class="btn btn-default btn-dropbox"><i class="fa fa-share"></i> Reply To This Topic
                </button>

                <span class="pull-right text-muted">Total - <?php if(!empty($totalComments)){echo $totalComments.' comments';}else{echo '0 comment';} ;?> </span>
                        </div>
                </div>

            </div>










              <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                  <table class="table table-bordered">
                      <tbody>
                      <?php if (is_array($comments)) {

                          //print_r($comments);
                          foreach ($comments as $row) {
                              ?>
                      <tr>

                          <th style="width: 260px">Comments Profile</th>
                          <th><?php echo $row->comments_title; ?></th>
                          <th >Comments Date Time</th>
                      </tr>

                      <tr>

                          <td>
                              <div class="col-lg-12 col-xs-12">
                                  <!-- small box -->
                                  <div class="small-box bg-yellow">
                                      <div class="inner">
                                          <h4><?php

                                              $data = get_data('users', array('id' => $row->user_id));
                                              echo $data['first_name'];

                                              ?></h4>

                                          <p>
                                              <?php
                                              $data = get_data('users', array('id' => $row->user_id));
                                              echo $data['last_name'];
                                              ?></p>
                                      </div>
                                      <div class="icon">
                                          <i class="glyphicon glyphicon-comment sm"></i>
                                      </div>
                                      <a href="<?php echo base_url('showProfile/'.$row->user_id);?>" class="small-box-footer">
                                          Profile info <i class="fa fa-arrow-circle-right"></i>
                                      </a>
                                  </div>
                              </div>

                          </td>
                          <td>
                              <?php echo $row->comments_details; ?>
                              <?php if(!empty($row->attachment)) { ?>

                              <div class="box-footer ">
                                  <a class="btn bg-aqua pull-right"  href="<?php if(!empty($row->attachment)){echo base_url() . '/assets/file/forum/' .$row->attachment;}?>">Attachment</a>
                              </div>
                              <?php }?>
                          </td>
                          <td><?php echo date('h:i a m-d-Y', strtotime($row->added_date_time));?></td>

                      </tr>

                      <?php
                      } }
                      ?>

                      </tbody>
                  </table>

                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->

                  <?php if($totalComments > 3){
                      ?>

                  <button data-toggle="modal" href="#myModal" type="button" class="btn btn-default btn-dropbox"><i class="fa fa-share"></i> Reply To This Topic
                  </button>
                  <?php }?>

            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>





        </div>
    </section>
</div>






<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Reply This Topic</h4>
            </div>

            <form role="form" method="post" id="post" enctype="multipart/form-data"
                  action="<?php echo base_url('forum/discuss/' . $getid); ?>">
                <input type="hidden" name="totalcomments" value="<?php echo $totalComments; ?>" >


                <div class="modal-body">
                    <input name="postid" value="<?php  echo $getid; ?>" type="hidden" class="form-control">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Commnets Title<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
                            <input name="comments_title" value="" class="form-control" required="">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Commnets Deatils<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>

                            <textarea name="comments_details" value="" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Attachment<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>

                            <input class="btn btn-default" name="attachment" type="file">
                        </div>
                    </div>



                </div>

                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger pull-left" type="button">Cancel</button>
                    <input type="submit" name="submit" class="btn  btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

>
