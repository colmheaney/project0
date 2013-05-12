<?php

class Taking extends CI_Controller
{
  
    function index()
    {
        $data['main_content'] = 'taking_view';
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
            $this->load->model('Taking_model');
            $insert = $this->Taking_model->add();
            if($insert)
            {
                    echo "Added to Taking";
            }else
            {
                    echo "There was a problem. Please try again";
            }
       }
   }
   
    function courses()
    {
        $username = $this->input->post('username');
        $this->load->model('Taking_model');
        $result = $this->Taking_model->get_cat_nums($username);
        
        if ($result)
        {
            $cat_nums = array_map(function ($e) {return $e->taking;}, $result);
            
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