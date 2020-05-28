<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {
        public function getAllPatient()
            {
                return $this->db->get('patient')->result_array();
            }

            public function addPatientData()
            {
                $data=[
                    "name" => $this->input->post('name', true),
                    "email" => $this->input->post('email', true),
                    "phone" => $this->input->post('phone', true),
                    "departement" => $this->input->post('departement', true)
 
                ];
                    $this->db->insert('patient', $data);
            }

             public function deletePatientData($id)
            {
                $this->db->where('id', $id);
                $this->db->delete('patient');
            }

          public function getPatientbyId($id)
          {
             return $this->db->get_where('patient',['id' =>$id])->row_array();
          }

          public function updatePatientData()
          {
            $data=[
                "name" => $this->input->post('name', true),
                "email" => $this->input->post('email', true),
                "phone" => $this->input->post('phone', true),
                "departement" => $this->input->post('departement', true)

            ];
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('patient', $data);
          }

          public function seacrhPatientdata()
          {
              $keyword= $this->input->post('keyword', true);
              $this->db->like('Name', $keyword);
              $this->db->or_like('departement', $keyword);
              return $this->db->get('patient')->result_array();
              
          }

          public function datatables()
          {
              $query= $this->db->order_by('id','DESC')->get('patient');
              return $query->result();
          }

}

/* End of file Patient_model.php */

?>