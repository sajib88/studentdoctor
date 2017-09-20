<main class="main-wrapper">
<section class="content-wrapper">
		<div class="container">
			<div class="row">

				<!-- Content -->
				<div class="content col-md-9">
						<div class="post single">
						<div class="post-image">
							<img height="600px" width="100%" src="<?php echo base_url() . 'assets/file/blog/' .$single_post['primary_image']; ?>" alt="">
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
				<div class="sidebar col-md-3">
					<!-- Widget - Recent posts -->
					<div class="widget widget-recent-posts">
						<h6 class="text-uppercase text-muted">Recent Posts</h6>
                        <ul class="list-posts">
                            <?php //print_r($recent_post);die; ?>
                            <?php if(!empty($recent_post)) {

                                foreach ($recent_post as $row)
                                { ?>
                                    <li>
                                        <a href="<?php echo base_url('blog/Postlist/singlepost/' . $row->id); ?>"><?php echo $row->title?></a>
                                        <span class="date"><?php echo date("d-m-Y", strtotime($row->date)); ?></span>
                                    </li>
                                <?php }

                            }?>

                        </ul>
					</div>

				</div>

			</div>
		</div>

	</section>
</main>