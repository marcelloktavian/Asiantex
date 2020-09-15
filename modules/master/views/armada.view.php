<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Armada</h4>
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
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">Data Armada</h4>
						<a class="btn btn-primary btn-round ml-auto" href="<?php echo SITE_URL; ?>?file=master&&page=armada&&action=insert" class="btn btn-primary"><i class="fa fa-plus"></i>
						Tambah Data</a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="tabelmaster" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th width="5%">No</th>
									<th>ID</th>
									<th>No POL</th>
									<th>Nama</th>
									<th>Keterangan</th>
									<th width="5%">Status</th>
									<th width="5%">Aksi</th>
								</tr>
							</thead>
							<tbody id="list-data">
								<?php
								$no = 1;
								foreach($data["armada"] as $armada) {
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $armada->id_ar; ?></td>
										<td><?php echo $armada->NoPOL; ?></td>
										<td><?php echo $armada->Nama; ?></td>
										<td><?php echo $armada->Keterangan; ?></td>
										<td><?php echo $armada->status; ?></td>
										<td>
											<div class="form-button-action">
												<button type="button" onclick="window.location.href='<?php echo SITE_URL; ?>?file=master&&page=armada&&action=update&&id=<?php echo $armada->id_ar; ?>';" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
													<i class="fa fa-edit"></i>
												</button>
												<button type="button" onclick="hapus('<?= $armada->id_ar ?>', '<?= $armada->Nama ?>')" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg" data-original-title="Hapus Data">
													<i class="fa fa-times"></i>
												</button>
											</div>
										</td>
									</tr>
									<?php
									$no++;
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$('#tabelmaster').DataTable({
			"lengthMenu": [[25, 50, 100,-1], [25, 50, 100, "All"]]
		});

		function hapus($id, $nama) {
			var id =  $id;
			var nama =  $nama;
			Swal.fire({
				title: 'Konfirmasi',
				text: "Anda ingin menghapus "+nama+"?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Hapus',
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				cancelButtonText: 'Tidak',
				reverseButtons: false
			}).then((result) => {
				if (result.value) {
					window.location.href="<?php echo SITE_URL; ?>?file=master&&page=armada&&action=delete&&id="+id+"";
				}
			});
		};
	</script>