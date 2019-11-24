<?php if(!empty($sub_phd)){?>
<div class="form-group">
    <label>PhD Professionals</label>
    <select  name="phd_pro"  class="form-control">
        <?php
        if (is_array($sub_phd)) {
            foreach ($sub_phd as $row) {
                ?>
                <option value="<?php echo $row->id ?>"><?php echo $row->name ?> </option>
                <?php
            }
        }
        ?>
    </select>
</div>
<?php } ?>


