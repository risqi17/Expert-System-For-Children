<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
                     <form class="form-horizontal" action="<?php echo base_url()?>Solusi/edit_aolusi" method="post" enctype="multipart/form-data"> 
					<div class="panel">
				        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data Solusi</h3>
                        </div>
                       
				    <div class="panel-body">
				   	
              <?php
                foreach($data_edit_solusi as $sls){
                        ?>
           <div class="row">       
           <div class="col-lg-6">
              <div class="form-group">
                   <label class="control-label col-sm-2" for="judul">Kode Solusi:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_artikel" readonly placeholder="Enter Nama" name="id_edit_gejala" value="<?php echo $sls->kd_solusi ?>">
                        </div>   
                  </div> 
              <br>
               </div>
               	<div class="col-lg-6">
               <div class="form-group">
      		     <label for="exampleSelect1">Pilih Kategori</label>
				        <select class="form-control" name="kategori_usia" id="nama_edit_usia_adk" required>
                        <option value='' disabled selected>Pilih Kategori</option>";
                            <?php 
                            $in_kategori=$k->nm_kategori;
                            foreach($kategori as $ktg){ ?>
                        <option <?php if ($in_kategori==$ktg->kd_kategori){echo "selected";}?> value="<?php echo $ktg->kd_kategori; ?>"><?php echo $ktg->nm_kategori; ?></option>
                        <?php } ?>
                        </select>
				</div>
               </div>
									    <br> 
               
               <div class="col-lg-12">
                <div class="form-group">
                          <label class="control-label col-sm-1" for="deskripsi">Kategori:</label>
                          <div class="col-sm-11">
						  <textarea class="form-control" id="id_edit_pertanyaan" row="5" name="pertanyaan" autocomplete="off"><?php echo $sls->nm_kategori; ?>  </textarea>          

                          </div>
                </div>
                <br>
                     </div>
                <div class="col-lg-12">
                <div class="form-group">
                          <label class="control-label col-sm-1" for="deskripsi">Solusi:</label>
                          <div class="col-sm-11">
						  <textarea class="form-control" id="id_edit_pertanyaan" row="5" name="pertanyaan" autocomplete="off"><?php echo $sls->keterangan; ?>  </textarea>          

                          </div>
                </div>
                <br>
                     </div>
            </div>
            <div class="modal-footer">       
     <button type="submit" class="btn btn-info">Simpan</button>
     <a href="<?php echo base_url ()?>gejala"><button type="button" type="button" class="btn btn-danger" >Kembali</button></a>
      </div>  
</div>
               
          
      <?php } ?>

                       
    
</div>  
                    </form>
</div>
</div>
