
<link href="<?php echo base_url('script-assets/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('script-assets/no_more_table.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="glyphicon glyphicon-bullhorn"></i>
           Topic List
        </h1>
    </section>
    <section class="content">






        <div class="row">
            <?php if($this->session->flashdata('message')){ ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> New Forum Post Create Successfully</strong>
                    </div>
                </div>
            <?php } ?>
            <!-- /.GREEN BOX SAJIB -->


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



            <!-- /.Orage BOX SAJIB -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Topic Category : <?php echo $catName['cat_title'];?> </h3>
              <a data-toggle="modal" href="#myModal" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Topic</a>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <?php if(!empty($postdeatils)){ ?>
                <div id="no-more-tables">
                <table class="table table-hover" id="js_personal_table">
                    <thead>
                        <tr>
                          <th class="numeric" >#</th>
                          <th class="numeric"> Topic</th>
                          <th class="numeric"> Author</th>
                          <th class="numeric"> Total Replies</th>
                          <th class="numeric"> Total Views </th>
                          <th class="numeric"> Topic Date Time  </th>
                          <th class="numeric"> Reply  </th>
                            <th class="numeric"> View Post  </th>
                        </tr>
                    </thead>
                    <tbody>
            <?php if (is_array($postdeatils)) {
                $i = 1;
                foreach ($postdeatils as $row) {
                    ?>
                    <tr>
                        <td data-title="#" class="numeric"><?php echo $i;?></td>
                        <td data-title="Topic" class="numeric" > <a class="" href="<?php echo base_url('forum/discuss/' . $row->post_id); ?>">  <?php echo $row->title; ?> </a>    </td>
                        <td data-title="Author" class="numeric">
                            <?php echo getNameById($row->author_id); ?>
                        </td>
                        <td data-title="Replies" class="numeric" ><?php echo $row->reply; ?></td>
                        <td data-title="Views" class="numeric" >
                            <?php echo $row->views; ?>
                        </td>

                        <td data-title="Last post" class="numeric" ><?php echo date('h:i a m-d-Y', strtotime($row->datetime));?></td>
                        <td data-title="Reply" class="numeric" >
                            <a class="btn  btn-primary" href="<?php echo base_url('forum/discuss/' . $row->post_id); ?>">  Reply</a>

                        </td>
                        <td data-title="Reply" class="numeric" >
                            <a class="btn  btn-warning" href="<?php echo base_url('forum/discuss/' . $row->post_id); ?>">  Click To View</a>

                        </td>
                    </tr>
                <?php $i++;
                } }
                ?>

                </tbody></table></div>
                <?php }else{?>
                <div class="col-lg-12">
                  <div class="alert alert-warning text-center">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      No topic found <i class="fa fa-info"></i>
                  </div>
                </div>
                <?php }?>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
             <!-- /.Orage BOX SAJIB -->





        </div>
    </section>
</div>



<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Topic</h4>
            </div>


            <div class="modal-body">
                <form role="form" method="post" id="post" enctype="multipart/form-data"
                      action="<?php echo base_url('forum/listcat/' . $getid); ?>">
                <input name="hiddencat" value="<?php echo $getid; ?>" type="hidden" class="form-control">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Topic Title<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>
                        <input name="title" value="" class="form-control" required="">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Topic Deatils<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>

                        <textarea name="deatils" value="" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Attachment<span class="error">*</span></label><span id="title-error" class="error" for="title"></span>

                        <input class="btn btn-default" name="attachment" type="file">
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
</div>



<script type="text/javascript">


    $(function() {
        $("#post").validate({
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
                    required: "Post title is Required",}
            },

            title: {
                deatils: "Post deatils is Required",}
              }
        });

    });


</script>

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

