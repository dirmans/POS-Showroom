<?php    
class Model_xls extends CI_Model{
    function export_mobil(){
        $query = $this->db->query("SELECT * FROM tbl_mobil");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    function export_pembeli(){
        $query = $this->db->query("SELECT * FROM tbl_pembeli");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    function export_penyuplai(){
        $query = $this->db->query("SELECT * FROM tbl_penyuplai");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    function export_profit(){
        $query = $this->db->query("SELECT * FROM tbl_profit");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
     function export_profitbulanan(){
        $query = $this->db->query("SELECT * FROM tbl_profitbulanan");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    
    
}