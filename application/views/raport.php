<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel">
				        	<div class="panel-heading">
                    <h3 class="panel-title">Data Hasil Prilaku Siswa</h3>
                  </div>
				    			<div class="panel-body">
										<table class="table table-striped ">
												<thead>
													<tr>
														<th>No</th>
														<th>Bulan</th>
														<th>Hasil</th>
														<th>Detail</th>
													</tr>
												</thead>
												<tbody>
												<?php for($i = 0; $i < $panjang; $i++){ ?>
														<tr>
															<td><?php echo $i+1 ?></td>
															<td><b><?php echo $hasil[$i][0] ?></b></td>

															<td><?php if($hasil[$i][1] == 1){ ?>
																	<span class="label label-danger">Sangat Kurang</span>
																<?php } elseif($hasil[$i][1] == 2){ ?>
																	<span class="label label-warning">Kurang</span>
																<?php } elseif($hasil[$i][1] == 3){ ?>
																	<span class="label label-default">Cukup</span>
																<?php } elseif($hasil[$i][1] == 4){ ?>
																	<span class="label label-info">Baik</span>
																<?php } elseif($hasil[$i][1] == 5){ ?>
																	<span class="label label-success">Sangat Baik</span>
																<?php } elseif($hasil[$i][1] == 6){ ?>
																	<span class="label label-primary">Super</span>
																<?php } else { ?> 
																	---
																<?php } ?></td>

															<td><?php if($hasil[$i][2] == 'selesai'){ ?>
																<a href="<?php echo base_url('raport/detail_raport') ?>"><span class="btn btn-info"> Detail &nbsp;<i class="fa fa-eye"></i></span></a>
															<?php } else { ?>
																<button class="btn btn-danger" disabled> Belum selesai</button>
															<?php } ?></td>
														</tr>
													<!-- <tr>
														<td>1</td>
														<td>Pertama</td>
														<td><span class="label label-success">Sangat Baik</span></td>
														<td><a href="<?php echo base_url('raport/detail_raport') ?>"><span class="btn btn-info"><i class="fa fa-eye"></i>&nbsp; Detail </span></a></td>
													</tr> -->
												<?php } ?>
												</tbody>
											</table>
             </div>		
			</div>
</div>

