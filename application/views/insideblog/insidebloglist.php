
<link href="http://[::1]/doctorsapp/script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />


<style>
    .blog-list-article{
        height: 100px;
        overflow: hidden;
        margin: 10px 0 0 0;
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
        <div class="col-lg-6">

                <div class="box box-widget">



                <div class="box-header with-border">
                  <div class="user-block">

                    <span class="Title"><a href="#"><?php echo substr($row['title'],0,20); ?></a></span><br>
                    <span class="Publish Date">Shared publicly <?php echo date("d-m-Y", strtotime($row['date'])); ?></span>
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
                <div class="box-body" style="display: block;">
                  <img class="" height="340px" width="100%" src="<?php echo base_url() . 'assets/file/insideblog/' .$row['primary_image']; ?>" alt="Photo">

                  <div class="blog-list-article"><?php echo substr($row['description'],0, 150);?>&nbsp&nbsp&nbsp<button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> <a href="<?php echo base_url('insideblog/Insideblog/insideblogsinglepost/' . $row['id']); ?>"> Read More</a></button></div>

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

    <style type="text/css">
    .singl
    {
        height: 780px;
    }
    @media only screen and (max-width: 500px), screen and (max-height:400px) {
        .singl
        {
            height: 0px;
        }

    }
    @media only screen and (max-width: 500px) {
        .blog-list-article
        {
            height: 100%;
        }
        .box-body img{
            height: 280px;
        }

    }
    </style>