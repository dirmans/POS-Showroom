<?php
class Auth extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_operator');
    }
    
    function index()
    {
        if(isset($_POST['submit'])){
            
            // proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            $hasil		=   $this->model_operator->login($username,$password);
            if($hasil==1)
            {
                // update last login
                $this->model_operator->updateLastLogin($username);
                $this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
                redirect('beranda');
            }
            else{
                redirect('auth');
            }
        }
        else{
            chek_session_login();
            $this->load->view('pages/v_login');
        }
    }
    
    function logout()
    {
		// proses logout
        $this->session->sess_destroy();
        redirect('auth');
    }
}