<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class print_model extends CI_Model
{
    public function view()
    {
        $this->db->select('Name,email,Phone,departement');
        $query= $this->db->get('patient');
        return $query->result();
    }
    

}

/* End of file print_model.php */
