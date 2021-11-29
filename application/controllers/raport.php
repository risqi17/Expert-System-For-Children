<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		 $this->load->model("M_Admin");
		 $this->load->database();
//        if($this->session->userdata('username') !=TRUE ){
//            redirect("login");
//        }
	}
	public function index()
	{
		$user = $this->session->userdata("id");
		$cek_bulan = $this->db->query("SELECT * FROM hasil_testing WHERE id_anak = $user ORDER BY bulan_ke DESC LIMIT 1 ")->row_array();
		$data['panjang'] = $cek_bulan['bulan_ke'];
		//dari super ke sangat kurang
		$nilai_gejala = array(0.43333333333333, 0.21111111111111, 0.23333333333333, 0.088888888888889, 0.033333333333333, 0);

		//perulangan jumlah bulan
		for($i = 0; $i < $cek_bulan['bulan_ke']; $i++){
			//bulan ke
			$bulan = $i+1;
			$cek_jumlah = $this->db->query("SELECT COUNT(bulan_ke) as jumlah_per FROM hasil_testing WHERE bulan_ke = $bulan AND id_anak = $user")->row_array();
			
			//cek jumlah data
			if($cek_jumlah['jumlah_per'] == 504){
				$status = 'selesai';
				
				for($j = 1; $j <= 18; $j++){
					$gejala = "G".$j;
					$get = $this->db->query("SELECT SUM(kondisi) AS jumlah FROM hasil_testing WHERE id_anak = $user AND bulan_ke = $bulan AND gejala = '$gejala'")->row_array();
					$nilai[$j-1] = $get['jumlah']*100/84;
					//echo $get['jumlah'].'<br>';
				}
				$religi =  ($nilai[0]+$nilai[1]+$nilai[2]+$nilai[3]+$nilai[4]+$nilai[5])/6;
				$sekolah =  ($nilai[6]+$nilai[7]+$nilai[8]+$nilai[9]+$nilai[10]+$nilai[11])/6;
				$rumah =  ($nilai[12]+$nilai[13]+$nilai[14]+$nilai[15]+$nilai[16]+$nilai[17])/6;
				$hasil = ($religi+$sekolah+$rumah)/3;

				if(($religi>10)&&($religi<19)){
					$rel = "Sangat Kurang";
				} elseif (($religi>20)&&($religi<29)){
					$rel = "Kurang";
				} elseif (($religi>30)&&($religi<49)){
					$rel = "Cukup";
				} elseif (($religi>50)&&($religi<74)){
					$rel = "Baik";
				} elseif (($religi>75)&&($religi<84)){
					$rel = "Sangat Baik";
				} else {
					$rel = "Super";
				}
				if(($sekolah>10)&&($sekolah<19)){
					$sek = "Sangat Kurang";
				} elseif (($sekolah>20)&&($sekolah<29)){
					$sek = "Kurang";
				} elseif (($sekolah>30)&&($sekolah<49)){
					$sek = "Cukup";
				} elseif (($sekolah>50)&&($sekolah<74)){
					$sek = "Baik";
				} elseif (($sekolah>75)&&($sekolah<84)){
					$sek = "Sangat Baik";
				} else {
					$sek = "Super";
				}
				if(($rumah>10)&&($rumah<19)){
					$rum = "Sangat Kurang";
				} elseif (($rumah>20)&&($rumah<29)){
					$rum = "Kurang";
				} elseif (($rumah>30)&&($rumah<49)){
					$rum = "Cukup";
				} elseif (($rumah>50)&&($rumah<74)){
					$rum = "Baik";
				} elseif (($rumah>75)&&($rumah<84)){
					$rum = "Sangat Baik";
				} else {
					$rum = "Super";
				}
				if(($hasil>10)&&($hasil<19)){
					$has = "Sangat Kurang";
				} elseif (($hasil>20)&&($hasil<29)){
					$has = "Kurang";
				} elseif (($hasil>30)&&($hasil<49)){
					$has = "Cukup";
				} elseif (($hasil>50)&&($hasil<74)){
					$has = "Baik";
				} elseif (($hasil>75)&&($hasil<84)){
					$has = "Sangat Baik";
				} else {
					$has = "Super";
				}

				echo $religi.' ,'.$sekolah.' ,'.$rumah.' ,'.$hasil.'<br>';
				echo $rel.' ,'.$sek.' ,'.$rum.' ,'.$has.'<br>';

				//Religi
				if($rel == 'Super'){
					$temp_rel = 0;
				} elseif ($rel == 'Sangat Baik'){
					$temp_rel = 1;
				} elseif ($rel == 'Baik'){
					$temp_rel = 2;
				} elseif ($rel == 'Cukup'){
					$temp_rel = 3;
				} elseif ($rel == 'Kurang'){
					$temp_rel = 4;
				} else {
					$temp_rel = 5;
				}
				//Sekolah
				if($sek == 'Super'){
					$temp_sek = 0;
				} elseif ($sek == 'Sangat Baik'){
					$temp_sek = 1;
				} elseif ($sek == 'Baik'){
					$temp_sek = 2;
				} elseif ($sek == 'Cukup'){
					$temp_sek = 3;
				} elseif ($sek == 'Kurang'){
					$temp_sek = 4;
				} else {
					$temp_sek = 5;
				}
				//Rumah
				if($rum == 'Super'){
					$temp_rum = 0;
				} elseif ($rum == 'Sangat Baik'){
					$temp_rum = 1;
				} elseif ($rum == 'Baik'){
					$temp_rum = 2;
				} elseif ($rum == 'Cukup'){
					$temp_rum = 3;
				} elseif ($rum == 'Kurang'){
					$temp_rum = 4;
				} else {
					$temp_rum = 5;
				}

				
				//super
				$re = $this->db->query("SELECT super FROM religi WHERE id_religi = $temp_rel")->row_array();
				$ru = $this->db->query("SELECT super FROM rumah WHERE id_rumah = $temp_rum")->row_array();
				$se = $this->db->query("SELECT super FROM sekolah WHERE id_sekolah = $temp_sek")->row_array();
				$super = $re['super']*$ru['super']*$se['super']*$nilai_gejala[0];
				echo $re['super'].' ,'.$ru['super'].','.$se['super'].' ,'.$nilai_gejala[0].'<br>';

				//sangat Baik
				$re = $this->db->query("SELECT sangat_baik FROM religi WHERE id_religi = $temp_rel")->row_array();
				$ru = $this->db->query("SELECT sangat_baik FROM rumah WHERE id_rumah = $temp_rum")->row_array();
				$se = $this->db->query("SELECT sangat_baik FROM sekolah WHERE id_sekolah = $temp_sek")->row_array();
				$sangat_baik = $re['sangat_baik']*$ru['sangat_baik']*$se['sangat_baik']*$nilai_gejala[1];

				//baik
				$re = $this->db->query("SELECT baik FROM religi WHERE id_religi = $temp_rel")->row_array();
				$ru = $this->db->query("SELECT baik FROM rumah WHERE id_rumah = $temp_rum")->row_array();
				$se = $this->db->query("SELECT baik FROM sekolah WHERE id_sekolah = $temp_sek")->row_array();
				$baik = $re['baik']*$ru['baik']*$se['baik']*$nilai_gejala[2];

				//cukup
				$re = $this->db->query("SELECT cukup FROM religi WHERE id_religi = $temp_rel")->row_array();
				$ru = $this->db->query("SELECT cukup FROM rumah WHERE id_rumah = $temp_rum")->row_array();
				$se = $this->db->query("SELECT cukup FROM sekolah WHERE id_sekolah = $temp_sek")->row_array();
				$cukup = $re['cukup']*$ru['cukup']*$se['cukup']*$nilai_gejala[3];

				//kurang
				$re = $this->db->query("SELECT kurang FROM religi WHERE id_religi = $temp_rel")->row_array();
				$ru = $this->db->query("SELECT kurang FROM rumah WHERE id_rumah = $temp_rum")->row_array();
				$se = $this->db->query("SELECT kurang FROM sekolah WHERE id_sekolah = $temp_sek")->row_array();
				$kurang = $re['kurang']*$ru['kurang']*$se['kurang']*$nilai_gejala[4];

				//sangat kurang
				$re = $this->db->query("SELECT sangat_kurang FROM religi WHERE id_religi = $temp_rel")->row_array();
				$ru = $this->db->query("SELECT sangat_kurang FROM rumah WHERE id_rumah = $temp_rum")->row_array();
				$se = $this->db->query("SELECT sangat_kurang FROM sekolah WHERE id_sekolah = $temp_sek")->row_array();
				$sangat_kurang = $re['sangat_kurang']*$ru['sangat_kurang']*$se['sangat_kurang']*$nilai_gejala[5];

				echo $super.' ,'.$sangat_baik.' ,'.$baik.' ,'.$cukup.' ,'.$kurang.' ,'.$sangat_kurang;
				$prediksi = max($super,$sangat_baik,$baik,$cukup,$kurang,$sangat_kurang);

				if($prediksi == $super){
					$data['hasil'][$i][1] = 6;
				} elseif ($prediksi == $sangat_baik){
					$data['hasil'][$i][1] = 5;
				} elseif ($prediksi == $baik){
					$data['hasil'][$i][1] = 4;
				} elseif ($prediksi == $cukup){
					$data['hasil'][$i][1] = 3;
				} elseif ($prediksi == $kurang){
					$data['hasil'][$i][1] = 2;
				} else {
					$data['hasil'][$i][1] = 1;
				}


			} else {
				$status = 'belum selesai';
				$data['hasil'][$i][1] = 0; //hasil
			}
			$data['hasil'][$i][0] = $i+1; //bulan-ke
			$data['hasil'][$i][2] = $status; //status selesai apa belum
		}

        $data['status'] = 'raport';
        $this->load->view('header', $data);
        $this->load->view('raport', $data);
        $this->load->view('footer');
	}
	public function detail_raport()
	{
        $data['status'] = 'raport';
        //$data['nilai_raport'] =$this->M_Admin->getQuery("SELECT * FROM hasil join data_solusi ON hasil.kd_solusi=data_solusi.kd_solusi")->result();
        $this->load->view('header', $data);
        $this->load->view('detail_raport', $data);
        $this->load->view('footer');
	}
}
?>
    