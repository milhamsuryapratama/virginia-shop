<br>
<div class="container" style="width: 70%">
	<?php if ($this->session->flashdata('registerSukses')) { ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('registerSukses'); ?>
		</div>
	<?php } ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><center><strong> Register Form User</strong></center></h3>
		</div>
		<div class="panel-body">
			<form method="post" action="<?=base_url()?>auth/login">
				<div class="row"> 
					<div class="col-sm-4">
						<h4>Username</h4>
					</div>
					<div class="col-sm-8">
						<input type="text" name="username" class="form-control" placeholder="Isi Username">
					</div>				
				</div>
				<div class="row"> 
					<div class="col-sm-4">
						<h4>Password</h4>
					</div>
					<div class="col-sm-8">
						<input type="password" name="password" class="form-control" placeholder="Isi Password">
					</div>				
				</div>
				<div class="row"> 
					<div class="col-sm-12">
						<input type="submit" name="login" class="form-control" value="Login">
					</div>		
					<br>
					<br>
					<strong>Belum Punya Akun ? Daftar <a href="<?=base_url()?>auth/register">disini</a></strong>		
				</div>
			</form>
		</div>
		<!-- <div class="panel-footer">Rp. <?php echo number_format($total['total']); ?></div> -->
	</div>
</div>