

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<script type="text/javascript">
	$(document).ready(function(){
			$('#loading').hide();
			$('#table-modal-barang').DataTable();
			$('#master_barang').DataTable({'scrollX':true});
			$('#table-po').DataTable();
			$('.table-produksi').DataTable();
	})
</script>

<script type="text/javascript" src="<?=base_url('assets/js/manual.js')?>"></script>
</body>
</html>