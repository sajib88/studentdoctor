<style>
    .blog-h3{
        background: #ffffff;
        margin-bottom: 20px;
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
            <img class="" height="420px" width="100%" src="<?php echo base_url() . 'assets/file/insideblog/' .$single_post['primary_image'] ?>" alt="Photo">
      	<div class="box box-widget">


        <!-- /.box-header -->
        <div class="box-body">

            <div class="box-header with-border blog-h3 no-padding">
                <div class="user-block">

                    <h3 class="Title"><a href="#"><?php echo $single_post['title']; ?></a></h3>
                    <span class="Publish Date">Shared publicly <?php echo date("d-m-Y", strtotime($single_post['date'])); ?></span>
                </div>
            </div>
          <p><?php echo $single_post['description'];?></p>
            <a class="btn btn-md bg-blue pull-right" href="<?php echo base_url('insideblog/all'); ?>"><i class="fa fa-share"></i> Back to postlist</a>

        </div>
        <!-- /.box-body -->
            <div class="box-footer box-comments">
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
                    <img class="img-circle img-sm" src="../dist/img/user5-128x128.jpg" alt="User Image">

                    <div class="comment-text">
                      <span class="username">
                        Nora Havisham
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                        The point of using Lorem Ipsum is that it has a more-or-less
                        normal distribution of letters, as opposed to using
                        'Content here, content here', making it look like readable English.
                    </div>
                    <!-- /.comment-text -->
                </div>
                <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
                <form action="#" class="" method="post">
                    <img class="img-responsive img-circle img-sm" width="128" height="128" src="<?php echo base_url() . 'assets/file/' . $user_info['profilepicture']?>" alt="Alt Text">
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
