<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spiele extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/spiele
	 *	- or -
	 * 		http://example.com/spiele/index
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
		$data['rows'][0]['teamnummer'] = 1;
		$data['rows'][0]['teamname'] = "DUMMY";
		$data['rows'][1]['teamnummer'] = 1;
		$data['rows'][1]['teamname'] = "DUMMY1";
		$data['rows'][2]['teamnummer'] = 5;
		$data['rows'][2]['teamname'] = "DUMMY2";
		$data['rows'][3]['teamnummer'] = 1;
		$data['rows'][3]['teamname'] = "DUMMY1";
		
		//Beispieldaten
		$hdata['user'] = $this->user;
		$hdata['pagetitle'] = "Spiele";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/table', $data);
		$this->load->view('HTML/footer');
	}	
	
	public function WertungEintragen(){		
		//Default value
		$data['saved'] = false;
		
		//Beispieldaten
		$hdata['user'] = $this->user;
		$hdata['pagetitle'] = "Wertung Eintragen";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_value', $data);
		$this->load->view('HTML/footer');
	}
	
	public function WertungSpeichern(){
		
		//Beispieldaten
		$data['saved'] = true;
		$data['success'] = true; 
		$data['msg'] = "<strong>Speichern erfolgreich!</strong> Team XX wurde mit YY Sekunden eingetragen.";
		
		//Beispieldaten
		$hdata['user'] = $this->user;
		$hdata['pagetitle'] = "Wertung Eintragen";
		
		//Ausgabe, wenn kein AJAX-Call
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_value', $data);
		$this->load->view('HTML/footer');
		
	}
	
	public function BeschreibungAnzeigen(){
			
		//Beispieldaten
		$data['description'] = "Hier folgt eine kurze Beschreibung des Spiels";
		
		//Beispieldaten
		$hdata['user'] = $this->user;
		$hdata['pagetitle'] = "Spielbeschreibung";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/description', $data);
		$this->load->view('HTML/footer');
		
	}
	
	public function TabelleAnzeigen(){
					
		//Beispieldaten
		$data['rows'][0]['teamnummer'] = 1;
		$data['rows'][0]['teamname'] = "DUMMY";
		$data['rows'][0]['wertung'] = "2,5";
		$data['rows'][1]['teamnummer'] = 5;
		$data['rows'][1]['teamname'] = "DUMMY2";
		$data['rows'][1]['wertung'] = "3,5";
		
		
		//Beispieldaten
		$hdata['user'] = $this->user;
		$hdata['pagetitle'] = "Tabelle";
		
		//Ausgabe, wenn kein AJAX-Call
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/table', $data);
		$this->load->view('HTML/footer');
	}
	
	public function create(){
		
		//Default value
		$data['saved'] = false;
		
		//Beispieldaten
		$hdata['user'] = $this->user;
		$hdata['pagetitle'] = "Spiel anlegen";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_game', $data);
		$this->load->view('HTML/footer');
	}
	
	public function Speichern(){
		
		//Beispieldaten
		$data['saved'] = true;
		$data['success'] = true; 
		$data['msg'] = "<strong>Speichern erfolgreich!</strong> Das Spiel XX wurde mit YY Sekunden eingetragen.";
		
		//Beispieldaten
		$hdata['user'] = $this->user;
		$hdata['pagetitle'] = "Spiel anlegen";
		
		//Ausgabe, wenn kein AJAX-Call
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_game', $data);
		$this->load->view('HTML/footer');
		
	}
}
