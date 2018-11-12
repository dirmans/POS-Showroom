<?php
class Pembeli extends CI_Controller {
	function __construct(){
		parent::__construct();
		chek_session();
		$this->load->model('model_master');
	}
	
	function index()
	{
		$data=array('kd_pembeli'=>$this->model_master->getKodePembeli(),
					'data_pembeli'=>$this->model_master->getAllPembeli(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_pembeli', $data);
	}
	
	function add()
	{
		$data=array('kd_pembeli'=>$this->model_master->getKodePembeli(),
					'data_pembeli'=>$this->model_master->getAllPembeli(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('option/v_add_pembeli',$data);
	}
	
	//    ======================== EDIT =======================
    function edit()
	{
        if(isset($_POST['submit']))
		{
			// proses edit
			$id		    =   $this->input->post('kd_pembeli');
			$nama       =   $this->input->post('nama_pembeli');
			$alamat		=   $this->input->post('alamat_pembeli');
			$notelp		=   $this->input->post('notelp_pembeli');
			$data		=	array('nama_pembeli'=>$nama,
							'alamat_pembeli'=>$alamat,
							'notelp_pembeli'=>$notelp);
			$this->model_master->updatePembeli($data,$id);
			redirect('pembeli');
        }
		else
		{ 
            $id = $this->uri->segment(3);
            $data['baris'] = $this->model_master->getPembeliById($id)->row_array();
			$this->load->view('pages/v_header',$data);
			$this->load->view('option/v_edit_pembeli',$data);
        }		
    }
	
	//    ===================== INSERT =====================
    function tambahPembeli(){
        $data=array(
            'kd_pembeli'=>$this->model_master->getKodePembeli(),
			'nama_pembeli'=>$this->input->post('nama_pembeli'),
			'alamat_pembeli'=>$this->input->post('alamat_pembeli'),
            'notelp_pembeli'=>$this->input->post('notelp_pembeli'),
        );
		
        $this->model_master->insertPembeli($data);
        redirect("pembeli");
    }
	
	//    ========================== DELETE =======================
    function hapusPembeli(){
        $id = $this->uri->segment(3);
        $this->model_master->deletePembeli($id);
        redirect("pembeli");
    }
}
?>