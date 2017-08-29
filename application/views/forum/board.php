
<link href="<?php echo base_url('assets/datatable/dataTables.bootstrap.css');?>" rel="stylesheet">

<div class="content-wrapper">

    <section class="content-header">
        <h1>
           FORUM
            <small>Board</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">FORUM</a></li>
            <li class="active">Board</li>
        </ol>
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



                    <div class="col-md-3 text-center">
                        <a  href="<?php echo base_url('forum/forum/index'); ?>" class="btn "><i class="fa fa-home"></i> Forum Home</a>

                    </div>




                    <div class="col-md-3 text-center">
                        <a data-toggle="modal" href="<?php echo base_url('forum/forum/addcat'); ?>" class="btn "><i class="fa fa-plus"></i> Add New Category</a>

                    </div>


                    <div class="col-md-3 text-center">
                        <a  href="<?php echo base_url('forum/forum/allmypostlist'); ?>" class="btn "><i class="fa fa-list"></i> All My Post</a>

                    </div>


                    <div class="col-md-3 text-center">
                        <a  href="<?php echo base_url('forum/forum/allmycomments'); ?>" class="btn"><i class="fa fa-user"></i> My Comments Post</a>

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
                  <th>TOPIC</th>
                  <th style="width: 100px">Posts Total</th>
                  <th style="width: 140px">Last post Date </th>
                </tr>

                <?php
                foreach ($social as $row) {
                    ?>

                    <tr>
                        <td><i class="fa fa-fw fa-bell-o"></i></td>
                        <td><a href="<?php echo base_url('Forum/forum/listcat/' . $row->cat_id); ?>">  <?php echo $row->cat_title; ?></a></td>
                        <td>
                            <?php echo $row->total_post; ?>
                        </td>
                        <td><?php echo $row->added_date_time; ?></td>
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
          <div class="box box-default box-solid">
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
                  <th>TOPIC</th>
                  <th style="width: 100px">Posts Total</th>
                  <th style="width: 140px">Last post Date </th>
                </tr>
                <?php
                foreach ($allprof as $row) {
                ?>
                    <tr>
                        <td><i class="fa fa-fw fa-bell-o"></i></td>
                        <td><a href="<?php echo base_url('Forum/forum/listcat/' . $row->cat_id); ?>">  <?php echo $row->cat_title; ?></a></td>
                        <td>
                            <?php echo $row->total_post; ?>
                        </td>
                        <td><?php echo $row->added_date_time; ?></td>
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
                                <th>TOPIC</th>
                                <th style="width: 100px">Posts Total</th>
                                <th style="width: 140px">Last post Date </th>
                            </tr>
                            <?php
                            foreach ($dynamicprofession as $row) {
                                ?>
                                <tr>
                                    <td><i class="fa fa-fw fa-bell-o"></i></td>
                                    <td><a href="<?php echo base_url('Forum/forum/listcat/' . $row->cat_id); ?>">  <?php echo $row->cat_title; ?></a></td>
                                    <td>
                                        <?php echo $row->total_post; ?>
                                    </td>
                                    <td><?php echo $row->added_date_time; ?></td>
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
