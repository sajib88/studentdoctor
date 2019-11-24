

<div class="container">
    <div class="page-header">
        <h4>Patient Login / Sign Up<span class="pull-right label label-default">:)</span></h4>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-success">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1primary" data-toggle="tab">Patient Sign Up</a></li>
                        <li><a href="#tab2primary" data-toggle="tab">Patient Login </a></li>


                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">


                            <!-- registration-->
                            <section class="content-wrapper">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 pdl">
                                            <div class="tab-wrapper row">
                                                <!--container start-->
                                                <div class="registration-bg">
                                                    <div class="advertise_div col-md-4">



                                                    </div>

                                                    <div class="container col-md-4">
                                                        <?php
                                                        if (!empty($error)) {
                                                            showErrorMessage($error);
                                                        } else {
                                                            if ($this->session->flashdata('success')) {
                                                                showSuccessMessage();
                                                            }
                                                        }
                                                        ?>

                                                        <?php if(!empty($this->session->flashdata('msg'))){
                                                            echo $this->session->flashdata('msg');
                                                        }?>

                                                        <form class="form-signin wow fadeInUp" action="<?php echo base_url('home/patient'); ?>" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" class="form-control"   name="doctor-login"  value="2">

                                                            <div class="login-wrap">

                                                                <!-- <div class="form-group mb-10">
                                                                     <h4>Registration</h4>
                                                                 </div>-->

                                                                <div class="form-group mb-10">
                                                                    <h4>Patient Quick Registration</h4>
                                                                </div>




                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email address</label>
                                                                    <input required type="email" name="pat_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                                                                </div>

                                                                <div class="form-group mb-10">
                                                                    <label for="exampleInputEmail1">Password</label>
                                                                    <input  required="" type="password" name="pat_password" class="form-control" placeholder="Password" autofocus="">
                                                                </div>

                                                                <div class="form-group mb-10">
                                                                    <label for="exampleInputEmail1">Confirm Password</label>
                                                                    <input   required type="password" name="conf" class="form-control" placeholder="Confirm Password" autofocus="">
                                                                </div>

                                                                <!--<div class="form-group mb-10">
                                                                    <div required="" class="g-recaptcha" data-sitekey="6Ld7p3YUAAAAAOYW5_UnkSLqyUZAzAgSe0Z7A8x3" autofocus=""></div>
                                                                </div>-->


                                                                <div class="form-group mb-10">

                                                                    <input required="" type="checkbox" value="agree this condition"> I agree to the <a href="<?php echo base_url('home/terms');?>">Terms & Conditions </a> and
                                                                    <a href="<?php echo base_url('home/privacy');?>">Privacy Policy </a>

                                                                </div>
                                                                <div class="form-group mb-10">
                                                                    <input type="submit" name="submit" class="btn btn-info btn-yellow btn-block" value="Sign Up">
                                                                </div>

                                                            </div>
                                                        </form>

                                                    </div>

                                                    <div class="advertise_div col-md-4">



                                                    </div>
                                                </div>
                                                <!--container end-->



                                            </div>
                                        </div>

                                    </div>
                                </div><!--container-->
                            </section>
                            <!-- registration-->

                        </div>
                        <div class="tab-pane fade" id="tab2primary">
                            <!-- LOGIN-->
                            <main class="main-wrapper">
                                <section class="content-wrapper">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 pdl">
                                                <div class="tab-wrapper row">

                                                    <!--container start-->
                                                    <?php
                                                    if (!empty($error)) {
                                                        showErrorMessage($error);
                                                    } else {
                                                        if ($this->session->flashdata('success')) {
                                                            showSuccessMessage();
                                                        }
                                                    }
                                                    ?>


                                                    <div class="login-bg">
                                                        <div class="container col-md-4 col-md-offset-4">
                                                            <?php if(!empty($this->session->flashdata('msg'))){
                                                                echo $this->session->flashdata('msg');
                                                            }?>

                                                            <div class="form-wrapper">
                                                                <form class="form-signin wow fadeInUp" method="post" action="<?php echo base_url('home/patient'); ?>" role="form">
                                                                    <input type="hidden" class="form-control"   name="doctor-login"  value="1">
                                                                    <div class="login-wrap">
                                                                        <fieldset>
                                                                            <div class="form-group mb-10">
                                                                                <label for="login">Email or Username</label>
                                                                                <input type="text" class="form-control" name="email" type="email" placeholder="Email  / User Name" autofocus>

                                                                            </div>

                                                                            <div class="form-group mb-10">
                                                                                <label for="login">Password</label>
                                                                                <input type="password" class="form-control pwd"   name="password" placeholder="Password" type="password" value="">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-default reveal" type="button">Hide/ Show Password <i class="glyphicon glyphicon-eye-open"></i></button>
                                                                                  </span>
                                                                            </div>



                                                                            <div class="form-group mb-10 pull-right">

                                                                                <input type="checkbox" value="remember-me"> Remember me
                                                                            </div>
                                                                            <div class=" form-group mb-10 pull-left">
                                                                                <a data-toggle="modal" href="<?php echo base_url('home/forgotpassword'); ?>"> Forgot Password?</a>

                                                                            </div>


                                                                            <input type="submit" class="btn btn-mid btn-primary btn-block" name="submit" value="Login" >

                                                                        </fieldset>

                                                                        <br>





                                                                        <div class="registration form-group mb-10 ">
                                                                            Don't have an account yet?
                                                                            <a class="" href="<?php echo base_url('home/patient'); ?>">
                                                                                Create an account
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                </form>


                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!--container end-->



                                                </div>
                                            </div>

                                        </div>
                                    </div><!--container-->
                                </section>

                            </main>
                            <!-- LOGIN-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(".reveal").on('click',function() {
        var $pwd = $(".pwd");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });
</script>



<style>

    .panel.with-nav-tabs .panel-heading{
        padding: 5px 5px 0 5px;
    }
    .panel.with-nav-tabs .nav-tabs{
        border-bottom: none;
    }
    .panel.with-nav-tabs .nav-justified{
        margin-bottom: -1px;
    }
    /********************************************************************/
    /*** PANEL DEFAULT ***/
    .with-nav-tabs.panel-default .nav-tabs > li > a,
    .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
        color: #777;
    }
    .with-nav-tabs.panel-default .nav-tabs > .open > a,
    .with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
        color: #777;
        background-color: #ddd;
        border-color: transparent;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.active > a,
    .with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
        color: #555;
        background-color: #fff;
        border-color: #ddd;
        border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
        background-color: #f5f5f5;
        border-color: #ddd;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
        color: #777;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
        background-color: #ddd;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
        color: #fff;
        background-color: #555;
    }
    /********************************************************************/
    /*** PANEL PRIMARY ***/
    .with-nav-tabs.panel-primary .nav-tabs > li > a,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
        color: #fff;
    }
    .with-nav-tabs.panel-primary .nav-tabs > .open > a,
    .with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
        color: #fff;
        background-color: #3071a9;
        border-color: transparent;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.active > a,
    .with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
        color: #428bca;
        background-color: #fff;
        border-color: #428bca;
        border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
        background-color: #428bca;
        border-color: #3071a9;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
        color: #fff;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
        background-color: #3071a9;
    }
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
        background-color: #4a9fe9;
    }
    /********************************************************************/
    /*** PANEL SUCCESS ***/
    .with-nav-tabs.panel-success .nav-tabs > li > a,
    .with-nav-tabs.panel-success .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > li > a:focus {
        color: #3c763d;
    }
    .with-nav-tabs.panel-success .nav-tabs > .open > a,
    .with-nav-tabs.panel-success .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-success .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > li > a:focus {
        color: #3c763d;
        background-color: #d6e9c6;
        border-color: transparent;
    }
    .with-nav-tabs.panel-success .nav-tabs > li.active > a,
    .with-nav-tabs.panel-success .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > li.active > a:focus {
        color: #3c763d;
        background-color: #fff;
        border-color: #d6e9c6;
        border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu {
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a {
        color: #3c763d;
    }
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
        background-color: #d6e9c6;
    }
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
        color: #fff;
        background-color: #3c763d;
    }
    /********************************************************************/
    /*** PANEL INFO ***/
    .with-nav-tabs.panel-info .nav-tabs > li > a,
    .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
        color: #31708f;
    }
    .with-nav-tabs.panel-info .nav-tabs > .open > a,
    .with-nav-tabs.panel-info .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
        color: #31708f;
        background-color: #bce8f1;
        border-color: transparent;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.active > a,
    .with-nav-tabs.panel-info .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li.active > a:focus {
        color: #31708f;
        background-color: #fff;
        border-color: #bce8f1;
        border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu {
        background-color: #d9edf7;
        border-color: #bce8f1;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a {
        color: #31708f;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
        background-color: #bce8f1;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
        color: #fff;
        background-color: #31708f;
    }
    /********************************************************************/
    /*** PANEL WARNING ***/
    .with-nav-tabs.panel-warning .nav-tabs > li > a,
    .with-nav-tabs.panel-warning .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > li > a:focus {
        color: #8a6d3b;
    }
    .with-nav-tabs.panel-warning .nav-tabs > .open > a,
    .with-nav-tabs.panel-warning .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-warning .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > li > a:focus {
        color: #8a6d3b;
        background-color: #faebcc;
        border-color: transparent;
    }
    .with-nav-tabs.panel-warning .nav-tabs > li.active > a,
    .with-nav-tabs.panel-warning .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > li.active > a:focus {
        color: #8a6d3b;
        background-color: #fff;
        border-color: #faebcc;
        border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu {
        background-color: #fcf8e3;
        border-color: #faebcc;
    }
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a {
        color: #8a6d3b;
    }
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
        background-color: #faebcc;
    }
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
        color: #fff;
        background-color: #8a6d3b;
    }
    /********************************************************************/
    /*** PANEL DANGER ***/
    .with-nav-tabs.panel-danger .nav-tabs > li > a,
    .with-nav-tabs.panel-danger .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > li > a:focus {
        color: #a94442;
    }
    .with-nav-tabs.panel-danger .nav-tabs > .open > a,
    .with-nav-tabs.panel-danger .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-danger .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > li > a:focus {
        color: #a94442;
        background-color: #ebccd1;
        border-color: transparent;
    }
    .with-nav-tabs.panel-danger .nav-tabs > li.active > a,
    .with-nav-tabs.panel-danger .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > li.active > a:focus {
        color: #a94442;
        background-color: #fff;
        border-color: #ebccd1;
        border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu {
        background-color: #f2dede; /* bg color */
        border-color: #ebccd1; /* border color */
    }
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a {
        color: #a94442; /* normal text color */
    }
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
        background-color: #ebccd1; /* hover bg color */
    }
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
        color: #fff; /* active text color */
        background-color: #a94442; /* active bg color */
    }

</style>