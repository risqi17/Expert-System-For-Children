<?php
class Madmin extends CI_Model {
    //super
    // var $db;
	var $table = 'data_kategori';
	var $table2 = 'data_perilaku';
	var $table3 = 'data_rule';

    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
   
     //kategori
    function ambil_kategori(){
		return $this->db->get('data_kategori');
	}
    
    function input_kategori($data,$table){
		$this->db->insert($table,$data);
  }

  function hapus_kategori($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
      }
  
  //perilaku
  function ambil_perilaku(){
		return $this->db->get('data_perilaku');
	}
    
    function input_perilaku($data,$table){
		$this->db->insert($table,$data);
  }
  
  //rule
  function ambil_rule(){
		return $this->db->get('data_rule');
	}
    
    function input_rule($data,$table3){
		$this->db->insert($table3,$data);
	}
    
    function hapus_rule($where,$table3){
        $this->db->where($where);
        $this->db->delete($table3);
    }
    
    public function getQuery($q){
        $query = $this->db->query($q);
        return $query;
    }
       
}
?>