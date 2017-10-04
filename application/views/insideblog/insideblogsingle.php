<style>
    .blog-h3{
        background: #ffffff;
    }
    .clear-fix{
        margin-top: 40px;
    }
    @media only screen and (max-width: 600px) {
        .box-body img
        {
            height: 320px;
            padding: 0;
            margin-bottom: 15px;
        }
</style>

<div class="content-wrapper">


<section class="content">
    
      <div class="row">

	 	<div class="col-md-8 col-md-offset-2">
            <div class="clear-fix hidden-md hidden-lg"></div>
        
      	<div class=" box box-widget pad">

      

        <div class="box-header with-border blog-h3">
          <div class="user-block">
            
            <h3 class="Title"><a href="#"><?php echo $single_post['title']; ?></a></h3>
            <span class="Publish Date">Shared publicly <?php echo date("d-m-Y", strtotime($single_post['date'])); ?></span>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: block;">
          <img class="" height="450px" width="100%" src="<?php echo base_url() . 'assets/file/insideblog/' .$single_post['primary_image'] ?>" alt="Photo">

          <p><?php echo $single_post['description'];?></p>
            <button type="button" class="btn btn-default btn-xs pull-right"><i class="fa fa-share"><a href="<?php echo base_url('insideblog/Insideblog/insidebloglist/'); ?>">Back to postlist</a></i></button type="button">

        </div>
        <!-- /.box-body -->
            <div class="box-footer box-comments" style="display: block; margin-bottom: 20px;">
                <div class="box-comment pad">
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
                <div class="box-comment pad">
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
            <div class="box-footer" style="display: block;">
                <form action="#" class="pad" method="post">
                    <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                    </div>
                </form>
            </div>

        </div>



         </div>   
      <!-- /.box -->
     
</div>
    

  


    </section>
     
 
    </div>
