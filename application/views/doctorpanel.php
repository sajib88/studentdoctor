

<div class="container">
    <div class="page-header hidden-xs">
        <h4>Doctor Login / Sign Up<span class="pull-right label label-default">:)</span></h4>
    </div>

    <h6 style="text-transform: capitalize"><a href="#"  data-toggle="modal" data-target="#myModal">click here</a>  to find out what is inside for you such as private and specifis multi media classified or doctors lounge, etc...</h6>
    <div class="row">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1primary" data-toggle="tab">Doctor Sign Up </a></li>
                        <li><a href="#tab2primary" data-toggle="tab">Doctor Login</a></li>


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

                                                        <form class="form-signin wow fadeInUp" action="<?php echo base_url('home/doctorpanel'); ?>" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" class="form-control"   name="doctor-login"  value="2">

                                                            <div class="login-wrap">

                                                                <div class="form-group mb-10">
                                                                    <h4>Doctors Registration</h4>
                                                                </div>

                                                                <div  class="form-group">
                                                                    <p>Select  Your Profession First </p>
                                                                    <select onchange="getpro(this)"  required="required" name="profession" class="form-control">
                                                                        <option value="">Select Profession</option>
                                                                        <option value="8">Doctors (Physician M.D.)</option>
                                                                        <option value="3">Dentist</option>
                                                                        <option value="2">Chiropractor</option>
                                                                        <option value="10">Hospitals</option>
                                                                        <option value="4">Optometrist</option>
                                                                        <option value="7">Pharmacist</option>
                                                                        <option value="9">Podiatrist</option>
                                                                        <option value="11">Veterinarian</option>
                                                                        <option value="6">PhD</option>
                                                                        <option value="14">Lawyer (Attorney)</option>

                                                                    </select>






                                                                </div>

                                                                <div id="pro"></div>
                                                                <div id="phd"></div>
                                                                <div class="form-group mb-10">
                                                                    <input value="First Name"  type="hidden" name="first_name" class="form-control" placeholder="First Name" autofocus="">
                                                                </div>
                                                                <div class="form-group mb-10">
                                                                    <input value="Last Name"  type="hidden" name="last_name" class="form-control" placeholder="Last Name" autofocus="">
                                                                </div>
                                                                <div class="form-group mb-10">
                                                                    <input required  type="email" name="email" class="form-control" placeholder="Your E-mail" autofocus="">
                                                                </div>


                                                                <div class="form-group mb-10">
                                                                    <input  type="text" name="user_name" class="form-control" placeholder="User Name" autofocus="">
                                                                </div>

                                                                <div class="form-group mb-10">
                                                                    <input  required="" type="password" name="password" class="form-control" placeholder="Password" autofocus="">
                                                                </div>

                                                                <div class="form-group mb-10">

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
                                                                <div class="registration">
                                                                    Already Registered?
                                                                    <a class="" href="<?php echo base_url(); ?>home/login">
                                                                        Login Here
                                                                    </a>
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
                                                                <form class="form-signin wow fadeInUp" method="post" action="<?php echo base_url('home/doctorpanel'); ?>" role="form">
                                                                    <input type="hidden" class="form-control"   name="doctor-login"  value="1">
                                                                    <div class="form-group mb-10">
                                                                        <h4>Doctors Login</h4>
                                                                    </div>

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
                                                                            <a class="" href="<?php echo base_url('home/doctorpanel'); ?>">
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
    function getphd(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {pro: value};



        $.ajax({
            type: 'POST',
            url: base_url + "Search/getphdAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#phd").html(resultData);
            }

        });

    }



</script>

<script>

    function getpro(sel) {
        var value = sel.value;
        var base_url = '<?php echo base_url() ?>';
        var da = {pro: value};



        $.ajax({
            type: 'POST',
            url: base_url + "Search/getProByAjax",
            data: da,
            dataType: "text",
            success: function(resultData) {
                $("#pro").html(resultData);
            }

        });

        if(value == 6) {
            var pd = {pro: 48};
            $.ajax({
                type: 'POST',
                url: base_url + "Search/getphdAjax",
                data: pd,
                dataType: "text",
                success: function (resultData) {
                    $("#phd").html(resultData);
                }

            });
        }
        else{
            var pd = {pro: 0};
            $.ajax({
                type: 'POST',
                url: base_url + "Search/getphdAjax",
                data: pd,
                dataType: "text",
                success: function (resultData) {
                    $("#phd").html(resultData);
                }

            });
        }




    }



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


<script>
    function centerModal() {
        $(this).css('display', 'block');
        var $dialog = $(this).find(".modal-dialog");
        var offset = ($(window).height() - $dialog.height()) / 2;
        // Center modal vertically in window
        $dialog.css("margin-top", offset);
    }

    $('.modal').on('show.bs.modal', centerModal);
    $(window).on("resize", function () {
        $('.modal:visible').each(centerModal);
    });
</script>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h6 class="modal-title"> To find out what is inside for you such as private and specifis multi media classified or doctors lounge, etc...</h6>
            </div>

            <div class="modal-body">
                <img src="<?php echo base_url(); ?>/assets/menu-home-page.png" class="img-responsive">
            </div>
        </div>
    </div>
</div>


<!--
<option value="">Business management/administration </option>
<option value="">Communication </option>
<option value="">Computer and information sciences </option>
<option value="">Education </option>
<option value="">Education/Teacher education </option>
<option value="">Education/Teaching fields </option>
<option value="">Engineering </option>
<option value="">Humanities/Foreign languages and literature </option>
<option value="">Humanities/History </option>
<option value="">Humanities/Letters </option>
<option value="">Humanities/Other humanities </option>
<option value="">Life sciences/Agricultural sciences/natural resources </option>
<option value="">Life sciences/Biological/biomedical sciences </option>
<option value="">Life sciences/Health sciences </option>
<option value="">Mathematics </option>
<option value="">Other education </option>
<option value="">Physical sciences/Astronomy </option>
<option value="">Physical sciences/Atmospheric science and meteorology </option>
<option value="">Physical sciences/Chemistry </option>
<option value="">Physical sciences/Geological and Earth sciences </option>
<option value="">Physical sciences/Ocean/marine sciences </option>
<option value="">Physical sciences/Physics </option>
<option value="">Psychology </option>
<option value="">Social sciences </option>
<option value="">Fields not elsewhere classified </option>-->