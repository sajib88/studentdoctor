<section>
		<div class="container">
			<div class="row">

				<!-- Content -->
				<div class="content col-md-9">
					<!-- Post -->
							 	

						<div class="post single">
						<div class="post-image">
							<img height="600px" width="100%" src="<?php echo base_url() . 'assets/file/blog/' .$single_post['primary_image']; ?>" alt="">
						</div>
						<ul class="post-meta">
							<li><span>Added:</span><?php echo date("d-m-Y", strtotime($single_post['date']));?></li>
							<li><span>Author:</span><a href="#">Admin</a></li>
							<li><span>Tags:</span><?php echo $single_post['tag'];?></a></li>
						</ul>
						<div class="post-content">
							<h1><?php echo $single_post['title']; ?></h1>
							<p class="lead"><?php echo $single_post['description']; ?></p>
						</div>
						<hr class="sep-line mt-60 mb-60">
						<div class="post-comments post-module">
							<div class="title">
								<h6 class="text-uppercase text-muted">Comments <span class="badge bg-danger">3</span></h6>
							</div>
							<div class="content">
								<ul class="comments">
									<li>
										<div class="avatar"><img src="assets/img/avatars/avatar01.jpg" alt=""></div>
										<div class="content">
											<span class="details">Jessica Biel on September 20</span>
											<p>Morbi ut faucibus nulla, at fringilla est. Morbi lacinia sagittis purus.</p>
										</div>
										<ul>
											<li>
												<div class="avatar"><img src="assets/img/avatars/avatar02.jpg" alt=""></div>
												<div class="content">
													<span class="details">Jessica Biel on September 20</span>
													<p>Morbi ut faucibus nulla, at fringilla est. Morbi lacinia sagittis purus, nec dapibus felis tempus in. Quisque eget elementum sem, cursus tristique orci. Donec velit nisi, auctor ac pharetra in, maximus eu justo.</p>
												</div>
											</li>
										</ul>
									</li>
									<li>
										<div class="avatar"><img src="assets/img/avatars/avatar03.jpg" alt=""></div>
										<div class="content">
											<span class="details">Jessica Biel on September 20</span>
											<p>Morbi ut faucibus nulla, at fringilla est. Morbi lacinia sagittis purus.</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<hr class="sep-line mt-60 mb-60">
						<div class="post-add-comment post-module">
							<div class="title">
								<h6 class="text-uppercase">Write a comment</h6>
							</div>
							<div class="content">
								<form action="#" id="add-comment" class="validate-form" novalidate="novalidate">
									<div class="row">
										<div class="col-sm-6 form-group">
											<input type="text" class="form-control" placeholder="Name" required="" aria-required="true">
										</div>
										<div class="col-sm-6 form-group">
											<input type="email" class="form-control" placeholder="E-mail" required="" aria-required="true">
										</div>
									</div>
									<div class="form-group">
										<textarea id="comment" cols="30" rows="4" class="form-control" placeholder="Comment" required="" aria-required="true"></textarea>
									</div>
									<button class="btn btn-filled btn-primary">Send a comment</button>
								</form>
							</div>
						</div>
					</div>
					
				</div>

				<!-- Sidebar -->
				<div class="sidebar col-md-3">
					
					<!-- Widget - Search -->
					<div class="widget widget-search">
						<h6 class="text-uppercase text-muted">Search</h6>
						<form id="search-widget-form" class="validate-form" novalidate="novalidate">
							<div class="form-group inner-button">
								<input type="text" class="form-control input-2 input-sm error" required="" aria-required="true" aria-invalid="true">
								<button type="submit"><i class="ti-search"></i></button>
							</div>
						</form>
					</div>

					<!-- Widget - Newsletter -->
				

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

				</div>

			</div>
		</div>

	</section>