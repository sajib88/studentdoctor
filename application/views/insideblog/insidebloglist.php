
<link href="http://[::1]/doctorsapp/script-assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />




<div class="content-wrapper">


<section class="content-header">
        <h1>
            Blog
            <small>View All Blog</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Blog</a></li>
            <li class="active">View All Blog</li>
        </ol>
    </section>
    
<section class="content">
    
      <div class="row">
<div class="singl">
	 	<?php 
	 	
        foreach ($allblog as $row){
		?>
        <div class="col-lg-6">
      	<div class="box box-widget">

      

        <div class="box-header with-border">
          <div class="user-block">
            
            <span class="Title"><a href="#"><?php echo substr($row->title,0,20); ?></a></span><br>
            <span class="Publish Date">Shared publicly <?php echo date("d-m-Y", strtotime($row->date)); ?></span>
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
          <img class="" height="340px" width="100%" src="<?php echo base_url() . 'assets/file/insideblog/' .$row->primary_image; ?>" alt="Photo">

          <p><?php echo substr($row->description,0, 200);?>&nbsp&nbsp&nbsp<button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> <a href="<?php echo base_url('insideblog/Insideblog/insideblogsinglepost/' . $row->id); ?>"> Read More</a></button></p>
         
        </div>
        <!-- /.box-body -->
        <div class="box-footer box-comments" style="display: block;">
          <div class="box-comment">
            <!-- User image -->
            <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

            <div class="comment-text">
                  <span class="username">
                    Maria Gonzales
                    <span class="text-muted pull-right">8:03 PM Today</span>
                  </span><!-- /.username -->
              It is a long established fact that a reader will be distracted
              by the readable content of a page when looking at its layout.
            </div>
            <!-- /.comment-text -->
          </div>
          <!-- /.box-comment -->
          <div class="box-comment">
            <!-- User image -->
            <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

            <div class="comment-text">
                  <span class="username">
                    Luna Stark
                    <span class="text-muted pull-right">8:03 PM Today</span>
                  </span><!-- /.username -->
              It is a long established fact that a reader will be distracted
              by the readable content of a page when looking at its layout.
            </div>
            <!-- /.comment-text -->
          </div>
          <!-- /.box-comment -->
        </div>
        <!-- /.box-footer -->
        <div class="box-footer" style="display: block;">
          <form action="#" method="post">
            <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
            <!-- .img-push is used to add margin to elements next to floating images -->
            <div class="img-push">
              <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
            </div>
          </form>
        </div>
        <!-- /.box-footer -->
          
     </div>
    </div>
    
        <?php 
}

        ?>
            
      <!-- /.box -->
     </div>

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
    </style>