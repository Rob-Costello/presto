<?php

class orders extends CI_Controller{

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
        $data['title'] = 'Orders';
        $data['nav'] = 'orders';
        $this->load->view('pages/orders', $data);
    }

    function edit( $orderID ){
        $data['user'] = $this->user;
        $data['title'] = 'Orders';
        $data['nav'] = 'orders';
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/order_view', $data);
    }

}