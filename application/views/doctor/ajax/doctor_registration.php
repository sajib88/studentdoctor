<form role="form" name="search_form" method="post" id="search_form" enctype="multipart/form-data" action="#">
    <div class="col-md-12 no-padding" >
        <section class="panel">
            <div class="panel-body">
                <div class="col-md-12 mb-10">
                    <input type="hidden" name="get_loginid" value="<?php echo $user_get['id'] ?>"
                </div>
                <div class="col-md-12 mb-10">
                    <label for="login">What care do you need?</label>
                    <textarea id="message" name="message" class="form-control input-2" placeholder="What care do you need?"></textarea>
                </div>


                <div class="col-md-12 mb-10">
                    <label for="login">Email:</label>
                    <input id="email" name="email" placeholder="Email ID" class="form-control input-2" type="text">
                    <span id="email_result"></span>
                    
                </div>

                <div class="col-md-12 mb-10">
                    <label for="pass">Password</label>
                    <input  required="" type="password" name="pat_password" class="form-control" placeholder="Password" autofocus="">
                </div>

            </div>
        </section>
    </div>

    <div class="modal-footer">
        <div class="row">

            <div class="col-md-12">

                <div class="captcha" style="margin-top:10px;"></div>

                <input type="submit" name="submit" class="btn  btn-success ajaxcallbutton  btn-lg"  id="updatedoctors" name="loginStatus" > </input>

            </div>
        </div>

    </div>
</form>


<script src="<?php /*echo base_url(); */?>script-assets/js/jquery.ebcaptcha.js"></script>

<script type="application/javascript">

    $(function(){
        $('#search_form').ebcaptcha();
    });


</script>

<script type="application/javascript">


    $(function(){
    $('#search_form').validate({
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
                            swal("Your  Registration is  Successfully", "you can login to ForAllDoctors.Com", "success");
                            setTimeout(function(){
                                location.reload();
                            }, 1000);
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
</script>