<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
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
        $data1['status']='kategori';
        $data['kategori'] =$this->M_Admin->getQuery("SELECT *  from data_kategori")->result();
        $this->load->view('header', $data1);
        $this->load->view('kategori',$data);
        $this->load->view('footer');
	}
    public function insert_kategori()
    {
        $kategori=$_POST['nm_kategori'];
        $fields=array(  
            'nm_kategori'=>$kategori                       
        );
        $table="data_kategori";
        $this->M_Admin->saveData($table, $fields);  
        
        redirect('Kategori');
    }
}
?>
    