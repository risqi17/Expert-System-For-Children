<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
        $data1['status']='home';
        $this->load->view('header', $data1);
        $this->load->view('home_awal');
        $this->load->view('footer');
	}
    
     public function kuis_home($id)
    {
		$user = $this->session->userdata("id");
		$cek_hari = $this->db->query("SELECT * FROM hasil_testing WHERE id_anak = $user ORDER BY hari_ke DESC LIMIT 1 ");
		
		
		//echo $cek_hari->num_rows();

		if($cek_hari->num_rows() > 0){
			$h = $cek_hari->row_array();
			$temp_h = $h['hari_ke'];
			$temp_b = $h['bulan_ke'];
			$cek_jumlah = $this->db->query("SELECT COUNT(hari_ke) as jumlah_gejala FROM hasil_testing WHERE id_anak = $user AND hari_ke = $temp_h AND bulan_ke = $temp_b ")->row_array();
			$cek_bulan = $this->db->query("SELECT COUNT(bulan_ke) as jumlah_bulan FROM hasil_testing WHERE id_anak = $user AND bulan_ke = $temp_b")->row_array();
			//jika jumlah data pada bulan ke-x 504 maka bulan ditambah 1 dan hari kembali ke 1
			if($cek_bulan['jumlah_bulan'] == 504){
				$bulan = $temp_b+1;
				$hari = 1;
			} else {
			//jika tidak maka bulan tetap 
				$bulan = $temp_b;
			//jika jumlah gejala pada harike dan bulan ke yg sama 
			//jumlah gejala = 18 maka hari ditambah 1 
				if($cek_jumlah['jumlah_gejala'] == 18){
					$hari = $h['hari_ke']+1;
			//jika tidak maka hari tetap sama
				} else {
					$hari = $h['hari_ke'];
				}
			}
		} else {
			$hari = 1;
			$bulan = 1;
		}
		if($this->input->post('id_gejala') != ''){
			$gejala = $this->input->post('id_gejala');
			$kondisi = $this->input->post('id_gjl');
			

			$fields=array(
				'id_anak'  => $user,
				'kondisi'  => $kondisi,
				'gejala'   => $gejala,
				'hari_ke'  => $hari,
				'bulan_ke' => $bulan,
				'waktu'    => date("Y-m-d H:i:s")
			);
			
			$table = "hasil_testing";
			$this->M_Admin->saveData($table, $fields); 
			
		}
		$data['hari_ke'] = $hari;
		$data['bulan_ke'] = $bulan;
        $data['status'] = "home";
		$data['gej'] = $id;
		$data['gejala'] = $this->M_Admin->getGejala($id)->result();

        $this->load->view('header',$data);
		$this->load->view('home');
        $this->load->view('footer',$data);
    }
    
    public function detail_kuis_home()
    {
        $data['status']="home";
//       $data2['data_detail_artikel']=$this->M_Admin->getQuery("SELECT * FROM artikel where ID_ARTIKEL=$id")->result();
        $this->load->view('header',$data);
		$this->load->view('home_detail');
        $this->load->view('footer',$data);
    }
    
}
?>
    