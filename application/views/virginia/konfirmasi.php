<br>
<div class="container" style="width: 50%">
	<?php if ($this->session->flashdata('confirmError')) { ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('confirmError'); ?>
		</div>
	<?php } ?>
	<form method="post" action="<?=base_url()?>orders/kofirmasi_detail">
		<div class="col-sm-7">
			<input type="text" name="kode" class="form-control">
		</div>
		<div class="col-sm-5">
			<input type="submit" name="cek" value="Cek" class="btn btn-primary">
		</div>
	</form>
</div>
<br>