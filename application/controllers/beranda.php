<?php
class Beranda extends CI_Controller{
    function __construct(){
        parent::__construct();
		chek_session();
    }
	
    function index(){
		$data['baris']=$this->db->from("tbl_mobil")->where('status','Tersedia')->get()->num_rows();
		$data['baris2']=$this->db->from("tbl_pembeli")->get()->num_rows();
		$data['baris3']=$this->db->from("tbl_penyuplai")->get()->num_rows();
		$data['baris4']=$this->db->from("tbl_penjualan")->get()->result();
        $this->load->view('pages/v_header',$data);
        $this->load->view('pages/v_beranda',$data);
    }

}
