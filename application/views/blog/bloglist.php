<div id="page-title" class="page-title page-title-1 bg-secondary dark">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1><i class="ti-layout-menu"></i>Blog</h1>
            </div>
            <div class="col-md-5">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('home');?>">Home Page</a></li>
                    <li class="active">Blog List</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div id="content">
<section>

		<div class="container">
			<div class="row">

			<div class="content col-lg-9 col-md-9">
				<?php if(count($allblog)<=0){?>
					<div class="alert alert-info">No Blogs</div>
				 <?php }else{?>

				 	<?php if(!empty($allblog)) {

	                    foreach ($allblog as $row)
	                  	 { ?>

							<!-- Content -->
								<div class="content col-lg-9 col-md-9">
									<!-- Post -->
									<div class="post">
										<div class="post-image">
											<img src="<?php echo base_url() . 'assets/file/blog/' .$row->primary_image; ?>" alt="">
										</div>
										<ul class="post-meta">
											<li><span>Added:</span><?php echo date("d-m-Y", strtotime($row->date)); ?></li>
											<li><span>Author:</span><a href="#">Admin</a></li>
											<li><span>Tags:</span><a href="#"><?php echo $row->tag;?></a>, <a href="#"></a></li>
										</ul>
										<div class="post-content">
											<h2><?php echo $row->title; ?></h2>
											<div class="two-line-div">
											<p class="lead line-clamp line-clamp-2 two-line-div"><?php echo $shortdes=$row->description; ?>
											</p>
											</div>
											<a href="<?php echo base_url('blog/Postlist/singlepost/' . $row->id); ?>" class="btn btn-filled mt-20 btn-info">Read more</a>
										</div>
									</div>
									<!-- Post -->
								</div>
								<?php
							}

						}

					}

			 ?>

			</div>

			<div class="sidebar col-md-3">

					<!-- Widget - Search -->
					<div class="widget widget-search">
						<h6 class="text-uppercase text-muted">Search</h6>
						<form id="search-widget-form" class="validate-form" novalidate="novalidate">
							<div id="js_personal_table_filter" class="form-group inner-button">
								<input type="search" class="form-control input-2 input-sm" required="" placeholder aria-required="js_personal_table">
								<button type="submit"><i class="ti-search"></i></button>
							</div>
						</form>
					</div>


					<!-- Widget - Recent posts -->
					<div class="widget widget-recent-posts">
						<h6 class="text-uppercase text-muted">Recent Posts</h6>
						<ul class="list-posts">
							<li>
								<a href="#">Crazy developer ideas on 2016</a>
								<span class="date">February 14, 2015</span>
							</li>
							<li>
								<a href="#">Our road trip to London!</a>
								<span class="date">February 14, 2015</span>
							</li>
							<li>
								<a href="#">New iOS design concept</a>
								<span class="date">February 14, 2015</span>
							</li>
						</ul>
					</div>

					<!-- Widget - Twitter -->
					<div class="widget widget-twitter">
						<h6 class="text-uppercase text-muted">Latest Tweets</h6>
						<div class="twitter-feed" data-count="2"><span>Loading...</span></div>
					</div>

					<h6 class="text-uppercase text-muted">News Feeds</h6>
				<?php if(count($hello)<=0){?>
					<div class="alert alert-info">No News Feeds</div>
				 <?php }else{?>

				 <?php if(!empty($hello)) {

	                    foreach ($hello as $row)
	                  	 { ?>

		                  	<div class="widget widget-recent-posts">

								<ul class="list-posts">
									<li>
										<a href="<?php echo $row['link'];?>"><?php echo $row['title'];?></a>
										<span class="date"><?php echo $row['pubDate'];?></span>
									</li>
									<li>

										<span class="date"><a href="<?php echo $row['link'];?>"><?php echo $row['link'];?></a></span>
									</li>
									<li>

										<span class="date"><?php echo $row['description'];?></span>
									</li>
								</ul>
							</div>
						<?php
							}
						}
					}
						?>

				</div>


				
			</div>


		</div>

	</section>

</div>



<style type="text/css">
	.post{
		width: 120%;
	}

	

	.two-line-div{
		max-height: 3em;
		overflow: hidden;
	}

	p.lead{
		font-size: 16px;
		margin-bottom: 30px;
		margin-right: 56px;

		/* BOTH of the following are required for text-overflow */
	}

	.line-clamp
	{
		display            : block;
		display            : -webkit-box;
		-webkit-box-orient : vertical;
		position           : relative;

		line-height        : 1.2;
		overflow           : hidden;
		text-overflow      : ellipsis;
		padding            : 0 !important;
	}
	.line-clamp:after
	{
		content    : ' ';
		text-align : right;
		bottom     : 0;
		right      : 0;
		width      : 25%;
		display    : block;
		position   : absolute;
		height     : calc(1em * 1.2);
		/*		background : linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1) 75%);
        */	}
	@supports (-webkit-line-clamp: 1)
	{
		.line-clamp:after
		{
			display : none !important;
		}
	}
	.line-clamp-1
	{
		-webkit-line-clamp : 1;
		height             : calc(1em * 1.2 * 1);
	}
	.line-clamp-2
	{
		-webkit-line-clamp : 2;
		height             : calc(1em * 1.2 * 2);
	}
	.line-clamp-3
	{
		-webkit-line-clamp : 3;
		height             : calc(1em * 1.2 * 3);
	}
	.line-clamp-4
	{
		-webkit-line-clamp : 4;
		height             : calc(1em * 1.2 * 4);
	}
	.line-clamp-5
	{
		-webkit-line-clamp : 5;
		height             : calc(1em * 1.2 * 5);
	}
	/* End required CSS. */


	@media only screen and (max-width: 600px){
		.post{
			width: 100%;
		}

		.two-line-div{
			max-height: 10em;
			overflow: hidden;
		}

	}


</style>
