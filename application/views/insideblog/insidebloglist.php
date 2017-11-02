
<link href="http://[::1]/doctorsapp/script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />


<style>
    .blog-list-article{
        height: 100px;
        overflow: hidden;
        margin: 10px 0 0 0;
    }
    .blog-list-article a{
        margin-top: 10px;
        width: 100%;
    }
</style>

<div class="content-wrapper">


<section class="content-header">
        <h1><i class="fa fa-square-o"></i>
            All Blog
        </h1>
    </section>

<section class="content">
    
      <div class="row">



          <?php
          if(!empty($allblog)){
          foreach ($allblog as $row){
          ?>

            <a href="<?php echo base_url('insideblog/Insideblog/insideblogsinglepost/' . $row['id']); ?>">
        <div class="col-lg-4">

                <div class="box box-widget">



                <div class="box-header with-border">
                  <div class="user-block">

                    <span class="Title"><a href="#"><?php echo substr($row['title'],0,20); ?></a></span><br>
                    <span class="Publish Date">Shared publicly <?php echo date("m-d-Y", strtotime($row['date'])); ?></span>
                  </div>
                  <!-- /.user-block -->
                  <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                      <i class="fa fa-circle-o"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->

                    <div class="widget-user-header ">
                        <div class="widget-user-image text-center">
                            </br>
                            <img src="<?php echo base_url() . 'assets/file/insideblog/' .$row['primary_image']; ?>" alt="" width="170" height="170" class="blog-image" />
                        </div>
                        </br>
                    </div>
                <div class="box-body" style="display: block;">

                  <div class="blog-list-article">
                      <?php echo substr($row['description'],0, 150);?>

                      </div>

                </div>

                    <div class="box-footer">


                        <a href="<?php echo base_url('insideblog/details/' . $row['id']); ?>" class="btn btn-block btn-dropbox"> Read More</a>
                    </div>
                <!-- /.box-body -->

             </div>

    </div>
            </a>
        <?php 
}

        ?>
            
      <!-- /.box -->

      <?php }else{?>
              <div class="alert alert-warning text-center">No Blogs Found <i class="fa fa-info"></i> </div>
      <?php }?>

</div>
  


    </section>
     
 
    </div>


