<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel">
				        <div class="panel-heading">
                            <h3 class="panel-title">Input Kategori</h3>
                        </div>
				    <div class="panel-body">                      
                        
<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal_kategori"><i class="fa fa-plus"></i>&nbsp;Tambah Kategori</button>
    <br>
    <br>
                
<!-- Modal -->
  <div class="modal fade" id="modal_kategori" role="dialog">
    <div class="modal-dialog">
    
<!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Input Kategori</h4>
        </div>
    <form action="<?php echo base_url()?>/Kategori/insert_kategori" method="post">
    <div class="modal-body">
          <!-- INPUT GROUPS -->
    <div class="panel">
        <div class="panel-body">
        <label>Kategori</label>
        <br>
            <div class="form-group">
<!--				<input type="text" name="nm_kategori" class="form-control" placeholder="">-->
                <textarea type="text" name="nm_kategori" rows="2" class="form-control" placeholder=""></textarea>
            </div>
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
        <h2>Data Kategori</h2>
        <p>Berisi data kategori yang telah diupload sebelumnya.</p>  
     <br>
        
    <div class="col-lg-10">
    <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
<!--
        <th colspan="2">Opsi</th>
-->
          
      </tr>
    </thead>
    <tbody>
        <?php
       $no = 1;
                foreach($kategori as $kt){
        ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $kt->nm_kategori; ?></td> 
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
                    


