<footer class="footer">
    2019 © Car Bidding
</footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->



<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>

<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- Counter js  -->
<script src="plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="plugins/counterup/jquery.counterup.min.js"></script>

<!-- Datatables  -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="plugins/datatables/dataTables.buttons.min.js"></script>
<script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables/jszip.min.js"></script>
<script src="plugins/datatables/pdfmake.min.js"></script>
<script src="plugins/datatables/vfs_fonts.js"></script>
<script src="plugins/datatables/buttons.html5.min.js"></script>
<script src="plugins/datatables/buttons.print.min.js"></script>
<script src="plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="plugins/datatables/dataTables.responsive.min.js"></script>
<script src="plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Sweet-Alert  -->
<!--<script src="plugins/sweet-alert2/sweetalert2.min.js"></script>-->
<!--<script src="assets/pages/jquery.sweet-alert.init.js"></script>-->


<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/pages/jquery.form-advanced.init.js"></script>

<script src="plugins/parsleyjs/parsley.min.js"></script>

<!-- Dashboard -->
<script src="assets/pages/jquery.dashboard.js"></script>



<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script src="assets/js/sweet-alert.min.js"></script>
<script src="assets/js/sweet-alert.init.js"></script>

<!-- Chart JS -->
<script src="plugins/chart.js/chart.min.js"></script>
<script src="assets/pages/chartjs.init.js"></script>

<script>
  $(document).ready(function() {
      $('#datatable').DataTable();

      //Buttons examples
      var table = $('#datatable-buttons').DataTable({
          lengthChange: false,
          buttons: ['copy', 'excel', 'pdf']
      });

      table.buttons().container()
              .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
  } );

</script>


<script>
    $(document).ready(function() {
        $('form').parsley();
    });
    
    
    $("#contactNo").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
   
   setTimeout(function() {
               $('#successMessage').fadeOut('slow');
            }, 10000);
</script>



</body>


</html>
