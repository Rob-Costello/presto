<?php

class tagz extends CI_Controller{

    var $user = array();
    var $messages = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
        $this->load->model('messages');
        $this->load->model('tagzModel');
        $this->load->model('tagzEventsModel');
        $this->load->library('data_arrays');
        $this->load->library('ion_auth');
        $this->login->login_check_force();
        $this->user = $this->ion_auth->user()->row();
        $this->messages = new messages();
    }

    function index()
    {
        $data['user'] = $this->user;
        $data['title'] = 'Tagz';
        $data['nav'] = 'tagz';
        $this->load->view('pages/tagz', $data);
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

    function generate(){

        $tagz = new tagzModel();

        if( !empty($_POST) ) {
            
            $generatedTagz = array();

            for ($i=0;$i<$this->input->post('count');$i++) { 
                $generatedTagz[] = array( 
                    'code' => $tagz->generateTag(), 
                    'keyring' => $this->input->post('keyring') 
                );
            }

            $tagz->batchInsertTagz( $generatedTagz );
            $tagz->batchExportTagz( $generatedTagz, $this->input->post('keyring') );
                
            $this->messages->set_message( 'Tagz generated' );

        }

        $data['user'] = $this->user;
        $data['title'] = 'Generate Tagz';
        $data['nav'] = 'tagz';
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/tagz_generate', $data);

    }

    function view( $id = null ){

        $this->load->model('finderModel');

        $tagz = new tagzModel();
        $tagzEvents = new tagzEventsModel();
        $finders = new finderModel();

        if( !empty($_POST) ) {


        }

        // if($row->event_id == 1 || $row->event_id == 9){
        //         $event_id = $row->event_id;
        //     } else {
        //         $event_id = '0';
        //     }

        $data['owner'] = '';
        $data['user'] = $this->user;
        $data['nav'] = 'tagz';
        $data['tag'] = $tagz->getTagInfo( $id );
        $data['status'] = $tagzEvents->getTagCurrentStatusName( $id );
        
        if( $data['tag']->user_id )
            $data['owner'] = $tagz->getTagUserInfo( $data['tag']->user_id );

        $data['events'] = $tagzEvents->getEvents( null, array( 'Tag' => $id ) )['data']->result();

        $data['finders'] = $finders->getFinders( $id );

        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/tag_view', $data);
    }

}