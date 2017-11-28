<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>AllStudentDoctors | All Doctors & All Student Website  In The World</title>
    <meta name="description" content="All Student Doctors And Doctors In The World. Doctor's And Student Can Join free. Enjoy Loads Of Free Features
Where You Network, Learn and Exhibit Your Accomplishments With Other Doctors and Student Doctors. Free student Forum, blog, Personals, classified, Profile ">
    <meta name="author" content="allstudentDoctors">
    <meta name="Robots" content="index, follow">
    <meta name="keywords" content="All Student doctors, Specialist doctors, Find a physician, Ask doctor, List of doctors, Student Free forum,doctors website,Online doctor,Doctor sites,Online medical doctor,Doctors web,Ask a doctor,Medical answers,Medical help online,Doctor answers,Medical doctor website,Doctor on line,Medical sites for doctors,Health doctor online,See a doctor online,Health doctor website,Doctor visit online,Talk to a doctor,Doctors information website,Online doctor consultation,Doctor questions,ask Medical doctor,Ask doctors questions,Talk to a doctor online,Health advice online,Medical info online,Online medical care,Medical questions online,Medical questions answered,Doctor diagnosis online,Doctor question hotline,Health advice websites,Online medical treatment,speak with a doctor online,Web medical doctor,Doctors in USA,">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/front/img/favicon.png">


    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>/front/img/favicon.png">

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>front/img/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>front/img/favicon_60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>front/img/favicon_76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>front/img/favicon_120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>front/img/favicon_152x152.png">



    <!-- CSS Styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/styles.css" />
     <link rel="stylesheet" href="<?php echo base_url(); ?>front/css/selected.css" />

    <!-- CSS Base -->
    <link id="theme" rel="stylesheet" href="<?php echo base_url(); ?>front/css/themes/theme-bottle.css" />

     <!-- Bootstrap core CSS -->

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,200,300,100,500,600,700' rel='stylesheet' type='text/css'>


 <script type="text/javascript">



        function getComboA(sel) {
            var html = '';
            var value = sel.value;
            var base_url = '<?php echo base_url() ?>';
            var da = {state: value};


            $.getJSON( "<?php echo base_url().'doctor/docController/getState'?>", { state:  value},'jsonp' )
                .done(function( json ) {
                    $('#result').empty();

                    html+='<option value="">Select State</option>';
                    for(var i=0; i<json.length ; i++)
                    {
                        html+='<option value="'+json[i]['name']+'">'+json[i]['name']+'</option>';
                    }
                    $('#result').append(html);
                    $('#result').selectpicker('refresh');
                })
                .fail(function( jqxhr, textStatus, error ) {
                    var err = textStatus + ", " + error;
                    console.log( "Request Failed: " + err );
                });

        }
    </script>

   <style type="text/css">
     #nav-bar a{
        height:57px;
     }

    </style>
</head>

<body class="one-page header-absolute">

<!-- Loader -->
<!-- <div id="page-loader"><svg class="loader-1 loader-primary" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="circle" fill="none" stroke-width="3" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div> -->
<!-- Loader / End -->

<!-- Header -->
<header id="header" class="absolute light">
    <div id="top-bar" class="topbar-bg">
        <div class="container">
            <div class="row">
                <div class="module left">

                    <a href="#" class="icon icon-circle icon-facebook icon-xs cust-icon"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="icon icon-circle icon-twitter icon-xs cust-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="icon icon-circle icon-google-plus icon-xs cust-icon"><i class="fa fa-google-plus"></i></a>

                    <div class="module left visible-xs visible-sm mr-10 ml-10">
                         <ul class="list-inline">
                            <li><i class="i-before ti-email text-light "></i><span class="text-muted text-orange">info@forstudentdoctors.com</span></li>
                     </ul>
                    </div>

                </div>
                <div class="module right">
                    <div class="module left">
                        <ul class="list-inline">
                            <li><i class="i-before ti-user text-light"></i><span class="text-muted text-orange mr-100">We Help Student Doctors Network Building</span></li>
                            <li><i class="i-before ti-email text-light "></i><span class="text-muted text-pal">info@forstudentdoctors.com</span></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
	<!-- Navigation Bar -->
	  <div id="nav-bar">

        <div class="container">
            <!-- Logo -->
            <a class="logo-wrapper" href="<?php echo base_url(); ?>">
                <img class="logo logo-dark" src="<?php echo base_url(); ?>front/img/forstudentdoctors.png" alt="forstudentdoctors">
            </a>

            <nav class="module-group right">

                <!-- Primary Menu -->
                <div class="module menu left menu-padding">
                    <ul id="nav-primary" class="nav nav-primary">
                        <li>
                            <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-home fa-lg"></i>Home</a></i>
                        </li>
                        <li>
                            <li><a href="<?php echo base_url('home/about_us'); ?>"><i class="fa fa-book fa-lg text-success"></i>About US</a></li>
                        </li>
                        <li>
                            <li><a href="<?php echo base_url('blog/Postlist'); ?>"> <i class="fa fa-comments-o fa-lg text-warning"></i>Blog</a></li>
                        </li>
                        <li>
                            <li><a href="<?php echo base_url('home/feature'); ?>"><i class="fa fa-briefcase fa-lg text-primary"></i> Features</a></li>
                        </li>
                        <li>
                            <li><a href="<?php echo base_url('home/contact'); ?>"><i class="fa fa-envelope fa-lg text-info"></i> Contact</a></li>
                        </li>
                        <li>
                            <li class="hidden-xs"><a title="Sign in" href="<?php echo base_url('home/login'); ?>"><span class=""><i class="fa fa-lock fa-2x pr-10 pt-20" style="color: #ad57e1;"></i></span></a></li>
                        </li>

                        <li>
                            <li class="hidden-xs"><a title="Sign up" href="<?php echo base_url('home/registration'); ?>"><span class=""><i class="fa fa-user-plus fa-2x pt-20" style="color: #8ac04b;"></i></span></a></li>
                        </li>

                    </ul>
                </div>

                <div class="module visible-xs visible-sm">
                <a title="Sign in" href="<?php echo base_url('home/login'); ?>"><span class="mr-20"><i class="fa fa-lock fa-2x " style="color: #ad57e1;"></i></span></a>
                &nbsp;
                <a title="Sign up" href="<?php echo base_url('home/registration'); ?>"><span class=""><i class="fa fa-user-plus fa-2x pt-20" style="color: #8ac04b;"></i></span></a>
                </div>

            </nav>



            <!-- Menu Toggle -->
            <div class="menu-toggle">
                <a href="#" data-toggle="mobile-menu" class="mobile-trigger"><span><span></span></span></a>
            </div>



        </div>



    </div>


	<!-- Notification Bar -->
	<div id="notification-bar"></div>

	<!-- Search Bar -->
	<div id="search-bar">
		<div class="container">
			<form id="search-form">
				<input class="search-bar-input" type="text" placeholder="Search...">
				<button class="search-bar-submit"><i class="ti-search"></i></button>
			</form>
			<a href="#" class="search-bar-close" data-toggle="search-bar"><i class="ti-close"></i></a>
		</div>
	</div>

</header>