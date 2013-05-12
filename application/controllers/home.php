<?php

class home extends CI_Controller
{
    function index()
    {
        $data['main_content'] = 'homepage_view';
        $this->load->view('includes/template', $data);
    }
}