<?php //print_r($user_get);?>
<div class="col-md-12 mb-10">
    <input type="hidden" name="get_loginid" value="<?php echo $user_get['id'] ?>"
</div>
<div class="col-md-12 mb-10">
    <label for="login">What care do you need?</label>
    <textarea id="message" name="message" class="form-control input-2" placeholder="What care do you need?"></textarea>
</div>

<input name="email" type="hidden" value="<?php echo $user_get['email'] ?>" >





<script type="application/javascript">


    $(function(){
        $('#search_form').validate({
            rules: {
                message: {
                    required:true,
                    minlength: 3
                }


            },
            messages:{
                cat_name: {
                    required: "Message  is Required",}

            }
        });
    });





</script>