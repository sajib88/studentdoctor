<?php //print_r($user_prsnl);?>
<div class="col-md-12 mb-10">
    <input type="hidden" name="get_creatorid" value="<?php echo $user_prsnl['uid'] ?>"
</div>
    <div class="col-md-12 mb-10">
        <label for="login">Classified Title : <?= $user_prsnl['title'] ?></label>
        <textarea id="message" name="message" class="form-control input-2" placeholder="your message type here"></textarea>
    </div>

<input name="title" type="hidden" value="<?php echo $user_prsnl['title'] ?>" >





    <script type="application/javascript">


        $(function(){
        $('#search_form').validate({
            rules: {
                message: {
                    required:true,
                    minlength: 1
                }


            },
            messages:{
                cat_name: {
                    required: "Message  is Required",}

            }
        });
        });





    </script>