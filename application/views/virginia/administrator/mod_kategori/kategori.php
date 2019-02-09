<br>
<div class="container">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td colspan="3"><a href="<?=base_url()?>administrator/tambah_kategori" class="btn">Tambah</a></td>
		</tr>
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach ($kategori as $k) { ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$k['nama_kategori']?></td>
				<td>
					<a href="<?=base_url()?>administrator/edit_kategori/<?=$k['id_kategori_produk']?>" class="btn">Edit</a>
					<a href="<?=base_url()?>administrator/hapus_kategori/<?=$k['id_kategori_produk']?>" class="btn">Hapus</a>
				</td>
			</tr>
		<?php $no++; } ?>
	</table>
</div>
<br>