<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule extends CI_Controller {
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
        $data1['status']='rule';
        $data['tampil_rule'] =$this->M_Admin->getQuery("SELECT * FROM data_rule join gejala on data_rule.id_gejala=gejala.id")->result();
        $data['pertanyaan_awal']=$this->M_Admin->getQuery("SELECT * FROM gejala")->result();
        $this->load->view('header', $data1);
        $this->load->view('rule',$data);
        $this->load->view('footer');
	}
    
    public function insert_rule_gejala()
    {
        $pertanyaan=$_POST['pertanyaan_1'];
        $Jawab_Y=$_POST['jawab_Y'];
        $Jawab_T=$_POST['jawab_T'];
        
         $fields=array(
            'id_gejala'=>$pertanyaan,
            'jawab_Y'=>$Jawab_Y,
            'jawab_T'=>$Jawab_T                     
 );
        $table="data_rule";
        $this->M_Admin->saveData($table, $fields); 
            
         redirect('rule');
            }
    
}
?>
    