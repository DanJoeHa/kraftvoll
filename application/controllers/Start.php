<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

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
	public function index()
	{			
		//Beispieldaten
		$hdata['username'] = "Admin";
		$hdata['pagetitle'] = "Herzlich Willkommen bei Kraftvoll 2015";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/start');
		$this->load->view('HTML/footer');
	}
}
