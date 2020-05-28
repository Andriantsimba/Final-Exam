<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('People_model','people');
        $this->load->library('form_validation');
    }
    
      

    public function index()
    {
      
       $this->load->library('pagination');

    //    taking keyword for search button
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword',$data['keyword']);

        }else{
            $data['keyword'] = $this->session->userdata('keyword'); 
        }
        // $this->people->CountPeople()

        $this->db->like('name', $data['keyword']);
        $this->db->from('people');
       $config['total_rows']= $this->db->count_all_results();
       $data['total_rows'] =$config['total_rows'];
       $config['per_page'] = 8; 

       //    initialization
       $this->pagination->initialize($config);
    // styling
    
       
       
        $data['title'] = 'People List';
        $data['start'] = $this->uri->segment(3);
       $data['people'] = $this->people->getPeople($config['per_page'], $data['start'],
            $data['keyword']);
        $this->load->view('templates/header', $data);
        $this->load->view('people/index',$data);
        $this->load->view('templates/footer');
        
    }

    public function detail($id)
    {
        $data['title'] ='People complete Data';
        $data['people'] = $this->people->getPeoplebyID($id);

        $this->load->view('templates/header', $data);
        $this->load->view('people/detail',$data);
        $this->load->view('templates/footer');

        
    }
    public function update($id)
    {
        $data['title']='Form people update';
        $data['people'] = $this->people->getPeoplebyID($id);
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('people/update', $data);
                    $this->load->view('templates/footer');
                }
                else
                {
                       $this->people->updatePeopleData();
                       $this->session->set_flashdata('dataflash','update success');
                       redirect('people','refresh');
                        
                }
    }

    public function delete($id)
    {
        $this->people->deletePeopleData($id);
        $this->session->set_flashdata('dataflash');
        
        redirect('people','refresh');
        
    }

    public function add()
    {
        $data['title']='Form people add';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('people/add');
                    $this->load->view('templates/footer');
                }
                else
                {
                       $this->people->addPeopleData();
                       $this->session->set_flashdata('dataflash','Adding success');
                       redirect('people');
                        
                }
    }

}

/* End of file Patient.php */

?>