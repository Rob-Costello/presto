<?php

class finders extends CI_Controller{

    var $user = array();
    var $messages = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
        $this->load->model('messages');
        $this->load->model('finderModel');
        $this->load->library('data_arrays');
        $this->load->library('ion_auth');
        $this->login->login_check_force();
        $this->user = $this->ion_auth->user()->row();
        $this->messages = new messages();
    }

    // function index()
    // {
    //     $data['user'] = $this->user;
    //     $data['title'] = 'Owners';
    //     $data['nav'] = 'owners';
    //     $this->load->view('pages/owners', $data);
    // }

    // private function databaseDatetimeFormat( $date )
    // {
    //     $d = DateTime::createFromFormat('d/m/Y', $date);
    //     if($d){
    //         return DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    //     } elseif (strstr($date, '/')) {
    //         return DateTime::createFromFormat('d/m/Y H:i', $date)->format('Y-m-d H:i:s');
    //     } else {
    //         return $date;
    //     }
    // }

    // function generate(){

    //     $tagz = new tagzModel();

    //     if( !empty($_POST) ) {
            
    //         $generatedTagz = array();

    //         for ($i=0;$i<$this->input->post('count');$i++) { 
    //             $generatedTagz[] = array( 
    //                 'code' => $tagz->generateTag(), 
    //                 'keyring' => $this->input->post('keyring') 
    //             );
    //         }

    //         $tagz->batchInsertTagz( $generatedTagz );
    //         $tagz->batchExportTagz( $generatedTagz );
                
    //         $this->messages->set_message( 'Tagz generated' );

    //     }

    //     $data['user'] = $this->user;
    //     $data['title'] = 'Generate Tagz';
    //     $data['nav'] = 'tagz';
    //     $data['messages'] = $this->messages->get_messages();
    //     $data['errors'] = $this->messages->get_errors();
    //     $this->load->view('pages/tagz_generate', $data);

    // }

    // function add( ){

    //     $company = new companiesModel();

    //     if( !empty($_POST) ) {
    //         $_POST['date_established'] = $this->databaseDatetimeFormat($_POST['date_established']);
    //         $id = $company->insertCompany( $this->input->post() );

    //         if( $id != 0 ){
    //             header('Location: /qph/companies/view/'.$id);
    //         } else {
    //             $this->messages->set_error( 'There was an error adding the customer' );

    //             $data['customer'] = $this->input->post();
    //         }

    //     }

    //     $data['user'] = $this->user;
    //     $data['title'] = 'Company';
    //     $data['nav'] = 'companies';
    //     $data['messages'] = $this->messages->get_messages();
    //     $data['errors'] = $this->messages->get_errors();
    //     $this->load->view('pages/company_view', $data);
    // }

    function view( $id = null ){

        $this->load->model('tagzModel');
        $tagz = new tagzModel();

        $this->load->model('tagzEventsModel');
        $tagzEvents = new tagzEventsModel();
        
        $finder = new finderModel();

        $data['title'] = 'Finder';
        $data['nav'] = '';
        $data['user'] = $this->user;

        $data['finder'] = $finder->getFinder( $id );
        $data['tag'] = $tagz->getTagInfo( $data['finder']->tag );
        $data['owner'] = $tagz->getTagUserInfo( $data['tag']->user_id );

        if( !empty($_POST) ) {
            
            if( $this->input->post('action') == 'payment' ){

                $finder->unsetPayment( $id );
                $this->messages->set_message( 'Payment recorded' );

                $to = $data['owner']->user_email;
                $subject = 'Reward Payment Made To Finder';
                $header = 'Payment Made';
                $content = 'The payment for the return of your item has now been paid to the finder. Thank you for using the Reward Tagz service.';
                //$body = file_get_contents( APPPATH.'views/email/default.php?header='. urlencode ($header) . '&content=' . urlencode ($content) );
                
                ob_start();
                include APPPATH.'views/email/default.php';
                $body = ob_get_clean();

                $headers = array('From: Reward Tagz <hello@rewardtagz.com>','Content-Type: text/html; charset=UTF-8');
 
                wp_mail( $to, $subject, $body, $headers );

                $to = $data['finder']->email;
                $subject = 'Reward Payment Made';
                $header = 'Finder Paid';
                $content = 'Good news! Your reward has now been deposited to your account.' ;
                ob_start();
                include APPPATH.'views/email/default.php';
                $body = ob_get_clean();
                
                    
                $headers = array('From: Reward Tagz <hello@rewardtagz.com>','Content-Type: text/html; charset=UTF-8');
 
                wp_mail( $to, $subject, $body, $headers );


            }

            if( $this->input->post('action') == 'collection' ){

                $finder->unsetCollection( $id, $this->input->post('tracking_code') );
                $this->messages->set_message( 'Collection recorded' );

                $to = $data['owner']->user_email;
                $subject = 'Collection for your item has been arranged';
                $header = 'Collection for your item has been arranged.';
                $content = 'Good news! Collection of your item has been arranaged and should be with you within the next couple of days. Once you receive the item please click here: <a href="'. WP_HOME . '/rt/received/'. $id .'/">I have received my item</a>. Otherwise if you do not get your item back by day 5 please click here: <a href="'. WP_HOME . '/rt/notReceived/'. $id .'/">I have not received my item</a>' ;
                ob_start();
                include APPPATH.'views/email/default.php';
                $body = ob_get_clean();
                
                    
                $headers = array('From: Reward Tagz <hello@rewardtagz.com>','Content-Type: text/html; charset=UTF-8');
 
                wp_mail( $to, $subject, $body, $headers );

            }

            if( $this->input->post('action') == 'received' ){

                $finder->setItemRecieved( $id );
                $this->messages->set_message( 'Collection recorded' );

            }


        }

        $data['finder'] = $finder->getFinder( $id );

        $data['tag'] = $tagz->getTagInfo( $data['finder']->tag );
        $data['transaction'] = $tagzEvents->getEventByEventID( $data['finder']->tag, 5 );
        $data['owner'] = $tagz->getTagUserInfo( $data['tag']->user_id );
 
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/finder_view', $data);
    }

    function collection()
    {
        $data['user'] = $this->user;
        $data['title'] = 'Collection';
        $data['nav'] = 'control';
        $this->load->view('pages/finder_collection', $data);
    }

    function topay()
    {
        $data['user'] = $this->user;
        $data['title'] = 'To Pay';
        $data['nav'] = 'control';
        $this->load->view('pages/finder_topay', $data);
    }


    function notReceived()
    {
        $data['user'] = $this->user;
        $data['title'] = 'Not Received';
        $data['nav'] = 'control';
        $this->load->view('pages/finder_notreceived', $data);
    }

}