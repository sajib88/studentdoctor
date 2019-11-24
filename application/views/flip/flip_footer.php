</section>
</div>
<?php /// echo 'test commit';?>
    <footer class="main-footer">
        <div class="pull-right">
            <b><a href="<?php echo base_url(); ?>"><b>Copyright © 2010 - 2019 ForAllDoctors.com </b></a>Patent Pending. All Rights Reserved</b>
        </div>
        <strong class="hidden-xs">ForAllDoctors.com Application</b> </strong>
    </footer>

  </body>
</html>




<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url(); ?>backend/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url(); ?>backend/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url(); ?>backend/assets/javascripts/theme.init.js"></script>

<script type="text/javascript">
    var tree4 = $("#test-select-4").treeMultiselect({
        allowBatchSelection: true,
        enableSelectAll: true,
        searchable: true,
        sortable: true,
        startCollapsed: true
    });
</script>
<script>
    $(function(){
    $('#appointment_notification').click(function() {

        var id = '1';
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            type: 'POST',
            url: base_url + "doctor/docController/updateAppointment/"+id,
            success: function(resultData) {
                //$("#result").html(resultData);
                console.log(resultData);
                $('#reload_appointment').ajax.reload();
            }
        });

    });
    });
</script>




