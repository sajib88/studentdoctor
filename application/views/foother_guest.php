</div>
<footer class="footer-bs">
    <div class="row">
        <div class="col-md-4 footer-brand animated fadeInLeft">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>extra/images/logo.png" />
            </a>
            <br> <br>

        </div>
        <div class="col-md-4 footer-nav animated fadeInUp">
            <h4>Menu —</h4>
            <div class="col-md-12">
                <ul class="pages">
                    <li> <a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('publicsearch'); ?>" >Find Your Doctor</a></li>
                    <li><a href="<?php echo base_url('home/patient'); ?>">Patient Sign Up/ Login</a></li>
                    <li><a href="<?php echo base_url('home/doctorpanel'); ?>" >Doctors Sign Up/ Login</a></li>
                    <li><a href="<?php echo base_url('home/contact'); ?>">Contact Us</a></li>
                    <li><a href="<?php echo base_url(''); ?>" >Advertiser Join Here</a></li>


                </ul>
            </div>

        </div>
        <div class="col-md-4 footer-social animated fadeInDown">
            <h4>Copyright</h4>
            <p>Copyright © 2010 - 2019 ForAllDoctors.com Patent Pending. All Rights Reserved
                ForAllDoctors.com Application </p>
            <!--<ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">RSS</a></li>
            </ul>-->
        </div>

    </div>
</footer>
</body>
</html>


<style>
    .breadcrumb{
        margin-top: 0px;
        border-radius:0px;
    }
    .captcha{margin:0 auto;
       }

    .captcha label{
        margin-bottom: 20px;
        font-size:22px;
        font-family: 'primelight';
        font-size: 20px;
        line-height: 30px;
        margin-right: 10px;}

    .captcha input[type="text"]{
        height:22px;
        padding:0px 5px;
        font-size: 16px;
        font-family: 'primelight';}
</style>



<!--match Home page modal-->

<!--match Home page  modal-->
<script>

    $('.modalclick').click(function(){
        var base_url = '<?php echo base_url() ?>';
        var prof=$(this).data('prof');
        var sub=$(this).data('sub');
        $.ajax({
            type: 'POST',
            url: base_url + "doctor/DocController/ajax_Search/"+prof+'/'+sub,
            data: $("#search_form").serialize(),
            datatype: "text",
            success: function(viewstml){
                $('#load_search').html(viewstml);
            }
        });
    });
</script>




<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-cog"></i>Search Professional Specialist</h4>
            </div>

            <div id="load_search"></div>

        </div>
    </div>
</div>



<script type="application/javascript">


    $(function(){
        $('#searching').click(function(){
            var base_url = '<?php echo base_url() ?>';
            var id=$(this).data('id');

            $.ajax({
                type: 'POST',
                url: base_url + "doctor/DocController/getproffesional/"+id,
                data: $("#search_form").serialize(),
                datatype: "text",
                success: function(viewstml){
                    $('#loaddoctors').html(viewstml);
                }
            });
        });

    });




    $(function(){
        $('#home-search').click(function(){
            var base_url = '<?php echo base_url() ?>';
            var prof=$(this).data('prof');
            var sub=$(this).data('sub');


            $.ajax({
                type: 'POST',
                url: base_url + "doctor/DocController/ajax_Search/"+prof,
                data: $("#search_form").serialize(),
                datatype: "text",
                success: function(viewstml){
                    $('#load_search').html(viewstml);
                }
            });
        });

    });


</script>




<script src="<?php echo base_url(); ?>script-assets/js/jquery.ebcaptcha.js"></script>

<script type="application/javascript">

    $(function(){
        $('#search_form').ebcaptcha();
    });


</script>

<script type="application/javascript">


    $(function(){
        $('#register_form').validate({
            rules: {
                email: {
                    required:true
                },
                message:{
                    required:true
                },

                pat_password:{
                    required:true
                }


            },
            messages:{
                email: {
                    required: "Email  is Required",},

                message: {
                    required: "What care do you need details is Required",},

                pat_password: {
                    required: "Password is Important",}
            },
            submitHandler: function(form) {
                var base_url = '<?php  echo base_url() ?>';
                $.ajax({
                    url:base_url + "doctor/DocController/setrequest/",
                    type: 'POST',
                    data: $("#search_form").serialize(),
                    dataType: "json",
                    success: function (data) {

                        if(data.status == "success")
                        {

                            var homepage = data.datahome.is_homepage;
                            if(homepage != 0)
                            {
                                swal("Your registration Process is Done", "Thanks for register  ForAllDoctors.Com", "success");
                                setTimeout(function(){

                                }, 100);
                            }
                            else{

                            }
                        }

                    },

                });
            }
        });
    });


</script>

<script>
    $(document).ready(function(){
        $('#email').change(function(){
            var email = $('#email').val();
            if(email != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>doctor/DocController/check_email_avalibility",
                    method:"POST",
                    data:{email:email},
                    success:function(data){
                        $('#email_result').html(data);

                    }
                });
            }
        });
    });


    $(function() {
        $('#ChangeToggle').click(function() {
            $('#navbar-hamburger').toggleClass('hidden');
            $('#navbar-close').toggleClass('hidden');
        });
    });
</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>

<style>
    .footer-bs {
        background-color: #3c3d41;
        padding: 60px 40px;
        color: rgba(255,255,255,1.00);

    }
    .footer-bs .footer-brand, .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { padding:10px 25px; }
    .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-color: transparent; }
    .footer-bs .footer-brand h2 { margin:0px 0px 10px; }
    .footer-bs .footer-brand p { font-size:12px; color:rgba(255,255,255,0.70); }

    .footer-bs .footer-nav ul.pages { list-style:none; padding:0px; }
    .footer-bs .footer-nav ul.pages li { padding:5px 0px;}
    .footer-bs .footer-nav ul.pages a { color:rgba(255,255,255,1.00); font-weight:bold; text-transform:uppercase; }
    .footer-bs .footer-nav ul.pages a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }
    .footer-bs .footer-nav h4 {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom:10px;
    }

    .footer-bs .footer-nav ul.list { list-style:none; padding:0px; }
    .footer-bs .footer-nav ul.list li { padding:5px 0px;}
    .footer-bs .footer-nav ul.list a { color:rgba(255,255,255,0.80); }
    .footer-bs .footer-nav ul.list a:hover { color:rgba(255,255,255,0.60); text-decoration:none; }

    .footer-bs .footer-social ul { list-style:none; padding:0px; }
    .footer-bs .footer-social h4 {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 3px;
    }
    .footer-bs .footer-social li { padding:5px 4px;}
    .footer-bs .footer-social a { color:rgba(255,255,255,1.00);}
    .footer-bs .footer-social a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }

    .footer-bs .footer-ns h4 {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom:10px;
    }
    .footer-bs .footer-ns p { font-size:12px; color:rgba(255,255,255,0.70); }

    @media (min-width: 768px) {
        .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-left:solid 1px rgba(255,255,255,0.10); }
    }
</style>