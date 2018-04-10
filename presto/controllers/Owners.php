<?php

class owners extends CI_Controller{

    var $user = array();
    var $messages = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
        $this->load->model('messages');
        $this->load->model('ownersModel');
        $this->load->library('data_arrays');
        $this->load->library('ion_auth');
        $this->login->login_check_force();
        $this->user = $this->ion_auth->user()->row();
        $this->messages = new messages();
    }

    function index()
    {
        $data['user'] = $this->user;
        $data['title'] = 'Owners';
        $data['nav'] = 'owners';
        $this->load->view('pages/owners', $data);
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
            $tagz->batchExportTagz( $generatedTagz );
                
            $this->messages->set_message( 'Tagz generated' );

        }

        $data['user'] = $this->user;
        $data['title'] = 'Generate Tagz';
        $data['nav'] = 'tagz';
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/tagz_generate', $data);

    }

    function add( ){

        $company = new companiesModel();

        if( !empty($_POST) ) {
            $_POST['date_established'] = $this->databaseDatetimeFormat($_POST['date_established']);
            $id = $company->insertCompany( $this->input->post() );

            if( $id != 0 ){
                header('Location: /qph/companies/view/'.$id);
            } else {
                $this->messages->set_error( 'There was an error adding the customer' );

                $data['customer'] = $this->input->post();
            }

        }

        $data['user'] = $this->user;
        $data['title'] = 'Company';
        $data['nav'] = 'companies';
        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/company_view', $data);
    }

    function view( $id = null ){

        $this->load->model('tagzModel');
        $tagz = new tagzModel();

        if( !empty($_POST) ) {

        }

        $data['user'] = $this->user;
        $data['title'] = 'Owner';
        $data['nav'] = 'owners';
        $data['owner'] = $tagz->getTagUserInfo( $id );
        $data['tagz'] = $tagz->getTagzByUserID( $id );
        $data['orders'] = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => $id,
            'post_type'   => wc_get_order_types(),
            'post_status' => array_keys( wc_get_order_statuses() ),
        ) );

        foreach( $data['orders'] as &$order ){

            $currOrder = new WC_Order($order->ID);
            $items = array();

            foreach( $currOrder->get_items() as $item ){

                $items[] = $item['name'];

            }
 
            $order->items = implode(', ', $items );

            $order->total = get_post_meta( $order->ID, '_order_total', true);

        }

        $data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
        $this->load->view('pages/owner_view', $data);
    }

}