<?php

class dashboard extends CI_Controller{

    var $user = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
        $this->load->model('messages');
        $this->load->library('ion_auth');
        $this->login->login_check_force();
        $this->user = $this->ion_auth->user()->row();
    }

    function index()
    {
        $data['user'] = $this->user;
        $data['title'] = 'Dashboard';
        $data['nav'] = 'dashboard';
        $this->load->view('pages/dashboard', $data);
    }

}