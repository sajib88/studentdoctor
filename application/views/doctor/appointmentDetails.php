<style>
    .no-bottom{
        margin-bottom: 0;
    }
</style>

    <div class="box-body box-profile">
        <div class="row">
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Name</b> <span class="pull-right"> <?php echo $appointmentView['first_name'];?></span>
                </li>
                <li class="list-group-item">
                    <b>Email Address</b> <span class="pull-right"> <?php echo $appointmentView['email'];?></span>
                </li>
                <li class="list-group-item">
                    <b>Phone Number</b> <span class="pull-right"> <?php echo $appointmentView['phone'];?></span>
                </li>
            </ul>
            <ul class="list-group list-group-unbordered no-bottom">
                <li class="list-group-item">
                    <b>Message</b> <p class=""><?php echo $appointmentView['message']?></p>

                </li>
            </ul>
        </div>
    </div>




