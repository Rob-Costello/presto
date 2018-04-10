<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tagzinterface extends CI_Controller {

	var $user = array();
    var $messages = null;

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
        $this->load->model('messages');
        $this->load->model('tagzModel');
        $this->load->model('tagzEventsModel');
        $this->load->model('finderModel');
        $this->load->model('assetsModel');
        $this->load->library('ion_auth');
        $this->user = $this->ion_auth->user()->row();
        $this->messages = new messages();
    }

	public function index( $code = null )
	{

    	$view = 'enter_tag';
    	$user = null;
    	$tagz = new tagzModel();
    	$tagzEvents = new tagzEventsModel();
    	$finder = new finderModel();

    	require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/google/recaptcha/src/autoload.php');
		$recaptcha = new \ReCaptcha\ReCaptcha('6LfVrxoUAAAAAF3Wn6MsWM-E_YpUAsF8L9fJ8chG');

		if( $code != null ){
			$_POST['tag'] = $code;
		}

		if( !empty($_POST) ) {

			if( $this->input->post('action') == 'paypal account' ){

				$view = 'finder_thankyou';
				$data['tag'] = $this->input->post('tag');
				$data['proceed_option'] = $this->input->post( 'proceed_option' );
				$data['finderID'] = $this->input->post( 'finderID' );
				$finderID = $finder->updateFinder( 
					$this->input->post('finderID'),
					array(
						'paypal_email' => $this->input->post('paypal_email')
					)
				);

				if ( $tagzEvents->checkRewardAvailable( $this->input->post('tag') ) ) {

					$view = 'finder_thankyou';

                	$to = $this->config->item('default_email');
                	$subject = 'Shipping Required for Item';
                	$header = 'Shipping Required for Item';
                	$content = 'An item needs to be shipped from a finder to a owner, please login to action.';
                
                	ob_start();
                	include APPPATH.'views/email/default.php';
                	$body = ob_get_clean();

	                $headers = array('From: Reward Tagz <hello@rewardtagz.com>','Content-Type: text/html; charset=UTF-8');
 
    	            wp_mail( $to, $subject, $body, $headers );

                	$finder->setCollection( $data['finderID'] );

				} else {

					$view = 'reward_not_available';
					$user_info = get_userdata( $tagz->getTagUserId( $this->input->post('tag') ) );

                	$to = $user_info->user_email;
                	$subject = 'Please deposit Reward';
                	$header = 'Please deposit Reward';
                	$content = 'Good news! Your lost item has been found. Please visit the Reqard Tags website to pay the reward deposit: ' .
                	'<a href="'. WP_HOME .'/wp-login.php?redirect_to=\'/cart/?add-to-cart=64&tag='.$this->input->post('tag').'\'">Pay Reward</a>';
                
                	ob_start();
                	include APPPATH.'views/email/default.php';
                	$body = ob_get_clean();

	                $headers = array('From: Reward Tagz <hello@rewardtagz.com>','Content-Type: text/html; charset=UTF-8');
 
    	            wp_mail( $to, $subject, $body, $headers );

                	$tagzEvents->addEvent( 14, $this->input->post('tag'), 'Owner: Pay reward request');

				}


			} elseif( $this->input->post('action') == 'finder address' ){

				$view = 'finder_thankyou';
				$data['tag'] = $this->input->post('tag');
				$data['proceed_option'] = $this->input->post( 'proceed_option' );
				$data['finderID'] = $this->input->post( 'finderID' );
				$finder->updateFinder( 
					$this->input->post('finderID'),
					array(
						'addr_line_1' => $this->input->post('addr_line_1'), 
						'addr_line_2' => $this->input->post('addr_line_2'), 
						'city' => $this->input->post('city'),
						'postcode' => $this->input->post('postcode'),
					)
				);

				if( $this->input->post( 'proceed_option' ) != 'money' ) {

					$view = 'finder_thankyou';
					
                	$to = $this->config->item('default_email');
                	$subject = 'Shipping Required for Item';
                	$header = 'Shipping Required for Item';
                	$content = 'An item needs to be shipped from a finder to a owner, please login to action.';
                
                	ob_start();
                	include APPPATH.'views/email/default.php';
                	$body = ob_get_clean();

	                $headers = array('From: Reward Tagz <hello@rewardtagz.com>','Content-Type: text/html; charset=UTF-8');
 
    	            wp_mail( $to, $subject, $body, $headers );

                	$finder->setCollection( $data['finderID'] );

				} else {

					$view = 'paypal_account';

				}


			} elseif( $this->input->post('action') == 'finder details' ){

				$view = 'request_address';
				$data['tag'] = $this->input->post('tag');
				$finderID = $finder->addFinder( 
					$this->input->post('first_name'), 
					$this->input->post('last_name'), 
					$this->input->post('email'), 
					$this->input->post('mobile'), 
					$this->input->post('tag') 
					);
				$tagzEvents->addEvent( 9, $this->input->post('tag'), $finderID );

				$data['proceed_option'] = $this->input->post( 'proceed_option' );
				$data['finderID'] = $finderID;


			} elseif ( $this->input->post('action') == 'finder activation' ){

				$view = 'finder_details';
				$data['tag'] = $this->input->post('tag');
				$tagz->updateDescription( $this->input->post('tag'), $this->input->post('description') );
				$tagzEvents->addEvent( 11, $this->input->post('tag'), 
					'Description: '.$this->input->post('description') . ' Location: ' . $this->input->post('location') 
					);

			} elseif( $this->input->post('action') == 'good karma' ){

				$view = 'return';
				$data['tag'] = $this->input->post('tag');
				$data['proceed_option'] = 'good karma';
				$tagzEvents->addEvent( 5, $this->input->post('tag'), 
					'Good Karma' 
					);

			} elseif( $this->input->post('action') == 'money' ){

				$view = 'money_options';
				$data['tag'] = $this->input->post('tag');
				$data['proceed_option'] = 'money';
				$data['reward'] = $tagz->getReward( $this->input->post('tag') );

			} elseif( substr( $this->input->post('action'), 0, 7 ) === "charity" ){

				$view = 'return';
				$data['tag'] = $this->input->post('tag');
				$data['proceed_option'] = 'charity';

				if($this->input->post('action') == 'charity Other'){
                    $tagzEvents->addEvent(5, $this->input->post('tag'),
                        'Charity', $this->input->post('other_charity')
                    );
                } else {
                    $tagzEvents->addEvent(5, $this->input->post('tag'),
                        'Charity', str_replace('charity ', '', $this->input->post('action'))
                    );
                }

			} elseif( $this->input->post('action') == 'get money' ){

				$view = 'return';
				$data['proceed_option'] = 'money';
				$data['tag'] = $this->input->post('tag');
				$tagzEvents->addEvent( 5, $this->input->post('tag'), 
					'Money' 
					);

			} elseif( $this->input->post('action') == 'more money' ){

				$view = 'return';
				$data['proceed_option'] = 'more money';
				$data['tag'] = $this->input->post('tag');
				$tagzEvents->addEvent( 5, $this->input->post('tag'), 
					'More Money' 
					);

				$user_info = get_userdata( $tagz->getTagUserId( $this->input->post('tag') ) );

				$to = $user_info->user_email;
                $subject = 'Reward Increase Requested';
                $header = 'Reward Increase Requested';
                $content = 'Good news! Your lost item has been found. However the finder has requested more money to return the item with Tag Number: '.$this->input->post('tag').'. Please visit the site and login to your account to adjust the reward: <a href="'. WP_HOME .'/my-account/">Account Login</a>' ;
                
                ob_start();
                include APPPATH.'views/email/default.php';
                $body = ob_get_clean();

	            $headers = array('From: Reward Tagz <hello@rewardtagz.com>','Content-Type: text/html; charset=UTF-8');
 
    	        wp_mail( $to, $subject, $body, $headers );

			} elseif( $this->input->post('action') == 'activate' && !is_user_logged_in() ){

				$view = 'login';
				$data['tag'] = $this->input->post('tag');

			} elseif( $this->input->post('action') == 'activate' && is_user_logged_in() ){

				$view = 'activate';
				$data['tag'] = $this->input->post('tag');

			} elseif( $this->input->post('action') == 'report' ){

				$view = 'report';
				$data['tag'] = $this->input->post('tag');

			} elseif( $this->input->post('tag') && !$this->input->post('email') && !is_user_logged_in() && !$this->input->post('action') ){

				if( $tagz->validateTag( $this->input->post('tag') ) ) {

					if( $user_info = get_userdata( $tagz->getTagUserId( $this->input->post('tag') ) ) ){
						$to = $user_info->user_email;
                		$subject = 'Asset Found';
                		$header = 'Asset Found';
               	 		$content = 'Your item has been found. Please wait for more instructions.';
                
                		ob_start();
                		include APPPATH.'views/email/default.php';
                		$body = ob_get_clean();

		                $headers = array('From: Reward Tagz <hello@rewardtagz.com>','Content-Type: text/html; charset=UTF-8');
 
    	            	wp_mail( $to, $subject, $body, $headers );
    	       		}

					if( $tagz->assignedTag( $this->input->post('tag') ) ){
						
						$view = 'reward_choice';
						
					} else {
						
						$view = 'tag_options';

					}
					
					$data['tag'] = $this->input->post('tag');
				
				} else {

					$this->messages->set_error( 'Tag <strong>' . $this->input->post('tag') . '</strong> is not valid' );

				}

				$tagzEvents->addEvent( 2, $this->input->post('tag'), null );
				
			}elseif( $this->input->post('reward') && is_user_logged_in() ){

				$tagz->activateTag( $this->input->post('tag'), get_current_user_id(), $this->input->post('description'), $this->input->post('reward') );
				$this->messages->set_message( 'Reward Tag Activated' );
				$tagzEvents->addEvent( 1, $this->input->post('tag'), get_current_user_id() );

			} elseif( $this->input->post('tag') && is_user_logged_in() && !$this->input->post('action') ){

				
				if( isset($_POST['g-recaptcha-response']) ){
				
					$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
					
					if (!$resp->isSuccess()) {
						$this->messages->set_error('Please confirm you are not a robot');
					}

				}

				unset($_POST['g-recaptcha-response']);

				if(  $this->messages->get_errors() == '' ){

					if( $tagz->validateTag( $this->input->post('tag') ) ) {
					
						if( $tagz->assignedTag( $this->input->post('tag')) ){
						
							$view = 'reward_choice';
							
						} else {

							$view = 'tag_options';

						}
					
						$data['tag'] = $this->input->post('tag');
				
					} else {

						$this->messages->set_error( 'Tag <strong>' . $this->input->post('tag') . '</strong> is not valid' );

					}

					$tagzEvents->addEvent( 2, $this->input->post('tag'), null );
				}
			
			} elseif( $this->input->post('email') ){

				$creds                  = array();
        		$creds['user_login']    = $this->input->post('email');
        		$creds['user_password'] = $this->input->post('password');
        		$creds['remember']      = true;
        		$user                   = wp_signon( $creds, false );
				
        		if ( is_wp_error( $user ) ) {
            		$this->messages->set_error( $user->get_error_message() );
            		$data['tag'] = $this->input->post('tag');
            		$view = 'login';
        		} else {
            		wp_set_auth_cookie( $user->ID, true );
            		$data['tag'] = $this->input->post('tag');
            		$view = 'activate';
        		}
			}

		}
		$data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
		$this->load->view('front/' . $view, $data);
	}

	public function received( $finder_id ){

		//$tagz = new tagzModel();
    	//$tagzEvents = new tagzEventsModel();
    	$finder = new finderModel();
		$finder->setItemRecieved( $finder_id );

		$data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
		$this->load->view('front/returned', $data);

	}

	public function notReceived( $finder_id ){

		$finder = new finderModel();
		$finder->setItemNotRecieved( $finder_id );

		$data['messages'] = $this->messages->get_messages();
        $data['errors'] = $this->messages->get_errors();
		$this->load->view('front/not_returned', $data);

	}

}
