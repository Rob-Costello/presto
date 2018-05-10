<?php

use Spatie\PdfToImage;

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

    function index($pageNumber = null)
    {
        $this->load->library('pagination');
        $job = new jobsModel();
        $perPage = 10;
        $offset = 0;

        if($pageNumber > 0){
            $offset = $pageNumber * $perPage;
        }

        $data['jobs'] = $job->getJobs(null, null, $perPage, $offset);

        $pagConfig['base_url'] = '/presto/jobs/';
        $pagConfig['total_rows'] = $data['jobs']['count'];
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
        if($data['pagination_end'] > $data['jobs']['count']) {
            $data['pagination_end'] = $data['jobs']['count'];
        }
        $data['pagination'] = $this->pagination->create_links();
        $data['user'] = $this->user;
        $data['title'] = 'Press Jobs';
        $data['nav'] = 'press jobs';
        $this->load->view('pages/jobs', $data);
    }

    function add(){

        $job = new jobsModel();

        if( !empty($_POST) ) {
            $jobData = $this->input->post();
            $jobData['user_id'] = $this->user->id;
            $id = $job->insertJob($jobData);
            header('Location: /presto/jobs/view/'.$id);

        }

        $data['user'] = $this->user;
        $data['title'] = 'Jobs';
        $data['nav'] = 'jobs';
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/job_view', $data);
    }

    function view( $jobID, $action = null ){

        $job = new jobsModel();

        if( !empty($_POST) ) {

            if( isset( $_POST['download'] ) ){

                $job->downloadOutputByID($this->input->post('download'));

            } else {

                $job->updateJob($this->input->post(), $jobID);

            }
        }

        if( $action !== null ){

            $this->$action($jobID);

        }

        $config['upload_path'] = $job->uploadPath($this->config->item('upload_path'),$jobID );
        $config['allowed_types'] = $this->config->item('allowed_types');
        $config['max_size'] = $this->config->item('max_size');
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
        $data['outputs'] = $job->getOutputByJobID( $jobID );
        $data['user'] = $this->user;
        $data['title'] = 'Jobs';
        $data['nav'] = 'jobs';
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/job_view', $data);
    }

    function gen21Up($jobID){

        $this->load->model('pdfModel');
        $this->load->model('artworkModel');

        $jobModel = new JobsModel();
        $arkworkModel = new artworkModel();

        $job = $jobModel->getJob($jobID);

        $jobArtwork = $arkworkModel->getJobArtworkByID($jobID);
        $file = $jobArtwork['data'][0]->path . 'rendered/' . $jobArtwork['data'][0]->raw_name . '.jpg';


        //Get JPG image contents
        $image = imagecreatefromstring(file_get_contents($file));

        //Get 21 up PDF template
        $str=file_get_contents($this->config->item('upload_path').'organised.txt');

        //Put 1up in position in 21 up PDF temaplate
        $pdfModel = new pdfModel();
        $pdfFrontPlacementArray = array(
            'PLACEHOLDERA',
            'PLACEHOLDERB',
            'PLACEHOLDERC',
            'PLACEHOLDERD',
            'PLACEHOLDERE',
            'PLACEHOLDERF',
            'PLACEHOLDERG',
            'PLACEHOLDERH',
            'PLACEHOLDERI',
            'PLACEHOLDERJ',
            'PLACEHOLDERK',
            'PLACEHOLDERL',
            'PLACEHOLDERM',
            'PLACEHOLDERN',
            'PLACEHOLDERO',
            'PLACEHOLDERP',
            'PLACEHOLDERQ',
            'PLACEHOLDERR',
            'PLACEHOLDERS',
            'PLACEHOLDERT',
            'PLACEHOLDERU'
        );

        $imageFrontPlacementArray = array(
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image),
            $pdfModel->streamfromimage($image)
        );

        $str=str_replace($pdfFrontPlacementArray, $imageFrontPlacementArray, $str);

        //save and generate output

        $jobModel->output21Up( $str, $jobID, $job->filename);
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        header('Location: ' . WP_SITEURL . '/presto/jobs/view/'.$jobID.'/');

    }

}