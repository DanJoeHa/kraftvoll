<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/login
	 *	- or -
	 * 		http://example.com/index.php/login/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		
		//Beispieldaten
		$data['user'] = $this->user;
		$data['pagetitle'] = "Login";
		
		//Ausgabe
		$this->load->view('HTML/header', $data);
		$this->load->view('HTML/login', $data);
		$this->load->view('HTML/footer');
		
	}
	
	
	public function getMeIn( ){
		
		//POST-Daten laden
		$username = $this->input->post('benutzername');
		$pass = $this->input->post('password');
				
		if( $this->user->login($username, $pass) ){
			
			//Daten korrekt -> Weiterleitung auf Start	
			header('Location: ' . site_url('start/') );
			exit;
			
		}else{
			
			//Daten inkorrekt -> Login-Formular wieder anzeigen
			$this->index();	
		}
		
	}
}
