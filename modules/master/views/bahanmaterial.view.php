	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Bahan Material</h4>
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
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Data Bahan Material</h4>
							<a class="btn btn-primary btn-round ml-auto" href="<?php echo SITE_URL; ?>?file=master&&page=bahanmaterial&&action=insert" class="btn btn-primary"><i class="fa fa-plus"></i>
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
										<th>Merk</th>
										<th>Nama</th>
										<th>Harga</th>
										<th>Satuan</th>
										<th>Keterangan</th>
										<th width="5%">Status</th>
										<th width="5%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach($data["material"] as $material) {
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $material->id_mt; ?></td>
											<td><?php echo $material->merk; ?></td>	
											<td><?php echo $material->nama; ?></td>
											<td><?php echo $material->harga2; ?></td>
											<td><?php echo $material->satuan; ?></td>
											<td><?php echo $material->keterangan; ?></td>
											<td><?php echo $material->status; ?></td>
											<td>
												<div class="form-button-action">
													<button type="button" data-toggle="tooltip" title="Edit Data" onclick="window.location.href='<?php echo SITE_URL; ?>?file=master&&page=bahanmaterial&&action=update&&id=<?php echo $material->id_mt; ?>';" class="btn btn-link btn-primary btn-lg">
														<i class="fa fa-edit"></i>
													</button>
													<button type="button" data-toggle="tooltip" title="<?php if($material->status == "Y"){echo "Nonaktifkan";}else{echo "Aktifkan";} ?>" onclick="hapus('<?= $material->id_mt ?>', '<?= $material->nama ?>', '<?= $material->status ?>', '<?php if($material->status == "Y"){echo "nonaktifkan";}else{echo "aktifkan";} ?>')" class="btn btn-link btn-<?php if($material->status == "Y"){echo "danger";}else{echo "success";} ?> btn-lg">
														<i class="fa fa-<?php if($material->status == "Y"){echo "times";}else{echo "check";} ?>"></i>
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
			$(document).ready(function(){
				$('#tabelmaster').DataTable({
					"lengthMenu": [[25, 50, 100,-1], [25, 50, 100, "All"]]
				});

				$('[data-toggle="tooltip"]').tooltip();   
			});
			
			function hapus($id, $nama, $status, $ket) {
				var id 		= $id;
				var nama 	= $nama;
				var ket 	= $ket;
				var status 	= $status;

				Swal.fire({
					title: 'Konfirmasi',
					text: "Anda ingin "+ket+" "+nama+"?",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya',
					confirmButtonColor: '#d33',
					cancelButtonColor: '#3085d6',
					cancelButtonText: 'Tidak',
					reverseButtons: false
				}).then((result) => {
					if (result.value) {
						if (true) {} else {}
							window.location.href="<?php echo SITE_URL; ?>?file=master&&page=bahanmaterial&&action=delete&&stat="+status+"&&id="+id+"";
					}
				});
			};
		</script>