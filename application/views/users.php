<div class="form-group">
    <label>User</label>
    <select name="receiver_id" class="form-control">
        <option value="">Select User</option>
        <?php
        if (!empty($get_users) && is_array($get_users)) {
            foreach ($get_users as $row) {
                ?>
                <option value="<?php echo $row->id ?>"><?php echo $row->user_name ?> </option>
                <?php
            }
        }else{
            echo '<option value="" style="color: red;" ">Currently no registered user in this profession.</option>';
        }
        ?>
    </select>
</div>