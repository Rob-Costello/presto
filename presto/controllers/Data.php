<?php

class Data extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
        $this->load->model('messages');
        if(php_sapi_name() != 'cli' && PHP_SAPI != 'cli') {
            $this->load->library('ion_auth');
            $this->login->login_check_force();
            $this->user = $this->ion_auth->user()->row();
        } else {
            $this->load->database();
        }
    }

    function index()
    {
    }

    private function requestData( $name = null ){

        switch($_SERVER["REQUEST_METHOD"]) {
            case "GET":
                if( isset($_GET[$name]) )
                    return $_GET[$name];
                else
                    return $_GET;

                break;
            case "POST":
                return $_POST[$name];
                break;
        }

    }

    private function output($type = null, $content){

        switch($type) {
            case "JSON":
                header('Content-Type: application/json');
                echo json_encode($content);
                break;
            default :
                echo $content;
        }

    }

    function tagz(){

        $this->load->model('tagzModel');

        $tagz = new tagzModel();

        $data = $tagz->getTagz( null, $this->requestData(), $this->requestData('pageSize'), ($this->requestData('pageIndex') - 1) * $this->requestData('pageSize'));

        $result = array();
        $result['result'] = array();

        foreach($data['data']->result() as $row) {
            $result['result'][] = array(
                'Tag' => $row->code,
                'Status' => $row->status,
                'Created' => $row->created,
                'Activated' => ''
            );
        }

        $result['itemsCount'] = $data['count'];

        $this->output('JSON', $result);
    }

    function tagzCollection(){

        $this->load->model('finderModel');

        $finder = new finderModel();

        $data = $finder->getfindersList( array( 'collection' => 1) , $this->requestData(), $this->requestData('pageSize'), ($this->requestData('pageIndex') - 1) * $this->requestData('pageSize'));

        $result = array();
        $result['result'] = array();

        foreach($data['data']->result() as $row) {

            $result['result'][] = array(
                'ID' => $row->id,
                'First Name' => $row->first_name,
                'Last Name' => $row->last_name,
                'Postcode' => $row->postcode,
                'Tag' => $row->tag
            );
        }

        //print_r($result['result']);

        $result['itemsCount'] = $data['count'];

        $this->output('JSON', $result);
    }

    function tagzTopay(){

        $this->load->model('finderModel');

        $finder = new finderModel();

        $data = $finder->getfindersList( 'payment = 1', $this->requestData(), $this->requestData('pageSize'), ($this->requestData('pageIndex') - 1) * $this->requestData('pageSize'));

        $result = array();
        $result['result'] = array();

        foreach($data['data']->result() as $row) {

            $result['result'][] = array(
                'ID' => $row->id,
                'First Name' => $row->first_name,
                'Last Name' => $row->last_name,
                'Postcode' => $row->postcode,
                'Tag' => $row->tag
            );
        }

        //print_r($result['result']);

        $result['itemsCount'] = $data['count'];

        $this->output('JSON', $result);
    }

    function tagzNotReturned(){

        $this->load->model('finderModel');

        $finder = new finderModel();

        $data = $finder->getfindersList( 'not_received = 1', $this->requestData(), $this->requestData('pageSize'), ($this->requestData('pageIndex') - 1) * $this->requestData('pageSize'));

        $result = array();
        $result['result'] = array();

        foreach($data['data']->result() as $row) {

            $result['result'][] = array(
                'ID' => $row->id,
                'First Name' => $row->first_name,
                'Last Name' => $row->last_name,
                'Postcode' => $row->postcode,
                'Tag' => $row->tag
            );
        }

        //print_r($result['result']);

        $result['itemsCount'] = $data['count'];

        $this->output('JSON', $result);
    }

    function owners(){

        $this->load->model('ownersModel');

        $owners = new ownersModel();

        $data = $owners->getOwners( null, $this->requestData(), $this->requestData('pageSize'), ($this->requestData('pageIndex') - 1) * $this->requestData('pageSize'));

        $result = array();
        $result['result'] = array();

        foreach($data['data'] as $row) {

            $result['result'][] = array(
                'ID' => $row->id,
                'First Name' => $row->first_name,
                'Last Name' => $row->last_name,
                'Email Address' => $row->email_address,
                'Phone Number' => $row->phone_number,
                'Postcode' => $row->postcode
            );

        }

        $result['itemsCount'] = $data['count'];

        $this->output('JSON', $result);
    }

    function assets(){

        $this->load->model('assetsModel');

        $assets = new assetsModel();

        $data = $assets->getAssets( null, $this->requestData(), $this->requestData('pageSize'), ($this->requestData('pageIndex') - 1) * $this->requestData('pageSize'));

        $result = array();
        $result['result'] = array();

        foreach($data['data']->result() as $row) {

            $result['result'][] = array(
                'Tag' => $row->code,
                'Status' => '',
                'Created' => $row->created,
                'Activated' => ''
            );
        }

        $result['itemsCount'] = $data['count'];

        $this->output('JSON', $result);
    }

    function checkItemReceivedEmail(){

        $this->load->model('finderModel');

        $finder = new finderModel();

        $collectionOver10 = $finder->getCollectionOverDays( 10 );

        foreach( $collectionOver10 as $f ){

            $finder->setItemNotRecieved( $f->tag );

        }

        $collectionOver7 = $finder->getCollectionOverDays( 7 );

        // foreach( $collectionOver7 as $f ){



        //     //$finder->setItemNotRecieved( $f->tag );

        // }
        
    }


}