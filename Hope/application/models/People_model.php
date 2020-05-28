<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class People_model extends CI_Model {

    public function getAllpeople()
    {
        return $this->db->get('people')->result_array();
    }


    public function getPeople($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
        }
            return $this->db->get('people', $limit, $start)->result_array();
        
       
        
    }
    public function CountPeople()
    {
        return $this->db->get('people')->num_rows();
    }

    public function deletePeopletData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('people');
    }

    public function getPeoplebyID($id)
    {
        return $this->db->get_where('people',['id' =>$id])->row_array();

    }

    public function updatePeopleData()
    {
      $data=[
          "name" => $this->input->post('name', true),
          "email" => $this->input->post('email', true),
          "phone" => $this->input->post('phone', true),
          "address" => $this->input->post('address', true)

      ];
          $this->db->where('id', $this->input->post('id'));
          $this->db->update('people', $data);
    }

    public function deletePeopleData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('people');
    }

    public function addPeopleData()
    {
        $data=[
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "phone" => $this->input->post('phone', true),
            "address" => $this->input->post('address', true)

        ];
            $this->db->insert('people', $data);
    }




}

/* End of file People_model.php */

?>