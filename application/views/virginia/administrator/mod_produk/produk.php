<br>
<div class="container">
	
    <div class="container">
        <table class="table table-striped table-bordered table-hover" id="myTable">
            <thead>
                <tr>
                    <td colspan="11"><a href="<?=base_url()?>administrator/tambah_produk" class="btn btn-primary">Tambah</a></td>
                </tr>
                <tr align="center">
                    <th>NO</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $no = 1;
                    foreach ($produk as $prdk) { ?>
                        <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $prdk->nama_produk ?></td>
                            <td><?php echo $prdk->nama_kategori ?></td>
                            <td><small>Rp. <?php echo number_format($prdk->harga_konsumen,0,',','.') ?></small></td>
                            <td><?php echo $prdk->stok ?></td>
                            <td>
                                <a href="<?=base_url()?>administrator/edit_produk/<?=$prdk->id_produk?>"><i class="fas fa-edit" style="font-size:20px;color:green"></i> Edit</a> 
                                <a href="<?=base_url()?>administrator/hapus_produk/<?=$prdk->id_produk?>"><i class="far fa-trash-alt" style="font-size:20px;color:red"></i> Hapus</a>
                            </td>
                        </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>

<!-- <script>
    $(document).ready(function() {
		$("#myTable").DataTable();
	});
</script> -->

</div>