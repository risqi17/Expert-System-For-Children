 <!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">	
					<div class="panel panel-headline">
						<div class="panel-body">
						
<form action="<?php echo base_url()?>Home/kuisioner" method="post">

<!--?php foreach ($rule as $rl){ ?-->
<!--  <input type="hidden" name="id_rule" value="">-->
<!--?php echo $rl->ID_RULE; ?-->
<!--  <h2><b>Anak Melakukan Sholat Shubuh?php echo $rl->PERTANYAAN; ? </b></h2>-->
 <br><br>  			
<h2><b><p class="text-center">Anak Melakukan Sholat Shubuh (Ya)</p></b></h2> 
<br>
    <p class="text-center"><em>*pilih alasan menjawab ya</em></p>
<hr>
							
<div class="row">
    <div class="col-lg-2"> </div>
        <div id="per">
            <div class="col-lg-3">
                <br>  
                <input type="radio" required name="id_gjl" value=""> Kesadaran Diri   
            </div>
            <div class="col-lg-3">  
                <br>
                <input type="radio" required name="id_gjl" value=""> Disuruh 1 Kali

            </div>  
            <div class="col-lg-3">  
                <br>
                <input type="radio" required name="id_gjl" value=""> Disuruh Lebih dari 1  
            </div>
        </div>
</div>
    
    <!--?php echo $rl->jawab_T."|3"; ?-->
    <!--?php } ?-->
                           

<?php //} ?>

<br><br>
    <br><br>              
 <div class="row">
   <div class="col-md-4"></div>
  <div class="btn-group btn-group-lg col-md-8" >
   <button type="submit" class="btn btn-success" name="nextRule">Sebelumnya</button>
        <button type="submit" class="btn btn-success" name="nextRule">Selanjutnya</button>
  </div>
</div>

</form> 
<br><br><br>
</div>
</div>
</div>
</div>
</div>
		        
                        



