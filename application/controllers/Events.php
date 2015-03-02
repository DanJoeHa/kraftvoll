<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/events
	 *	- or -
	 * 		http://example.com/events/index
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
		$data['rows'][0]['nr'] = 1;
		$data['rows'][0]['datum'] = "18.07.2015";
		
		//Beispieldaten
		$hdata['username'] = "Admin";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/table', $data);
		$this->load->view('HTML/footer');
	}
	
	public function ergebnis($eventid = 0){
		
		//wenn id = 0 immer aktuelles event
		
		//Beispieldaten
		$data['rows'][0]['teamnummer'] = 27;
		$data['rows'][0]['teamname'] = "Dummy15";
		$data['rows'][0]['gesamtpunktzahl'] = 500;
		$data['rows'][1]['teamnummer'] = 5;
		$data['rows'][1]['teamname'] = "Dummy2";
		$data['rows'][1]['gesamtpunktzahl'] = 470;
		$data['rows'][2]['teamnummer'] = 1;
		$data['rows'][2]['teamname'] = "Dummy1";
		$data['rows'][2]['gesamtpunktzahl'] = 469;
		
		
		//Beispieldaten
		$hdata['username'] = "Admin";
		$hdata['pagetitle'] = "Eventergebnis";
		
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
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_event', $data);
		$this->load->view('HTML/footer');
		
	}

	public function Speichern(){	
		
		//Beispieldaten
		$data['saved'] = true;
		$data['success'] = true; 
		$data['msg'] = "<strong>Speichern erfolgreich!</strong> Event XX wurde mit Nr. YY angelegt.";
		
		//Beispieldaten
		$hdata['username'] = "Admin";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_event', $data);
		$this->load->view('HTML/footer');
		
	}
}
