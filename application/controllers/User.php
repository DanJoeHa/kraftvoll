<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/user
	 *	- or -
	 * 		http://example.com/user/index
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
		$data['rows'][0]['username'] = "admin";
		$data['rows'][0]['rolle'] = "Admin";
		$data['rows'][1]['username'] = "station1";
		$data['rows'][1]['rolle'] = "Station";
		$data['rows'][2]['username'] = "monitoreingang";
		$data['rows'][2]['rolle'] = "Monitor";
		$data['rows'][3]['username'] = "teamregistrierung";
		$data['rows'][3]['rolle'] = "Leitung";
		
		//Beispieldaten
		$hdata['username'] = "Admin";
		$hdata['pagetitle'] = "User";
		
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
		$hdata['pagetitle'] = "Neuen User anlegen";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_user', $data);
		$this->load->view('HTML/footer');
		
	}

	public function Speichern(){	
		
		//Beispieldaten
		$data['saved'] = true;
		$data['success'] = true; 
		$data['msg'] = "<strong>Speichern erfolgreich!</strong> User XX wurde mit Passwort YY angelegt.";
		
		//Beispieldaten
		$hdata['username'] = "Admin";
		$hdata['pagetitle'] = "Neuen User anlegen";
		
		//Ausgabe, wenn kein AJAX-Call
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_user', $data);
		$this->load->view('HTML/footer');
		
	}
}
