

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									STMIK BANDUNG
									<span class="user-level">Layanan Pengaduan</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li class='nav-item'>
										<a href="<?=base_url('profile')?>">
											<i class='fas fa-user'></i>
											My Profile
										</a>
									</li>
									<li class='nav-item'>
										<a href="<?=base_url('mhs/loginMHS/change_password')?>">
											<i class='fas fa-user-cog'></i>
											Change Password
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<!-- FORM PENGADUAN -->
						<li class="nav-item">
							<a href="#sidebarLayouts" data-toggle="collapse">
								<i class="fab fa-wpforms"></i>
								<p>FORM PENGADUAN</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url('mhs/akademik_ctl')?>">
											<span class="sub-item">Akademik</span>
										</a>
									</li>
									<li>
									<a href="<?php echo base_url('mhs/infrastruktur_ctl')?>">
											<span class="sub-item">Infrastruktur dan Fasilitas</span>
										</a>
									</li>
									<li>
									<a href="<?php echo base_url('mhs/keamanan_ctl')?>">
											<span class="sub-item">Keamanan</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('mhs/administrasi_ctl')?>">
											<span class="sub-item">Administrasi</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- END FORM PENGADUAN -->

						<!-- PENGADUAN TERSIMPAN -->
						<li class="nav-item">
							<a href="#sidebarDaftar" data-toggle="collapse">
							<i class="fas fa-briefcase"></i>
								<p>DAFTAR PENGADUAN</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarDaftar">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url('mhs/tab_akademik')?>">
											<span class="sub-item">Akademik</span>
										</a>
									</li>
									<li>
									<a href="<?php echo base_url('mhs/tab_infrastruktur')?>">
											<span class="sub-item">Infrastruktur dan Fasilitas</span>
										</a>
									</li>
									<li>
									<a href="<?php echo base_url('mhs/tab_keamanan')?>">
											<span class="sub-item">Keamanan</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('mhs/tab_administrasi')?>">
											<span class="sub-item">Administrasi</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- END OF PENGADUAN TERSIMPAN -->
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->