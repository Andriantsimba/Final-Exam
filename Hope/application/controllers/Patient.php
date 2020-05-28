<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Patient_model');
        $this->load->library('form_validation');
        
    }
    

    public function index()
    {
       
        $data['title'] = 'Patient List';
        $data['patient'] = $this->Patient_model->getAllPatient();
        if($this->input->post('keyword')){
            $data['patient'] = $this->Patient_model->seacrhPatientdata();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('patient/index',$data);
        $this->load->view('templates/footer');
        
    }

    public function Add()
    {
        $data['title']='Form patirent add';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('patient/add');
                    $this->load->view('templates/footer');
                }
                else
                {
                       $this->Patient_model->addPatientData();
                       $this->session->set_flashdata('dataflash','Adding success');
                       redirect('patient');
                        
                }
  
    }

    public function delete($id)
    {
        $this->Patient_model->deletePatientData($id);
        $this->session->set_flashdata('dataflash');
        
        redirect('patient','refresh');
        
    }

    public function detail($id)
    {
        $data['title'] = 'Patient Details';
        $data['patient'] = $this->Patient_model->getPatientbyId($id);
        $this->load->view('templates/header', $data);
        $this->load->view('patient/detail', $data);
        $this->load->view('templates/footer');
        
    }

    public function update($id)
    {
        $data['title']='Form patirent update';
        $data['patient'] = $this->Patient_model->getPatientbyId($id);
        $data['departement'] = ['Cardiology','Dentistry','Optical',
                'Neurosurgery','Dermatology','Pediatrics','Plastic Surgery'];

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('patient/update', $data);
                    $this->load->view('templates/footer');
                }
                else
                {
                       $this->Patient_model->updatePatientData();
                       $this->session->set_flashdata('dataflash','update success');
                       redirect('patient');
                        
                }
  
    }

}

/* End of file Patient.php */

?>