<?php foreach ($list_po as $key) {?>
<tr>
	<td><?=$key->part_no?></td>
	<td><?=$key->nama_barang?></td>
	<td><?=$key->qty?></td>
	<td><?=$key->warna?></td>
	<td><?=$key->bahan?></td>
	<td><?=$key->total_mb_name?></td>
	<td><?=$key->ct?></td>
	<td><?=$key->cav?></td>
	<td><?=$key->bruto?></td>
	<td><?=$key->netto?></td>
	<td><?=$key->komposisi_1?></td>
	<td><?=$key->komposisi_2?></td>
	<td><?=$key->keb_total_m?></td>
	<td><?=$key->keb_mb?></td>
</tr>
<?php } ?>