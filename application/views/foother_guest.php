<div class="advertise_div col-md-12">
    <div class="inner-item">
        <a href="#">
            <img class="center-block img-responsive"  src="<?php echo base_url().'comp/img/leaderboard.gif' ?>" alt="" >
        </a>
    </div>
</div>


<div id="footer" class="visible-xs">
    <div class="col-xs-12 navbar-inverse navbar-fixed-bottom">
        <div class="row" id="bottomNav">
            <?php $loginId = $this->session->userdata('login_id');
                if($loginId != 0){
            ?>
                    <div class="col-xs-6 text-center"><a href="<?php echo base_url(); ?>profile/dashboard" ><i class="glyphicon glyphicon-dashboard"></i>  <small>Dashboard</small> </a></div>
                    <div class="col-xs-6 text-center"><a href="<?php echo base_url(); ?>publicsearch" ><i class="glyphicon glyphicon-zoom-in"></i> <small>Search </small></a></div>
                <?php }else{ ?>
                    <div class="col-xs-4 text-center"><a href="<?php echo base_url(); ?>home/registration" ><i class="glyphicon glyphicon-plus-sign"></i>  <small>Sign Up</small> </a></div>
                    <div class="col-xs-4 text-center"><a href="<?php echo base_url(); ?>home/login" ><i class="glyphicon glyphicon-user"></i> <small>Login</small></a></div>
                    <div class="col-xs-4 text-center"><a href="<?php echo base_url(); ?>publicsearch" ><i class="glyphicon glyphicon-zoom-in"></i> <small>Search </small></a></div>
                <?php } ?>




        </div>
    </div>
</div>
<!--small footer start -->
<footer class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-7 pdl ptop-20">
                <div class="row">
                    <div class="col-sm-4 pdl widget">
                        <ul class="entry-list">
                            <li><a href="<?php echo base_url(); ?>home/about_us">About Us</a></li>
                            <li><a href="<?php echo base_url(); ?>home/about_us">Our Mission</a></li>
                            <li><a href="<?php echo base_url(); ?>home/feature">Our Features</a></li>
                            <li><a href="<?php echo base_url(); ?>blog">Blog</a></li>

                        </ul>
                    </div>
                    <div class="col-sm-4 widget ">
                        <ul class="entry-list">
                            <li><a href="<?php echo base_url(); ?>home/registration">Registration</a></li>
                            <li><a href="<?php echo base_url(); ?>home/login">Login</a></li>
                            <li><a href="<?php echo base_url(); ?>home/forgotpassword">Forgot Password</a></li>
                            <li><a href="#">Support</a></li>

                        </ul>
                    </div>
                    <div class="col-sm-4 widget pdr">
                        <ul class="entry-list">
                            <li><a href="<?php echo base_url(); ?>home/terms">Terms Of Use</a></li>
                            <li><a href="<?php echo base_url(); ?>home/privacy">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url(); ?>home/contact">Contact Us</a></li>
                            <li><a href="<?php echo base_url(); ?>home/disclaimer">Disclaimer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 pdr">
                <div class="newsletter-widget widget">
                    <h3 class="entry-title">Subscribe to latest News from allstudentdoctors.com</h4>
                        <form class="form-inline">
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter Email Address">
                            <button type="submit" class="btn btn-blue">Sign Up Now</button>
                        </form>
                </div>
                <div class="row">
                    <ul class="social-list">
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        <li><a href=""><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <p class="copyright">© 2017 allstudentdoctors.com. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>  <!--footer wrapper-->
<!-- Main jumbotron for a primary marketing message or call to action -->

<script src="<?php echo base_url(); ?>comp/js/vendor/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url(); ?>comp/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>comp/js/slick.min.js"></script>
<script src="<?php echo base_url(); ?>comp/js/main.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>comp/js/text-slider.js"></script>
<script>
    $(document).ready(function () {
        $('.slide').textSlider();
    });
</script>
<script>
    $(function () {
        $('.progress-bar').each(function () {
            var t = $(this);
            var barPercentage = t.data('percentage');

            // add a div for the label text
            t.children('.label').append('<div class="label-text"></div>');

            // add some "gimme" percentage when data-percentage is <2
            if (parseInt((t.data('percentage')), 10) < 2) barPercentage = 2;

            // set up the left/right label flipping
            if (barPercentage > 50) {
                t.children('.label').css("right", (100 - barPercentage) + '%');
                t.children('.label').css("margin-right", "-10px");
            }
            if (barPercentage < 51) {
                t.children('.label').css("left", barPercentage + '%');
                t.children('.label').css("margin-left", "-20px");
            }

            // fill in bars and labels
            t.find('.label-text').text(t.attr('data-percentage') + '%');
            t.children('.bar').animate({
                width: barPercentage + '%'
            }, 500);
            t.children('.label').animate({
                opacity: 1
            }, 1000);
        });
    });

</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        //Date picker
        $('#datepicker2').datepicker({
            autoclose: true
        });
        $('#datepicker').datepicker({
            autoclose: true
        });

    });


</script>



</body>
</html>



