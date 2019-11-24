<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>ForAllDoctors | All Doctors In One Website </title>
    <meta name="description" content="All Student Doctors And Doctors In The World. Doctor's And Student Can Join free. Enjoy Loads Of Free Features
Where You Network, Learn and Exhibit Your Accomplishments With Other Doctors and Student Doctors. Free student Forum, blog, Personals, classified, Profile ">
    <meta name="author" content="allstudentDoctors">
    <meta name="Robots" content="index, follow">
    <meta name="keywords" content="All Student doctors, Specialist doctors, Find a physician, Ask doctor, List of doctors, Student Free forum,doctors website,Online doctor,Doctor sites,Online medical doctor,Doctors web,Ask a doctor,Medical answers,Medical help online,Doctor answers,Medical doctor website,Doctor on line,Medical sites for doctors,Health doctor online,See a doctor online,Health doctor website,Doctor visit online,Talk to a doctor,Doctors information website,Online doctor consultation,Doctor questions,ask Medical doctor,Ask doctors questions,Talk to a doctor online,Health advice online,Medical info online,Online medical care,Medical questions online,Medical questions answered,Doctor diagnosis online,Doctor question hotline,Health advice websites,Online medical treatment,speak with a doctor online,Web medical doctor,Doctors in USA,">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/front/img/favicon.png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/comp/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/comp/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/comp/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/comp/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/comp/css/slick-theme.css">


    <link rel="stylesheet" href="<?php echo base_url(); ?>extra/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>extra/css/header.css">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700">
    <script src="<?php echo base_url(); ?>comp/js/vendor/jquery-1.11.2.min.js"></script>






    <script src="<?php echo base_url(); ?>script-assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>script-assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- jquery validation -->
    <script src="<?php echo base_url(); ?>script-assets/validation/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>script-assets/validation/additional-methods.js"></script>



    <!-- jquery validation -->

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

<style>.error { color:red; font-size: 11px;}</style>

    <script type="text/javascript">

        function getpro(sel) {
            var html = '';
            var value = sel.value;
            var base_url = '<?php echo base_url() ?>';
            var da = {sub_pro: value};


            $.getJSON( "<?php echo base_url().'doctor/docController/sub_pro'?>", { sub_pro:  value},'jsonp' )
                .done(function( json ) {
                    $('#proresult').empty();


                    for(var i=0; i<json.length ; i++)
                    {
                        html+='<option value="'+json[i]['p_id']+'">'+json[i]['p_name']+'</option>';
                    }
                    $('#proresult').append(html);
                    $('#proresult').selectpicker('refresh');
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




<div class="wrapper">
    <!---Header Part-->
    <div class="header-v8 header-sticky">
        <div class="navbar mega-menu" role="navigation">
            <div class="container">
                <div class="res-container">
                   


                    <button id="ChangeToggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <div id="navbar-hamburger">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </div>
                        <div id="navbar-close" class="hidden">
                            <span class="glyphicon glyphicon-remove"></span>
                        </div>
                    </button>
                    <div class="navbar-brand">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>extra/images/logo.png" />
                        </a>
                    </div>
                </div>
                <div class="navbar-collapse navbar-responsive-collapse left collapse">
                    <div class="res-container">
                        <ul class="nav navbar-nav">

                            <?php  $userid= $this->session->userdata('login_id');
                            if(!empty($userid)){ ?>
                            <li class="menu-common doctors">
                                <a href="<?php echo base_url('dashboard'); ?>" class="special-link">Back To Dashboard Panel</a>
                            </li>
                            <?php }
                            else{ ?>



                            <li class="menu-common home">
                                <a href="<?php echo base_url(); ?>" class="special-link">Home</a>
                            </li>


                            <li class="menu-common doctor">
                                <a href="<?php echo base_url('publicsearch'); ?>" class="special-link">Find Your Doctor</a>
                            </li>



                            <li class="menu-common patient">
                                <a href="<?php echo base_url('home/patient'); ?>" class="special-link">Patient Sign Up/ Login </a>

                                <ul class="dropdown dropdown-toggle hidden-lg">
                                    <a href="#" class="special-link2 dropdown-toggle managedropdown" data-toggle="dropdown">
                                        <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <li class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo base_url('home/patient'); ?>">Book appointment</a>
                                        <a class="dropdown-item" href="<?php echo base_url('home/patient'); ?>">Send messages</a>
                                        <a class="dropdown-item" href="<?php echo base_url('home/patient'); ?>">view doctors profile</a>
                                        <a class="dropdown-item" href="<?php echo base_url('home/patient'); ?>">view doctores websittes</a>
                                        <a class="dropdown-item" href="<?php echo base_url('home/patient'); ?>">compare physicians</a>
                                        <a class="dropdown-item" href="<?php echo base_url('home/patient'); ?>">get notified within an hour</a>
                                    </li>
                                </ul>

                            </li>

                            <li class="menu-common doctors">
                                <a href="<?php echo base_url('home/doctorpanel'); ?>" class="special-link">Doctor Sign Up/ Login</a>
                                <ul class="dropdown dropdown-toggle hidden-lg">
                                    <a href="#" class="special-link2 dropdown-toggle managedropdown" data-toggle="dropdown">
                                        <i class="fa fa-plus-square fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <li class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo base_url('home/doctorpanel'); ?>">Professional profile</a>
                                        <a class="dropdown-item" href="<?php echo base_url('home/doctorpanel'); ?>">Public website</a>
                                        <a class="dropdown-item" href="<?php echo base_url('home/doctorpanel'); ?>">Exclusive classified</a>
                                        <a class="dropdown-item" href="<?php echo base_url('home/doctorpanel'); ?>">Appointment book</a>
                                        <a class="dropdown-item" href="<?php echo base_url('home/doctorpanel'); ?>">Click to see much more link</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-common email">
                                <a href="<?php echo base_url('home/contact'); ?>" class="special-link">Contact Us</a>
                            </li>



                      <?php
                        }
                        ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---End Header Part-->


</div>


<!---Header Part-->

<!---End Header Part-->
