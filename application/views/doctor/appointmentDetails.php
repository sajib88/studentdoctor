<style>
    .no-bottom{
        margin-bottom: 0;
    }
</style>

    <div class="box-body box-profile">
        <div class="row">
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Patient Name</b> <span class="pull-right"> <?php echo getemailById($appointmentView['pat_id']);?></span>
                </li>
                <li class="list-group-item">
                    <b>Patient Message Time</b> <span class="pull-right"> <?php echo date("M d, Y", strtotime($appointmentView['date']));?></span>
                </li>

            </ul>
            <ul class="list-group list-group-unbordered no-bottom">
                <li class="list-group-item">
                    <b>Patient Full Message</b> <p class=""><?php echo $appointmentView['message']?></p>

                </li>
            </ul>
        </div>
    </div>

<div class="col-md-12 mb-10">
    <input type="hidden" name="pat_id" value="<?php echo $appointmentView['pat_id'] ?>"
    <input type="hidden" name="doctor_id" value="<?php echo $appointmentView['doctor_id'] ?>"
</div>
<div class="col-md-12 mb-10">
    <label for="login">Do you want to Reply this Patient ?</label>
    <textarea id="message" name="message" class="form-control input-2" placeholder="reply here"></textarea>
</div>

<?php //print_r($user_get);?>







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


