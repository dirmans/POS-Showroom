<?php
class Penyuplai extends CI_Controller {
	function __construct(){
		parent::__construct();
		chek_session();
		$this->load->model('model_master');
	}
	
	function index()
	{
		$data=array('kd_penyuplai'=>$this->model_master->getKodePenyuplai(),
					'data_penyuplai'=>$this->model_master->getAllPenyuplai(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_penyuplai', $data);
	}
	function add()
	{
		$data=array('kd_penyuplai'=>$this->model_master->getKodePenyuplai(),
					'data_penyupali'=>$this->model_master->getAllPenyuplai(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('option/v_add_penyuplai',$data);
	}
	
    //    ======================== EDIT =======================
    function edit()
	{
        if(isset($_POST['submit']))
		{
			// proses edit
			$id		    =   $this->input->post('kd_penyuplai');
			$nama       =   $this->input->post('nama_penyuplai');
			$alamat		=   $this->input->post('alamat_penyuplai');
			$notelp		=   $this->input->post('notelp_penyuplai');
			$data		=	array('nama_penyuplai'=>$nama,
							'alamat_penyuplai'=>$alamat,
							'notelp_penyuplai'=>$notelp);
			$this->model_master->updatePenyuplai($data,$id);
			redirect('penyuplai');
        }
		else
		{ 
            $id = $this->uri->segment(3);
            $data['baris'] = $this->model_master->getPenyuplaiById($id)->row_array();
			$this->load->view('pages/v_header',$data);
			$this->load->view('option/v_edit_penyuplai',$data);
			
        }		
    }
	//    ===================== INSERT =====================
    function tambah_penyuplai(){
        $data=array(
            'kd_penyuplai'=>$this->model_master->getKodePenyuplai(),
			'nama_penyuplai'=>$this->input->post('nama_penyuplai'),
			'alamat_penyuplai'=>$this->input->post('alamat_penyuplai'),
            'notelp_penyuplai'=>$this->input->post('notelp_penyuplai'),
        );
        $this->model_master->insertPenyuplai($data);
        redirect("penyuplai");
    }
	//    ========================== DELETE =======================
    function hapus_penyuplai(){
        $id = $this->uri->segment(3);
        $this->model_master->deletePenyuplai($id);
        redirect("penyuplai");
    }
}
?>