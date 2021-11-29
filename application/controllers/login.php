<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
        $this->load->model("M_Admin");
	}
	public function index()
	{
        $this->load->view('login');
		
	}
    public function login()
    {
		$user = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        //$where = array('username' => $username, 'password' => $password);
        
        //$cek_akun = $this->M_Admin->getD('siswas', $where)->num_rows();
	   
		$cek_akun = $this->db->query("SELECT * FROM siswa WHERE username = '$user' AND password = '$password'");
        if ($cek_akun->num_rows() > 0){
			
			$data            = $cek_akun->row_array();    
            $data_session = array(
				'username'      => $user,
				'nama'          => $data['nama'],
				'id'            => $data['id'],
				'kelas'         => $data['kelas'],
				'golongan'      => $data['golongan'],
				'level'         => $data['level'],
                'status'  		=> "login",
            );
            
            $this->session->set_userdata($data_session);//proses membuat session
			
			if($data['level'] == 2){
				redirect(base_url("home"));
			} else {
				redirect(base_url("kategori"));
			}
        }else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
        
