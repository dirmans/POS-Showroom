<?php
class Model_transaksi extends CI_Model{
    
    function simpanPembelian()
    {
        $kdmobil    	= $this->input->post('kd_mobil');
        $harga          = $this->input->post('harga_beli');
		$mobil          = $this->db->get_where('tbl_mobil',array('kd_mobil'=>$kdmobil))->row_array();
        $data           = array('kd_mobil'=>$kdmobil,
								'merk_mobil'=>$mobil['merk_mobil'],
                                'harga_beli'=>$mobil['harga_beli'],
                                'no_pol'=>$mobil['no_pol'],
								'no_rka'=>$mobil['no_rka'],
                                'no_msn'=>$mobil['no_msn'],
								'tahun'=>$mobil['tahun'],
                                'warna'=>$mobil['warna'],
								'atas_nama'=>$mobil['atas_nama'],
								'alamat'=>$mobil['alamat'],
								'status'=>'0');
        $this->db->insert('tbl_detail_pembelian',$data);
    }
	
	function simpanPenjualan()
    {
		$kdmobil    	= $this->input->post('kd_mobil');
		$mobil          = $this->db->get_where('tbl_mobil',array('kd_mobil'=>$kdmobil))->row_array();
        $data           = array('kd_mobil'=>$kdmobil,
								'merk_mobil'=>$mobil['merk_mobil'],
								'harga_beli'=>$mobil['harga_beli'],
                                'harga_jual'=>$mobil['harga_jual'],
                                'no_pol'=>$mobil['no_pol'],
								'no_rka'=>$mobil['no_rka'],
                                'no_msn'=>$mobil['no_msn'],
								'tahun'=>$mobil['tahun'],
                                'warna'=>$mobil['warna'],
								'atas_nama'=>$mobil['atas_nama'],
								'alamat'=>$mobil['alamat'],
								'status'=>'0');
        $this->db->insert('tbl_detail_penjualan',$data);
    }
    
    function detailTransaksiPembelian()
    {
        $query  ="SELECT * FROM tbl_detail_pembelian WHERE status = '0'";
        return $this->db->query($query);
    }
	
	function detailTransaksiPenjualan()
    {
        $query  ="SELECT * FROM tbl_detail_penjualan WHERE status = '0'";
        return $this->db->query($query);
    }
    
    function selesaiPembelian($data)
    {
		$last_kd = $this->db->query("select kd_trx_pbl from tbl_pembelian order by kd_trx_pbl desc")->row_array();
        $this->db->query("update tbl_detail_pembelian set kd_trx_pbl='".$last_kd['kd_trx_pbl']."' where status='0'");
        $this->db->query("update tbl_detail_pembelian set status='1' where status='0'");
    }
	
	function selesaiPenjualan($data)
    {
		$last_kd = $this->db->query("select kd_trx_pjl from tbl_penjualan order by kd_trx_pjl desc")->row_array();
        $this->db->query("update tbl_detail_penjualan set kd_trx_pjl='".$last_kd['kd_trx_pjl']."' where status='0'");
        $this->db->query("update tbl_detail_penjualan set status='1' where status='0'");
    }
}