
    <div class="container">
        <h3>Tambah Produk</h3>
        <table class="table table-bordered table-striped table-hover" id="tbl">
        <?php echo form_open_multipart('administrator/tambah_produk') ?>
            <tr>
                <th>Kategori Produk</th>
                <td>
                <select class="form-control" name="kategori">
                    <?php
                        foreach ($kategori as $ktgr) { ?>
                            <option value="<?php echo $ktgr['id_kategori_produk'] ?>"><?php echo $ktgr['nama_kategori'] ?></option>
                    <?php  } ?>                                        
                </select>
                <small><i>pilih kategori produk</i></small>
                </td>
            </tr>
            <tr>
                <th>Nama Produk</th>
                <td><input type="text" name="nama_produk" id="nama_produk" class="form-control">
                    <small><i>isi dengan nama produk</i></small>
                </td>
            </tr>
            <tr>
                <th>Stok</th>
                <td><input type="text" name="stok" id="stok" class="form-control">
                <small><i>stok barang</i></small>
                </td>
            </tr>
            <!-- <tr>
                <th>Satuan</th>
                <td><input type="text" name="satuan" id="satuan" class="form-control">
                <small><i>satuan : pcs, kodi, etc</i></small>
                </td>
            </tr>
            <tr>
                <th>Berat</th>
                <td><input type="text" name="berat" id="berat" class="form-control">
                <small><i>berat: 10 gram, 20 gram, etc</i></small>
                </td>
            </tr>
            <tr>
                <th>Harga Modal</th>
                <td><input type="number" name="harga_modal" id="harga_modal" class="form-control">
                <small><i>harga modal : 5000, 10000</i></small>
                </td>
            </tr>
            <tr>
                <th>Harga Reseller</th>
                <td><input type="number" name="harga_reseller" id="harga_reseller" class="form-control">
                <small><i>harga untuk reseller</i></small>
                </td>
            </tr> -->
            <tr>
                <th>Harga Konsumen</th>
                <td><input type="number" name="harga_konsumen" id="harga_konsumen" class="form-control">
                <small><i>harga untuk pembeli</i></small>
                </td>
            </tr>
            <tr>
                <th>Diskon</th>
                <td><input type="number" name="diskon" id="diskon" class="form-control">
                <small><i>diskon : tulis 0 jika tidak ada diskon</i></small>
                </td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><textarea name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                <small><i>keterangn produk</i></small>
                </td>
            </tr>
            <tr>
                <th>Gambar</th>
                <td><input type="file" name="gambar_produk" id="gambar_produk" class="form-control">
                <small><i>gambar / foto produk</i></small>
                </td>
            </tr>
            <!-- <tr>
                <th>Ukuran</th>
                <td><input type="text" name="ukuran" class="form-control"></td>
            </tr> -->
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="simpan_produk">Simpan</button>
                    <button type="button" class="btn btn-primary" onclick="self.history.back()">Batal</button>
                </td>
            </tr>
        </table>
    </div>


<!-- <script>
    $(document).ready(function() {
		$('#keterangan').summernote({
            height: 300
        });
	});    
    
</script> -->

    

