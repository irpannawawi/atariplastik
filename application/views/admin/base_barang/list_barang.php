<?php 
	function color_picker($color)
	{
		switch ($color) {
			case 'light blue':
				return "#99CCFF";
				break;
			case 'Pink Lilin':
				return "#FE1A81";
				break;
			case 'Hijau Hino':
				return "#00B050";
				break;
			case 'Violet Lilin':
				return "#7030A0";
				break;
			case 'Biru Langit Floring':
				return "#06A9CA";
				break;
			case 'Hijau Lilin':
				return "#99FF33";
				break;
			case 'Pink Tongtol':
				return "#FF3399";
				break;
			case 'Kuning Stabilo':
				return "#FF6600; color: #ffff";
				break;
			case 'Biru Proses':
				return "#0070C0";
				break;
			case 'Hijau Proses':
				return "#548235";
				break;
			case 'Hitam':
				return "#000; color: #ffff";
				break;
			case 'Merah Pupuk':
				return "#FF0000";
				break;
			default:
				# code...
				break;
		}
	}
?>

<script type="text/javascript">
		function search_kd_barang()
		{
			kd_cust = $('#kode_customer')

			url = "<?=site_url('base_barang/search_kd_barang');?>"
			data_post = {
				kode_customer:kd_cust.val()
			}
			$.post(url,data_post,function(data){
				data = JSON.parse(data);
				$('#kode_barang').val(data.last_data);
				$('#no_urut').val(data.num_rows);

			})
		}

		function start_no_urut()
		{
			$('#no_urut').val('')
		}

</script>
	    		
<script>
  $( function() {
    var availableTags = <?=json_encode($list_warna)?>;
    $( "#warna" ).autocomplete({
      source: availableTags
    });
  } );
</script>
<aside class="content">
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Base</a></li>
              <li class="breadcrumb-item active">Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
     <div class="card">
     	<div class="card-header">
     		<h2 style="float: left;">List Barang</h2>
     		<button 
     			class="btn btn-primary btn-sm" 
     			style="float: right;" 
     			type="button"
     			data-toggle="modal"
     			data-target="#add_new_modal"
     		>
     				<i class="fa fa-plus"></i>Tambah
     		</button>
     	</div>
     	<div class="card-body">
     		<div class="col-12" id="table_list_barang" style="margin: 0px auto;">
     			<table id="master_barang"  class="table table-bordered table-striped table-hover table-responsive">
     				<thead class="thead-dark">
     					<tr>
		 					<th class="text-center" rowspan="2">No</th>
		 					<th class="text-center" colspan="5">Customer</th>
		 					<th class="text-center" rowspan="2">Barang</th>
		 					<th class="text-center" colspan="4">Gramasi</th>
		 					<th class="text-center" rowspan="2">Warna</th>
		 					<th class="text-center" rowspan="2">Bahan</th>
		 					<th class="text-center" colspan="2">Komposisi</th>
		 					<th class="text-center" colspan="2" nowrap>Total MB</th>
		 					<th class="text-center" colspan="4" nowrap>Master Batch</th>
		 				</tr>
		 				<tr>
		 					<!-- Customer -->
		 					<th align="center" nowrap>Nama Customer</th>
		 					<th align="center" nowrap>Kode</th>
		 					<th align="center" nowrap>No Item</th>
		 					<th align="center" nowrap>No Urut</th>
		 					<th align="center" nowrap>Part No</th>
		 					<!-- ./Customer -->


		 					<!-- Gramasi -->
		 					<th align="center">CT</th>
		 					<th align="center">CAV</th>
		 					<th align="center">Bruto</th>
		 					<th align="center">Netto</th>
		 					<!-- ./Gramasi -->

		 					<!-- KOMPOSISI -->
		 					<th align="center">1</th>
		 					<th align="center">2</th>
		 					<!-- ./KOMPOSISI -->

		 					<!-- TOTAL MB -->
		 					<th align="center">Name</th>
		 					<th align="center">Value</th>
		 					<!-- ./TOTAL MB -->

		 					<!-- MASTER BATCH -->
		 					<th align="center" nowrap>MB 1</th>
		 					<th align="center">%</th>
		 					<th align="center" nowrap>MB 2</th>
		 					<th align="center">%</th>
		 					<!-- ./MASTER BATCH -->
		 					<th>Aksi</th>
		 					
		 				</tr>
     				</thead>
     				<tbody>
     					<?php $n =0; foreach($list_barang as $barang){$n++; ?>
     						<tr>
     							<td><?=$n?></td>
     							<!-- Customer -->
			 					<td align="center" nowrap><?=$barang->nama_customer?></td>
			 					<td align="center" nowrap><?=$barang->kode_customer?></td>
			 					<td align="center" nowrap><?=$barang->kode_barang?></td>
			 					<td align="center" nowrap><?=$barang->no_urut?></td>
			 					<td align="center" nowrap><?=$barang->part_no?></td>
			 					<!-- ./Customer -->

			 					<!-- Barang -->
			 					<td nowrap><?=$barang->nama_barang?></td>
			 					<!-- Barang -->

			 					<!-- Gramasi -->
			 					<td align="center"><?=$barang->ct?></td>      
			 					<td align="center"><?=$barang->cav?></td>      
			 					<td align="center"><?=$barang->bruto?></td>      
			 					<td align="center"><?=$barang->netto?></td>      
			 					<!-- ./Gramasi -->      

			 					<!-- Warna -->
			 					<?php 
			 					$style_color = color_picker($barang->warna);
			 					//output ccs code 
			 					?>
			 					<td ><p style="Background : <?=$style_color?>;"> <?=$barang->warna?></p>
			 					</td>
			 					<!-- ./Warna -->

			 					<!-- Bahan -->
			 					<td><?=$barang->bahan?></td>
			 					<!-- ./Bahan -->

			 					<!-- KOMPOSISI -->
			 					<td align="center"><?=$barang->komposisi_1==0?'':$barang->komposisi_1?></td>
			 					<td align="center"><?=$barang->komposisi_2==0?'':$barang->komposisi_2?></td>
			 					<!-- ./KOMPOSISI -->

			 					<!-- TOTAL MB -->
			 					<td align="center" nowrap><?=$barang->total_mb_name?></td>
			 					<td align="center"><?=$barang->total_mb_val==0?'':$barang->total_mb_val.'%';?></td>
			 					<!-- ./TOTAL MB -->

			 					<!-- MASTER BATCH -->
			 					<td align="center" nowrap><?=$barang->mb_1_name?></td>
			 					<td align="center"><?=$barang->mb_1_val==0?'':$barang->mb_1_val?></td>
			 					<td align="center" nowrap><?=$barang->mb_2_name?></td>
			 					<td align="center"><?=$barang->mb_2_val==0?'':$barang->mb_2_val?></td>
			 					<!-- ./MASTER BATCH -->
			 					<td align="center" nowrap>
			 						<button 
			 							type="button" 
			 							class="btn btn-warning" 
			 							onclick="fill_edit('<?=$barang->part_no?>','<?=$barang->part_no?>','<?=$barang->part_no?>','<?=$barang->part_no?>')"
			 							data-toggle="modal"
			 							data-target="#edit_modal"
			 						>Edit</button>
			 						<button 
			 							type="button" 
			 							class="btn btn-danger" 
			 							onclick="delete_mesin('<?=$barang->part_no?>')"
			 						>Hapus</button>
		 						</td>
     						</tr>
     					<?php } ?>
     				</tbody>
     			</table>
     		</div>
     	</div>
     	<div class="card-footer">
     		
     	</div>
     </div>
    </section>
</div>
</aside>

<!--===========================MODALS HERE+====================================-->
<div class="modal fade" tabindex="-1" role="dialog" id="add_new_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <h3><u>Kode Barang</u></h3>
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="kode_customer">Kode Customer</label>
	    		<input class="form-control" type="text" id="kode_customer" onKeyUp="search_kd_barang()" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="kode_barang">Kode Barang</label>
	    		<input class="form-control" type="text" id="kode_barang" onkeyup="start_no_urut()" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="no_urut">No Urut</label>
	    		<input class="form-control" type="text" id="no_urut" />
	    	</div>
	    </div>

	 
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="kode_customer">Nama Barang</label>
	    		<input class="form-control" type="text" id="kode_customer" onKeyUp="search_kd_barang()" />
	    	</div>
	    </div>

	    <h3><u>Gramasi</u></h3>
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="kode_customer">CT</label>
	    		<input class="form-control" type="text" id="kode_customer" onKeyUp="search_kd_barang()" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="kode_barang">CAV</label>
	    		<input class="form-control" type="text" id="kode_barang" onkeyup="start_no_urut()" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="no_urut">Bruto</label>
	    		<input class="form-control" type="text" id="no_urut" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="no_urut">Netto</label>
	    		<input class="form-control" type="text" id="no_urut" />
	    	</div>
	    </div>

	    	
	    <div class="row">
	    	<div class="form-group col">

	    		<label for="kode_customer">Warna</label>
	    		<input class="form-control" type="text" id="warna"  />
	    	</div>
	    </div>

	    <div class="row">
	    	<div class="form-group col">
	    		<label for="kode_customer">Bahan</label>
	    		<input class="form-control" type="text" id="kode_customer" onKeyUp="search_kd_barang()" />
	    	</div>
	    </div>

	    <h3><u>Komposisi</u></h3>
	    <div class="row" >
	    	<div class="form-group col">
	    		<label for="kode_customer">Komposisi 2</label>
	    		<input class="form-control" type="text" id="kode_customer" onKeyUp="search_kd_barang()" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="kode_barang">Komposisi 2</label>
	    		<input class="form-control" type="text" id="kode_barang" onkeyup="start_no_urut()" />
	    	</div>
	    </div>
	    
	    <h3><u>Master Batch</u></h3>
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="kode_customer">Mb 1</label>
	    		<input class="form-control" type="text" id="kode_customer" onKeyUp="search_kd_barang()" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="kode_barang">%</label>
	    		<input class="form-control" type="text" id="kode_barang" onkeyup="start_no_urut()" />
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="kode_customer">Mb 2</label>
	    		<input class="form-control" type="text" id="kode_customer" onKeyUp="search_kd_barang()" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="kode_barang">%</label>
	    		<input class="form-control" type="text" id="kode_barang" onkeyup="start_no_urut()" />
	    	</div>
	    </div> 

	    <h3><u>Toatal Master Batch</u></h3>
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="kode_customer">MB</label>
	    		<input class="form-control" type="text" id="kode_customer" onKeyUp="search_kd_barang()" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="kode_barang">%</label>
	    		<input class="form-control" type="text" id="kode_barang" onkeyup="start_no_urut()" />
	    	</div>
	    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" id="save_mesin" data-dismiss="modal" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!--===========================edit modal===================================-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
        	<div class="form-group">
        		<label for="edit_no_mesin">No Mesin</label>
        		<input type="text" id="edit_no_mesin" class="form-control" placeholder="No Mesin" />
        		<input type="text" id="edit_id_mesin" hidden />
        	</div>
        	<div class="form-group">
        		<label for="edit_nama_mesin">Brand</label>
        		<input type="text" id="edit_nama_mesin" class="form-control" placeholder="Brand" />
        	</div>
        	<div class="form-group">
        		<label for="edit_tonase">Tonase</label>
        		<input type="text" id="edit_tonase" class="form-control" placeholder="Tonase" />
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" id="save_edited_mesin" data-dismiss="modal" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!--===========================MODALS END+====================================-->

<!--JAVASCRIPTS-->
	<script type="text/javascript">


		function refresh_page()
		{
			refresh_table = "<?=site_url('base_mesin/table')?>";
			$.post(refresh_table,function(data){
				$('#table_list_mesin').delay(200).html(data);
			})
		}

		$('#save_mesin').click(function(){
			var no_mesin   	= $('#input_no_mesin');
			var nama_mesin 	= $('#input_nama_mesin');
			var tonase 		= $('#input_tonase');

			data = {
					no_mesin 	:no_mesin.val(), 
					nama_mesin 	:nama_mesin.val(), 
					tonase 		:tonase.val()
				};
			url = "<?=site_url('base_mesin/add_new')?>";

			$.post(url,data,function(data){
				console.log(data);
				no_mesin.val('');
				nama_mesin.val('');
				tonase.val('');

				data = JSON.parse(data);
				
				if (data.status == true) {
					refresh_page();
					Swal.fire({
					  title: 'Berhasil!',
					  text: 'Data mesin ditambahakan',
					  icon: 'success',
					  confirmButtonText: 'Ok'
					});
				}//endif
			})
		});

		$('#save_edited_mesin').click(function(){
			var id_mesin 	= $('#edit_id_mesin');
			var nama_mesin 	= $('#edit_nama_mesin');
			var no_mesin 	= $('#edit_no_mesin');
			var tonase	= $('#edit_tonase');

			data = {	id_mesin 	: id_mesin.val(), 
						nama_mesin 	: nama_mesin.val(), 
						no_mesin 	: no_mesin.val(), 
						tonase 		: tonase.val()
					};

			url = "<?=site_url('base_mesin/edit')?>";

			$.post(url,data,function(data){
				id_mesin.val('');
				no_mesin.val('');
				nama_mesin.val('');
				tonase.val('');
				data = JSON.parse(data);
				console.log(data);
				if (data.status == true) {
					refresh_page();
					Swal.fire({
					  title: 'Berhasil!',
					  text: 'Data mesin ditambahakan',
					  icon: 'success',
					  confirmButtonText: 'Ok'
					});
				}
			})
		});

		//delete op
		function delete_mesin(id_mesin)
		{
			url = "<?=site_url('base_mesin/delete')?>";

			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
			  	//deleting
			   	$.post(url,{id_mesin : id_mesin}, function(data){
				data = JSON.parse(data)
				if (data.status == true ){
					refresh_page();
					Swal.fire(
				      'Deleted!',
				      'Your data has been deleted.',
				      'success'
				    );
				}
			}); 
			  }
			});
		}

		//fill edit 
		function fill_edit(id_mesin,no_mesin, nama_mesin,tonase)
		{
			$('#edit_id_mesin').val(id_mesin);
			$('#edit_no_mesin').val(no_mesin);
			$('#edit_nama_mesin').val(nama_mesin);
			$('#edit_tonase').val(tonase);
		}
	</script>
<!-- ./JAVASCRIPTS-->
