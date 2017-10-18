


<div id="content">

	<!-- Section -->
     <?php

            if(!empty($searchData)) {

                foreach ($searchData as $row) {
                    ?>
	<section class="section-xs content-wrapper">
		<div class="container">
			<div class="row v-center-items first-col-title  first-col-title">


                 <div class="thumbnail col-md-3">
                                    <figure>
                                        <img class="group list-group-image doc-img animate attachment-gallery-post-single" src="<?php echo (!empty($row->photo))? base_url().'assets/file/'.$row->photo:'';?><?php echo (empty($row->photo))? base_url().'assets/user-demo.png':'';?>" alt="" />
                                    </figure>
                                </div>


				<div class="col-md-9">

					<div class="row">
                        <div class="col-sm-12">
                        <h2><?php echo (!empty($row->first_name) or (!empty($row->last_name)))?$row->first_name.' '.$row->last_name: '' ?></h2>
                        </div>
                            <div class="col-sm-4">
							<dl class="description-2">
								<dt>Profession</dt>
								<dd><?php echo getProfessionById($row->profession) ?></dd>
								<dt>Specialty</dt>
								<dd><?php echo (!(empty($row->specialty)) ? $row->specialty : '') ?></dd>
							</dl>
						</div>
						<div class="col-sm-4">
							<dl class="description-2">
								<dt>Gender</dt>
								<dd><?php echo (!(empty($row->gender)) ? $row->gender : '') ?></dd>
								<dt>Location</dt>
								<dd><?php echo (!(empty($row->country)) ? countryNameByID($row->country) : '') ?>,
                                            <?php echo (!(empty($row->state)) ? $row->state : '') ?>,
                                            <?php echo (!(empty($row->city)) ? $row->city : '') ?></dd>
							</dl>
						</div>
						<div class="col-sm-4">
							<dl class="description-2">
								<dt>Join Date</dt>
								<dd><?php echo date('F d, Y', strtotime(!(empty($row->created)) ? $row->created : ''));   ?></dd>
							</dl>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4"><a href="#" class="btn btn-primary btn-filled btn-block">Contact Now</a></div>
						<div class="col-sm-4">
                            <a data-toggle="modal" href="#myModal"  class="btn btn-filled btn-warning btn-block">Appointment Booking</a>
                        </div>
					</div>
				</div>
			</div>
		</div>
        
	</section>

                    <section class="section bg-grey ptop-30 bg-primary dark pb-50">
                        <div class="container">
                            <div class="row first-col-title">
                                <div class="col-md-4 text-left">
                                    <h3 class="text-uppercase mb-40">Appointment Time</h3>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="event">
                                                <h5 class="mb-0">Start  Day &amp; Time</h5>
                                                <div class="date"><?php echo !(empty($row->appointment_start_day))?$row->appointment_start_day.' - ' : ''; ?>  <?php echo (!(empty($row->start_time)) ? $row->start_time : '') ?></div>


                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="event">
                                                <h5 class="mb-0">End  Date &amp; Time</h5>
                                                <div class="date"><?php echo !(empty($row->appointment_end_day))? $row->appointment_end_day.' - ' : ''; ?> <?php echo (!(empty($row->end_time)) ? $row->end_time : '') ?></div>


                                            </div>
                                        </div>
                                    </div>
                                    <hr class="sep-line mb-40 hidden-xs">

                                    <div class="ptop-30"></div>
                                </div>

                            </div>
                        </div>
                    </section>


    
    






                    <!-- Modal -->
                    <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Appointment Booking</h4>
                                </div>

                                <form id="app-email-form" method="post">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-sm-6">
                                                    <div class="event">
                                                        <h5 class="mb-0">Start Day &amp; Time</h5>
                                                        <div class="date"><?php echo !(empty($row->appointment_start_day))?$row->appointment_start_day.' - ' : ''; ?> <?php echo (!(empty($row->start_time)) ? $row->start_time : '') ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="event">
                                                        <h5 class="mb-0">End  Day &amp; Time</h5>
                                                        <div class="date"><?php echo !(empty($row->appointment_end_day))? $row->appointment_end_day.' - ' : ''; ?> - <?php echo (!(empty($row->end_time)) ? $row->end_time : '') ?></div>
                                                    </div>
                                                </div>
                                            </div>



                                                <div class="col-md-12 ptop-10">
                                                    <div class="col-md-12 mb-10">
                                                        <label for="login">Full Name:</label>
                                                        <input id="login" name="appointment_name" placeholder="First & Last name" class="form-control input-2" type="text">
                                                    </div>

                                                    <div class="col-md-12 mb-10">
                                                        <label for="login">Contact Email:</label>
                                                        <input id="email" name="email" placeholder="Email ID" class="form-control input-2" type="text">
                                                    </div>
                                                    <div class="col-md-12 mb-10">
                                                        <label for="login">Contact Number:</label>
                                                        <input id="phone" name="phone" placeholder="Phone number" class="form-control input-2" type="text">
                                                    </div>
                                                    <div class="col-md-12 mb-10">
                                                        <label for="login">Messege:</label>
                                                        <input id="message" name="message" placeholder="" class="form-control input-2" type="text">
                                                    </div>
                                                </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-danger pull-left" type="button">Cancel</button>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->


            <?php }
            }else{?>
                <div class="alert alert-danger">No Search Result Found </div>
            <?php }?>
<!--     <hr class="sep-line">-->
    
    <!-- Section -->


   
  
    
	<section id="bussiness">
		<div class="container">




            <div class="ptop-30 "></div>

					<div class="row">

                        <div class="col-sm-4">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-stacked mb-30" role="tablist">
								<li class="active"><a href="#description_2" role="tab" data-toggle="tab">Business Information </a></li>
								<li><a href="#additional-info_2" role="tab" data-toggle="tab">Profile Information </a></li>
								<li><a href="#reviews_2" role="tab" data-toggle="tab">Media Files Photos</a></li>
                                <li><a href="#reviews_3" role="tab" data-toggle="tab">Media Files Video</a></li>
                                <li><a href="#reviews_4" role="tab" data-toggle="tab">Media Files Sound</a></li>
                                <li><a href="#reviews_5" role="tab" data-toggle="tab">Media All Documents</a></li>
							</ul>
						</div>

						<div class="col-sm-8">
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active fade in" id="description_2">
									
                                    
                                    <div class="col-md-12">
                                    <!-- Price Table -->
                                    <div class="price-table price-table-1">
                                        <div class="head bg-grey">
                                            <h4>Business Information</h4>

                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li><i class="i-before ti-check text-primary"></i>Business Name : <b><?php echo (!(empty($row->business_name)) ? $row->business_name : '') ?> </b></li>
                                                <li><i class="i-before ti-check text-primary"></i>Business E-mail : <b><?php echo (!(empty($row->business_email)) ? $row->business_email : '') ?> </b></li>
                                                <li><i class="i-before ti-check text-primary"></i>Business Phone : <b> <?php echo (!(empty($row->business_telephone)) ? $row->business_telephone : '') ?></b></li>
                                                <li><i class="i-before ti-check text-primary"></i>Business FAX : <b> <?php echo (!(empty($row->business_fax)) ? $row->business_fax : '') ?></b></li>
                                                <li><i class="i-before ti-check text-primary"></i>Business Country : <b> <?php echo (!(empty($row->country)) ? countryNameByID($row->country) : '')?></b></li>
                                                <li><i class="i-before ti-check text-primary"></i>Business State : <b> <?php echo (!(empty($row->state)) ? $row->state : '') ?></b></li>
                                                <li><i class="i-before ti-check text-primary"></i>Business City : <b> <?php echo (!(empty($row->city)) ? $row->city : '') ?></b></li>
                                                <li><i class="i-before ti-check text-primary"></i>Business Address  : <b> <?php echo (!(empty($row->address_1)) ? $row->address_1 : '') ?></b></li>
                                            </ul>
                                           
                                        </div>
                                    </div>
                                </div>
                                    
                                    
                                    
                                    
								</div>
								<div role="tabpanel" class="tab-pane fade" id="additional-info_2">
								        
                                    <div class="col-md-12">
                                    <!-- Price Table -->
                                    <div class="price-table price-table-1">
                                        <div class="head bg-grey">
                                            <h4>Profile Information</h4>

                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li><i class="i-before ti-check text-primary"></i>First Name : <b><?php echo (!(empty($row->first_name)) ? $row->first_name : '') ?> </b></li>
                                                <li><i class="i-before ti-check text-primary"></i>Last E-mail : <b><?php echo (!(empty($row->last_name)) ? $row->last_name : '') ?> </b></li>
                                                 <li><i class="i-before ti-check text-primary"></i>Profession : <b> <?php echo getProfessionById($row->profession) ?></b></li>
                                                <li><i class="i-before ti-check text-primary"></i>Gender : <b> <?php echo (!(empty($row->gender)) ? $row->gender : '') ?></b></li>
                                                <li><i class="i-before ti-check text-primary"></i>E-mail: <b> <?php echo (!(empty($row->email)) ? $row->email : '') ?></b></li>
                                               
                                            </ul>
                                           
                                        </div>
                                    </div>
                                </div>
                                    
								</div>
                                  <!-- Photo -->
								<div role="tabpanel" class="tab-pane fade" id="reviews_2">
									<p class="lead">
                                     <div class="box-body">

                                        <?php
                                        if (is_array($photos) && !empty($photos))
                                            foreach ($photos as $row) {
                                                {
                                                    ?>
                                                    <img src="<?php echo base_url() . '/assets/file/publicweb/' . $row->name ?>" width="160px;" height="160px">
                                                <?php
                                                }
                                            }
                                        ?>

                                    </div>
                                    </p>
								</div>  
                            <!-- Photo -->
                            
                            <!-- VIDEO -->
                                <div role="tabpanel" class="tab-pane fade" id="reviews_3">
									<p class="lead">
                                     <div class="box-body">

                                        <?php
                                    if (is_array($video)) {
                                        foreach ($video as $row) {
                                        ?>
                                        <div class="box box-info">
                                            <div class="box-header with-border">

                                                <h3 class="box-title"> <i class="fa fa-file-video-o"></i> MEDIA VIDEO</h3>
                                            </div>
                                            <div class="box-body">
                                                <video id="my-video" class="video-js" controls preload="auto" width="340" height="164"
                                                       poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                                                    <source src="<?php echo base_url() . '/assets/file/publicweb/' . $row->name; ?>" type='video/mp4'>
                                                    <source src="<?php echo base_url() . '/assets/file/publicweb/' .  $row->name; ?>" type='video/webm'>
                                                    <p class="vjs-no-js">
                                                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                                                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                                    </p>
                                                </video>

                                            </div>


                                        </div>
                                    <?php }}
                                    ?>

                                    </div>
                                    </p>
								</div>
                          <!-- VIDEO -->
                        
                                  <!-- SOUND -->
                        
                        <div role="tabpanel" class="tab-pane fade" id="reviews_4">
									<p class="lead">
                                     <div class="box-body">

                                         <?php
                                    if (is_array($audio)) {
                                         foreach ($audio as $row) {
                                        ?>
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                               
                                                <h3 class="box-title"> <i class="fa fa-file-sound-o"></i>  Sound/audio</h3>
                                            </div>
                                            <div class="box-body">




                                                <audio src="<?php echo base_url() . 'assets/file/publicweb/' . $row->name; ?>" preload="auto" />





                                            </div>


                                        </div>
                                    <?php }
                                    }
                                    ?>

                                    </div>
                                    </p>
								</div> 
                    <!-- SOUND -->
                    
                    
                    <!-- DOCUMENT -->
                        <div role="tabpanel" class="tab-pane fade" id="reviews_5">
									<p class="lead">
                                     <div class="box-body">

                                        <?php
                                    if (is_array($files)) {

                                        ?>
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                               
                                                <h3 class="box-title"> <i class="fa fa-file-word-o"></i> Document Attachment</h3>
                                            </div>
                                            <div class="box-body btn   btn-yellow btn-filled btn-block">

                                                <?php
                                                if (is_array($files) && !empty($files)) {
                                                    $i = 1;
                                                    foreach ($files as $row) {
                                                        ?>
                                                        <a class="" href="<?php echo base_url() . '/assets/file/publicweb/' . $row->name; ?>">Download File  <?php echo $i; //echo!empty($row->name) ? $row->name : ''   ?></a><br/>
                                                        <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>

                                            </div>


                                        </div>
                                    <?php }
                                    ?>

                                    </div>
                                    </p>
								</div>
                                
                              <!-- DOCUMENT -->
							</div>
						</div>
					</div>

<div class="ptop-30 "></div>
		</div>
	</section>


	


	<!-- Section -->
	

<!-- Section -->



</div>

<div id="footer" class="visible-xs">
    <div class="col-xs-12 navbar-inverse navbar-fixed-bottom">
        <div class="row" id="bottomNav">

            <div class="col-xs-2 text-center"><a href="#description_2" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-briefcase"></i><br></a></div>
            <div class="col-xs-2 text-center"><a href="#additional-info_2" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-user"></i><br></a></div>
            <div class="col-xs-2 text-center"><a href="#reviews_2" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-picture"></i><br></a></div>

            <div class="col-xs-2 text-center"><a href="#reviews_3" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-film"></i><br></a></div>
            <div class="col-xs-2 text-center"><a href="#reviews_4" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-volume-up"></i><br><small></small></a></div>
            <div class="col-xs-2 text-center"><a href="#reviews_5" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-file"></i><br></a></div>
        </div>
    </div>
</div>


<!-- //The Team -->
<!-- THIS css/JS USE ONLY VIDEO PLAYER -->
<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
<!-- THIS css/JS USE ONLY VIDEO PLAYER -->

<!-- THIS css/JS Sound -->
<script src="<?php echo base_url(); ?>script-assets/audiojs/audio.min.js"></script>

<script>
    audiojs.events.ready(function() {
        var as = audiojs.createAll();
    });
</script>
<!-- THIS css/JS Sound -->


<style>




    .nav-stacked li{
        color: #fff;
        cursor: default;
        background-color: #265a88;
        border: 1px solid #ddd;
    }

    .nav-stacked li a{
        color: #fff;

    }

    .nav-tabs > li > a {margin-right:0px;border-radius:0px;}
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover{border:none;}
    .glyphicon { margin-right:5px; }
    .thumbnail
    {
        background: #fff none repeat scroll 0 0;
        border: 1px solid #f0f0f0;
        border-radius: 0;
        margin-bottom: 20px;
        padding: 20px 0 0;
    }
    figure { margin: 1px 1px; text-align: center;}
    .item.list-group-item
    {
        float: none;
        width: 100%;
        background-color: #fff;
        margin-bottom: 10px;
    }
    .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
    {
        background: #428bca;
    }

    .item.list-group-item .list-group-image
    {
        margin-right: 10px;
    }
    .thumbnail img
    {
        height: 263px;
    }
    .item.list-group-item .thumbnail
    {

    }
    .item.list-group-item .caption
    {
        padding: 9px 9px 0px 9px;
    }
    .item.list-group-item:nth-of-type(odd)
    {
        background: #eeeeee;
    }

    .item.list-group-item:before, .item.list-group-item:after
    {
        display: table;
        content: " ";
    }

    .item.list-group-item img
    {
        float: left;
    }
    .item.list-group-item:after
    {
        clear: both;
    }
    .list-group-item-text
    {
        margin: 0 0 11px;
    }




</style>
<?php $userid=$this->uri->segment('4')?>

<!-- JS Libraries -->
<script src="<?php echo base_url(); ?>front/js/jquery-1.12.3.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {

        jQuery('#app-email-form').submit(function(e){
            e.preventDefault();
           // var loadUrl = jQuery('#app-email-form').attr('action');
            var loadUrl = "<?php echo base_url('').'doctor/docController/setAppointment/'.$userid?>";
            var data = jQuery('#app-email-form').serialize();
            //jQuery('.recent-loading').show();
            $('#myModal').modal('toggle');
            jQuery.post(
                loadUrl,
                data,
                function(result){
                    if(result=='success'){
                        console.log('test'+result);
                    }

                },
                'json'
            );

        });

    });

</script>













