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
				<a href="#">Bahan Material</a>
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
						<h4 class="card-title">Form Bahan Material</h4>
						<a class="btn btn-primary btn-round ml-auto" href="<?php echo SITE_URL; ?>?file=master&&page=bahanmaterial" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i>
						Kembali</a>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 col-lg-12">
							<?php
							if(isset($data["success"])) {
								?>
								<script type="text/javascript">
									Command: toastr["success"]("<?= $data["success"]; ?>", "Success")
								</script>
								<meta http-equiv="refresh" content="2;url=<?php echo PATH; ?>?file=master&&page=bahanmaterial">

							<?php }else if (isset($data["error"])) {
								?>
								<script type="text/javascript">
									Command: toastr["error"]("<?= $data["error"]; ?>", "Failed")
								</script>
							<?php } ?>

							<form method="post" role="form">

								<!-- ID Material -->
								<div class="form-group form-inline">
									<label for="idmaterial" class="col-md-3 col-form-label">ID Material</label>
									<div class="col-md-9 p-0">
										<input type="text" class="form-control input-full" id="idmaterial" name ="idmaterial" placeholder="Masukkan ID Material" value="<?php if($_GET['action']=='insert'){echo $data["kode"]->awal;}else if(count($data['isinya'])>0){echo $data['isinya'][0];}else if($_GET['action']=='update'){echo $data["material"]->id_mt;} ?>" readonly>
										<input type="hidden" name="userName" value="<?=$data['login']->Nama?>">
									</div>
								</div>

								<!-- Merk -->
								<div class="form-group form-inline">
									<label for="merk" class="col-md-3 col-form-label">Merk</label>
									<div class="col-md-9 p-0">
										<input type="text" class="form-control input-full" id="merk" name="merk" placeholder="Masukkan Merk Bahan Material" value="<?php if(count($data['isinya'])>0){echo $data['isinya'][1];}else if($_GET['action']=='update'){echo $data["material"]->merk;} ?>" required>
									</div>
								</div>

								<!-- Nama -->
								<div class="form-group form-inline">
									<label for="nama" class="col-md-3 col-form-label">Nama</label>
									<div class="col-md-9 p-0">
										<input type="text" class="form-control input-full" id="nama" name="nama" placeholder="Masukkan Nama Bahan Material" value="<?php if(count($data['isinya'])>0){echo $data['isinya'][2];}else if($_GET['action']=='update'){echo $data["material"]->nama;} ?>" required>
									</div>
								</div>

								<!-- Satuan -->
								<div class="form-group form-inline">
									<label for="satuan" class="col-md-3 col-form-label">Satuan</label>
									<div class="col-md-9 p-0">
										<select class="form-control input-full selectpicker" id="satuan" name="satuan" data-live-search="true" data-size="7">
											<?php
											if (count($data['isinya'])>0) {
												?><option value=""><?= $data["isinya"][3] ?></option><?php
											}else if (count($data['isinya'])<=0 && $_GET['action']=='insert') {
												echo '<option value="">- Pilih Satuan -</option>';
											} else if($_GET['action']=='update'){
												echo '<option value="" disabled>- Pilih Satuan -</option>';
												?><option value="<?= $data['material']->id_sat ?>/<?= $data['material']->satuan ?>" selected><?= $data['material']->satuan ?></option><?php
											}

											foreach ($data["satuan"] as $satuan) {
												?><option value="<?= $satuan->id_sat ?>/<?= $satuan->nama ?>"><?= $satuan->nama ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<!-- Harga -->
								<div class="form-group form-inline">
									<label for="harga" class="col-md-3 col-form-label">Harga</label>
									<div class="col-md-9 p-0">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="addon-harga">Rp. </span>
											</div>
											<input type="number" class="form-control" aria-describedby="addon-harga" id="harga" name="harga" placeholder="Masukkan Harga Bahan Material" value="<?php if(count($data['isinya'])>0){echo $data['isinya'][4];}else if($_GET['action']=='update'){echo $data["material"]->harga;} ?>" required>
										</div>
									</div>
								</div>

								<!-- Keterangan -->
								<div class="form-group form-inline">
									<label for="keterangan" class="col-md-3 col-form-label">Keterangan</label>
									<div class="col-md-9 p-0">
										<textarea class="form-control input-full" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan"><?php if(count($data['isinya'])>0){echo $data['isinya'][5];}else if($_GET['action']=='update'){echo $data["material"]->keterangan;} ?></textarea>
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

	<script type="text/javascript">
		$(document).ready(function() {  
			$(".selectpicker").selectpicker();
		});
	</script>