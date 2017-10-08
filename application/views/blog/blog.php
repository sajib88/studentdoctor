<main class="main-wrapper">
<section class="content-wrapper">
		<div class="container">
			<div class="row">

                <div class="sidebar col-md-4 pull-right">
                    <!-- Widget - Recent posts -->
                    <div class="recentpostList">
                        <h3>Recent Posts</h3>
                        <ul>
                            <?php foreach ($recent_post as $row){?>
                                <li>
                                    <img src="<?php echo base_url('assets/file/blog/'.$row->primary_image);?>" class="img-responsive recentpostimg">
                                    <a href="<?php echo base_url('blog/Postlist/singlepost/' . $row->id); ?>"><?php echo $row->title; ?></a>
                                    <span class="pull-right"><?php echo $row->date; ?></span>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="post-cat">
                        <h3>Post Category</h3>
                        <ul>
                            <?php foreach ($blog_category as $row){?>
                                <li>
                                    <a href="#"><?php echo $row->cat_type; ?></a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>

                </div>

				<!-- Content -->
				<div class="content col-md-8">
						<div class="single-post single">
						<div class="single-post-image">
							<img class="img-responsive" width="100%" src="<?php echo base_url() . 'assets/file/blog/' .$single_post['primary_image']; ?>" alt="">
						</div>
						<ul class="post-meta">
							<li><span>Added:</span><?php echo date("d-m-Y", strtotime($single_post['date']));?></li>
							<li><span>Author:</span>Admin</li>
							<li><span>Tags:</span><?php echo $single_post['tag'];?></a></li>
						</ul>
						<div class="post-content">
							<h1><?php echo $single_post['title']; ?></h1>
							<p class="lead"><?php echo $single_post['description']; ?></p>
						</div>
					</div>
				</div>

				<!-- Sidebar -->


			</div>
		</div>

	</section>
</main>