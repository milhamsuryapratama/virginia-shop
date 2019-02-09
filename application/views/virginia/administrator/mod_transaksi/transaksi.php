
<div class="container">
	<table class="table table-striped table-bordered table-hover table-sm" id="myTable">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Transaksi</th>
				<th>Total</th>
				<th>Waktu Transaksi</th>
				<th>Tracking</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($transaksi as $trx) { 

				$total = $this->db->query("SELECT sum(total+ongkir) as total FROM transaksi_detail WHERE kode_transaksi='$trx[kode_transaksi]'")->row_array();
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $trx['kode_transaksi']; ?></td>
					<td><?php echo "Rp. " .number_format($total['total'],0,".",","); ?></td>
					<td><?php echo date('d F Y H:m:i', strtotime($trx['waktu_transaksi'])); ?></td>
					<td>

						<a href="<?=base_url()?>administrator/tracking/<?=$trx['kode_transaksi']?>" class="btn btn-primary">Tracking</a>
					</td>
				</tr>
				<?php $no++; }
				?>
			</tbody>
		</table>
	</div>		

	<!-- <script>
		$(document).ready(function() {
			$("#myTable").DataTable();
		});
	</script> -->
