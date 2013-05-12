<?php

class Recent extends CI_Controller
{
    function index()
    {
        $cart = $this->cart->contents();

        $cat_nums = array();
        foreach ($cart as $item) 
        {
             $cat_nums[] = $item['name']; 
        }

        if ($cat_nums)
        {
            $this->load->model('Courses_model');
            $data['courses'] = $this->Courses_model->get_courses($cat_nums);

            $data['main_content'] = 'courses_view';
            $this->load->view('includes/template', $data);
        }
        else
        {
            $data['main_content'] = 'no_courses_view';
            $this->load->view('includes/template', $data); 
        }       
    }
    
    function add()
    {
        $insert = array(
            'id' =>  $this->input->post('cat_num'),
            'qty' => 1,
            'price' => 1,
            'name' => $this->input->post('cat_num')
        );
       
        $this->cart->insert($insert);
        
    }

}