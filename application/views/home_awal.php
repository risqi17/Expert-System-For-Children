<?php echo $this->session->userdata("nama"); ?>
<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<div class="profile">
								<h2 class="text-center"><b>LAPORAN</b></h2>
                                <h3 class="text-center"><b>PERKEMBANGAN KARAKTER SISWA</b></h3>
                                <h3 class="text-center"><b>SDN DABASAH 1 BONDOWOSO</b></h3><br><br><br><br>
								<!-- AWARDS -->
								<div class="awards">
									<div class="row">
										<div class="col-md-4 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="fa fa-male award-icon"></span>
												</div>
												<span>Religi</span>
											</div>
										</div>
										<div class="col-md-4 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="fa fa-university award-icon"></span>
												</div>
												<span>Sekolah</span>
											</div>
										</div>
										<div class="col-md-4 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="fa fa-home award-icon"></span>
												</div>
												<span>Rumah</span>
											</div>
										</div>
										<!-- <div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="fa fa-recycle award-icon"></span>
												</div>
												<span>Umum</span>
											</div>
										</div> -->
									</div><br><br>
									<b><div class="text-center"><a href="<?php echo base_url ().'Home/kuis_home/1'?>" class="btn btn-primary btn-lg">Mulai Lakukan Penilaian</a></div></b>
								</div>
								<!-- END AWARDS -->
								
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		