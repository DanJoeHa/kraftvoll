<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/logout
	 *	- or -
	 * 		http://example.com/logout/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index( $ajax = false ){
				
		if( $this->user->logout() ){
			
			if( !$ajax ){
				//Rückleitung auf login	
				header('Location: ' . site_url('login/') );
				exit;
			}
			
			//Body immer ausgeben
			$data['pagetitle'] = "Login";
			
			//Ausgabe
			$this->load->view('HTML/login', $data);
			
		}else{
			
			//hm... irgendwas machen
		}
	}
}
