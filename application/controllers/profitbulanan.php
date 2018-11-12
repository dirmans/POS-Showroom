<?php
class Profitbulanan extends CI_Controller {
	function __construct(){
		parent::__construct();
		chek_session();
		$this->load->model('model_master');
	}
	
	//    ======================== INDEX =======================
	
	function index()
	{
		$data=array('kd_profitbulanan'=>$this->model_master->getKodeProfitbulanan(),
					'data_profitbulanan'=>$this->model_master->getAllProfitbulanan(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_profitbulanan', $data);
	}
	
	function add()
	{
		$data=array('kd_profitbulanan'=>$this->model_master->getKodeProfitbulanan(),
					'data_profitbulanan'=>$this->model_master->getAllProfitbulanan(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('option/v_add_profitbulanan',$data);
	}
	
	//    ======================== EDIT =======================
    
	function edit()
	{
        if(isset($_POST['submit']))
		{
			// proses edit
			$id		    =   $this->input->post('kd_profitbulanan');
			$profit_kotor		=	$this->input->post('profit_kotor');
			$sewa_gedung =   $this->input->post('sewa_gedung');
			$listrik	=   $this->input->post('listrik');
			$gaji_karyawan	=   $this->input->post('gaji_karyawan');
			$kas_kecil		=	$this->input->post('kas_kecil');
			$profit_bersih		=	$this->input->post('profit_bersih');
			$bulan		=	$this->input->post('bulan');
			$tahun		=	$this->input->post('tahun');
			$data		=	array('profit_kotor'=>$profit_kotor,
			'sewa_gedung'=>$sewa_gedung,
								  'listrik'=>$listrik,
								  'gaji_karyawan'=>$gaji_karyawan,
								  'kas_kecil'=>$kas_kecil,
								  'profit_bersih'=>$profit_bersih,
								  'bulan'=>$bulan,
								  'tahun'=>$tahun);
			$this->model_master->updateProfitbulanan($data,$id);
			redirect('profitbulanan');
        }
		else
		{ 
            $id = $this->uri->segment(3);
            $data['baris'] = $this->model_master->getProfitbulananById($id)->row_array();
			$this->load->view('pages/v_header',$data);
			$this->load->view('option/v_edit_profitbulanan',$data);
			
        }		
    }
	
	//    ===================== INSERT =====================
	
    function tambahProfitbulanan(){
        $data=array(
            'kd_profitbulanan'=>$this->model_master->getKodeProfitbulanan(),
			'sewa_gedung'=>$this->input->post('sewa_gedung'),
			'listrik'=>$this->input->post('listrik'),
			'gaji_karyawan'=>$this->input->post('gaji_karyawan'),
			'kas_kecil'=>$this->input->post('kas_kecil'),
			'profit_kotor'=>$this->input->post('profit_kotor'),
			'profit_bersih'=>$this->input->post('profit_bersih'),
			'bulan'=>$this->input->post('bulan'),
			'tahun'=>$this->input->post('tahun'));
        $this->model_master->insertProfitbulanan($data);
        redirect("profitbulanan");
    }
	
	//    ========================== DELETE =======================
    function hapusProfitbulanan(){
        $id = $this->uri->segment(3);
        $this->model_master->deleteProfitbulanan($id);
        redirect("profitbulanan");
    }
}
?>