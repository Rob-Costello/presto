<?php

class assets extends CI_Controller{

    var $user = array();
    var $messages = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
        $this->load->model('messages');
        $this->load->model('assetsModel');
        $this->load->library('data_arrays');
        $this->load->library('ion_auth');
        $this->login->login_check_force();
        $this->user = $this->ion_auth->user()->row();
        $this->messages = new messages();
    }

    function index()
    {
        $data['user'] = $this->user;
        $data['title'] = 'Assets';
        $data['nav'] = 'assets';
        $this->load->view('pages/assets', $data);
    }

    private function databaseDatetimeFormat( $date )
    {
        $d = DateTime::createFromFormat('d/m/Y', $date);
        if($d){
            return DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        } elseif (strstr($date, '/')) {
            return DateTime::createFromFormat('d/m/Y H:i', $date)->format('Y-m-d H:i:s');
        } else {
            return $date;
        }
    }

}