<?php

class Shopping_model extends CI_Model
{
    function add()
    {
        $data = array(
            'shopping' => $this->input->post('cat_num'),
            'username' => $this->input->post('username')    
        );
        
        $insert = $this->db->insert('users', $data);
        return $insert;
    }
    
    function get_cat_nums($username)
    {
        $cat_nums = $this->db->select('shopping')->from('users')->where('username', $username)->get()->result();
        
        return $cat_nums;
    }
}