<?php
class Mnaive extends CI_Model {
    //super
    // var $db;
	var $table = 'data_kategori';
	var $table2 = 'data_perilaku';
	var $table3 = 'data_rule';

    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
   
     
	public function getHasil(){
		$data = $this->db->query('select * from hasil where id_hasil = 1');
		return $data;
	}
	public function getHasilByGejalaHari($gejala, $hari){
		$data = $this->db->query("select * from hasil where gejala_id = '$gejala' and hari_ke = $hari");
		return $data;
	}
	 
	public function getHasilByGejalaAnak($gejala, $anak){
		$data = $this->db->query("select sum(h.kondisi_id) as jumlah, u.nama_anak from hasil h inner join user_anak u on h.anak_id=u.id where gejala_id = '$gejala' and anak_id = $anak");
		return $data;
	}

	function input($data,$table){
		$this->db->insert($table,$data);
  	}
}
?>
