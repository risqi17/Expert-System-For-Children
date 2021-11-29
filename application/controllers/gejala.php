<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {
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
        $data1['status']='gejala';
        $data['gejala'] =$this->M_Admin->getQuery("SELECT *  from gejala")->result();
        $this->load->view('header', $data1);
        $this->load->view('gejala',$data);
        $this->load->view('footer');
	}
    public function insert_gejala()
    {
        $aspek=$_POST['aspek'];
        $gejala=$_POST['gejala'];
        $fields=array( 
            'aspek'=>$aspek,
            'nama_gejala'=>$gejala                       
        );
        $table="gejala";
        $this->M_Admin->saveData($table, $fields);  
        
        redirect('Gejala');
    }
}
?> 
    