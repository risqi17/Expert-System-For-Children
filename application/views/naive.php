<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<h1>Naive Bayes Clasifier</h1>
	<!-- <table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Anak</th>
				<th>Kondisi</th>
				<th>Gejala</th>
				<th>Hari</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($hasil as $h){ ?>
			<tr>
				<td><?php echo $h->id_hasil  ?></td>
				<td><?php echo $h->anak_id  ?></td>
				<td><?php echo $h->id_kondisi  ?></td>
				<td><?php echo $h->id_gejala  ?></td>
				<td><?php echo $h->hari_ke  ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table> -->
	<!-- <table border="1">
		<thead>
		<tr>
				<th>Anak</th>
				<th>G1</th>
				<th>G2</th>
				<th>G3</th>
				<th>G4</th>
				<th>G5</th>
				<th>G6</th>
				<th>G7</th>
				<th>G8</th>
				<th>G9</th>
				<th>G10</th>
				<th>G11</th>
				<th>G12</th>
				<th>G13</th>
				<th>G14</th>
				<th>G15</th>
				<th>G16</th>
				<th>G17</th>
				<th>G18</th>
				<th>SUM G1-G6</th>
				<th>SUM G7-G12</th>
				<th>SUM G13-G18</th>
			</tr>
		</thead>
		<tbody>
		<?php for ($i=0; $i < 90; $i++) { ?>
			<tr>
				<?php for($j=0; $j < 22; $j++){ ?>
					<td><?php echo $arr[$i][$j]  ?></td>
				<?php } ?>
			</tr>
		<?php } ?>
		</tbody>
	</table> -->
	<h4>Gejala Nilai</h4>
	<table border="1">
		<thead>
			<tr>
				<th>Sangat Kurang</th>
				<th>Kurang</th>
				<th>Cukup</th>
				<th>Baik</th>
				<th>Sangat Baik</th>
				<th>Super</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php for($j=0; $j < 6; $j++){ ?>
					<td><?php echo $gejala[$j]  ?></td>
				<?php } ?>
			</tr>
		</tbody>
	</table>
	<h4>Religi (urutan kesamping)</h4>
	<table border="1">
		<thead>
			<tr>
				<th>v patokan kolom</th>
				<th>Super</th>
				<th>Sangat Baik</th>
				<th>Baik</th>
				<th>Cukup</th>
				<th>Kurang</th>
				<th>Sangat Kurang</th>
			</tr>
		</thead>
		<tbody>
		<?php for ($i=0; $i < 6; $i++) { ?>
			<tr>
				<?php for($j=0; $j < 7; $j++){ ?>
					<td><?php echo $religi[$i][$j]  ?></td>
				<?php } ?>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<h4>Sekolah (urutan kesamping)</h4>
	<table border="1">
		<thead>
			<tr>
				<th>v patokan kolom</th>
				<th>Super</th>
				<th>Sangat Baik</th>
				<th>Baik</th>
				<th>Cukup</th>
				<th>Kurang</th>
				<th>Sangat Kurang</th>
			</tr>
		</thead>
		<tbody>
		<?php for ($i=0; $i < 6; $i++) { ?>
			<tr>
				<?php for($j=0; $j < 7; $j++){ ?>
					<td><?php echo $sekolah[$i][$j]  ?></td>
				<?php } ?>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<h4>Rumah (urutan kesamping)</h4>
	<table border="1">
		<thead>
			<tr>
				<th>v patokan kolom</th>
				<th>Super</th>
				<th>Sangat Baik</th>
				<th>Baik</th>
				<th>Cukup</th>
				<th>Kurang</th>
				<th>Sangat Kurang</th>
			</tr>
		</thead>
		<tbody>
		<?php for ($i=0; $i < 6; $i++) { ?>
			<tr>
				<?php for($j=0; $j < 7; $j++){ ?>
					<td><?php echo $rumah[$i][$j]  ?></td>
				<?php } ?>
			</tr>
		<?php } ?>
		</tbody>
	</table>

	<h4>Hasil</h4>
	<table border="1">
		<thead>
			<tr>
				<th>Nama Anak</th>
				<th>Religi</th>
				<th>Sekolah</th>
				<th>Rumah</th>
				<th>Prilaku</th>
				<th>Super</th>
				<th>Sangat Baik</th>
				<th>Baik</th>
				<th>Cukup</th>
				<th>Kurang</th>
				<th>Sangat Kurang</th>
				<th>Prediksi Prilaku</th>
			</tr>
		</thead>
		<tbody>
		<?php for ($i=0; $i < 90; $i++) { ?>
			<tr>
				<?php for($j=0; $j < 12; $j++){ ?>
					<td><?php echo $hasil[$i][$j]  ?></td>
				<?php } ?>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	
</body>
</html>
