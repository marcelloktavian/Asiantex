<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"><?php echo $data["title"]; ?></h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="index.php">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Master Data</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Armada</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#"><?php echo $data["title"]; ?></a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">Form Armada</h4>
						<a class="btn btn-primary btn-round ml-auto" href="<?php echo SITE_URL; ?>?file=master&&page=armada" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i>
						Kembali</a>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 col-lg-12">
							<?php
							if(isset($data["success"])) {
								?>

								<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<?php echo $data["success"]; ?>
								</div>
								<meta http-equiv="refresh" content="1;url=<?php echo PATH; ?>?file=master&&page=armada">

							<?php }else if (isset($data["error"])) {
								?>
								<div class="alert alert-danger" role="alert">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<?php echo $data["error"]; ?>
								</div>
								
							<?php } ?>

							<form method="post" role="form">
								<!-- ID Armada -->
								<div class="form-group form-inline">
									<label for="idarmada" class="col-md-3 col-form-label">ID Armada</label>
									<div class="col-md-9 p-0">
										<input type="text" class="form-control input-full" id="idarmada" name ="idarmada" placeholder="Masukkan ID Armada" value="<?php if($_GET['action']=='insert'){echo $data["kode"]->awal;}else if(count($data['isinya'])>0){echo $data['isinya'][0];}else if($_GET['action']=='update'){echo $data["armada"]->id_ar;} ?>" readonly>
										<input type="hidden" name="userName" value="<?=$data['login']->Nama?>">
									</div>
								</div>
								<!-- No POL -->
								<div class="form-group form-inline">
									<label for="nopol" class="col-md-3 col-form-label">No POL</label>
									<div class="col-md-9 p-0">
										<input type="text" class="form-control input-full" id="nopol" name="nopol" placeholder="Masukkan No POL" value="<?php if(count($data['isinya'])>0){echo $data['isinya'][1];}else if($_GET['action']=='update'){echo $data["armada"]->NoPOL;} ?>" required>
									</div>
								</div>
								<!-- Nama Armada -->
								<div class="form-group form-inline">
									<label for="nama" class="col-md-3 col-form-label">Nama Armada</label>
									<div class="col-md-9 p-0">
										<input type="text" class="form-control input-full" id="nama" name="nama" placeholder="Masukkan Nama Armada" value="<?php if(count($data['isinya'])>0){echo $data['isinya'][2];}else if($_GET['action']=='update'){echo $data["armada"]->Nama;} ?>" required>
									</div>
								</div>
								<!-- Keterangan -->
								<div class="form-group form-inline">
									<label for="keterangan" class="col-md-3 col-form-label">Keterangan</label>
									<div class="col-md-9 p-0">
										<textarea class="form-control input-full" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan"><?php if(count($data['isinya'])>0){echo $data['isinya'][3];}else if($_GET['action']=='update'){echo $data["armada"]->Keterangan;} ?></textarea>
									</div>
								</div>
								<div class="card-action">
									<button type="submit" value="Submit" class="btn btn-success">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>