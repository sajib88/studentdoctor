<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Student Doctor : all Doctors and Student Network</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/slick-theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>comp/font-awesome/css/font-awesome.min.css">

    <link href="<?php echo base_url(); ?>backend/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Latest compiled and minified JavaScript -->


    <script src="<?php echo base_url(); ?>comp/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <script src="<?php echo base_url(); ?>comp/js/vendor/jquery-1.11.2.min.js"></script>

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
</head>
<body>
<div itemscope itemtype="http://schema.org/WebSite">
    <meta itemprop="name" content="AllStudentDoctors.com"/>
    <meta itemprop="alternateName" content="AllStudentDoctors.com"/>
    <meta itemprop="url" content="http://student.advertbd.com/"/>
</div>
<header class="header-wrapper">
    <nav class="navbar" role="navigation">
        <div class="container">

            <div class="row">
                <div class="col-md-8 pdl pdr">
                    <div class="row">
                        <div class="col-md-4 pdl pdr">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>comp/img/logo.png" class="img-responsive" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-md-8 pdl pdr">
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav primary-nav">
                                    <?php
                                    $loginId = $this->session->userdata('login_id');
                                    if($loginId != 0){
                                    ?>
                                        <li class="dropdown">
                                            <a href="<?php echo base_url();?>profile/dashboard" >Dashboard</a>
                                        </li>
                                    <?php }else{?>
                                    <li class="dropdown">
                                        <a href="<?php echo base_url();?>home/registration" >Sign up</a>
                                    </li>
                                    <li class="dropdown">
                                          <a href="<?php echo base_url();?>home/login" >Login</a>
                                    </li>
                                    <?php }?>

                                    <li class="dropdown hidden-lg hidden-md">
                                        <a href="<?php echo base_url();?>home/getPurpose" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <i class="fa fa-angle-down"></i></a>
                                        <div class="dropdown-menu mega-menu">
                                            <div class="row">

                                                <div class="col-sm-12 entry-single item">

                                                    <ul class="entry-list">
                                                        <li class="active "><a href="<?php echo base_url(); ?>home/about_us">About Us</a></li>
                                                        <li class="active "><a href="<?php echo base_url(); ?>blog">Blog</a></li>
                                                        <li class="active "><a href="<?php echo base_url(); ?>home/feature">Features</a></li>
                                                        <li class="active "><a href="<?php echo base_url(); ?>home/contact">Contact</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </li>


                                </ul>
                            </div><!--/.navbar-collapse -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mobile-nav pdl pdr">
                    <ul class="nav navbar-nav navbar-right secondary-nav">
                        <li class="active hidden-xs"><a href="<?php echo base_url(); ?>home/about_us">About Us</a></li>
                        <li class="active hidden-xs"><a href="<?php echo base_url(); ?>blog">Blog</a></li>
                        <li class="active hidden-xs"><a href="<?php echo base_url(); ?>home/feature">Features</a></li>
                        <li class="active hidden-xs"><a href="<?php echo base_url(); ?>home/contact">Contact</a></li>




                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>  <!--header wrapper-->


