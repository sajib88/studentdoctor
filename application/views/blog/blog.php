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
                    <div class="single-post single" itemscope itemtype="http://schema.org/NewsArticle">
                        <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization" style='display:none;'>
                            <meta itemprop="name" content="AllStudentDoctors.com"/>
                            <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                                <img itemprop="url" src="http://student.advertbd.com/comp/img/logo.png"/>
                                <meta itemprop="width" content="140"/>
                                <meta itemprop="height" content="45"/>
                            </div>
                        </div>
                        <div class="single-post-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <img itemprop="url" class="img-responsive" width="100%" src="<?php echo base_url() . 'assets/file/blog/' .$single_post['primary_image']; ?>" alt="">
                            <meta itemprop="width" content="100%"/>
                            <meta itemprop="height" content="auto"/>
                        </div>
                        <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="http://student.advertbd.com/blog"/>
                        <ul class="post-meta">
                            <li><span>Added:</span><?php echo date("d-m-Y", strtotime($single_post['date']));?>
                                <meta itemprop="datePublished" content="<?php echo date("d-m-Y", strtotime($single_post['date']));?>"/>
                                <meta itemprop="dateModified" content="<?php echo date("d-m-Y", strtotime($single_post['date']));?>"/>
                            </li>
                            <li itemprop="author" itemscope itemtype="https://schema.org/Person"><span>Author:</span><span itemprop="name">Admin</span></li>
                            <li><span>Tags:</span><?php echo $single_post['tag'];?></a></li>
                        </ul>
                        <div class="post-content">
                            <h1 itemprop="headline"><?php echo $single_post['title']; ?></h1>
                            <p class="lead" itemprop="description"><?php echo $single_post['description']; ?></p>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
    </section>
</main>