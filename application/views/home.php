 <!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">	
					<div class="panel panel-headline">
						<div class="panel-body">
						<?php if($gej <= 18){ ?>
							<?php 
								$url = $gej+1; 
								//echo $url;
							?> 
							<form action="<?php echo base_url('Home/kuis_home/'.$url)?>" method="post">
							<br><br>
							<p>Hari Ke  &nbsp;&nbsp;&nbsp;= <?php echo $hari_ke ?></p>
							<p>Bulan Ke = <?php echo $bulan_ke ?></p>
							<?php foreach($gejala as $g){ ?>
								<input type="text" name="id_gejala" value="<?php echo $g->id ?>" hidden>
								<input type="text" name="id" value="<?php echo $g->id ?>" hidden>  			
							<h2><b><p class="text-center"><?php 
																echo $g->nama_gejala;
																if($gej <= 6){
																	echo "(Religi)";
																} elseif ($gej > 6 && $gej <= 12){
																	echo "(Sekolah)";
																} else {
																	echo "(Rumah)";
																}
																?></p></b></h2> 
							<?php } ?>
							<br>
								<div id="notice"></div>
							<hr>
														
							<div class="row">
								<div id="enggak">
									<div class="col-lg-5"> </div>
									<div class="col-lg-1">
									<br>  
									<input type="radio" id="yes" required onchange="pertanyaan()" name="id_gjl" value=""> Iya  
								</div>
								<div class="col-lg-1">  
									<br>
									<input type="radio" id="no" onchange="tidak()" required name="id_gjl" value="0"> Tidak
								</div>
								</div>
								
								<div id="detailPertanyaan"></div>
							</div>

							<br><br><br><br><br> 
								             
								<div class="row">
									<div class="col-md-5"></div>
									<div class="btn-group btn-group-lg col-md-2" >
									<button type="submit" id="next" class="btn btn-success" disabled name="nextRule">Selanjutnya &nbsp;&nbsp;&nbsp;<i class="lnr lnr-arrow-right"></i></a>
									</div>
								</div>

							</form> 
							<br><br><br>
							</div>
						<?php } else { ?>
							<h2><b><p class="text-center">Berhasil, Terima Kasih</p></b></h2> 
							<br>
							<div class="row">
									<div class="col-md-5"></div>
									<div class="btn-group btn-group-lg col-md-2" >
									<a href="<?php echo base_url('Home') ?>" class="btn btn-info" name="nextRule">Kembali &nbsp;&nbsp;&nbsp;<i class="lnr lnr-home"></i></a>
									</div>
								</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
<script>
    function pertanyaan(){
        if(document.getElementById("yes").checked == true){
            console.log('Yess');
            $('#enggak').remove();
            $('#detailPertanyaan').append('<div id="per"><div class="col-lg-2"> </div>'
                                            +'<div class="col-lg-3"> <br>'  
                                            +'<input type="radio" required id="y" onchange="detail()" name="id_gjl" value="3"> Kesadaran Diri</div>'
                                            +'<div class="col-lg-3">  '
                                            +'<br><input type="radio" required id="y2" onchange="detail()" name="id_gjl" value="2"> Disuruh 1 Kali'
                                            +'</div>  '
                                            +'<div class="col-lg-3">  '
                                            +'<br><input type="radio" required id="y3" onchange="detail()" name="id_gjl" value="1"> Disuruh Lebih dari 1'  
                                            +'</div></div>');
            $('#notice').append('<p class="text-center"><em>*pilih alasan menjawab (iya)</em></p>');
			// var eleman = document.getElementById("next");
			// eleman.addAttribute("disabled");
			document.getElementById("next").disabled = true;
        } 
    }
    
    function tidak(){
        if(document.getElementById("no").checked == true){
            console.log('Nooo');
            var eleman = document.getElementById("next");
    		eleman.removeAttribute("disabled");
        }
    }

	function detail(){
        if(document.getElementById("y").checked == true){
            console.log('detail');
            var eleman = document.getElementById("next");
    		eleman.removeAttribute("disabled");
        }
		if(document.getElementById("y2").checked == true){
            console.log('detail');
            var eleman = document.getElementById("next");
    		eleman.removeAttribute("disabled");
        }
		if(document.getElementById("y3").checked == true){
            console.log('detail');
            var eleman = document.getElementById("next");
    		eleman.removeAttribute("disabled");
        }
    }
</script>
		        
                        



