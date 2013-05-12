<?php

class Search extends CI_Controller
{
    function index()
    {
        $data['main_content'] = 'search_view';
        $this->load->view('includes/template', $data);
    }
    
    function courses()
    {
        $department = $this->input->post('department');
        $gen_ed = $this->input->post('gen_ed');
        $title = $this->input->post('title');
        $instructor = $this->input->post('instructor');
        $day_time = array(
            'day' => $this->input->post('day'),
            'beginning' => $this->input->post('time'),
        );

        $this->load->model('Courses_model');
        $result = $this->Courses_model->get_cat_nums($department, $gen_ed, $title, $instructor, $day_time);
        
        if ($result)
        {
            $cat_nums = array_map(function ($e) {return $e->cat_num;}, $result);
            
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
    
    function department()
    {
        $data['main_content'] = 'department_form';
        $this->load->view('includes/template', $data);
    }
    
    function title()
    {
        $data['main_content'] = 'title_form';
        $this->load->view('includes/template', $data);
    }
    
    function gen_ed()
    {
        $this->load->model('Gen_ed_model');
        $data['gen_ed_options'] = $this->Gen_ed_model->gen_ed_options();
        $data['main_content'] = 'gen_ed_form';
        $this->load->view('includes/template', $data);
    } 
    
    function instructor()
    {
        $data['main_content'] = 'instructor_form';
        $this->load->view('includes/template', $data);
    }
    
    function day_time()
    {
        $data['main_content'] = 'day_time_form';
        $this->load->view('includes/template', $data);
    }    
    
}