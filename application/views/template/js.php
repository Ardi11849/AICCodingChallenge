<!--   Core JS Files   -->
<script src="<?php echo base_url()?>assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url()?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/chartjs.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>template/DataTables/datatables.min.js"></script>
<script src="<?php echo base_url()?>template/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<script src="<?php echo base_url()?>template/Loading-Overlay/waitMe.min.js"></script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url();?>assets/js/material-dashboard.min.js?v=3.0.0"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.11.3/dataRender/datetime.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script type="text/javascript">
    function loading() {
      $("#loading").waitMe({
        effect : 'roundBounce',
        text : '',
        bg : 'rgba(255,255,255,0.7)',
        color : '#000',
        maxSize : '',
        waitTime : -1,
        textPos : 'vertical',
        fontSize : '',
        source : '',
        onClose : function() {}
      });
    };
    $('.harga').mask("#,##0", {reverse: true});
    $.fn.dataTable.ext.errMode = 'none';
  </script>