<?php

class Shopping extends CI_Controller
{
    function index()
    {
        $data['main_content'] = 'shopping_view';
        $this->load->view('includes/template', $data);
    }

    function add()
    {
       $this->load->library('form_validation');
       $this->form_validation->set_rules('username', 'Email address', 'trim|required|valid_email');

       if ($this->form_validation->run() == FALSE)
       {
           echo "Please enter a valid email.";
       }
       else
       {
           $this->load->model('Shopping_model');
           $insert = $this->Shopping_model->add();
            if($insert)
            {
                    echo "Added to Shopping";
            }else
            {
                    echo "There was a problem. Please try again";
            }
       }
    }
    
    function courses()
    {
        $username = $this->input->post('username');
        $this->load->model('Shopping_model');
        $result = $this->Shopping_model->get_cat_nums($username);
        
        if ($result)
        {
            $cat_nums = array_map(function ($e) {return $e->shopping;}, $result);
            
            $this->load->model('Courses_model');
            $data['courses'] = $this->Courses_model->get_courses($cat_nums);

            $data['main_content'] = 'courses_view';
            $this->load->view('includes/template', $data);
        }
        else
        {
            echo 'no results found';
        }       
    }
}
