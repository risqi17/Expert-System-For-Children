<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel">
				        <div class="panel-heading">
                            <h3 class="panel-title">Input Solusi</h3>
                        </div>
				    <div class="panel-body">                      
                        
<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal_solusi"><i class="fa fa-plus"></i>&nbsp;Tambah Solusi</button>
    <br>
    <br>
                
<!-- Modal -->
  <div class="modal fade" id="modal_solusi" role="dialog">
    <div class="modal-dialog">
    
<!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Input Solusi</h4>
        </div>
    <form action="<?php echo base_url()?>/Solusi/insert_solusi" method="post">
    <div class="modal-body">
          <!-- INPUT GROUPS -->
    <div class="panel">
        <div class="panel-body">
        <label>Kategori</label>
        <br>
            <div class="form-group">
                <select class="form-control" id="exampleSelect1" name="kategori">
                <option value='' disabled selected>Pilih Kategori</option>";
				  <?php foreach($kategori as $kt){ ?>
                  <option value="<?php echo $kt->kd_kategori?>"><?php echo $kt->nm_kategori?> </option>
				  <?php }?>								  
      		    </select>
            </div>
            <br>
        <label>Solusi</label>
        <br>
            <div class="form-group">
				 <textarea type="text" name="solusi" rows="5" class="form-control" placeholder="Solusi"></textarea>
            <br>
            </div>
            <br>
            <label>Motivasi</label>
        <br>
            <div class="form-group">
				 <textarea type="text" name="motivasi" rows="5" class="form-control" placeholder="Motivasi"></textarea>
            <br>
            </div>
            <br>
         </div>
    </div>
<!-- END INPUT GROUPS --> 
    </div>
    <div class="modal-footer">
          <button type="submit" class="btn btn-info" >Simpan</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</form>
</div>
</div>	
</div>
</div>
                        <!-- END MAIN CONTENT -->

<div class="panel">                        
    <div class="container">
        <h2>Data Solusi</h2>
        <p>Berisi data solusi yang telah diupload sebelumnya.</p>  
     <br>
        
    <div class="col-lg-10">
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Solusi</th>
        <th>Motivasi</th>
<!--
        <th colspan="2">Opsi</th>
-->
          
      </tr>
    </thead>
    <tbody>
        <?php
       $no = 1;
                foreach($solusi as $sl){
        ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $sl->nm_kategori; ?></td>
        <td><?php echo $sl->solusi; ?></td>  
        <td><?php echo $sl->motivasi; ?></td> 
<!--
        <td><center>
            <a href="<!--?php echo base_url()?>Rule/pindah_edit_rule/<!--?php echo $t_r->ID_GEJALA; ?>"><button class="btn btn-xs btn-primary tbl_edit_rule"
                    id_gejala_rule="<!--?php echo $t_r->ID_GEJALA; ?>"
                    kategori_usia_rule_gejala="<!--?php echo $t_r->ID_USIA; ?>"                                                                  id_rule="<!--?php echo $t_r->ID_RULE; ?>"
                                                                                                        
                        data-toggle="modal" data-target="#modal_edit_rule"><i class="lnr lnr-pencil"></i>Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </center></td>
          <td><center>
            <a class="btn btn-xs btn-danger tbl_hapus_rule" 
               id_hps_rule="<!--?php echo $t_r->ID_RULE; ?>"
               hps_rule_gejala="<!--?php echo $t_r->ID_GEJALA; ?>"
               data-toggle="modal" data-target="#modal_hapus_rule"><i class="lnr lnr-trash"></i>&nbsp;Hapus</a>
              </center></td>
-->
      </tr>
        <?php } ?>
      </tbody>
  </table>
        </div>
    </div>
    </div>

</div>
</div>
                    

<!-- MAIN -->
		<!--<div class="main">
			 MAIN CONTENT 
		<div class="col-md-12">
            <div class="main-content">
				<div class="container-fluid">
                        <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Input Data Solusi</h3>
								</div>
								<form action="<!--?php echo base_url()?>Solusi/insert_solusi" method="post" enctype="multipart/form-data">
									<div class="panel-body">									
										<div class="form-group">
      										<label for="exampleSelect1">Pilih Kategori</label>
											  <select class="form-control" id="exampleSelect1" name="kd_kategori">											
										  		<!--?php foreach($kategori as $kt){ ?>
        										<option value="<!--?php echo $kt->kd_kategori?>"><!--?php echo $kt->nm_kategori?> </option>
										  		<!--?php }?>								  
      										  </select>
										</div>
									    <br>
											<label>Solusi</label>
                                        <textarea type="text" name="solusi" rows="5" class="form-control" placeholder=""></textarea>
										<br>-->
											<!--button type="submit" value="Simpan" class="btn btn-primary">Simpan</buttonx									
									</div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info" >Simpan</button>
                                    </div>
								</form>
							</div>
						</div>
                </div>
			</div>
		</div>-->