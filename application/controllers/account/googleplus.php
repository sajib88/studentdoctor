<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BusinessDirectory googleauth Controller
 *
 * This class handles user account related functionality
 *
 * @package		Account
 * @subpackage	google_plus
 * @author		sc mondal
 * @link		http://webhelios.com
 */


class Googleplus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->library('session');
		$this->load->library('Googleplus');
		if($this->session->userdata('user_name'))
		{
			echo 'name: '.$this->session->userdata('user_name');
		}
		
		else
		{
			$authUrl = $this->googleplus->client->createAuthUrl();
			redirect($authUrl);
		}

	}

	public function auth_callback()
	{
		$this->load->library('session');
		$this->load->library('Googleplus');
		
		try
		{
			if (isset($_GET['code']))
			{
				$this->googleplus->client->authenticate($_GET['code']);
				$this->googleplus->client->getAccessToken();
				$user_data = $this->googleplus->plus->people->get('me');

				/******** For debuggin purpose*********/
				// echo 'email: '.$user_data['emails']['0']['value'].'<br>';
				// echo 'first_name: '.$user_data['name']['givenName'].'<br>';
				// echo 'last_name: '.$user_data['name']['familyName'].'<br>';
				// echo 'gender: '.$user_data['gender'].'<br>';
				// echo 'user_name: '.strstr($user_data['emails']['0']['value'], '@', true).'<br>';
				/*************************************/
				
				$user['first_name'] = $user_data['name']['givenName'];
				$user['last_name'] 	= $user_data['name']['familyName'];
				$user['gender'] 	= $user_data['gender'];
				$user['username'] 	= strstr($user_data['emails']['0']['value'], '@', true);
				$user['email'] 		= $user_data['emails']['0']['value'];

				

				$row = register_user_if_not_exists($user,'google');

				if($row != null)
				{
					$this->session->set_userdata('user_id',$row['id']);
					$this->session->set_userdata('login_id',$row['id']);
					$this->session->set_userdata('user_name',$row['user_name']);
					$this->session->set_userdata('user_type','3');
					//$redirect_link = base_url() . 'profile/dashboard';

					redirect(base_url('profile/dashboard'));
					
				}
			}
		}
		catch(Exception $e)
		{
			$msg = '<div class="alert alert-danger">
			        	<button data-dismiss="alert" class="close" type="button">×</button>
			        	<strong>Permission denied</strong>
			    	</div>';
			$this->session->set_flashdata('msg', $msg);					
			redirect(base_url('home/login'));
		}
	}

}

?>