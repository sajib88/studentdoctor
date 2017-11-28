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
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <i class="fa fa-angle-down"></i></a>
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


