
<div class="content-wrapper">


<section class="content-header">
        <h1><i class="fa fa-square-o"></i>
            Blog Details
        </h1>
    </section>
    
<section class="content">
    
      <div class="row">

	 	<div class="col-md-9">
            
        
      	<div class=" box box-widget">

      

        <div class="box-header with-border">
          <div class="user-block">
            
            <span class="Title"><a href="#"><?php echo $single_post['title']; ?></a></span>
            <span class="Publish Date">Shared publicly <?php echo date("d-m-Y", strtotime($single_post['date'])); ?></span>
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
          <img class="pad" width="100%" src="<?php echo base_url() . 'assets/file/insideblog/' .$single_post['primary_image'] ?>" alt="Photo">

          <p><?php echo $single_post['description'];?><button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"><a href="<?php echo base_url('insideblog/Insideblog/insidebloglist/'); ?>">Back to postlist</a></i></button></p>
          <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
          <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
          <span class="pull-right text-muted">127 likes - 3 comments</span>
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
      <!-- /.box -->
     
</div>
    

  


    </section>
     
 
    </div>
