  </div> <!-- end container -->

  <!-- jQuery + Bootstrap Bundle -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<!-- Init DataTable -->
<script>
  $(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#transaksiTable')) {
      $('#transaksiTable').DataTable({
        responsive: true,
        paging: true,
        autoWidth: false
      });
    }
  });
</script>


</body>
</html>
