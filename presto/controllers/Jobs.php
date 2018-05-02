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

    function view( $jobID, $action = null ){

        $job = new jobsModel();

        if( !empty($_POST) ) {

            $job->updateJob($this->input->post(), $jobID);

        }

        if( $action !== null ){

            $this->$action($jobID);

        }

        $config['upload_path'] = $this->uploadPath($this->config->item('upload_path'),$jobID );
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
        $this->load->helper('download');

        $arkworkModel = new artworkModel();

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

        //generate output
        file_put_contents($this->config->item('upload_path').'organised-out.pdf', $str);
        force_download($this->config->item('upload_path').'organised-out.pdf', NULL);


    }

    function uploadPath( $uploadsPath, $jobID ){

        $fullPath = $uploadsPath . $jobID . '/';

        if(!is_dir($fullPath)) {
            mkdir($fullPath);
            chmod($fullPath, 0777);
            mkdir($fullPath.'rendered/');
            chmod($fullPath.'rendered/', 0777);
        }
        return $fullPath;

    }

}