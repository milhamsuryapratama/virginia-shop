<div class="container">
	<table class="table table-striped table-bordered table-hover" id="myTable">
		<thead>
			<tr>
				<td colspan="5"><a href="<?=base_url()?>administrator/tambah_rekening" class="btn btn-primary">Tambah</a></td>
			</tr>
			<tr>
				<th>No</th>
				<th>Nama Bank</th>
				<th>Nomor Rekening</th>
				<th>Atas Nama</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($rekening as $rkng) { ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $rkng['nama_bank']; ?></td>
					<td><?php echo $rkng['nomor_rekening']; ?></td>
					<td><?php echo $rkng['nama_pemilik']; ?></td>
					<td>
						<a href="<?=base_url()?>administrator/edit_rekening/<?=$rkng['id_rekening']?>" class="btn btn-primary">Edit</a>
						<a href="<?=base_url()?>administrator/hapus_rekening/<?=$rkng['id_rekening']?>" class="btn btn-danger">Hapus</a>
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