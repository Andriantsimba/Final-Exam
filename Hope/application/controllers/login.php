<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Login_model');
        
        
        
    }
    

    public function index()
    {
        $data['title']='Login';
        $this->load->view('templates/header_login', $data);
        $this->load->view('login/index');
        $this->load->view('templates/footer_login', $data);

        
    }
    public function process_login()
    {
        $username=$this->input->post('uname1');
        $password=$this->input->post('pwd1');

        $checklogin= $this->Login_model->login($username,$password);

        if ($checklogin) {
            foreach($checklogin as $row) {
                $this->session->set_userdata('user',$row->username);
                $this->session->set_userdata('level',$row->level);
                    if ($this->session->userdata('level')=='admin') {
                        redirect('home/index');
                    } elseif($this->session->userdata('level')=='user') {
                        redirect('user');
                    }
                    
            }
        } else {
            
            $data['pesan'] = "Wrong Username and Password";
            $data['title'] = 'Login';
            $this->load->view('templates/header_login', $data);
            $this->load->view('login/index', $data);
            $this->load->view('templates/footer_login');
            
            // redirect('login/index','refresh');
            
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login','refresh');
        
    }

}

/* End of file login.php */


?>