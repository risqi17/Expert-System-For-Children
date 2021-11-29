<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
	
<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="col-md-12">
			<div class="main-content">
				<div class="container-fluid">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Kategori</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Kode Kategori</th>
												<th>Nama Kategori</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($data_kategori as $k){ ?>
											<tr>
												<td><?php echo $k->kd_kategori ?></td>
												<td><?php echo $k->nm_kategori ?></td>
												<td>
												<form action="<?php echo base_url(). 'index.php/Welcome/hapuskategori'; ?>" method="post">
                                  					<input type="hidden" value="<?php echo $k->kd_kategori?>" name="kd_kategori">
													  <!-- <input type="submit" class="btn btn-primary" value="Hapus"> -->
													  <button type="button" class="btn btn-danger">Hapus</button>
                              					</form>	
												</td>
												<?php }?>
											</tr>																		
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE HOVER -->
						</div>
			</div>
			</div>
		</div>
