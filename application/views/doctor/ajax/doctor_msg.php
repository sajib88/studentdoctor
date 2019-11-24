<?php //print_r($public_get);?>
<div class="col-md-12 mb-10">
    <input type="hidden" name="get_loginid" value="<?php echo $user_get['id'] ?>"

    <input name="email" type="hidden" value="<?php echo $user_get['email'] ?>" >
    <input  value="<?= $public_get['user_id']; ?>" name="doctor_id"  type="hidden">
    <input  value="<?= $user_get['email']; ?>" name="appointment_name"  type="hidden">
    <input  value="<?=   $public_get['profession']; ?>" name="doctor_profession"  type="hidden">
    <input  value="<?=  $public_get['country']; ?>" name="doctor_country"  type="hidden">
    <input  value="<?=  $public_get['postal']; ?>" name="doctor_postal_code"  type="hidden">

</div>
    <div class="col-md-12 mb-10">

        <label for="login">Your Contact Numner</label>
        <input  name="phone" class="form-control input-2" placeholder="Phone Number"></input>


        <label for="login">What care do you need?</label>
        <textarea id="message" name="message" class="form-control input-2" placeholder="What care do you need?"></textarea>
    </div>







    <script type="application/javascript">


        $(function(){
        $('#search_form').validate({
            rules: {
                message: {
                    required:true,
                    minlength: 5
                }


            },
            messages:{
                cat_name: {
                    required: "Message  is Required",}

            }
        });
        });





    </script>