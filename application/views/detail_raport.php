<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel">
				        <div class="panel-heading">
							<div class="row">
								<div class="col-md-1">
									<h3 class="panel-title">Nama</h3>
								</div>
								<div class="col-md-11">
									<h3 class="panel-title">: <b><?php echo $this->session->userdata("nama"); ?></b></h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">
									<h3 class="panel-title">Kelas</h3>
								</div>
								<div class="col-md-11">
									<h3 class="panel-title">: <b><?php echo $this->session->userdata("kelas").$this->session->userdata("golongan"); ?></b></h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">
									<h3 class="panel-title">Bulan Ke-</h3>
								</div>
								<div class="col-md-11">
									<h3 class="panel-title">: <b>Sangat Bagus</b></h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">
									<h3 class="panel-title">Hasil</h3>
								</div>
								<div class="col-md-11">
									<h3 class="panel-title">: <b>Pertama</b></h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">
									<h3 class="panel-title">Solusi</h3>
								</div>
								<div class="col-md-11">
									<h3 class="panel-title">: <b>BALALALAALALABALALABALAL</b></h3>
								</div>
							</div>
							
						</div>
				<div class="panel-body">
						<table class="table table-striped ">
								<thead>
									<tr>
										<th>No</th>
										<th>Kategori</th>
										<th>Nilai</th>
										<th>Hasil</th>
									</tr>
								</thead>
								<tbody>
								<?php // foreach ($nilai_raport as $nr){ ?>
									<tr>
										<td>1</td>
										<td>Religi</td>
										<td>89</td>
										<td>Sangat Bagus</td>
									</tr>
										<?php // } ?>
								</tbody>
							</table>
             </div>		
			</div>
</div>
