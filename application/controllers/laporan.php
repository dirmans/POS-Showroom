<?php
class Laporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		chek_session();
		$this->load->model(array('model_master','model_transaksi'));
	}
	
	function lapPembelian()
	{
		$data=array('data_pembelian'=>$this->model_master->getAllTPembelian()
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_lap_pembelian',$data);
	}
	
	function lapPenjualan()
	{
		$data=array('data_penjualan'=>$this->model_master->getAllTPenjualan(),
        );
		$this->model_master->getPenjualan();
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_lap_penjualan',$data);
	}
	
	function lapProfit()
	{
	    $id = $this->uri->segment(3);
		$data=array('data_profit'=>$this->model_master->getAllTPenjualan(),
        );
		$this->model_master->getPenjualan();
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_lap_profit',$data);
	}
	
	function detailLapPembelian()
	{
		$id = $this->uri->segment(3);
		$data=array('data_pembelian'=>$this->model_master->getAllTPembelian(),
					'record'=>$this->model_master->getTPembelianById($id)->row_array(),
					'detail'=>$this->model_master->getDPembelianById($id)
        );
		$this->load->view('pages/v_header',$data);
		$this->load->view('pages/v_detail_pembelian',$data);
	}	
	
	//    ======================== EDIT =======================
	function editPenjualan()
	{
        if(isset($_POST['submit']))
		{
			// proses edit
			$id		    =   $this->input->post('kd_trx_pjl');
			$tgl  	    =   $this->input->post('tgl_trx_pjl');
			$kdpb		=   $this->input->post('kd_pembeli');
			$kdpg		=   $this->input->post('kd_pengguna');
			$jml		=	$this->input->post('jumlah_mobil');
			$total		=	$this->input->post('total_transaksi');
			$ket		=	$this->input->post('keterangan');
			$dp			=	$this->input->post('jumlah_dp');
			$up			=	$this->input->post('last_update');
			$data		=	array('tgl_trx_pjl'=>$tgl,
							'last_update'=>$up,
							'kd_pembeli'=>$kdpb,
							'kd_pengguna'=>$kdpg,
							'jumlah_mobil'=>$jml,
							'total_transaksi'=>$total,
							'keterangan'=>$ket,
							'jumlah_dp'=>$dp);
			$this->model_master->updateDp($data,$id);
			redirect('laporan/lapPenjualan');
        }
		else
		{ 
            $id = $this->uri->segment(3);
            $data['baris'] = $this->model_master->getTPenjualanById($id)->row_array();
			$this->load->view('pages/v_header',$data);
			$this->load->view('option/v_edit_trxpjl',$data);
			
        }		
    }
	
	//    ======================== HAPUS =======================
    function hapusLapPembelian(){
        $id = $this->uri->segment(3);
        $this->model_master->deleteTPembelian($id);
		$this->model_master->deleteDPembelian($id);
        redirect("laporan/lapPembelian");
    }
	function hapusLapPenjualan(){
        $id = $this->uri->segment(3);
        $this->model_master->deleteTPenjualan($id);
		$this->model_master->deleteDPenjualan($id);
        redirect("laporan/lapPenjualan");
    }
	
	function pdfPembelian()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Courier','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(66, 15, 'SHOWROOM PANJI MOTOR');
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(56, 21, 'Jual/Beli - Cash/Kredit - Tukar Tambah');
		$pdf->Text(33, 27, 'Jl. Raya Jati Mulya No. 9 Bekasi Timur Telp. (021) 8243 6809');
		$pdf->SetFontSize(14);
		// detail
		$pdf->SetFontSize(10);
        $pdf->Cell(10, 30,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
		$pdf->Cell(35, 7, 'Kode Transaksi', 1, 0);
        $pdf->Cell(40, 7, 'Tanggal Transaksi', 1,0);
     //   $pdf->Cell(30, 7, 'Operator', 1,0);
		$pdf->Cell(30, 7, 'Keterangan', 1,0);
		$pdf->Cell(40, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $id = $this->uri->segment(3);
		$data = $this->model_master->getAllTPembelian();
        $no=1;
		$total=0;
		foreach($data as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
			$pdf->Cell(35, 7, $r->kd_trx_pbl, 1,0);
            $pdf->Cell(40, 7, $r->tgl_trx_pbl, 1,0);
          //  $pdf->Cell(30, 7, $r->nama_pengguna, 1,0);
            $pdf->Cell(30, 7, $r->keterangan, 1,0);
			$pdf->Cell(40, 7, number_format($r->total_transaksi), 1,1);
			$no++;
			$total=$total+$r->total_transaksi;
        }
        // end
		$pdf->Cell(115,7,'Total',1,0,'C');
        $pdf->Cell(40,7,number_format($total),1,0);
        $pdf->Output();
    }
	
	function pdfPenjualan()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Courier','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(66, 15, 'SHOWROOM PANJI MOTOR');
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(56, 21, 'Jual/Beli - Cash/Kredit - Tukar Tambah');
		$pdf->Text(33, 27, 'Jl. Raya Jati Mulya No. 9 Bekasi Timur Telp. (021) 8243 6809');
		$pdf->Text(75, 33, 'INVOICE PENJUALAN');
		$pdf->SetFontSize(14);
		// detail
		$pdf->SetFontSize(10);
        $pdf->Cell(10, 30,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
		$pdf->Cell(35, 7, 'Kode Transaksi', 1, 0);
        $pdf->Cell(40, 7, 'Tanggal Transaksi', 1,0);
       // $pdf->Cell(30, 7, 'Operator', 1,0);
		$pdf->Cell(30, 7, 'Keterangan', 1,0);
		$pdf->Cell(40, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $id = $this->uri->segment(3);
		$data = $this->model_master->getAllTPenjualan();
        $no=1;
		$total=0;
		foreach($data as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
			$pdf->Cell(35, 7, $r->kd_trx_pjl, 1,0);
            $pdf->Cell(40, 7, $r->tgl_trx_pjl, 1,0);
          //  $pdf->Cell(30, 7, $r->nama_pengguna, 1,0);
            $pdf->Cell(30, 7, $r->keterangan, 1,0);
			$pdf->Cell(40, 7, number_format($r->total_transaksi), 1,1);
			$no++;
			$total=$total+$r->total_transaksi;
        }
        // end
		$pdf->Cell(115,7,'Total',1,0,'C');
        $pdf->Cell(40,7, number_format($total),1,0);
        $pdf->Output();
    }
    
    function pdfProfit()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Courier','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(66, 15, 'SHOWROOM PANJI MOTOR');
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(56, 21, 'Jual/Beli - Cash/Kredit - Tukar Tambah');
		$pdf->Text(33, 27, 'Jl. Raya Jati Mulya No. 9 Bekasi Timur Telp. (021) 8243 6809');
		$pdf->Text(75, 33, 'Laporan Profit');
		$pdf->SetFontSize(14);
		// detail
		$pdf->SetFontSize(10);
        $pdf->Cell(10, 30,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
		$pdf->Cell(35, 7, 'Kode Transaksi', 1, 0);
        $pdf->Cell(40, 7, 'Tanggal Transaksi', 1,0);
       // $pdf->Cell(30, 7, 'Operator', 1,0);
		$pdf->Cell(30, 7, 'Keterangan', 1,0);
		$pdf->Cell(40, 7, 'Profit Kendaraan', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $id = $this->uri->segment(3);
		$data = $this->model_master->getAllTPenjualan();
        $no=1;
		$total=0;
		foreach($data as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
			$pdf->Cell(35, 7, $r->kd_trx_pjl, 1,0);
            $pdf->Cell(40, 7, $r->tgl_trx_pjl, 1,0);
          //  $pdf->Cell(30, 7, $r->nama_pengguna, 1,0);
            $pdf->Cell(30, 7, $r->keterangan, 1,0);
			$pdf->Cell(40, 7, number_format($r->harga_jual-$r->harga_beli), 1,1);
			$no++;
			$total=$total+($r->harga_jual-$r->harga_beli);
        }
        // end
		$pdf->Cell(115,7,'Total',1,0,'C');
        $pdf->Cell(40,7, number_format($total),1,0);
        $pdf->Output();
    }
	
	function pdfPerPenjualan()
    {
		$dp = ($_GET['jumlah_dp']);
		$cetak = $dp + 0 == 0;
		if(isset($cetak) == $_GET['jumlah_dp'])
		{
		$this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Courier','B','L');
        $pdf->SetFontSize(16);
        $pdf->Text(66, 15, 'SHOWROOM PANJI MOTOR');
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(56, 21, 'Jual/Beli - Cash/Kredit - Tukar Tambah');
		$pdf->Text(33, 27, 'Jl. Raya Jati Mulya No. 9 Bekasi Timur Telp. (021) 8243 6809');
		$pdf->Text(10, 35, 'Kode Transaksi');
		$pdf->Text(50, 35, ':');
        $pdf->Text(10, 40, 'Tanggal Transaksi');
		$pdf->Text(50, 40, ':');
		$pdf->Text(10, 45, 'Update Terakhir');
		$pdf->Text(50, 45, ':');
        $pdf->Text(130, 35, 'Kode Pengguna');
		$pdf->Text(160, 35, ':');
		$pdf->Text(130, 40, 'Kode Pembeli');
		$pdf->Text(160, 40, ':');
        $pdf->Text(130, 45, 'Jumlah Mobil');
		$pdf->Text(160, 45, ':');
		$pdf->Text(130, 50, 'Keterangan');
		$pdf->Text(160, 50, ':');
		$id = $this->uri->segment(3);
		$data=array($this->model_master->getTPenjualanById($id)->row_array());
		foreach($data as $row)
		{
			$pdf->Text(55, 35, $row['kd_trx_pjl']);
			$pdf->Text(55, 40, $row['tgl_trx_pjl']);
			$pdf->Text(55, 45, $row['last_update']);
			$pdf->Text(165, 35, $row['kd_pengguna']);
			$pdf->Text(165, 40, $row['kd_pembeli']);
			$pdf->Text(165, 45, $row['jumlah_mobil']);
			$pdf->Text(165, 50, $row['keterangan']);
		// detail
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 45,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
		$pdf->Cell(35, 7, 'Merk Mobil', 1,0);
        $pdf->Cell(30, 7, 'Nomor Polisi', 1,0);
        $pdf->Cell(27, 7, 'Warna', 1,0);
        $pdf->Cell(24, 7, 'Tahun', 1,0);
        $pdf->Cell(27, 7, 'Harga', 1,0);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $pdf->Cell(10, 7,'','',1);
        $id = $this->uri->segment(3);
		$record = $this->model_master->getDPenjualanById($id);
        $no=1;
		$ttl_harga=0;
		$ttl_transaksi=0;
		foreach($record as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(35, 7, $r->merk_mobil, 1,0);
			$pdf->Cell(30, 7, $r->no_pol, 1,0);
			$pdf->Cell(27, 7, $r->warna, 1,0);
			$pdf->Cell(24, 7, $r->tahun, 1,0);
            $pdf->Cell(27, 7, number_format($r->harga_jual), 1,1);
            $no++;
			$ttl_harga=$ttl_harga+$r->harga_jual;
        }
		$ttl_transaksi=$ttl_harga-$row['jumlah_dp'];
		$pdf->Cell(126,7,'Total Transaksi',1,0,'C');
        $pdf->Cell(27,7,number_format($ttl_harga),1,1);
		$pdf->Cell(126,7,'DP',1,0,'C');
		$pdf->Cell(27,7,number_format($row['jumlah_dp']),1,1);
		$pdf->Cell(126,7,'Sisa Pembayaran',1,0,'C');
		$pdf->Cell(27,7,number_format($ttl_transaksi),1,1);
		}
		$pdf->Text(135, 150,'Bekasi,');
		$pdf->Text(151, 150, jin_date_ina(date('Y-m-d')));
		$pdf->Text(150, 180,'PANJI MOTOR');
		$pdf->SetFont('Courier','I','C');
        $pdf->SetFontSize(7);
		$pdf->Text(45, 200, '* tanda terima ini sah jka sudah dibubuhi cap dan tanda tangan *');
        $pdf->Output();
		}
		else
		{
		$this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Courier','B','L');
        $pdf->SetFontSize(16);
        $pdf->Text(66, 15, 'SHOWROOM PANJI MOTOR');
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(56, 21, 'Jual/Beli - Cash/Kredit - Tukar Tambah');
		$pdf->Text(33, 27, 'Jl. Raya Jati Mulya No. 9 Bekasi Timur Telp. (021) 8243 6809');
		$pdf->Text(10, 35, 'Kode Transaksi');
		$pdf->Text(50, 35, ':');
        $pdf->Text(10, 40, 'Tanggal Transaksi');
		$pdf->Text(50, 40, ':');
        $pdf->Text(130, 35, 'Kode Pengguna');
		$pdf->Text(160, 35, ':');
		$pdf->Text(130, 40, 'Kode Pembeli');
		$pdf->Text(160, 40, ':');
        $pdf->Text(130, 45, 'Jumlah Mobil');
		$pdf->Text(160, 45, ':');
		$pdf->Text(130, 50, 'Keterangan');
		$pdf->Text(160, 50, ':');
		$id = $this->uri->segment(3);
		$data=array($this->model_master->getTPenjualanById($id)->row_array());
		foreach($data as $row)
		{
			$pdf->Text(55, 35, $row['kd_trx_pjl']);
			$pdf->Text(55, 40, $row['tgl_trx_pjl']);
			$pdf->Text(165, 35, $row['kd_pengguna']);
			$pdf->Text(165, 40, $row['kd_pembeli']);
			$pdf->Text(165, 45, $row['jumlah_mobil']);
			$pdf->Text(165, 50, $row['keterangan']);
		// detail
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 45,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
		$pdf->Cell(35, 7, 'Merk Mobil', 1,0);
        $pdf->Cell(30, 7, 'Nomor Polisi', 1,0);
        $pdf->Cell(27, 7, 'Warna', 1,0);
        $pdf->Cell(24, 7, 'Tahun', 1,0);
        $pdf->Cell(27, 7, 'Harga', 1,0);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $pdf->Cell(10, 7,'','',1);
        $id = $this->uri->segment(3);
		$record = $this->model_master->getDPenjualanById($id);
        $no=1;
		$ttl_harga=0;
		foreach($record as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(35, 7, $r->merk_mobil, 1,0);
			$pdf->Cell(30, 7, $r->no_pol, 1,0);
			$pdf->Cell(27, 7, $r->warna, 1,0);
			$pdf->Cell(24, 7, $r->tahun, 1,0);
            $pdf->Cell(27, 7, number_format($r->harga_jual), 1,1);
            $no++;
			$ttl_harga=$ttl_harga+$r->harga_jual;
        }
		$pdf->Cell(126,7,'Total Transaksi',1,0,'C');
        $pdf->Cell(27,7,number_format($ttl_harga),1,1);;
		}
		$pdf->Text(135, 150,'Bekasi,');
		$pdf->Text(151, 150, jin_date_ina(date('Y-m-d')));
		$pdf->Text(145, 180,'PANJI MOTOR');
		$pdf->SetFont('Courier','I','C');
        $pdf->SetFontSize(7);
		$pdf->Text(45, 200, '* tanda terima ini sah jka sudah dibubuhi cap dan tanda tangan *');
        $pdf->Output();
		}
    }
	
	function pdfPerProfit()
    {
		$dp = ($_GET['jumlah_dp']);
		$cetak = $dp + 0 == 0;
		if(isset($cetak) == $_GET['jumlah_dp'])
		{
		$this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Courier','B','L');
        $pdf->SetFontSize(16);
        $pdf->Text(66, 15, 'SHOWROOM PANJI MOTOR');
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(56, 21, 'Jual/Beli - Cash/Kredit - Tukar Tambah');
		$pdf->Text(33, 27, 'Jl. Raya Jati Mulya No. 9 Bekasi Timur Telp. (021) 8243 6809');
		$pdf->Text(10, 35, 'Kode Transaksi');
		$pdf->Text(50, 35, ':');
        $pdf->Text(10, 40, 'Tanggal Transaksi');
		$pdf->Text(50, 40, ':');
		$pdf->Text(10, 45, 'Update Terakhir');
		$pdf->Text(50, 45, ':');
        $pdf->Text(130, 35, 'Kode Pengguna');
		$pdf->Text(160, 35, ':');
		$pdf->Text(130, 40, 'Kode Pembeli');
		$pdf->Text(160, 40, ':');
        $pdf->Text(130, 45, 'Jumlah Mobil');
		$pdf->Text(160, 45, ':');
		$pdf->Text(130, 50, 'Keterangan');
		$pdf->Text(160, 50, ':');
		$id = $this->uri->segment(3);
		$data=array($this->model_master->getTPenjualanById($id)->row_array());
		foreach($data as $row)
		{
			$pdf->Text(55, 35, $row['kd_trx_pjl']);
			$pdf->Text(55, 40, $row['tgl_trx_pjl']);
			$pdf->Text(55, 45, $row['last_update']);
			$pdf->Text(165, 35, $row['kd_pengguna']);
			$pdf->Text(165, 40, $row['kd_pembeli']);
			$pdf->Text(165, 45, $row['jumlah_mobil']);
			$pdf->Text(165, 50, $row['keterangan']);
		// detail
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 45,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
		$pdf->Cell(35, 7, 'Merk Mobil', 1,0);
        $pdf->Cell(30, 7, 'Nomor Polisi', 1,0);
        $pdf->Cell(27, 7, 'Warna', 1,0);
        $pdf->Cell(24, 7, 'Tahun', 1,0);
        $pdf->Cell(37, 7, 'Profit Kendaraan', 1,0);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $pdf->Cell(10, 7,'','',1);
        $id = $this->uri->segment(3);
		$record = $this->model_master->getDPenjualanById($id);
        $no=1;
		$ttl_harga=0;
		$ttl_transaksi=0;
		foreach($record as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(35, 7, $r->merk_mobil, 1,0);
			$pdf->Cell(30, 7, $r->no_pol, 1,0);
			$pdf->Cell(27, 7, $r->warna, 1,0);
			$pdf->Cell(24, 7, $r->tahun, 1,0);
            $pdf->Cell(37, 7, number_format($r->harga_jual-$r->harga_beli), 1,1);
            $no++;
			$ttl_harga=$ttl_harga+($r->harga_jual-$r->harga_beli);
        }
		$ttl_transaksi=$r->harga_jual-$row['jumlah_dp'];
		$pdf->Cell(126,7,'Total Profit',1,0,'C');
        $pdf->Cell(37,7,number_format($ttl_harga),1,1);
		}
		$pdf->Text(135, 150,'Bekasi,');
		$pdf->Text(151, 150, jin_date_ina(date('Y-m-d')));
		$pdf->Text(150, 180,'PANJI MOTOR');
		$pdf->SetFont('Courier','I','C');
        $pdf->SetFontSize(7);
		$pdf->Text(45, 200, '* tanda terima ini sah jka sudah dibubuhi cap dan tanda tangan *');
        $pdf->Output();
		}
		else
		{
		$this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Courier','B','L');
        $pdf->SetFontSize(16);
        $pdf->Text(66, 15, 'SHOWROOM PANJI MOTOR');
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(56, 21, 'Jual/Beli - Cash/Kredit - Tukar Tambah');
		$pdf->Text(33, 27, 'Jl. Raya Jati Mulya No. 9 Bekasi Timur Telp. (021) 8243 6809');
		$pdf->Text(10, 35, 'Kode Transaksi');
		$pdf->Text(50, 35, ':');
        $pdf->Text(10, 40, 'Tanggal Transaksi');
		$pdf->Text(50, 40, ':');
        $pdf->Text(130, 35, 'Kode Pengguna');
		$pdf->Text(160, 35, ':');
		$pdf->Text(130, 40, 'Kode Pembeli');
		$pdf->Text(160, 40, ':');
        $pdf->Text(130, 45, 'Jumlah Mobil');
		$pdf->Text(160, 45, ':');
		$pdf->Text(130, 50, 'Keterangan');
		$pdf->Text(160, 50, ':');
		$id = $this->uri->segment(3);
		$data=array($this->model_master->getTPenjualanById($id)->row_array());
		foreach($data as $row)
		{
			$pdf->Text(55, 35, $row['kd_trx_pjl']);
			$pdf->Text(55, 40, $row['tgl_trx_pjl']);
			$pdf->Text(165, 35, $row['kd_pengguna']);
			$pdf->Text(165, 40, $row['kd_pembeli']);
			$pdf->Text(165, 45, $row['jumlah_mobil']);
			$pdf->Text(165, 50, $row['keterangan']);
		// detail
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 45,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
		$pdf->Cell(35, 7, 'Merk Mobil', 1,0);
        $pdf->Cell(30, 7, 'Nomor Polisi', 1,0);
        $pdf->Cell(27, 7, 'Warna', 1,0);
        $pdf->Cell(24, 7, 'Tahun', 1,0);
        $pdf->Cell(37, 7, 'Profit Kendaraan', 1,0);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $pdf->Cell(10, 7,'','',1);
        $id = $this->uri->segment(3);
		$record = $this->model_master->getDPenjualanById($id);
        $no=1;
		$ttl_harga=0;
		foreach($record as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(35, 7, $r->merk_mobil, 1,0);
			$pdf->Cell(30, 7, $r->no_pol, 1,0);
			$pdf->Cell(27, 7, $r->warna, 1,0);
			$pdf->Cell(24, 7, $r->tahun, 1,0);
            $pdf->Cell(37, 7, number_format($r->harga_jual-$r->harga_beli), 1,1);
            $no++;
			$ttl_harga=$ttl_harga+($r->harga_jual-$r->harga_beli);
        }
		$pdf->Cell(126,7,'Total Profit',1,0,'C');
        $pdf->Cell(37,7,number_format($ttl_harga),1,1);;
		}
		$pdf->Text(135, 150,'Bekasi,');
		$pdf->Text(151, 150, jin_date_ina(date('Y-m-d')));
		$pdf->Text(145, 180,'PANJI MOTOR');
		$pdf->SetFont('Courier','I','C');
        $pdf->SetFontSize(7);
		$pdf->Text(45, 200, '* tanda terima ini sah jka sudah dibubuhi cap dan tanda tangan *');
        $pdf->Output();
		}
    }
	
	function pdfPeriodePjl()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Courier','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(66, 15, 'SHOWROOM PANJI MOTOR');
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(56, 21, 'Jual/Beli - Cash/Kredit - Tukar Tambah');
		$pdf->Text(33, 27, 'Jl. Raya Jati Mulya No. 9 Bekasi Timur Telp. (021) 8243 6809');
		$pdf->SetFontSize(14);
		// detail
		$pdf->SetFontSize(10);
        $pdf->Cell(10, 30,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
		$pdf->Cell(35, 7, 'Kode Transaksi', 1, 0);
        $pdf->Cell(40, 7, 'Tanggal Transaksi', 1,0);
        $pdf->Cell(30, 7, 'Operator', 1,0);
		$pdf->Cell(30, 7, 'Keterangan', 1,0);
		$pdf->Cell(40, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $id = $this->uri->segment(3);
		$data = $this->model_master->getPenjualan();
        $no=1;
		$total=0;
		foreach($data as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
			$pdf->Cell(35, 7, $r->kd_trx_pjl, 1,0);
            $pdf->Cell(40, 7, $r->tgl_trx_pjl, 1,0);
            $pdf->Cell(30, 7, $r->kd_pengguna, 1,0);
            $pdf->Cell(30, 7, $r->keterangan, 1,0);
			$pdf->Cell(40, 7, number_format($r->total_transaksi), 1,1);
			$no++;
			$total=$total+$r->total_transaksi;
        }
        // end
		$pdf->Cell(145,7,'Total',1,0,'C');
        $pdf->Cell(40,7, number_format($total),1,0);
        $pdf->Output();
    }
	
	function pdfPeriodePbl()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Courier','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(66, 15, 'SHOWROOM PANJI MOTOR');
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(56, 21, 'Jual/Beli - Cash/Kredit - Tukar Tambah');
		$pdf->Text(33, 27, 'Jl. Raya Jati Mulya No. 9 Bekasi Timur Telp. (021) 8243 6809');
		$pdf->SetFontSize(14);
		// detail
		$pdf->SetFontSize(10);
        $pdf->Cell(10, 30,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
		$pdf->Cell(35, 7, 'Kode Transaksi', 1, 0);
        $pdf->Cell(40, 7, 'Tanggal Transaksi', 1,0);
        $pdf->Cell(30, 7, 'Operator', 1,0);
		$pdf->Cell(30, 7, 'Keterangan', 1,0);
		$pdf->Cell(40, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $id = $this->uri->segment(3);
		$data = $this->model_master->getPembelian();
        $no=1;
		$total=0;
		foreach($data as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
			$pdf->Cell(35, 7, $r->kd_trx_pbl, 1,0);
            $pdf->Cell(40, 7, $r->tgl_trx_pbl, 1,0);
            $pdf->Cell(30, 7, $r->kd_pengguna, 1,0);
            $pdf->Cell(30, 7, $r->keterangan, 1,0);
			$pdf->Cell(40, 7, number_format($r->total_transaksi), 1,1);
			$no++;
			$total=$total+$r->total_transaksi;
        }
        // end
		$pdf->Cell(145,7,'Total',1,0,'C');
        $pdf->Cell(40,7, number_format($total),1,0);
        $pdf->Output();
    }
    
    function pdfPeriodeProfit()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Courier','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(66, 15, 'SHOWROOM PANJI MOTOR');
		$pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->Text(56, 21, 'Jual/Beli - Cash/Kredit - Tukar Tambah');
		$pdf->Text(33, 27, 'Jl. Raya Jati Mulya No. 9 Bekasi Timur Telp. (021) 8243 6809');
		$pdf->SetFontSize(14);
		// detail
		$pdf->SetFontSize(10);
        $pdf->Cell(10, 30,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
		$pdf->Cell(35, 7, 'Kode Transaksi', 1, 0);
        $pdf->Cell(40, 7, 'Tanggal Transaksi', 1,0);
        $pdf->Cell(30, 7, 'Operator', 1,0);
		$pdf->Cell(30, 7, 'Keterangan', 1,0);
		$pdf->Cell(40, 7, 'Profit Kendaraan', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $id = $this->uri->segment(3);
		$data = $this->model_master->getPenjualan();
        $no=1;
		$total=0;
		foreach($data as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
			$pdf->Cell(35, 7, $r->kd_trx_pjl, 1,0);
            $pdf->Cell(40, 7, $r->tgl_trx_pjl, 1,0);
            $pdf->Cell(30, 7, $r->nama_pengguna, 1,0);
            $pdf->Cell(30, 7, $r->keterangan, 1,0);
			$pdf->Cell(40, 7, number_format($r->harga_jual-$r->harga_beli), 1,1);
			$no++;
			$total=$total+($r->harga_jual-$r->harga_beli);
        }
        // end
		$pdf->Cell(145,7,'Total Profit',1,0,'C');
        $pdf->Cell(40,7, number_format($total),1,0);
        $pdf->Output();
    }
}
?>