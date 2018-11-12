<?php
class Model_operator extends CI_Model{
    
    function login($username,$password)
    {
        $chek = $this->db->get_where('tbl_pengguna',array('username'=>$username,'password'=>$password));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
	
	function updateLastLogin($username){
		$this->db->where('username',$username);
        $this->db->update('tbl_pengguna',array('last_login'=>date('Y-m-d')));
    }
}