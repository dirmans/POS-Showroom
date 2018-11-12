<?php
class Penjualan extends CI_Controller {
	function __construct(){
		parent::__construct();
		chek_session();
		$this->load->model(array('model_master','model_transaksi'));
	}
	
	function index()
	{
		$data=array('kd_trx_pjl'=>$this->model_master->getKodeTPenjualan(),
					'data_penjualan'=>$this->model_master->getAllTPenjualan(),
					'data_kendaraan'=>$this->model_master->getMobilTersedia(),
					'detail'=>$this->model_transaksi->detailTransaksiPenjualan()->result(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_trans_penjualan', $data);
	}
	function addData()
	{
		$data=array('kd_trx_pjl'=>$this->model_master->getKodeTPenjualan(),
					'data_penjualan'=>$this->model_master->getAllTPenjualan(),
					'data_pembeli'=>$this->model_master->getAllPembeli(),
					'data_pengguna'=>$this->model_master->getAllPengguna(),
					'detail'=>$this->model_transaksi->detailTransaksiPenjualan()->result(),
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('option/v_add_penjualan',$data);
	}
	
	//    ===================== INSERT =====================
    function tambahPenjualan(){
        $data=array(
            'kd_trx_pjl'=>$this->model_master->getKodeTPenjualan(),
			'tgl_trx_pjl'=>$this->input->post('tgl_trx_pjl'),
			'kd_pembeli'=>$this->input->post('kd_pembeli'),
			'kd_pengguna'=>$this->input->post('kd_pengguna'),
			'jumlah_mobil'=>$this->input->post('jumlah_mobil'),
			'total_transaksi'=>$this->input->post('total_transaksi'),
			'keterangan'=>$this->input->post('keterangan'),
			'jumlah_dp'=>$this->input->post('jumlah_dp'),
			'last_update'=>'-'
        );
        $this->model_master->insertTPenjualan($data);
		$this->model_transaksi->selesaiPenjualan($data);
        redirect("penjualan");
    }
	
	function transaksi()
    {
        $this->model_transaksi->simpanPenjualan();
        redirect('penjualan');
    }
	
	function selesaiBelanja()
    {
        redirect('penjualan/addData');
    }
	
	// FUNGSI DELETE
	 function hapusItem()
    {
        $id=  $this->uri->segment(3);
        $this->model_master->deleteItemPenjualan($id);
        redirect('penjualan');
    }
}
