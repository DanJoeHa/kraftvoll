<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index( $ajax = false ){
		
		$data['user'] = $this->user;
		$data['pagetitle'] = "Herzlich Willkommen bei Kraftvoll 2015";
		
		//Header nur bei HTML
		if( !$ajax ) $this->load->view('HTML/header', $data);
		
		//Body immer ausgeben
		$this->load->view('HTML/start', $data);
		
		//Footer nur bei HTML ausgeben
		if( !$ajax ) $this->load->view('HTML/footer');
	}
}
