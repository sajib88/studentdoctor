
<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h1><i class="glyphicon glyphicon-bullhorn"></i>
           FORUM
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

        <!-- /.MENU FORUM SAJIB -->
            
            
             <!-- /.Orage BOX SAJIB -->
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">All Professions - Social Issues Forums</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                
                <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 100px">ICON</th>
                  <th>Forum Category</th>
                  <th style="width: 100px">Total Posts</th>
                  <th style="width: 140px">Latest Post Date </th>
                </tr>

                <?php
                foreach ($social as $row) {
                    ?>

                    <tr>
                        <td><i class="fa fa-fw fa-bell-o"></i></td>
                        <td><a href="<?php echo base_url('forum/listcat/' . $row->cat_id); ?>">  <?php echo $row->cat_title; ?></a></td>
                        <td>
                            <?php echo $row->total_post; ?>
                        </td>
                        <td><?php echo date('m-d-Y', strtotime($row->added_date_time)); ?></td>
                    </tr>
                <?php
                }
                ?>

                    

                
              </tbody></table>
                
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>    
             <!-- /.Orage BOX SAJIB -->
            
            
            
      <!-- /.Orage BOX SAJIB -->
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"> All Professions Forums</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
                
                
                <table class="table table-striped">
                <tbody><tr>
                    <th style="width: 100px">ICON</th>
                    <th>Forum Category</th>
                    <th style="width: 100px">Total Posts</th>
                    <th style="width: 140px">Latest Post Date </th>
                </tr>
                <?php
                foreach ($allprof as $row) {
                ?>
                    <tr>
                        <td><i class="fa fa-fw fa-bell-o"></i></td>
                        <td><a href="<?php echo base_url('forum/listcat/' . $row->cat_id); ?>">  <?php echo $row->cat_title; ?></a></td>
                        <td>
                            <?php echo $row->total_post; ?>
                        </td>
                        <td><?php echo date('d-m-Y', strtotime($row->added_date_time)); ?></td>
                    </tr>
                <?php
                }
                ?>

                
                
              </tbody></table>
                
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>    
             <!-- /.Orage BOX SAJIB -->


            <!-- /.Orage BOX SAJIB -->
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">  Professions Related Forums</h3>

                        <a data-toggle="modal" href="<?php echo base_url('forum/addCategory'); ?>" class="btn "><i class="fa fa-plus"></i> Add New Category</a>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">



                        <table class="table table-striped">
                            <tbody><tr>
                                <th style="width: 100px">ICON</th>
                                <th>Forum Category</th>
                                <th style="width: 100px">Total Posts</th>
                                <th style="width: 140px">Latest Post Date </th>
                            </tr>
                            <?php
                            foreach ($dynamicprofession as $row) {
                                ?>
                                <tr>
                                    <td><i class="fa fa-fw fa-bell-o"></i></td>
                                    <td><a href="<?php echo base_url('forum/listcat/' . $row->cat_id); ?>">  <?php echo $row->cat_title; ?></a></td>
                                    <td>
                                        <?php echo $row->total_post; ?>
                                    </td>
                                    <td><?php echo date('d-m-Y', strtotime($row->added_date_time)); ?></td>
                                </tr>
                            <?php
                            }
                            ?>



                            </tbody></table>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.Orage BOX SAJIB -->



        </div>
    </section>
</div>



<script type="text/javascript" src="<?php echo base_url('assets/datatable/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatable/dataTables.bootstrap.js');?>"></script>
<!--<script type="text/javascript">
    $(document).ready(function(){
        $('#all-posts').dataTable();
    });
</script>-->
