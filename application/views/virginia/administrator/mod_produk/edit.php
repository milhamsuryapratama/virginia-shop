
<div class="container">
    <h3>Edit Produk</h3>
        <table class="table table-bordered table-striped table-hover">
        <?php echo form_open_multipart('administrator/edit_produk') ?>
            <input type="hidden" name="id_produk" id="id_produk" value="<?=$produk['id_produk']?>">
            <tr>
                <th>Kategori Produk</th>
                <td>
                    <select class="form-control" name="kategori">
                        <?php
                            foreach ($kat as $ktgr) {
                                    if ($ktgr['id_kategori_produk'] == $produk['id_kategori_produk']) { ?>
                                        <option value="<?=$ktgr['id_kategori_produk']?>" selected><?=$ktgr['nama_kategori']?></option>
                            <?php      } else { ?>
                                        <option value="<?=$ktgr['id_kategori_produk']?>" ><?=$ktgr['nama_kategori']?></option>
                            <?php      }   
                            } ?>
                    </select>
                    <small><i>pilih kategori produk</i></small>
                </td>
            </tr>
            <tr>
                <th>Nama Produk</th>
                <td><input type="text" name="nama_produk" id="nama_produk" value="<?=$produk['nama_produk']?>" class="form-control">
                    <small><i>isi dengan nama produk</i></small>
                </td>
            </tr>
            <tr>
                <th>Stok</th>
                <td><input type="text" name="stok" id="stok" value="<?=$produk['stok']?>" class="form-control">
                <small><i>stok barang</i></small>
                </td>
            </tr>
            <tr>
                <th>Satuan</th>
                <td><input type="text" name="satuan" id="satuan" value="<?=$produk['satuan']?>" class="form-control">
                <small><i>satuan : pcs, kodi, etc</i></small>
                </td>
            </tr>
            <tr>
                <th>Berat</th>
                <td><input type="text" name="berat" id="berat" value="<?=$produk['berat']?>" class="form-control">
                <small><i>berat: 10 gram, 20 gram, etc</i></small>
                </td>
            </tr>
            <tr>
                <th>Harga Modal</th>
                <td><input type="number" name="harga_modal" value="<?=$produk['harga_modal']?>" id="harga_modal" class="form-control">
                <small><i>harga modal : 5000, 10000</i></small>
                </td>
            </tr>
            <tr>
                <th>Harga Reseller</th>
                <td><input type="number" name="harga_reseller" id="harga_reseller" value="<?=$produk['harga_reseller']?>" class="form-control">
                <small><i>harga untuk reseller</i></small>
                </td>
            </tr>
            <tr>
                <th>Harga Konsumen</th>
                <td><input type="number" name="harga_konsumen" id="harga_konsumen" value="<?=$produk['harga_konsumen']?>" class="form-control">
                <small><i>harga untuk pembeli</i></small>
                </td>
            </tr>
            <tr>
                <th>Diskon</th>
                <td><input type="number" name="diskon" id="diskon" value="<?=$produk['diskon']?>" class="form-control">
                <small><i>diskon : tulis 0 jika tidak ada diskon</i></small>
                </td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><textarea name="keterangan" id="keterangan" cols="30" value="<?=$produk['keterangan']?>" rows="10"><?=$produk['keterangan']?></textarea>
                <small><i>keterangn produk</i></small>
                </td>
            </tr>
            <tr>
                <th>Gambar</th>
                <td><input type="file" name="gambar_produk" id="gambar_produk" class="form-control">
                <small><i>Lihat gambar saat ini : <a href="<?=base_url()?>asset/upload/gambar_produk/<?=$produk['gambar']?>" target="blank">disini</a></i></small>
                </td>
            </tr>
            <tr>
                <th>Ukuran</th>
                <td>
                    <input type="text" name="ukuran" id="ukuran" class="form-control" value=""</td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="edit_produk">Update</button>
                    <button type="button" class="btn btn-primary" onclick="self.history.back()">Batal</button>
                </td>
            </tr>
        </table>
</div>


<!-- <script>
    $(document).ready(function() {
		$('#keterangan').summernote();

        var id = $('#id_produk').val();

        $.post("<?=base_url()?>administrator/get_ukuran", {id: id}, (result)=>{
            console.log(result);
            $('#ukuran').val(result);
        })
	});
</script> -->
