<!-- jQuery -->
<script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>


</body>
</html>
