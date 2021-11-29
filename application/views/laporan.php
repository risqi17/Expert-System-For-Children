<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel">
				        <div class="panel-heading">
                            <h3 class="panel-title">Data Anak Kecanduan Gadget</h3>
                        </div>
				    <div class="panel-body">
<!--
                        <form action="<!?php echo base_url()?>laporan" method="post">
                        <div class="row">
                            <div class="col-lg-3">
                        
<select id="bulan" name="bulan" class="form-control">
										<option <!?php if($bln=='01')echo "selected"; ?>value="01">Januari</option>
										<option <!?php if($bln=='02')echo "selected"; ?> value="02">Februari</option>
										<option <!?php if($bln=='03')echo "selected"; ?> value="03">Maret</option>
										<option <!?php if($bln=='04')echo "selected"; ?> value="04">April</option>
										<option <!?php if($bln=='05')echo "selected"; ?> value="05">Mei</option>
										<option <!?php if($bln=='06')echo "selected"; ?> value="06">Juni</option>
                                        <option <!?php if($bln=='07')echo "selected"; ?> value="07">Juli</option>
										<option <!?php if($bln=='08')echo "selected"; ?> value="08">Agustus</option>
										<option <!?php if($bln=='09')echo "selected"; ?> value="09">September</option>
										<option <!?php if($bln=='10')echo "selected"; ?> value="10">Oktober</option>
										<option <!?php if($bln=='11')echo "selected"; ?> value="11">November</option>
										<option <!?php if($bln=='12')echo "selected"; ?> value="12">Desember</option>
                                </select></div>
                            <div class="col-lg-3">
                        
<select id="tahun" name="tahun" class="form-control">
    <!?php foreach($tahun as $th){?>
										<option <!?php if($thn==$th->tahun) echo "selected"; ?> value="<!?php echo $th->tahun?>"><!?php echo $th->tahun?></option>
    <!?php } ?>
                                </select></div>
                             <div class="col-lg-3">
                        <button type="submit" name="cari" class="btn btn-primary">Pilih</button>
                         <br><br><br>
                            </div>
                            </div>
                            </form>
-->
<!--
                        <div class="row">
                           
                             <div class="col-lg-2">
                        <h4 ><b>Bulan : <!?php echo $bln." ".$thn?></b></h4>
                                 </div>  
                            </div>
-->
                                <table class="table table-striped" id="example">
										<thead>
											<tr>
                                                <th>No.</th>
                                                <th>Nama</th>
												<th>Kelas</th>
												<th>Hasil</th>
											</tr>
										</thead>
										<tbody>
                                            <?php
                                                $no = 1;
                                                foreach($laporan as $lp){
                                            ?>
											<tr>
                                                <td><?php echo $no++ ?></td>
												<td><?php echo $lp->nama_anak; ?></td>
												<td><?php echo $lp->kelas; ?></td>
												<td><span class="label label-success"><?php echo $lp->hasil; ?></span></td>
											</tr>
											
                                             <?php } ?>
										</tbody>
									</table>
								</div>
								
							</div>
</div>

