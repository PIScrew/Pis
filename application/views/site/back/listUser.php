<div class="container-fluid" data-codepage="<?= $codepage?>">
	<!-- ============================================================== -->
	<!-- Start Page Content -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-4 card">
				<form action="https://pasarmbois.com/Process/addAdmin" method="POST">
					<div class="form-group checkUsername" data-url="https://pasarmbois.com/Login/username_check">
						<label for="">Username</label>
						<input type="text" id="checkUsername" class="form-control" name="username" id="username">
						<label id="username-invalid" style="display:none;" class="errorreg" for="username">Username yang anda
							masukkan sudah terdaftar</label>
						<label id="username-valid" style="display:none;" class="success" for="username">Username yang anda masukkan
							valid</label>
					</div>
					<div class="form-group">
						<label for="">Firstname</label>
						<input type="text" name="firstname" class="form-control" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="">Lastname</label>
						<input type="text" name="lastname" class="form-control" placeholder="Username">
					</div>
					<div class="form-group checkEmail" data-url="https://pasarmbois.com/Login/checkEmail">
						<label for="">Email</label>
						<input id="checkEmail" type="email" class="form-control" name="email" required>
						<label id="format-invalid" style="display:none;" class="errorreg " for="alamat_email">Email yang anda
							masukkan tidak valid</label>
						<label id="alamat_email-invalid" style="display:none;" class="errorreg" for="alamat_email">Email yang anda
							masukkan sudah terdaftar</label>
						<label id="alamat_email-valid" style="display:none;" class="success" for="alamat_email">Email yang anda
							masukkan valid</label>
					</div>
					<div class="form-group">
						<label for="">Jabatan</label>
						<select name="id_role" class="form-control">
							<option value="4">Karyawan</option>
							<option value="5">Admin</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-group text-right">
						<button class="btn btn-danger btn-sm waves-effect waves-light" type="submit" name="submit"><span
								class="btn-label"><i class="fas fa-save"></i></span> Simpan</button>
					</div>
				</form>
			</div>
			<div class="col-8">
				<div class="row el-element-overlay">
				<?php foreach ($useradmin as $ua):?>
					<div class="col-lg-3 col-md-3">
						<div class="card">
							<div class="el-card-item">
								<div class="el-card-avatar el-overlay-1"> <img
										src="<?= img_profile($ua['img_path'])?>" alt="user" />
									<div class="el-overlay">
										<ul class="list-style-none el-info">
											<li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link ban-admin"
													href="#" data-id="<?= $ua['id']?>"><i
														class="fa as fa-ban"></i></a></li>
											<li class="el-item"><a class="btn default btn-outline el-link"
													href="<?= base_url('admin/useradmin/'.$ua['username'])?>"><i
														class="mdi mdi-magnify-plus"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="el-card-content">
									<h4 class="m-b-0"><?= $ua['fullname']?></h4> <span class="text-muted"><?= $ua['role']?></span>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>
