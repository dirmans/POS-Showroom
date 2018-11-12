<?php
class Mobil extends CI_Controller {
	function __construct(){
		parent::__construct();
		chek_session();
		$this->load->model('model_master');
	}
	
	//    ======================== INDEX =======================
	
	function index()
	{
		$data=array('kd_mobil'=>$this->model_master->getKodeMobil(),
					'data_mobil'=>$this->model_master->getAllMobil(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_mobil', $data);
	}
	
	function add()
	{
		$data=array('kd_mobil'=>$this->model_master->getKodeMobil(),
					'data_mobil'=>$this->model_master->getAllMobil()
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('option/v_add_mobil',$data);
	}
	
	function detail()
	{
		$id = $this->uri->segment(3);
		$data=array('data_mobil'=>$this->model_master->getAllMobil(),
					'record'=>$this->model_master->getMobilById($id)->row_array()
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_detail_mobil',$data);
	}	
	
	//    ======================== EDIT =======================
    
	function edit()
	{
        if(isset($_POST['submit']))
		{
			// proses edit
			$id		    =   $this->input->post('kd_mobil');
			$merk_mobil =   $this->input->post('merk_mobil');
			$harga_beli	=   $this->input->post('harga_beli');
			$harga_jual	=   $this->input->post('harga_jual');
			$no_pol		=	$this->input->post('no_pol');
			$no_rka		=	$this->input->post('no_rka');
			$no_msn		=	$this->input->post('no_msn');
			$tahun		=	$this->input->post('tahun');
			$warna		=	$this->input->post('warna');
			$atas_nama	=	$this->input->post('atas_nama');
			$alamat		=	$this->input->post('alamat');
			$status		=	$this->input->post('status');
			$data		=	array('merk_mobil'=>$merk_mobil,
								  'harga_beli'=>$harga_beli,
								  'harga_jual'=>$harga_jual,
								  'no_pol'=>$no_pol,
								  'no_rka'=>$no_rka,
								  'no_msn'=>$no_msn,
								  'tahun'=>$tahun,
								  'warna'=>$warna,
								  'atas_nama'=>$atas_nama,
								  'alamat'=>$alamat,
								  'status'=>$status);
			$this->model_master->updateMobil($data,$id);
			redirect('mobil');
        }
		else
		{ 
            $id = $this->uri->segment(3);
            $data['baris'] = $this->model_master->getMobilById($id)->row_array();
			$this->load->view('pages/v_header',$data);
			$this->load->view('option/v_edit_mobil',$data);
			
        }		
    }
	
	//    ===================== INSERT =====================
	
    function tambahMobil(){
        $data=array(
            'kd_mobil'=>$this->model_master->getKodeMobil(),
			'merk_mobil'=>$this->input->post('merk_mobil'),
			'harga_beli'=>$this->input->post('harga_beli'),
			'harga_jual'=>$this->input->post('harga_jual'),
			'no_pol'=>$this->input->post('no_pol'),
			'no_rka'=>$this->input->post('no_rka'),
			'no_msn'=>$this->input->post('no_msn'),
			'tahun'=>$this->input->post('tahun'),
			'warna'=>$this->input->post('warna'),
			'atas_nama'=>$this->input->post('atas_nama'),
			'alamat'=>$this->input->post('alamat'),
            'status'=>'Tersedia');
        $this->model_master->insertMobil($data);
        redirect("mobil");
    }
	
	//    ========================== DELETE =======================
    function hapusMobil(){
        $id = $this->uri->segment(3);
        $this->model_master->deleteMobil($id);
        redirect("mobil");
    }
	
	function hapusJnsSapi(){
        $id = $this->uri->segment(3);
        $this->model_master->deleteJnsSapi($id);
        redirect("sapi/jnsSapi");
    }
}
?>