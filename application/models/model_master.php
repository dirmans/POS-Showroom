<?php
class Model_master extends CI_Model{

//  GET DATA
    function getAllMobil(){
        return $this->db->query("select * from tbl_mobil")->result();
    }
	function getMobilTersedia(){
        return $this->db->query("select kd_mobil from tbl_mobil where status='Tersedia'")->result();
    }
    function getAllPembeli(){
        return $this->db->query("select * from tbl_pembeli")->result();
    }
	function getAllPenyuplai(){
        return $this->db->query("select * from tbl_penyuplai")->result();
    }
	function getAllPengguna(){
        return $this->db->query("select * from tbl_pengguna")->result();
    }
	function getAllProfit(){
        return $this->db->query("select * from tbl_profit")->result();
    }
function getAllProfitbulanan(){
        return $this->db->query("select * from tbl_profitbulanan")->result();
    }
	function getAllTPembelian(){
		$query="SELECT tp.kd_trx_pbl,tp.tgl_trx_pbl,tp.kd_penyuplai,tp.kd_pengguna,tp.jumlah_mobil,tp.total_transaksi,tp.keterangan,pg.nama_pengguna
                FROM tbl_pembelian as tp,tbl_pengguna as pg
                WHERE tp.kd_pengguna=pg.kd_pengguna";
        return $this->db->query($query)->result();
    }
	function getAllTPenjualan(){
		$query="SELECT tp.kd_trx_pjl,tp.tgl_trx_pjl,tp.kd_pembeli,tp.kd_pengguna,tp.jumlah_mobil,tp.total_transaksi,tp.keterangan,tp.jumlah_dp,tp.last_update,pg.nama_pengguna,dp.harga_beli,dp.harga_jual
                FROM tbl_penjualan as tp,tbl_pengguna as pg, tbl_detail_penjualan as dp
                WHERE tp.kd_pengguna=pg.kd_pengguna AND tp.kd_trx_pjl=dp.kd_trx_pjl";
        return $this->db->query($query)->result();
    }
	function getPenjualan(){
		if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])) {
			$tgl_awal = $_GET['tgl_awal'];
			$tgl_akhir = $_GET['tgl_akhir'];
		} else {
			$tgl_awal = date('Y') . '-01-01';
			$tgl_akhir = date('Y') . '-12-31';
		}
		$this->db->select('*');
		$this->db->from('tbl_penjualan as tp');
		$this->db->from('tbl_pengguna as pg');
		$this->db->from('tbl_detail_penjualan as dp');
		$this->db->where('tp.tgl_trx_pjl >= ', ''.$tgl_awal.'');
		$this->db->where('tp.tgl_trx_pjl <= ', ''.$tgl_akhir.'');
		$this->db->where('tp.kd_trx_pjl = dp.kd_trx_pjl');
		$this->db->where('pg.kd_pengguna = tp.kd_pengguna');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$out = $query->result();
			return $out;
		} else {
			return array();
		}
    }
	function getPembelian(){
		if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])) {
			$tgl_awal = $_GET['tgl_awal'];
			$tgl_akhir = $_GET['tgl_akhir'];
		} else {
			$tgl_awal = date('Y') . '-01-01';
			$tgl_akhir = date('Y') . '-12-31';
		}
		$this->db->select('*');
		$this->db->from('tbl_pembelian');
		$this->db->where('tgl_trx_pbl >= ', ''.$tgl_awal.'');
		$this->db->where('tgl_trx_pbl <= ', ''.$tgl_akhir.'');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$out = $query->result();
			return $out;
		} else {
			return array();
		}
    }
	
//  GET DATA BY ID
    function getMobilById($id){
        $param = array('kd_mobil'=>$id);
        return $this->db->get_where('tbl_mobil',$param);
    }
    function getPembeliById($id){
        $param = array('kd_pembeli'=>$id);
        return $this->db->get_where('tbl_pembeli',$param);
    }
	function getPenyuplaiById($id){
        $param = array('kd_penyuplai'=>$id);
        return $this->db->get_where('tbl_penyuplai',$param);
    }
	function getPenggunaById($id){
        $param = array('kd_pengguna'=>$id);
        return $this->db->get_where('tbl_pengguna',$param);
    }
	function getProfitById($id){
        $param = array('kd_profit'=>$id);
        return $this->db->get_where('tbl_profit',$param);
    }
    function getProfitbulananById($id){
        $param = array('kd_profitbulanan'=>$id);
        return $this->db->get_where('tbl_profitbulanan',$param);
    }
	function getTPembelianById($id){
        $param = array('kd_trx_pbl'=>$id);
        return $this->db->get_where('tbl_pembelian',$param);
    }
	function getDPembelianById($id){
        $this->db->select('*');
		$this->db->from('tbl_detail_pembelian');
		$this->db->where('kd_trx_pbl', $id);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$out = $query->result();
			return $out;
		} else {
			return FALSE;
		}
    }
	function getTPenjualanById($id){
        $param = array('kd_trx_pjl'=>$id);
        return $this->db->get_where('tbl_penjualan',$param);
    }
	function getDPenjualanById($id){
        $this->db->select('*');
		$this->db->from('tbl_detail_penjualan');
		$this->db->where('kd_trx_pjl', $id);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$out = $query->result();
			return $out;
		} else {
			return FALSE;
		}
    }
	
//  INSERT DATA
    function insertMobil($data){
        $query = $this->db->insert('tbl_mobil',$data);
        return $query;
    }
    function insertPembeli($data){
        $query = $this->db->insert('tbl_pembeli',$data);
        return $query;
    }
	function insertPenyuplai($data){
        $query = $this->db->insert('tbl_penyuplai',$data);
        return $query;
    }
	function insertPengguna($data){
        $query = $this->db->insert('tbl_pengguna',$data);
        return $query;
    }
	function insertTPembelian($data){
        $query = $this->db->insert('tbl_pembelian',$data);
        return $query;
    }
	function insertTPenjualan($data){
        $query = $this->db->insert('tbl_penjualan',$data);
        return $query;
    }
	function insertProfit($data){
        $query = $this->db->insert('tbl_profit',$data);
        return $query;
    }
    function insertProfitbulanan($data){
        $query = $this->db->insert('tbl_profitbulanan',$data);
        return $query;
    }


//  UPDATE DATA
    function updateMobil($data,$id){
        $this->db->where('kd_mobil',$id);
        $this->db->update('tbl_mobil',$data);
    }
	function updateProfit($data,$id){
        $this->db->where('kd_profit',$id);
        $this->db->update('tbl_profit',$data);
    }
    	function updateProfitbulanan($data,$id){
        $this->db->where('kd_profitbulanan',$id);
        $this->db->update('tbl_profitbulanan',$data);
    }
    function updatePembeli($data,$id){
        $this->db->where('kd_pembeli',$id);
        $this->db->update('tbl_pembeli',$data);
    }
	function updatePenyuplai($data,$id){
        $this->db->where('kd_penyuplai',$id);
        $this->db->update('tbl_penyuplai',$data);
    }
	function updatePengguna($data,$id){
        $this->db->where('kd_pengguna',$id);
        $this->db->update('tbl_pengguna',$data);
    }
	function updateTPembelian($data,$id){
        $this->db->where('kd_trx_pbl',$id);
        $this->db->update('tbl_pembelian',$data);
    }
	function updateDp($data,$id){
        $this->db->where('kd_trx_pjl',$id);
        $this->db->update('tbl_penjualan',$data);
    }
	
//  DELETE DATA
    function deleteMobil($id){
        $this->db->where('kd_mobil',$id);
        $delete = $this->db->delete('tbl_mobil');
        return $delete;
    }
	function deleteProfit($id){
        $this->db->where('kd_profit',$id);
        $delete = $this->db->delete('tbl_profit');
        return $delete;
    }
    function deleteProfitbulanan($id){
        $this->db->where('kd_profitbulanan',$id);
        $delete = $this->db->delete('tbl_profitbulanan');
        return $delete;
    }
    function deletePembeli($id){
        $this->db->where('kd_pembeli',$id);
        $delete = $this->db->delete('tbl_pembeli');
        return $delete;
    }
	function deletePenyuplai($id){
        $this->db->where('kd_penyuplai',$id);
        $delete = $this->db->delete('tbl_penyuplai');
        return $delete;
    }
	function deletePengguna($id){
        $this->db->where('kd_pengguna',$id);
        $delete = $this->db->delete('tbl_pengguna');
        return $delete;
    }
	function deleteTPembelian($id){
        $this->db->where('kd_trx_pbl',$id);
        $delete = $this->db->delete('tbl_pembelian');
        return $delete;
    }
	function deleteDPembelian($id){
        $this->db->where('kd_trx_pbl',$id);
        $delete = $this->db->delete('tbl_detail_pembelian');
        return $delete;
    }
	function deleteTPenjualan($id){
        $this->db->where('kd_trx_pjl',$id);
        $delete = $this->db->delete('tbl_penjualan');
        return $delete;
    }
	function deleteDPenjualan($id){
        $this->db->where('kd_trx_pjl',$id);
        $delete = $this->db->delete('tbl_detail_penjualan');
        return $delete;
    }
	function deleteItemPembelian($id){
        $this->db->where('id_detail_pbl',$id);
        $delete = $this->db->delete('tbl_detail_pembelian');
        return $delete;
    }
	function deleteItemPenjualan($id){
        $this->db->where('id_detail_pjl',$id);
        $delete = $this->db->delete('tbl_detail_penjualan');
        return $delete;
    }


    //  KODE MOBIL
    function getKodeMobil()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_mobil,3)) as kd_max from tbl_mobil");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "MBL-".$kd;
    }

	//    KODE PEMBELI
    public function getKodePembeli()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_pembeli,3)) as kd_max from tbl_pembeli");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PB-".$kd;
    }
	
	//    KODE PENYUPLAI
    public function getKodePenyuplai()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_penyuplai,3)) as kd_max from tbl_penyuplai");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PP-".$kd;
    }
	
	//    KODE PENGGUNA
    public function getKodePengguna()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_pengguna,3)) as kd_max from tbl_pengguna");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PG-".$kd;
    }
	
	//    KODE TRANSAKSI PEMBELIAN
    public function getKodeTPembelian()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_trx_pbl,3)) as kd_max from tbl_pembelian");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "TPBL-".$kd;
    }
	
	//    KODE TRANSAKSI PENJUALAN
    public function getKodeTPenjualan()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_trx_pjl,3)) as kd_max from tbl_penjualan");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "TPJL-".$kd;
    }
	
	//    KODE PROFIT
	public function getKodeProfit()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_profit,3)) as kd_max from tbl_profit");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PRT-".$kd;
    }
    	public function getKodeProfitbulanan()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_profitbulanan,3)) as kd_max from tbl_profitbulanan");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PRB-".$kd;
    }

	}
?>