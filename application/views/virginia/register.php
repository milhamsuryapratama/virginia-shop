<br>
<div class="container" style="width: 70%">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><center><strong> Register Form User</strong></center></h3>
		</div>
		<div class="panel-body">
			<form method="post" action="<?=base_url()?>auth/register">
				<div class="row"> 
					<div class="col-sm-4">
						<h4>Nama Lengkap</h4>
					</div>
					<div class="col-sm-8">
						<input type="text" name="nama_lengkap" class="form-control" placeholder="Isi Nama Lengkap">
					</div>				
				</div>
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
						<h4>Email</h4>
					</div>
					<div class="col-sm-8">
						<input type="email" name="email" class="form-control" placeholder="Isi Email">
					</div>				
				</div>
				<div class="row"> 
					<div class="col-sm-4">
						<h4>Password</h4>
					</div>
					<div class="col-sm-8">
						<input type="password" name="password" id="password" class="form-control" placeholder="Isi Password">
						<input type="checkbox" name="lihat" id="lihat"> Lihat Password
					</div>				
				</div>
				<div class="row"> 
					<div class="col-sm-12">
						<input type="submit" name="register" class="form-control" value="Register">
					</div>
					<br>
					<br>
					<strong>Sudah Punya Akun ? Login <a href="<?=base_url()?>auth/login">disini</a></strong>				
				</div>
			</form>
		</div>
	</div>
</div>

<!-- <script>
	$(document).ready(function(){
		$("#lihat").click(function() {
			alert('HALO');
		})
	})
</script> -->