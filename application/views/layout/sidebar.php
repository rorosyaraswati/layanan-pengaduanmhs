
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					
					<ul class="nav nav-primary">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">MENU</h4>
						</li>
						<li class="nav-item">
							<a href="#sidebarLayouts" data-toggle="collapse">
								<i class="fas fa-exclamation-circle"></i>
								<p>PENGADUAN</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url('akademik_view')?>">
											<span class="sub-item">Akademik</span>
										</a>
									</li>
									<li>
									<a href="<?php echo base_url('infrastruktur_view')?>">
											<span class="sub-item">Infrastruktur dan Fasilitas</span>
										</a>
									</li>
									<li>
									<a href="<?php echo base_url('keamanan_view')?>">
											<span class="sub-item">Keamanan</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('administrasi_view')?>">
											<span class="sub-item">Administrasi</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-users"></i>
								<p>MANAJEMEN DATA</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= base_url('users/mhs')?>">
											<span class="sub-item">Mahasiswa</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('users/admin')?>">
											<span class="sub-item">Admin</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fas fa-envelope-open"></i>
								<p>LAPORAN</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= base_url('lp_akademik')?>">
											<span class="sub-item">Laporan Akademik</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('lp_infrastruktur')?>">
											<span class="sub-item">Laporan Infrastruktur dan Fasilitas</span>
										</a>
									</li>
									<li>
									<a href="<?= base_url('lp_keamanan')?>">
											<span class="sub-item">Laporan Keamanan</span>
										</a>
									</li>
									<li>
									<a href="<?= base_url('lp_administrasi')?>">
											<span class="sub-item">Laporan Administrasi</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->