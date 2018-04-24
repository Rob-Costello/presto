<?php

class jobs extends CI_Controller{

    var $user = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
        $this->load->model('messages');
        $this->load->library('ion_auth');
        $this->load->model('jobsModel');
        $this->login->login_check_force();
        $this->user = $this->ion_auth->user()->row();
    }

    function index()
    {
        $job = new jobsModel();

        $data['jobs'] = $job->getJobs();
        $data['user'] = $this->user;
        $data['title'] = 'Press Jobs';
        $data['nav'] = 'press jobs';
        $this->load->view('pages/jobs', $data);
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

    function view( $jobID ){

        $job = new jobsModel();

        if( !empty($_POST) ) {

            $job->updateJob($this->input->post(), $jobID);

        }

        $config['upload_path'] = $_SERVER["DOCUMENT_ROOT"] .'/../presto/uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;
        $this->load->library('upload', $config);

        if( !empty($_FILES) ) {

            if (!$this->upload->do_upload('artwork')) {
                $errors = $this->upload->display_errors();

                $this->messages->set_error($errors);
            } else {
                $fileData = $this->upload->data();
                $message = $fileData['file_name'] . ' has been sucessfully uploaded';
                $this->messages->set_message($message);
                $job->uploadArtwork($fileData, $jobID, $this->user->id);

            }
        }

        $data['job'] = $job->getJob( $jobID );
        $data['artwork'] = $job->getArtwork( $jobID );
        $data['user'] = $this->user;
        $data['title'] = 'Jobs';
        $data['nav'] = 'jobs';
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/job_view', $data);
    }

}