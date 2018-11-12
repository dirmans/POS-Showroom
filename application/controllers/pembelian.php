<?php
class Pembelian extends CI_Controller {
	function __construct(){
		parent::__construct();
		chek_session();
		$this->load->model(array('model_master','model_transaksi'));
	}
	
	function index()
	{
		$data=array('kd_trx_pbl'=>$this->model_master->getKodeTPembelian(),
					'data_pembelian'=>$this->model_master->getAllTPembelian(),
					'data_kendaraan'=>$this->model_master->getMobilTersedia(),
					'detail'=>$this->model_transaksi->detailTransaksiPembelian()->result(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_trans_pembelian', $data);
	}
	
	function addData()
	{
		$data=array('kd_trx_pbl'=>$this->model_master->getKodeTPembelian(),
					'data_pembelian'=>$this->model_master->getAllTPembelian(),
					'data_pengguna'=>$this->model_master->getAllPengguna(),
					'data_penyuplai'=>$this->model_master->getAllPenyuplai(),
					'detail'=>$this->model_transaksi->detailTransaksiPembelian()->result(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('option/v_add_pembelian',$data);
	}
	
	//  FUNGSI INSERT
    function tambahPembelian(){
        $data=array(
            'kd_trx_pbl'=>$this->model_master->getKodeTPembelian(),
			'tgl_trx_pbl'=>$this->input->post('tgl_trx_pbl'),
			'kd_pengguna'=>$this->input->post('kd_pengguna'),
			'kd_penyuplai'=>$this->input->post('kd_penyuplai'),
			'jumlah_mobil'=>$this->input->post('jumlah_mobil'),
			'total_transaksi'=>$this->input->post('total_transaksi'),
			'keterangan'=>$this->input->post('keterangan'),
        );
		$this->model_master->insertTPembelian($data);
		$this->model_transaksi->selesaiPembelian($data);
        redirect("pembelian");
    }
	
	function transaksi()
    {
        $this->model_transaksi->simpanPembelian();
        redirect('pembelian');
    }
	
	function selesaiBelanja()
    {
        redirect('pembelian/addData');
    }
	
	//  FUNGSI DELETE 
	 function hapusItem()
    {
        $id=  $this->uri->segment(3);
        $this->model_master->deleteItemPembelian($id);
        redirect('pembelian');
    }
}
?>
