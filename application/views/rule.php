<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel">
				        <div class="panel-heading">
                            <h3 class="panel-title">Input Rule Gejala</h3>
                        </div>
				    <div class="panel-body">
<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal_rule"><i class="fa fa-plus"></i>&nbsp;Tambah Rule Gejala</button>
    <br>
    <br>
                
<!-- Modal -->
  <div class="modal fade" id="modal_rule" role="dialog">
    <div class="modal-dialog">
    
<!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Input Rule Gejala </h4>
        </div>
    <form action="<?php echo base_url()?>/Rule/insert_rule" method="post">
    <div class="modal-body">
          <!-- INPUT GROUPS -->
    <div class="panel">
        <div class="panel-body">
            
        <label>Pernyataan Awal</label>
        <br>
            <div class="form-group">
				 <select class="form-control" name="pertanyaan_1" id='id_pertanyaan_1' required>
                <option value='' disabled selected>Pilih Pertanyaan</option>";
                  <?php foreach($pertanyaan_awal as $p_awal){ ?>
                  <option value="<?php echo $p_awal->id_gejala; ?>">[<?php echo $p_awal->id_gejala; ?>]  <?php echo $p_awal->nama_gejala; ?></option>
                  <?php } ?>
                  </select>
            </div>
            <br>
            
            <label>Jawaban Y</label>
        <br>
            <div class="form-group">
				 <select class="form-control" name="jawab_Y" id='jawab_Y' required>
                <option value='' disabled selected>Pilih Pertanyaan</option>";
                  <?php foreach($pertanyaan_awal as $p_awal){ ?>
                  <option value="<?php echo $p_awal->id_gejala; ?>">[<?php echo $p_awal->id_gejala; ?>] <?php echo $p_awal->nama_gejala; ?></option>
                  <?php } ?>
                  </select>
            </div>
            <br>
            
            <label>Jawaban T</label>
        <br>
            <div class="form-group">
				 <select class="form-control" name="jawab_T" id='jawab_T' required>
                <option value='' disabled selected>Pilih Pertanyaan</option>";
                  <?php foreach($pertanyaan_awal as $p_awal){ ?>
                  <option value="<?php echo $p_awal->id_gejala; ?>">[<?php echo $p_awal->id_gejala; ?>] <?php echo $p_awal->nama_gejala; ?></option>
                  <?php } ?>
                  </select>
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
        <h2>Data Rule Gejala</h2>
        <p>Berisi data rule gejala yang telah diupload sebelumnya.</p>  
     <br>
        
    <div class="col-lg-10">
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>PERTANYAAN</th>
        <th>YA</th>  
        <th>TIDAK</th> 
<!--        <th colspan="2">Opsi</th>-->
          
      </tr>
    </thead>
    <tbody>
        <?php
       $no = 1;
                foreach($tampil_rule as $t_r){
        ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $t_r->nama_gejala; ?></td>
        <td><?php echo $t_r->jawab_Y; ?></td>
        <td><?php echo $t_r->jawab_T; ?></td>
            
<!--
        <td><center>
            <a href="<!-?php echo base_url()?>Rule/pindah_edit_rule/<!-?php echo $t_r->ID_GEJALA; ?>"><button class="btn btn-xs btn-primary tbl_edit_rule"
                    id_gejala_rule="<!?php echo $t_r->ID_GEJALA; ?>"
                    kategori_usia_rule_gejala="<!?php echo $t_r->ID_USIA; ?>"
                    rule_jwb_y="<!?php echo $t_r->JWB_Y; ?>"                                                                         rule_jwb_m="<!?php echo $t_r->JWB_M; ?>"
                    rule_jwb_t="<!?php echo $t_r->JWB_T; ?>"                                                                                        
                    id_rule="<!?php echo $t_r->ID_RULE; ?>"
                                                                                                            
                                                                                                            
                       
                        data-toggle="modal" data-target="#modal_edit_rule"><i class="lnr lnr-pencil"></i>Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </center></td>
          <td><center>
            <a class="btn btn-xs btn-danger tbl_hapus_rule" 
               id_hps_rule="<!?php echo $t_r->ID_RULE; ?>"
               hps_rule_gejala="<!?php echo $t_r->ID_GEJALA; ?>"
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
                    


<!--

		<div class="main">
			
		<div class="col-md-6">
            <div class="main-content">
				<div class="container-fluid">
                            <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Input Data Rule</h3>
								</div>
								<form action="<!-?php echo base_url(). 'index.php/Welcome/tambahrule'; ?>" method="post" enctype="multipart/form-data">
								<div class="panel-body">
									<div class="form-group">
										  <label for="exampleSelect1">Pilih Kategori</label>
											<select class="form-control" id="exampleSelect1" name="kd_kategori">											
										  		<!-?php foreach($kategori as $k2){ ?>
        										<option value="<!-?php echo $k2->kd_kategori?>"><!-?php echo $k2->nm_kategori?> </option>
										  		<!?php }?>								  
      										</select>
    								</div>
									    <br>
									<div class="form-group">
      									<label for="exampleSelect2">Pilih Perilaku</label>
     									 <select class="form-control" id="exampleSelect2">
        									<option>1</option>
        									<option>2</option>
        									<option>3</option>
        									<option>4</option>
        									<option>5</option>
      									</select>
    								</div>
										<br>
										<button type="button" class="btn btn-primary">Simpan</button>
								</div>
								</form>
                            </div>
                </div>
			</div>
		</div>
-->
