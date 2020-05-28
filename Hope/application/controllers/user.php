<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Login_model');
        $this->load->model('Patient_model');
        $this->load->model('Print_model');
        $this->load->library('form_validation');

        

        if ($this->session->userdata('level')!="user") {
            redirect('login', 'refresh');
        }
    }
    

    public function index()
    {
        $data= array(
                'title' => 'Patient Data',
                'patient' => $this->Patient_model->datatables()
        );
        
        $this->load->view('templates/header_datatables_user', $data);
        $this->load->view('patient/user');
        $this->load->view('templates/footer_datatables_user');
    }

    public function patientData_pdf()
    {
        $this->load->library('pdf');

        $data['patient'] = $this->Print_model->view();
        $this->load->library('pdf');

        $this->pdf->setPaper('A3','portrait');
        $this->pdf->filename = "patient-report.pdf";
        $this->pdf->load_view('patient/report', $data);
        
    }

    public function appointment()
    {
        $data['title']='New App Register';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('templates/header_datatables_user', $data);
                    $this->load->view('patient/appointment');
                    $this->load->view('templates/footer_datatables_user');
                }
                else
                {
                       $this->Patient_model->addPatientData();
                       $this->session->set_flashdata('dataflash','Adding success');
                       redirect('user');
                        
                }
    }

}

/* End of file user.php */


?>