<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
	

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->

<div class="panel">                        
    <div class="container">
        <h2>Data Solusi</h2>
        <p>Berisi data solusi yang telah diupload sebelumnya, anda dapat menghapus atau mengedit data tersebut.</p>  
     <br>
        
    <div class="col-lg-10">
    <table class="table table-bordered">
    <thead>
      <tr>
          <th><center>No</center></th>
          <th><center>Prilaku</center></th>
          <th><center>Solusi</center></th>
          <th colspan="2"><center>Opsi</center></th>
          
      </tr>
    </thead>
    <tbody>
        <?php
       $no = 1;
                foreach($solusi as $sls){
        ?>
      <tr>
        <td><?php echo $no++ ?></td>
          <td><?php echo $prilaku;?></td>
          <td><?php echo $sls->SOLUSI; ?></td>
        <td><center>
            <a href="<?php echo base_url()?>Solusi/pindah_edit_solusi/<?php echo $sls->ID_SOLUSI; ?>"><button class="btn btn-xs btn-primary tbl_edit_solusi"
                    nama_solusi="<?php echo $sls->SOLUSI; ?>"  
                    id_solusi="<?php echo $sls->ID_SOLUSI;?>"
                       ><i class="lnr lnr-pencil"></i>Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </center></td>
          <td><center>
            <a class="btn btn-xs btn-danger tbl_hapus_solusi" 
               id_hps_solusi="<?php echo $sls->ID_SOLUSI; ?>"
               data-toggle="modal" data-target="#modal_hapus_solusi"><i class="lnr lnr-trash"></i>&nbsp;Hapus</a>
              </center></td>
      </tr>
        <?php } ?>
      </tbody>
  </table>
        </div>
    </div>
    </div>

</div>
</div>

		