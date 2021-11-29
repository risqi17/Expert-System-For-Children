<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Naive extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Mnaive');
		$this->load->helper('url', 'form');
		$this->load->library("session");
	}

	public function index()
	{
		$data['data'] = $this->Mnaive->getHasil()->result();
		$data['gejalaHari'] = $this->Mnaive->getHasilByGejalaHari('G1', 1)->result();
		$anak = $this->Mnaive->getHasilByGejalaAnak('G1', 1)->result();
		foreach($anak as $a){	
			$data['anak'] = $a->jumlah;
		}
		for($i=1;$i<=90;$i++){
			
			for($j=1;$j<=19;$j++){
				$varAnak = "anak".$i."G".$j;
				$gejala = "G".$j;
				$anak = $this->Mnaive->getHasilByGejalaAnak($gejala, $i)->result();
				foreach($anak as $a){
					$data['hasil'][$i-1][0] = $a->nama_anak;
					$data['arr'][$i-1][0] = $a->nama_anak;	
					//$data['arr'][$i-1][$j] = $a->jumlah; //mencari nilai total
					$data['arr'][$i-1][$j] = $a->jumlah * 100 / 84; //nilai *100/84
				}
			}
		}
		//print_r($data['arr']);
		
		for($i=0;$i<90;$i++){
			// mencari total nilai tiap sub gejala
			// $data['arr'][$i][19] = $data['arr'][$i][1] + $data['arr'][$i][2] +$data['arr'][$i][3] + $data['arr'][$i][4] + $data['arr'][$i][5] + $data['arr'][$i][6];
			// $data['arr'][$i][20] = $data['arr'][$i][7] + $data['arr'][$i][8] +$data['arr'][$i][9] + $data['arr'][$i][10] + $data['arr'][$i][11] + $data['arr'][$i][12];
			// $data['arr'][$i][21] = $data['arr'][$i][13] + $data['arr'][$i][14] +$data['arr'][$i][15] + $data['arr'][$i][16] + $data['arr'][$i][17] + $data['arr'][$i][18];
			//rata-rata (nilai *100/84)
			$data['arr'][$i][19] = ($data['arr'][$i][1] + $data['arr'][$i][2] +$data['arr'][$i][3] + $data['arr'][$i][4] + $data['arr'][$i][5] + $data['arr'][$i][6])/6;
			$data['arr'][$i][20] = ($data['arr'][$i][7] + $data['arr'][$i][8] +$data['arr'][$i][9] + $data['arr'][$i][10] + $data['arr'][$i][11] + $data['arr'][$i][12])/6;
			$data['arr'][$i][21] = ($data['arr'][$i][13] + $data['arr'][$i][14] +$data['arr'][$i][15] + $data['arr'][$i][16] + $data['arr'][$i][17] + $data['arr'][$i][18])/6;
			$data['arr'][$i][22] = ($data['arr'][$i][19]+$data['arr'][$i][20]+$data['arr'][$i][21])/3;
		}
		//hasil akhir 
		for($i=0;$i<90;$i++){
			//tanpa dikonversi
			// $data['hasil'][$i][1] = $data['arr'][$i][19];
			// $data['hasil'][$i][2] = $data['arr'][$i][20];
			// $data['hasil'][$i][3] = $data['arr'][$i][21];
			// $data['hasil'][$i][4] = $data['arr'][$i][22];
			//dikonversi
			$a = $data['arr'][$i][19];
			$b = $data['arr'][$i][20];
			$c = $data['arr'][$i][21];
			$d = $data['arr'][$i][22];
			if(($a>10)&&($a<19)){
				$data['hasil'][$i][1] = "Sangat Kurang";
			} elseif (($a>20)&&($a<29)){
				$data['hasil'][$i][1] = "Kurang";
			} elseif (($a>30)&&($a<49)){
				$data['hasil'][$i][1] = "Cukup";
			} elseif (($a>50)&&($a<74)){
				$data['hasil'][$i][1] = "Baik";
			} elseif (($a>75)&&($a<84)){
				$data['hasil'][$i][1] = "Sangat Baik";
			} else {
				$data['hasil'][$i][1] = "Super";
			}
			if(($b>10)&&($b<19)){
				$data['hasil'][$i][2] = "Sangat Kurang";
			} elseif (($b>20)&&($b<29)){
				$data['hasil'][$i][2] = "Kurang";
			} elseif (($b>30)&&($b<49)){
				$data['hasil'][$i][2] = "Cukup";
			} elseif (($b>50)&&($b<74)){
				$data['hasil'][$i][2] = "Baik";
			} elseif (($b>75)&&($b<84)){
				$data['hasil'][$i][2] = "Sangat Baik";
			} else {
				$data['hasil'][$i][2] = "Super";
			}
			if(($c>10)&&($c<19)){
				$data['hasil'][$i][3] = "Sangat Kurang";
			} elseif (($c>20)&&($c<29)){
				$data['hasil'][$i][3] = "Kurang";
			} elseif (($c>30)&&($c<49)){
				$data['hasil'][$i][3] = "Cukup";
			} elseif (($c>50)&&($c<74)){
				$data['hasil'][$i][3] = "Baik";
			} elseif (($c>75)&&($c<84)){
				$data['hasil'][$i][3] = "Sangat Baik";
			} else {
				$data['hasil'][$i][3] = "Super";
			}
			if(($d>10)&&($d<19)){
				$data['hasil'][$i][4] = "Sangat Kurang";
			} elseif (($d>20)&&($d<29)){
				$data['hasil'][$i][4] = "Kurang";
			} elseif (($d>30)&&($d<49)){
				$data['hasil'][$i][4] = "Cukup";
			} elseif (($d>50)&&($d<74)){
				$data['hasil'][$i][4] = "Baik";
			} elseif (($d>75)&&($d<84)){
				$data['hasil'][$i][4] = "Sangat Baik";
			} else {
				$data['hasil'][$i][4] = "Super";
			}
			
		}
		//hasil / 90
		$temp1=0;
		$temp2=0;
		$temp3=0;
		$temp4=0;
		$temp5=0;
		$temp6=0;
		for($j=0;$j<90;$j++){
			if($data['hasil'][$j][4] == "Sangat Kurang"){
				$temp1++;
			}
			if($data['hasil'][$j][4] == "Kurang"){
				$temp2++;
			}
			if($data['hasil'][$j][4] == "Cukup"){
				$temp3++;
			}
			if($data['hasil'][$j][4] == "Baik"){
				$temp4++;
			}
			if($data['hasil'][$j][4] == "Sangat Baik"){
				$temp5++;
			}
			if($data['hasil'][$j][4] == "Super"){
				$temp6++;
			}
		}
		$data['gejala'][0] = $temp1/90; //sangat kurang
		$data['gejala'][1] = $temp2/90; //kurang
		$data['gejala'][2] = $temp3/90; //cukup
		$data['gejala'][3] = $temp4/90; //baik
		$data['gejala'][4] = $temp5/90; //sangat baik
		$data['gejala'][5] = $temp6/90; //super

		//Inisialisasi
		$data['religi'][0][0] = "Super";
		$data['religi'][1][0] = "Sangat Baik";
		$data['religi'][2][0] = "Baik";
		$data['religi'][3][0] = "Cukup";
		$data['religi'][4][0] = "Kurang";
		$data['religi'][5][0] = "Sangat Kurang";
		
		//Religi
			//super - Hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['religi'][0][1] = $tempRS/$temp6;
			$data['religi'][1][1] = $tempRSB/$temp5;
			$data['religi'][2][1] = $tempRB/$temp4;
			$data['religi'][3][1] = $tempRC/$temp3;
			$data['religi'][4][1] = $tempRK/$temp2;
			$data['religi'][5][1] = 0;
			// $simpan = array(
			// 	'super' => $data['religi'][0][1],
			// 	'sangat_baik' => $data['religi'][1][1],
			// 	'baik' => $data['religi'][2][1],
			// 	'cukup' => $data['religi'][3][1],
			// 	'kurang' => $data['religi'][4][1],
			// 	'sangat_kurang' => $data['religi'][5][1]
			// );
			// $this->Mnaive->input($simpan ,'religi');

			//sangat baik - Hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][1] == "Sangat Baik")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][1] == "Sangat Baik")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][1] == "Sangat Baik")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][1] == "Sangat Baik")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][1] == "Sangat Baik")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][1] == "Sangat Baik")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['religi'][0][2] = $tempRS/$temp6;
			$data['religi'][1][2] = $tempRSB/$temp5;
			$data['religi'][2][2] = $tempRB/$temp4;
			$data['religi'][3][2] = $tempRC/$temp3;
			$data['religi'][4][2] = $tempRK/$temp2;
			$data['religi'][5][2] = 0;
			// $simpan = array(
			// 	'super' => $data['religi'][0][2],
			// 	'sangat_baik' => $data['religi'][1][2],
			// 	'baik' => $data['religi'][2][2],
			// 	'cukup' => $data['religi'][3][2],
			// 	'kurang' => $data['religi'][4][2],
			// 	'sangat_kurang' => $data['religi'][5][2]
			// );
			// $this->Mnaive->input($simpan ,'religi');
		
			//baik - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][1] == "Baik")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][1] == "Baik")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][1] == "Baik")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][1] == "Baik")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][1] == "Baik")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][1] == "Baik")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['religi'][0][3] = $tempRS/$temp6;
			$data['religi'][1][3] = $tempRSB/$temp5;
			$data['religi'][2][3] = $tempRB/$temp4;
			$data['religi'][3][3] = $tempRC/$temp3;
			$data['religi'][4][3] = $tempRK/$temp2;
			$data['religi'][5][3] = 0;
			// $simpan = array(
			// 	'super' => $data['religi'][0][3],
			// 	'sangat_baik' => $data['religi'][1][3],
			// 	'baik' => $data['religi'][2][3],
			// 	'cukup' => $data['religi'][3][3],
			// 	'kurang' => $data['religi'][4][3],
			// 	'sangat_kurang' => $data['religi'][5][3]
			// );
			// $this->Mnaive->input($simpan ,'religi');

			//cukup - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][1] == "Cukup")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][1] == "Cukup")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][1] == "Cukup")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][1] == "Cukup")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][1] == "Cukup")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][1] == "Cukup")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['religi'][0][4] = $tempRS/$temp6;
			$data['religi'][1][4] = $tempRSB/$temp5;
			$data['religi'][2][4] = $tempRB/$temp4;
			$data['religi'][3][4] = $tempRC/$temp3;
			$data['religi'][4][4] = $tempRK/$temp2;
			$data['religi'][5][4] = 0;
			// $simpan = array(
			// 	'super' => $data['religi'][0][4],
			// 	'sangat_baik' => $data['religi'][1][4],
			// 	'baik' => $data['religi'][2][4],
			// 	'cukup' => $data['religi'][3][4],
			// 	'kurang' => $data['religi'][4][4],
			// 	'sangat_kurang' => $data['religi'][5][4]
			// );
			// $this->Mnaive->input($simpan ,'religi');

			//kurang - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][1] == "Kurang")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][1] == "Kurang")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][1] == "Kurang")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][1] == "Kurang")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][1] == "Kurang")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][1] == "Kurang")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['religi'][0][5] = $tempRS/$temp6;
			$data['religi'][1][5] = $tempRSB/$temp5;
			$data['religi'][2][5] = $tempRB/$temp4;
			$data['religi'][3][5] = $tempRC/$temp3;
			$data['religi'][4][5] = $tempRK/$temp2;
			$data['religi'][5][5] = 0;
			// $simpan = array(
			// 	'super' => $data['religi'][0][5],
			// 	'sangat_baik' => $data['religi'][1][5],
			// 	'baik' => $data['religi'][2][5],
			// 	'cukup' => $data['religi'][3][5],
			// 	'kurang' => $data['religi'][4][5],
			// 	'sangat_kurang' => $data['religi'][5][5]
			// );
			// $this->Mnaive->input($simpan ,'religi');

			//sangat kurang - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][1] == "Super")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['religi'][0][6] = $tempRS/$temp6;
			$data['religi'][1][6] = $tempRSB/$temp5;
			$data['religi'][2][6] = $tempRB/$temp4;
			$data['religi'][3][6] = $tempRC/$temp3;
			$data['religi'][4][6] = $tempRK/$temp2;
			$data['religi'][5][6] = 0;
			// $simpan = array(
			// 	'super' => $data['religi'][0][6],
			// 	'sangat_baik' => $data['religi'][1][6],
			// 	'baik' => $data['religi'][2][6],
			// 	'cukup' => $data['religi'][3][6],
			// 	'kurang' => $data['religi'][4][6],
			// 	'sangat_kurang' => $data['religi'][5][6]
			// );
			// $this->Mnaive->input($simpan ,'religi');

		//Sekolah
		//Inisialisasi
		$data['sekolah'][0][0] = "Super";
		$data['sekolah'][1][0] = "Sangat Baik";
		$data['sekolah'][2][0] = "Baik";
		$data['sekolah'][3][0] = "Cukup";
		$data['sekolah'][4][0] = "Kurang";
		$data['sekolah'][5][0] = "Sangat Kurang";
		
		//sekolah
			//super - Hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['sekolah'][0][1] = $tempRS/$temp6;
			$data['sekolah'][1][1] = $tempRSB/$temp5;
			$data['sekolah'][2][1] = $tempRB/$temp4;
			$data['sekolah'][3][1] = $tempRC/$temp3;
			$data['sekolah'][4][1] = $tempRK/$temp2;
			$data['sekolah'][5][1] = 0;
			// $simpan = array(
			// 	'super' => $data['sekolah'][0][1],
			// 	'sangat_baik' => $data['sekolah'][1][1],
			// 	'baik' => $data['sekolah'][2][1],
			// 	'cukup' => $data['sekolah'][3][1],
			// 	'kurang' => $data['sekolah'][4][1],
			// 	'sangat_kurang' => $data['sekolah'][5][1]
			// );
			// $this->Mnaive->input($simpan ,'sekolah');

			//sangat baik - Hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][2] == "Sangat Baik")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][2] == "Sangat Baik")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][2] == "Sangat Baik")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][2] == "Sangat Baik")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][2] == "Sangat Baik")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][2] == "Sangat Baik")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['sekolah'][0][2] = $tempRS/$temp6;
			$data['sekolah'][1][2] = $tempRSB/$temp5;
			$data['sekolah'][2][2] = $tempRB/$temp4;
			$data['sekolah'][3][2] = $tempRC/$temp3;
			$data['sekolah'][4][2] = $tempRK/$temp2;
			$data['sekolah'][5][2] = 0;
			// $simpan = array(
			// 	'super' => $data['sekolah'][0][2],
			// 	'sangat_baik' => $data['sekolah'][1][2],
			// 	'baik' => $data['sekolah'][2][2],
			// 	'cukup' => $data['sekolah'][3][2],
			// 	'kurang' => $data['sekolah'][4][2],
			// 	'sangat_kurang' => $data['sekolah'][5][2]
			// );
			// $this->Mnaive->input($simpan ,'sekolah');
		
			//baik - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][2] == "Baik")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][2] == "Baik")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][2] == "Baik")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][2] == "Baik")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][2] == "Baik")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][2] == "Baik")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['sekolah'][0][3] = $tempRS/$temp6;
			$data['sekolah'][1][3] = $tempRSB/$temp5;
			$data['sekolah'][2][3] = $tempRB/$temp4;
			$data['sekolah'][3][3] = $tempRC/$temp3;
			$data['sekolah'][4][3] = $tempRK/$temp2;
			$data['sekolah'][5][3] = 0;
			// $simpan = array(
			// 	'super' => $data['sekolah'][0][3],
			// 	'sangat_baik' => $data['sekolah'][1][3],
			// 	'baik' => $data['sekolah'][2][3],
			// 	'cukup' => $data['sekolah'][3][3],
			// 	'kurang' => $data['sekolah'][4][3],
			// 	'sangat_kurang' => $data['sekolah'][5][3]
			// );
			// $this->Mnaive->input($simpan ,'sekolah');

			//cukup - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][2] == "Cukup")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][2] == "Cukup")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][2] == "Cukup")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][2] == "Cukup")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][2] == "Cukup")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][2] == "Cukup")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['sekolah'][0][4] = $tempRS/$temp6;
			$data['sekolah'][1][4] = $tempRSB/$temp5;
			$data['sekolah'][2][4] = $tempRB/$temp4;
			$data['sekolah'][3][4] = $tempRC/$temp3;
			$data['sekolah'][4][4] = $tempRK/$temp2;
			$data['sekolah'][5][4] = 0;
			// $simpan = array(
			// 	'super' => $data['sekolah'][0][4],
			// 	'sangat_baik' => $data['sekolah'][1][4],
			// 	'baik' => $data['sekolah'][2][4],
			// 	'cukup' => $data['sekolah'][3][4],
			// 	'kurang' => $data['sekolah'][4][4],
			// 	'sangat_kurang' => $data['sekolah'][5][4]
			// );
			// $this->Mnaive->input($simpan ,'sekolah');

			//kurang - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][2] == "Kurang")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][2] == "Kurang")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][2] == "Kurang")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][2] == "Kurang")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][2] == "Kurang")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][2] == "Kurang")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['sekolah'][0][5] = $tempRS/$temp6;
			$data['sekolah'][1][5] = $tempRSB/$temp5;
			$data['sekolah'][2][5] = $tempRB/$temp4;
			$data['sekolah'][3][5] = $tempRC/$temp3;
			$data['sekolah'][4][5] = $tempRK/$temp2;
			$data['sekolah'][5][5] = 0;
			// $simpan = array(
			// 	'super' => $data['sekolah'][0][5],
			// 	'sangat_baik' => $data['sekolah'][1][5],
			// 	'baik' => $data['sekolah'][2][5],
			// 	'cukup' => $data['sekolah'][3][5],
			// 	'kurang' => $data['sekolah'][4][5],
			// 	'sangat_kurang' => $data['sekolah'][5][5]
			// );
			// $this->Mnaive->input($simpan ,'sekolah');

			//sangat kurang - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][2] == "Super")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['sekolah'][0][6] = $tempRS/$temp6;
			$data['sekolah'][1][6] = $tempRSB/$temp5;
			$data['sekolah'][2][6] = $tempRB/$temp4;
			$data['sekolah'][3][6] = $tempRC/$temp3;
			$data['sekolah'][4][6] = $tempRK/$temp2;
			$data['sekolah'][5][6] = 0;
			// $simpan = array(
			// 	'super' => $data['sekolah'][0][6],
			// 	'sangat_baik' => $data['sekolah'][1][6],
			// 	'baik' => $data['sekolah'][2][6],
			// 	'cukup' => $data['sekolah'][3][6],
			// 	'kurang' => $data['sekolah'][4][6],
			// 	'sangat_kurang' => $data['sekolah'][5][6]
			// );
			// $this->Mnaive->input($simpan ,'sekolah');

		//rumah
		//Inisialisasi
		$data['rumah'][0][0] = "Super";
		$data['rumah'][1][0] = "Sangat Baik";
		$data['rumah'][2][0] = "Baik";
		$data['rumah'][3][0] = "Cukup";
		$data['rumah'][4][0] = "Kurang";
		$data['rumah'][5][0] = "Sangat Kurang";
		
		//Rumah
			//super - Hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['rumah'][0][1] = $tempRS/$temp6;
			$data['rumah'][1][1] = $tempRSB/$temp5;
			$data['rumah'][2][1] = $tempRB/$temp4;
			$data['rumah'][3][1] = $tempRC/$temp3;
			$data['rumah'][4][1] = $tempRK/$temp2;
			$data['rumah'][5][1] = 0;

			// $simpan = array(
			// 	'super' => $data['rumah'][0][1],
			// 	'sangat_baik' => $data['rumah'][1][1],
			// 	'baik' => $data['rumah'][2][1],
			// 	'cukup' => $data['rumah'][3][1],
			// 	'kurang' => $data['rumah'][4][1],
			// 	'sangat_kurang' => $data['rumah'][5][1]
			// );
			// $this->Mnaive->input($simpan ,'rumah');

			//sangat baik - Hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][3] == "Sangat Baik")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][3] == "Sangat Baik")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][3] == "Sangat Baik")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][3] == "Sangat Baik")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][3] == "Sangat Baik")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][3] == "Sangat Baik")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['rumah'][0][2] = $tempRS/$temp6;
			$data['rumah'][1][2] = $tempRSB/$temp5;
			$data['rumah'][2][2] = $tempRB/$temp4;
			$data['rumah'][3][2] = $tempRC/$temp3;
			$data['rumah'][4][2] = $tempRK/$temp2;
			$data['rumah'][5][2] = 0;

			// $simpan = array(
			// 	'super' => $data['rumah'][0][2],
			// 	'sangat_baik' => $data['rumah'][1][2],
			// 	'baik' => $data['rumah'][2][2],
			// 	'cukup' => $data['rumah'][3][2],
			// 	'kurang' => $data['rumah'][4][2],
			// 	'sangat_kurang' => $data['rumah'][5][2]
			// );
			// $this->Mnaive->input($simpan ,'rumah');
		
			//baik - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][3] == "Baik")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][3] == "Baik")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][3] == "Baik")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][3] == "Baik")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][3] == "Baik")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][3] == "Baik")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['rumah'][0][3] = $tempRS/$temp6;
			$data['rumah'][1][3] = $tempRSB/$temp5;
			$data['rumah'][2][3] = $tempRB/$temp4;
			$data['rumah'][3][3] = $tempRC/$temp3;
			$data['rumah'][4][3] = $tempRK/$temp2;
			$data['rumah'][5][3] = 0;
			// $simpan = array(
			// 	'super' => $data['rumah'][0][3],
			// 	'sangat_baik' => $data['rumah'][1][3],
			// 	'baik' => $data['rumah'][2][3],
			// 	'cukup' => $data['rumah'][3][3],
			// 	'kurang' => $data['rumah'][4][3],
			// 	'sangat_kurang' => $data['rumah'][5][3]
			// );
			// $this->Mnaive->input($simpan ,'rumah');

			//cukup - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][3] == "Cukup")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][3] == "Cukup")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][3] == "Cukup")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][3] == "Cukup")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][3] == "Cukup")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][3] == "Cukup")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['rumah'][0][4] = $tempRS/$temp6;
			$data['rumah'][1][4] = $tempRSB/$temp5;
			$data['rumah'][2][4] = $tempRB/$temp4;
			$data['rumah'][3][4] = $tempRC/$temp3;
			$data['rumah'][4][4] = $tempRK/$temp2;
			$data['rumah'][5][4] = 0;
			// $simpan = array(
			// 	'super' => $data['rumah'][0][4],
			// 	'sangat_baik' => $data['rumah'][1][4],
			// 	'baik' => $data['rumah'][2][4],
			// 	'cukup' => $data['rumah'][3][4],
			// 	'kurang' => $data['rumah'][4][4],
			// 	'sangat_kurang' => $data['rumah'][5][4]
			// );
			// $this->Mnaive->input($simpan ,'rumah');

			//kurang - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][3] == "Kurang")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][3] == "Kurang")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][3] == "Kurang")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][3] == "Kurang")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][3] == "Kurang")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][3] == "Kurang")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['rumah'][0][5] = $tempRS/$temp6;
			$data['rumah'][1][5] = $tempRSB/$temp5;
			$data['rumah'][2][5] = $tempRB/$temp4;
			$data['rumah'][3][5] = $tempRC/$temp3;
			$data['rumah'][4][5] = $tempRK/$temp2;
			$data['rumah'][5][5] = 0;
			// $simpan = array(
			// 	'super' => $data['rumah'][0][5],
			// 	'sangat_baik' => $data['rumah'][1][5],
			// 	'baik' => $data['rumah'][2][5],
			// 	'cukup' => $data['rumah'][3][5],
			// 	'kurang' => $data['rumah'][4][5],
			// 	'sangat_kurang' => $data['rumah'][5][5]
			// );
			// $this->Mnaive->input($simpan ,'rumah');

			//sangat kurang - hasil
			$tempRS = 0;
			$tempRSB = 0;
			$tempRB = 0;
			$tempRC = 0;
			$tempRK = 0;
			$tempRSK = 0;
			for($j=0;$j<90;$j++){
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Super")){
					$tempRS++;
				}
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Sangat Baik")){
					$tempRSB++;
				}
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Baik")){
					$tempRB++;
				}
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Cukup")){
					$tempRC++;
				}
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Kurang")){
					$tempRK++;
				}
				if(($data['hasil'][$j][3] == "Super")&&($data['hasil'][$j][4] == "Sangat Kurang")){
					$tempRSK++;
				}
			}
			$data['rumah'][0][6] = $tempRS/$temp6;
			$data['rumah'][1][6] = $tempRSB/$temp5;
			$data['rumah'][2][6] = $tempRB/$temp4;
			$data['rumah'][3][6] = $tempRC/$temp3;
			$data['rumah'][4][6] = $tempRK/$temp2;
			$data['rumah'][5][6] = 0;
			// $simpan = array(
			// 	'super' => $data['rumah'][0][6],
			// 	'sangat_baik' => $data['rumah'][1][6],
			// 	'baik' => $data['rumah'][2][6],
			// 	'cukup' => $data['rumah'][3][6],
			// 	'kurang' => $data['rumah'][4][6],
			// 	'sangat_kurang' => $data['rumah'][5][6]
			// );
			// $this->Mnaive->input($simpan ,'rumah');

		//proses akhir
		for ($i=0; $i < 90; $i++) {
			
			
			//super
			//#Religi
			if($data['hasil'][$i][1] == "Super"){
				$superRel = $data['religi'][0][1];
			} elseif ($data['hasil'][$i][1] == "Sangat Baik"){
				$superRel = $data['religi'][0][2];
			} elseif ($data['hasil'][$i][1] == "Baik"){
				$superRel = $data['religi'][0][3];
			} elseif ($data['hasil'][$i][1] == "Cukup"){
				$superRel = $data['religi'][0][4];
			} elseif ($data['hasil'][$i][1] == "Kurang"){
				$superRel = $data['religi'][0][5];
			} else {
				$superRel = $data['religi'][0][6];
			}
			//#sekolah
			if($data['hasil'][$i][2] == "Super"){
				$superSek = $data['sekolah'][0][1];
			} elseif ($data['hasil'][$i][2] == "Sangat Baik"){
				$superSek = $data['sekolah'][0][2];
			} elseif ($data['hasil'][$i][2] == "Baik"){
				$superSek = $data['sekolah'][0][3];
			} elseif ($data['hasil'][$i][2] == "Cukup"){
				$superSek = $data['sekolah'][0][4];
			} elseif ($data['hasil'][$i][2] == "Kurang"){
				$superSek = $data['sekolah'][0][5];
			} else {
				$superSek = $data['sekolah'][0][6];
			}
			//#rumah
			if($data['hasil'][$i][3] == "Super"){
				$superRum = $data['rumah'][0][1];
			} elseif ($data['hasil'][$i][3] == "Sangat Baik"){
				$superRum = $data['rumah'][0][2];
			} elseif ($data['hasil'][$i][3] == "Baik"){
				$superRum = $data['rumah'][0][3];
			} elseif ($data['hasil'][$i][3] == "Cukup"){
				$superRum = $data['rumah'][0][4];
			} elseif ($data['hasil'][$i][3] == "Kurang"){
				$superRum = $data['rumah'][0][5];
			} else {
				$superRum = $data['rumah'][0][6];
			}
			$data['hasil'][$i][5] = $superRel * $superSek * $superRum *  $data['gejala'][5];

			//sangat baik
			//#Religi
			if($data['hasil'][$i][1] == "Super"){
				$superRel = $data['religi'][1][1];
			} elseif ($data['hasil'][$i][1] == "Sangat Baik"){
				$superRel = $data['religi'][1][2];
			} elseif ($data['hasil'][$i][1] == "Baik"){
				$superRel = $data['religi'][1][3];
			} elseif ($data['hasil'][$i][1] == "Cukup"){
				$superRel = $data['religi'][1][4];
			} elseif ($data['hasil'][$i][1] == "Kurang"){
				$superRel = $data['religi'][1][5];
			} else {
				$superRel = $data['religi'][1][6];
			}
			//#sekolah
			if($data['hasil'][$i][2] == "Super"){
				$superSek = $data['sekolah'][1][1];
			} elseif ($data['hasil'][$i][2] == "Sangat Baik"){
				$superSek = $data['sekolah'][1][2];
			} elseif ($data['hasil'][$i][2] == "Baik"){
				$superSek = $data['sekolah'][1][3];
			} elseif ($data['hasil'][$i][2] == "Cukup"){
				$superSek = $data['sekolah'][1][4];
			} elseif ($data['hasil'][$i][2] == "Kurang"){
				$superSek = $data['sekolah'][1][5];
			} else {
				$superSek = $data['sekolah'][1][6];
			}
			//#rumah
			if($data['hasil'][$i][3] == "Super"){
				$superRum = $data['rumah'][1][1];
			} elseif ($data['hasil'][$i][3] == "Sangat Baik"){
				$superRum = $data['rumah'][1][2];
			} elseif ($data['hasil'][$i][3] == "Baik"){
				$superRum = $data['rumah'][1][3];
			} elseif ($data['hasil'][$i][3] == "Cukup"){
				$superRum = $data['rumah'][1][4];
			} elseif ($data['hasil'][$i][3] == "Kurang"){
				$superRum = $data['rumah'][1][5];
			} else {
				$superRum = $data['rumah'][1][6];
			}
			//$data['hasil'][$i][6] = $superRel."X".$superSek."X".$superRum."X".$temp5." = ".$superRel * $superSek * $superRum * $temp5;
			$data['hasil'][$i][6] = $superRel * $superSek * $superRum * $data['gejala'][4];

			//baik
			//#Religi
			if($data['hasil'][$i][1] == "Super"){
				$superRel = $data['religi'][2][1];
			} elseif ($data['hasil'][$i][1] == "Sangat Baik"){
				$superRel = $data['religi'][2][2];
			} elseif ($data['hasil'][$i][1] == "Baik"){
				$superRel = $data['religi'][2][3];
			} elseif ($data['hasil'][$i][1] == "Cukup"){
				$superRel = $data['religi'][2][4];
			} elseif ($data['hasil'][$i][1] == "Kurang"){
				$superRel = $data['religi'][2][5];
			} else {
				$superRel = $data['religi'][2][6];
			}
			//#sekolah
			if($data['hasil'][$i][2] == "Super"){
				$superSek = $data['sekolah'][2][1];
			} elseif ($data['hasil'][$i][2] == "Sangat Baik"){
				$superSek = $data['sekolah'][2][2];
			} elseif ($data['hasil'][$i][2] == "Baik"){
				$superSek = $data['sekolah'][2][3];
			} elseif ($data['hasil'][$i][2] == "Cukup"){
				$superSek = $data['sekolah'][2][4];
			} elseif ($data['hasil'][$i][2] == "Kurang"){
				$superSek = $data['sekolah'][2][5];
			} else {
				$superSek = $data['sekolah'][2][6];
			}
			//#rumah
			if($data['hasil'][$i][3] == "Super"){
				$superRum = $data['rumah'][2][1];
			} elseif ($data['hasil'][$i][3] == "Sangat Baik"){
				$superRum = $data['rumah'][2][2];
			} elseif ($data['hasil'][$i][3] == "Baik"){
				$superRum = $data['rumah'][2][3];
			} elseif ($data['hasil'][$i][3] == "Cukup"){
				$superRum = $data['rumah'][2][4];
			} elseif ($data['hasil'][$i][3] == "Kurang"){
				$superRum = $data['rumah'][2][5];
			} else {
				$superRum = $data['rumah'][2][6];
			}
			$data['hasil'][$i][7] = $superRel * $superSek * $superRum * $data['gejala'][3];

			//Cukup
			//#Religi
			if($data['hasil'][$i][1] == "Super"){
				$superRel = $data['religi'][3][1];
			} elseif ($data['hasil'][$i][1] == "Sangat Baik"){
				$superRel = $data['religi'][3][2];
			} elseif ($data['hasil'][$i][1] == "Baik"){
				$superRel = $data['religi'][3][3];
			} elseif ($data['hasil'][$i][1] == "Cukup"){
				$superRel = $data['religi'][3][4];
			} elseif ($data['hasil'][$i][1] == "Kurang"){
				$superRel = $data['religi'][3][5];
			} else {
				$superRel = $data['religi'][3][6];
			}
			//#sekolah
			if($data['hasil'][$i][2] == "Super"){
				$superSek = $data['sekolah'][3][1];
			} elseif ($data['hasil'][$i][2] == "Sangat Baik"){
				$superSek = $data['sekolah'][3][2];
			} elseif ($data['hasil'][$i][2] == "Baik"){
				$superSek = $data['sekolah'][3][3];
			} elseif ($data['hasil'][$i][2] == "Cukup"){
				$superSek = $data['sekolah'][3][4];
			} elseif ($data['hasil'][$i][2] == "Kurang"){
				$superSek = $data['sekolah'][3][5];
			} else {
				$superSek = $data['sekolah'][3][6];
			}
			//#rumah
			if($data['hasil'][$i][3] == "Super"){
				$superRum = $data['rumah'][3][1];
			} elseif ($data['hasil'][$i][3] == "Sangat Baik"){
				$superRum = $data['rumah'][3][2];
			} elseif ($data['hasil'][$i][3] == "Baik"){
				$superRum = $data['rumah'][3][3];
			} elseif ($data['hasil'][$i][3] == "Cukup"){
				$superRum = $data['rumah'][3][4];
			} elseif ($data['hasil'][$i][3] == "Kurang"){
				$superRum = $data['rumah'][3][5];
			} else {
				$superRum = $data['rumah'][3][6];
			}
			$data['hasil'][$i][8] = $superRel * $superSek * $superRum * $data['gejala'][2];

			//Kurang
			//#Religi
			if($data['hasil'][$i][1] == "Super"){
				$superRel = $data['religi'][4][1];
			} elseif ($data['hasil'][$i][1] == "Sangat Baik"){
				$superRel = $data['religi'][4][2];
			} elseif ($data['hasil'][$i][1] == "Baik"){
				$superRel = $data['religi'][4][3];
			} elseif ($data['hasil'][$i][1] == "Cukup"){
				$superRel = $data['religi'][4][4];
			} elseif ($data['hasil'][$i][1] == "Kurang"){
				$superRel = $data['religi'][4][5];
			} else {
				$superRel = $data['religi'][4][6];
			}
			//#sekolah
			if($data['hasil'][$i][2] == "Super"){
				$superSek = $data['sekolah'][4][1];
			} elseif ($data['hasil'][$i][2] == "Sangat Baik"){
				$superSek = $data['sekolah'][4][2];
			} elseif ($data['hasil'][$i][2] == "Baik"){
				$superSek = $data['sekolah'][4][3];
			} elseif ($data['hasil'][$i][2] == "Cukup"){
				$superSek = $data['sekolah'][4][4];
			} elseif ($data['hasil'][$i][2] == "Kurang"){
				$superSek = $data['sekolah'][4][5];
			} else {
				$superSek = $data['sekolah'][4][6];
			}
			//#rumah
			if($data['hasil'][$i][3] == "Super"){
				$superRum = $data['rumah'][4][1];
			} elseif ($data['hasil'][$i][3] == "Sangat Baik"){
				$superRum = $data['rumah'][4][2];
			} elseif ($data['hasil'][$i][3] == "Baik"){
				$superRum = $data['rumah'][4][3];
			} elseif ($data['hasil'][$i][3] == "Cukup"){
				$superRum = $data['rumah'][4][4];
			} elseif ($data['hasil'][$i][3] == "Kurang"){
				$superRum = $data['rumah'][4][5];
			} else {
				$superRum = $data['rumah'][4][6];
			}
			$data['hasil'][$i][9] = $superRel * $superSek * $superRum * $data['gejala'][1];

			//Sangat Kurang
			//#Religi
			if($data['hasil'][$i][1] == "Super"){
				$superRel = $data['religi'][5][1];
			} elseif ($data['hasil'][$i][1] == "Sangat Baik"){
				$superRel = $data['religi'][5][2];
			} elseif ($data['hasil'][$i][1] == "Baik"){
				$superRel = $data['religi'][5][3];
			} elseif ($data['hasil'][$i][1] == "Cukup"){
				$superRel = $data['religi'][5][4];
			} elseif ($data['hasil'][$i][1] == "Kurang"){
				$superRel = $data['religi'][5][5];
			} else {
				$superRel = $data['religi'][5][6];
			}
			//#sekolah
			if($data['hasil'][$i][2] == "Super"){
				$superSek = $data['sekolah'][5][1];
			} elseif ($data['hasil'][$i][2] == "Sangat Baik"){
				$superSek = $data['sekolah'][5][2];
			} elseif ($data['hasil'][$i][2] == "Baik"){
				$superSek = $data['sekolah'][5][3];
			} elseif ($data['hasil'][$i][2] == "Cukup"){
				$superSek = $data['sekolah'][5][4];
			} elseif ($data['hasil'][$i][2] == "Kurang"){
				$superSek = $data['sekolah'][5][5];
			} else {
				$superSek = $data['sekolah'][5][6];
			}
			//#rumah
			if($data['hasil'][$i][3] == "Super"){
				$superRum = $data['rumah'][5][1];
			} elseif ($data['hasil'][$i][3] == "Sangat Baik"){
				$superRum = $data['rumah'][5][2];
			} elseif ($data['hasil'][$i][3] == "Baik"){
				$superRum = $data['rumah'][5][3];
			} elseif ($data['hasil'][$i][3] == "Cukup"){
				$superRum = $data['rumah'][5][4];
			} elseif ($data['hasil'][$i][3] == "Kurang"){
				$superRum = $data['rumah'][5][5];
			} else {
				$superRum = $data['rumah'][5][6];
			}
			$data['hasil'][$i][10] = $superRel * $superSek * $superRum * $data['gejala'][0];
		}
		//prediksi
		for ($i=0; $i < 90; $i++) {
			// $simpan = array(
			// 	'id_anak' => $i+1,
			// 	'religi' => $data['hasil'][$i][1],
			// 	'sekolah' => $data['hasil'][$i][2],
			// 	'rumah' => $data['hasil'][$i][3],
			// 	'prilaku' => $data['hasil'][$i][4]
			// );
			// $this->Mnaive->input($simpan ,'hasil_training_detail');

			$max = max($data['hasil'][$i][5],$data['hasil'][$i][6],$data['hasil'][$i][7],$data['hasil'][$i][8],$data['hasil'][$i][9],$data['hasil'][$i][10]);
			if($max == $data['hasil'][$i][5]){
				$data['hasil'][$i][11] = "Super";
			}
			if($max == $data['hasil'][$i][6]){
				$data['hasil'][$i][11] = "Sangat Baik";
			}
			if($max == $data['hasil'][$i][7]){
				$data['hasil'][$i][11] = "Baik";
			}
			if($max == $data['hasil'][$i][8]){
				$data['hasil'][$i][11] = "Cukup";
			}
			if($max == $data['hasil'][$i][9]){
				$data['hasil'][$i][11] = "Kurang";
			}
			if($max == $data['hasil'][$i][10]){
				$data['hasil'][$i][11] = "Sangat Kurang";
			}
		}

		$this->load->view('naive', $data);
	}
}
