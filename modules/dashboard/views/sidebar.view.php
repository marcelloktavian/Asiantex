<div class="sidebar-wrapper scrollbar scrollbar-inner">
	<div class="sidebar-content">
		<div class="user">
			<div class="avatar-sm float-left mr-2">
				<img src="resources/assets/images/administrator.jpg" alt="..." class="avatar-img rounded-circle" style="border: 1px solid #555;">
			</div>
			<div class="info">
				<a><span>
					<?= $data["login"]->nama ?>
					<span class="user-level"><?= $data["login"]->role ?></span>
				</span></a>
			</div>
		</div>
		<ul class="nav nav-primary">
			<li class="nav-item <?php if($_GET['page']=='' ) echo 'active'?>">
				<a href="<?php echo PATH; ?>">
					<i class="fas fa-home"></i>
					<p>Beranda</p>
				</a>
			</li>
			<li class="nav-section">
				<span class="sidebar-mini-icon">
					<i class="fa fa-ellipsis-h"></i>
				</span>
				<h4 class="text-section">Menu</h4>
			</li>

			<!-- Menu Master -->
			<li class="nav-item <?php if($_GET['page']=='satuan' || $_GET['page']=='jenisobat') echo 'active'?>">
				<a data-toggle="collapse" href="#master">
					<i class="fas fa-layer-group"></i>
					<p>Master Data</p>
					<span class="caret"></span>
				</a>
				<div class="collapse  <?php if($_GET['page']=='satuan' || $_GET['page']=='jenisobat') echo 'show'?>" id="master">
					<ul class="nav nav-collapse">
						<li class="<?php if($_GET['page']=='satuan') echo 'active'?>">
							<a href="<?php echo PATH; ?>index.php?file=master&&page=satuan">
								<span class="sub-item">Data Satuan</span>
							</a>
						</li>
						<li class="<?php if($_GET['page']=='jenisobat') echo 'active'?>">
							<a href="<?php echo PATH; ?>index.php?file=master&&page=jenisobat">
								<span class="sub-item">Data Jenis Obat</span>
							</a>
						</li>
						<li>
							<a href="<?php echo PATH; ?>index.php?file=master&&page=obat">
								<span class="sub-item">Data Obat</span>
							</a>
						</li>
						<li>
							<a href="<?php echo PATH; ?>index.php?file=master&&page=penyakit">
								<span class="sub-item">Data Penyakit</span>
							</a>
						</li>
						<li>
							<a href="<?php echo PATH; ?>index.php?file=master&&page=dokter">
								<span class="sub-item">Data Dokter</span>
							</a>
						</li>
						<li>
							<a href="<?php echo PATH; ?>index.php?file=master&&page=pelanggan">
								<span class="sub-item">Data Pelanggan</span>
							</a>
						</li>
					</ul>
				</div>
			</li>

			<!-- Menu Penjualan -->
			<li class="nav-item">
				<a data-toggle="collapse" href="#transaksi">
					<i class="fas fa-layer-group"></i>
					<p>Transaksi</p>
					<span class="caret"></span>
				</a>
				<div class="collapse" id="transaksi">
					<ul class="nav nav-collapse">
						<li>
							<a href="<?php echo PATH; ?>index.php?file=transaksi&&page=penjualan">
								<span class="sub-item">Penjualan Obat</span>
							</a>
						</li>
					</ul>
				</div>
			</li>

			<!-- Menu Laporan -->
			<li class="nav-item">
				<a data-toggle="collapse" href="#laporan">
					<i class="fas fa-layer-group"></i>
					<p>Laporan</p>
					<span class="caret"></span>
				</a>
				<div class="collapse" id="laporan">
					<ul class="nav nav-collapse">
						<li>
							<a href="<?php echo PATH; ?>index.php?file=laporan&&page=stok">
								<span class="sub-item">Laporan Stok Gudang</span>
							</a>
						</li>
						<li>
							<a href="<?php echo PATH; ?>index.php?file=laporan&&page=obatkeluar">
								<span class="sub-item">Laporan Obat Keluar</span>
							</a>
						</li>
						<li>
							<a href="<?php echo PATH; ?>index.php?file=laporan&&page=penjualanglobal">
								<span class="sub-item">Laporan Penjualan Global</span>
							</a>
						</li>
						<li>
							<a href="<?php echo PATH; ?>index.php?file=laporan&&page=rekammedis">
								<span class="sub-item">Laporan Rekam Medis</span>
							</a>
						</li>
					</ul>
				</div>
			</li>

			<!-- Menu Setting -->
			<li class="nav-item">
				<a data-toggle="collapse" href="#setting">
					<i class="fas fa-layer-group"></i>
					<p>Setting</p>
					<span class="caret"></span>
				</a>
				<div class="collapse" id="setting">
					<ul class="nav nav-collapse">
						<li>
							<a href="<?php echo PATH; ?>index.php?file=setting&&page=usergroup">
								<span class="sub-item">User Group</span>
							</a>
						</li>
						<li>
							<a href="<?php echo PATH; ?>index.php?file=setting&&page=groupakses">
								<span class="sub-item">Group Akses</span>
							</a>
						</li>
						<li>
							<a href="<?php echo PATH; ?>index.php?file=setting&&page=pengguna">
								<span class="sub-item">Data Pengguna</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</div>