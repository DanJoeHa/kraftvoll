<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends CI_Controller {

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
		$data['rows'][0]['teamnummer'] = 1;
		$data['rows'][0]['teamname'] = "DUMMY";
		$data['rows'][1]['teamnummer'] = 1;
		$data['rows'][1]['teamname'] = "DUMMY1";
		$data['rows'][2]['teamnummer'] = 5;
		$data['rows'][2]['teamname'] = "DUMMY2";
		$data['rows'][3]['teamnummer'] = 1;
		$data['rows'][3]['teamname'] = "DUMMY1";
		
		//Beispieldaten
		$hdata['username'] = "Admin";
		$hdata['pagetitle'] = "Teams";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/table', $data);
		$this->load->view('HTML/footer');
	}
	
	public function Anlegen(){
			
		//Default Value
		$data['saved'] = false;
		
		//Beispieldaten
		$hdata['username'] = "Admin";
		$hdata['pagetitle'] = "Neues Team anlegen";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_team', $data);
		$this->load->view('HTML/footer');
		
	}

	public function Speichern(){	
		
		//Beispieldaten
		$data['saved'] = true;
		$data['success'] = true; 
		$data['msg'] = "<strong>Speichern erfolgreich!<strong> Team XX wurde mit Nr. YY angelegt.";
		
		//Beispieldaten
		$hdata['username'] = "Admin";
		$hdata['pagetitle'] = "Neues Team anlegen";
		
		//Ausgabe, wenn keine AJAX-Call
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_team', $data);
		$this->load->view('HTML/footer');
		
	}

}
