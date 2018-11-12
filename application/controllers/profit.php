<?php
class Profit extends CI_Controller {
	function __construct(){
		parent::__construct();
		chek_session();
		$this->load->model('model_master');
	}
	
	//    ======================== INDEX =======================
	
	function index()
	{
		$data=array('kd_profit'=>$this->model_master->getKodeProfit(),
					'data_profit'=>$this->model_master->getAllProfit(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_profit', $data);
	}
	
	function add()
	{
		$data=array('kd_profit'=>$this->model_master->getKodeProfit(),
					'data_profit'=>$this->model_master->getAllProfit(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('option/v_add_profit',$data);
	}
	
	//    ======================== EDIT =======================
    
	function edit()
	{
        if(isset($_POST['submit']))
		{
			// proses edit
			$id		    =   $this->input->post('kd_profit');
			$profit_kotor		=	$this->input->post('profit_kotor');
			$sewa_gedung =   $this->input->post('sewa_gedung');
			$listrik	=   $this->input->post('listrik');
			$gaji_karyawan	=   $this->input->post('gaji_karyawan');
			$kas_kecil		=	$this->input->post('kas_kecil');
			$profit_bersih		=	$this->input->post('profit_bersih');
			$tahun		=	$this->input->post('tahun');
			$data		=	array('profit_kotor'=>$profit_kotor,
			'sewa_gedung'=>$sewa_gedung,
								  'listrik'=>$listrik,
								  'gaji_karyawan'=>$gaji_karyawan,
								  'kas_kecil'=>$kas_kecil,
								  'profit_bersih'=>$profit_bersih,
								  'tahun'=>$tahun);
			$this->model_master->updateProfit($data,$id);
			redirect('profit');
        }
		else
		{ 
            $id = $this->uri->segment(3);
            $data['baris'] = $this->model_master->getProfitById($id)->row_array();
			$this->load->view('pages/v_header',$data);
			$this->load->view('option/v_edit_profit',$data);
			
        }		
    }
	
	//    ===================== INSERT =====================
	
    function tambahProfit(){
        $data=array(
            'kd_profit'=>$this->model_master->getKodeProfit(),
			'sewa_gedung'=>$this->input->post('sewa_gedung'),
			'listrik'=>$this->input->post('listrik'),
			'gaji_karyawan'=>$this->input->post('gaji_karyawan'),
			'kas_kecil'=>$this->input->post('kas_kecil'),
			'profit_kotor'=>$this->input->post('profit_kotor'),
			'profit_bersih'=>$this->input->post('profit_bersih'),
			'tahun'=>$this->input->post('tahun'));
        $this->model_master->insertProfit($data);
        redirect("profit");
    }
	
	//    ========================== DELETE =======================
    function hapusProfit(){
        $id = $this->uri->segment(3);
        $this->model_master->deleteProfit($id);
        redirect("profit");
    }
}
?>