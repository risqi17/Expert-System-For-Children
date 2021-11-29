<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solusi extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
         $this->load->model("M_Admin");
//        if($this->session->userdata('username') !=TRUE ){
//            redirect("login");
//        }
	}
	public function index()
	{
        $data1['status']='solusi';
        $data['solusi'] =$this->M_Admin->getQuery("SELECT *  from data_solusi JOIN data_kategori ON data_solusi.kd_kategori=data_kategori.kd_kategori")->result();
//        $data['adiksi'] =$this->M_Admin->getQuery("SELECT ID_ADIKSI,AD_TINGKAT,AD_RANGE_MIN,AD_RANGE_MAX, US_NAMA FROM adiksi_gadget JOIN usia ON adiksi_gadget.ID_USIA = usia.ID_USIA where adiksi_gadget.AD_STATUS=1")->result();
        $data['kategori']=$this->M_Admin->getQuery("SELECT * FROM `data_kategori` ORDER BY kd_kategori DESC")->result();
        $this->load->view('header', $data1);
        $this->load->view('solusi',$data);
        $this->load->view('footer');
	}
    public function insert_solusi()
    {
        $kd_kategori=$_POST['kategori'];
        $solusi=$_POST['solusi'];
        $motivasi=$_POST['motivasi'];
        $fields=array(  
            'kd_kategori'=>$kd_kategori,
            'keterangan'=>$solusi,     
            'motivasi'=>$motivasi
        );
        $table="data_solusi";
        $this->M_Admin->saveData($table, $fields);  
        
        redirect('Solusi');
    }
    
//    public function pindah_edit_rule($id)
//    {
//        $data['status']="rule";
//        $data2['data_solusi_edit']=$this->M_Admin->getQuery("SELECT * FROM data_solusi JOIN usia ON data_solusi.kd_kategori  = data_kategori.kd_kategori where data_solusi.kd_solusi='$id'")->result();
//        $data['kategori']=$this->M_Admin->getQuery("SELECT * FROM `data_kategori` ORDER BY kd_kategori DESC")->result();
//        $this->load->view('header',$data);
//		$this->load->view('edit_solusi',$data2);
//        $this->load->view('footer',$data);
//    }
//    
//    public function edit_rule()
//    {
//        $id=$_POST['id_edit_rule'];
//        $kategori_usia=$_POST['edit_kategori_usia'];
//        $pertanyaan=$_POST['edit_pertanyaan_1'];
//        $Jawab_Y=$_POST['edit_jawab_Y'];
//        $Jawab_M=$_POST['edit_jawab_M'];
//        $Jawab_T=$_POST['edit_jawab_T'];
//        
//        $fields=array(
//            'ID_USIA'=>$kategori_usia,
//            'ID_GEJALA'=>$pertanyaan,
//            'JWB_Y'=>$Jawab_Y,
//            'JWB_M'=>$Jawab_M,
//            'JWB_T'=>$Jawab_T
//        );
//        
//        $where=array('ID_RULE'=>$id);
//        $table="rule";
//            
//        $this->M_Admin->updateData($table, $fields, $where);
//        
//        redirect('rule');
//    }
//    
//    //fungsi hapus
//    function hapus_rule_gejala($id){
//         $id=$_POST['id_hapus_rule'];
//        $fields=array(
//            'RL_STATUS'=>0
//             );
//         $table="rule";
//         $where=array('ID_RULE'=>$id);
//       
//          $this->M_Admin->updateData($table, $fields, $where);
//        
//        
//         redirect('rule');
//	}
//   
 }
?>
    