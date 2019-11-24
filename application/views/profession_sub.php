<?php if(!empty($sub_pro)){?>
<div class="form-group">
    <label>Specialty</label>
    <select onchange="getphd(this)" name="sub_pro" id="sub_pro" class="form-control">
        <?php
        if (is_array($sub_pro)) {
            foreach ($sub_pro as $row) {
                ?>
                <option value="<?php echo $row->id ?>"><?php echo $row->name ?> </option>
                <?php
            }
        }
        ?>
    </select>
</div>
<?php } ?>
