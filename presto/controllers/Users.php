<?php

class users extends CI_Controller{

    var $user = array();

    function __construct()
    {
        parent::__construct();


        $this->load->model('login');
        $this->load->model('messages');
        $this->load->library('ion_auth');
        $this->load->model('usersModel');
        $this->load->model('jobsModel');
        $this->login->login_check_force();
        $this->user = $this->ion_auth->user()->row();
        $this->load->library(array('ion_auth','form_validation'));
    }

    function index()
    {
        $this->load->library('pagination');
        $user = new usersModel($pageNumber = null);
        $data['tableheadings'] = ['Id','Username','Email','Created On','First Name','Last Name','Company','Phone'];
        $perPage = 1;
        $offset = 0;

        if($pageNumber > 0){
            $offset = $pageNumber * $perPage;
        }

        $data['users'] = $user->getUsers(null, null, $perPage, $offset);
        $data['user'] = $this->user;
        $data['title'] = 'Users';
        $data['nav'] = 'users';
        $pagConfig['base_url'] = '/presto/users/';
        $pagConfig['total_rows'] = $data['users']['count'];
        $pagConfig['per_page'] = $perPage;

        $pagConfig['num_tag_open'] = '<li class="paginate_button">';
        $pagConfig['num_tag_close'] = '</li>';
        $pagConfig['cur_tag_open'] = '<li class="paginate_button current">';
        $pagConfig['cur_tag_close'] = '</li>';

        $pagConfig['prev_link'] = 'Previous';
        $pagConfig['prev_tag_open'] = '<li class="paginate_button previous">';
        $pagConfig['prev_tag_close'] = '</li>';

        $pagConfig['next_link'] = 'Next';
        $pagConfig['next_tag_open'] = '<li class="paginate_button next">';
        $pagConfig['next_tag_close'] = '</li>';

        $this->pagination->initialize($pagConfig);

        $data['pagination_start'] = $offset + 1;
        $data['pagination_end'] = $data['pagination_start'] + $perPage;
        if($data['pagination_end'] > $data['users']['count']) {
            $data['pagination_end'] = $data['users']['count'];
        }
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('pages/users', $data);
    }






    function add(){

        $job = new jobsModel();

        if( !empty($_POST) ) {

            $id = $job->insertJob($this->input->post());
            header('Location: /presto/jobs/view/'.$id);

        }

        $data['user'] = $this->user;
        $data['title'] = 'Jobs';
        $data['nav'] = 'jobs';
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/job_view', $data);
    }





    function view( $userID ){

        $user = new usersModel();

        if( !empty($_POST) ) {

            $password = $this->input->post('password');
            $key = $this->config->item('encryption_key');
            $salt1 = hash('sha512', $key . $password);
            $salt2 = hash('sha512', $password . $key);

            //$hashed_password = hash('sha512', $salt1 . $password . $salt2);
                $hashed_password = $this->ion_auth_model->hash_password('password',FALSE,FALSE);


            $user->updatePassword($hashed_password, $userID);

        }

        //$config['upload_path'] = $_SERVER["DOCUMENT_ROOT"] .'/../presto/uploads/';
        //$config['allowed_types'] = '*';
        //$config['max_size'] = 10000;
        //$this->load->library('upload', $config);
        $user = new usersModel();
        foreach($user->getUser($userID) as $key => $val)
        {
         $data[$key]=$val;
        }

        $data['user'] = $this->user;
        $data['title'] = 'Users';
        $data['nav'] = 'users';
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();

        $this->load->view('pages/user_view', $data);
    }

}