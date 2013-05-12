<?php

class Taking_model extends CI_Model
{
    function add()
    {
        $data = array(
            'taking' => $this->input->post('cat_num'),
            'username' => $this->input->post('username')    
        );
        
        $insert = $this->db->insert('users', $data);
        return $insert;
    }
    
    function get_cat_nums($username)
    {
        $cat_nums = $this->db->select('taking')->from('users')->where('username', $username)->get()->result();
        
        return $cat_nums;
    }
}