<?php
class Pengguna extends CI_Controller {
	function __construct(){
		parent::__construct();
		chek_session();
		$this->load->model('model_master');
	}
	
	function index()
	{
		$data=array('kd_pengguna'=>$this->model_master->getKodePengguna(),
					'data_pengguna'=>$this->model_master->getAllPengguna(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_pengguna', $data);
	}
	function add()
	{
		$data=array('kd_pengguna'=>$this->model_master->getKodePengguna(),
					'data_pengguna'=>$this->model_master->getAllPengguna(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('option/v_add_pengguna',$data);
	}
	//    ======================== EDIT =======================
    function edit()
	{
        if(isset($_POST['submit']))
		{
			// proses edit
			$id		    =   $this->input->post('kd_pengguna');
			$nama       =   $this->input->post('nama_pengguna');
			$user		=   $this->input->post('username');
			$pw		=   $this->input->post('password');
			$data		=	array('nama_pengguna'=>$nama,
							'username'=>$user,
							'password'=>$pw);
			$this->model_master->updatePengguna($data,$id);
			redirect('pengguna');
        }
		else
		{ 
            $id = $this->uri->segment(3);
            $data['baris'] = $this->model_master->getPenggunaById($id)->row_array();
			$this->load->view('pages/v_header',$data);
			$this->load->view('option/v_edit_pengguna',$data);
			
        }		
    }
	//    ===================== INSERT =====================
    function tambahPengguna(){
        $data=array(
            'kd_pengguna'=>$this->model_master->getKodePengguna(),
			'nama_pengguna'=>$this->input->post('nama_pengguna'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'));
		
        $this->model_master->insertPengguna($data);
        redirect("pengguna");
    }
	//    ========================== DELETE =======================
    function hapusPengguna(){
        $id = $this->uri->segment(3);
        $this->model_master->deletePengguna($id);
        redirect("pengguna");
    }
}
?>