<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
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
        $data1['status']='laporan';
        $data['laporan'] =$this->M_Admin->getQuery("SELECT * FROM hasil join user_anak ON hasil.anak_id=user_anak.id")->result();
        $this->load->view('header', $data1);
        $this->load->view('laporan',$data);
        $this->load->view('footer');
	}
}
?>
    