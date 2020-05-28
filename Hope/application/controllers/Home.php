<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if($this->session->userdata('level')!="admin"){
            
            redirect('login','refresh');
            
        }
    }
    

    public function index()
    {
        $data['title'] = 'home page';
        // $data['name'] = $name;
        $this->load->view('templates/header',$data);
        $this->load->view('home/index',$data);
        $this->load->view('templates/footer');
        $this->load->library('session');
        
        if ($this->session->userdata('level')!="admin") {
            redirect('login','refresh');
        }

    }

}

/* End of file home.php */

?>