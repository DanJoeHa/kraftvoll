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
	
	/**
	 * Ausgabe des Formulars zum Eintragen einer neuen Wertung.
	 * 
	 */
	public function WertungEintragen($ajax = false){		
		//Default value
		$data['saved'] = false;
		$data['user'] = $this->user;
		$data['pagetitle'] = "Wertung Eintragen";
		
		//Header nur bei HTML
		if( !$ajax ) $this->load->view('HTML/header', $data);
		
		//Body immer ausgeben
		$this->load->view('HTML/new_value', $data);
		
		//Footer nur bei HTML ausgeben
		if( !$ajax ) $this->load->view('HTML/footer');
	}
	
	/**
	 * Speichert die Eingaben aus dem Formular zum Eintrag einer neuen Wertung.
	 * 
	 */
	public function WertungSpeichern($ajax = false){
		
		//Daten auslesen
		$teamnr = $this->input->post('team');
		$wertung = $this->input->post('wertung');
		//( isset( $_POST['spiel'] ) ? $spielid = $this->input->post('spiel') : $spielid = $this->user->
		
		//Daten speichern
		
		
		//Rückgabedaten
		$data['success'] = true;
		$data['msg'] = "<strong>Speichern erfolgreich!</strong><br> Team $teamnr wurde mit $wertung Sekunden eingetragen.";
		
		//Default value
		$data['saved'] = true;
		$data['user'] = $this->user;
		$data['pagetitle'] = "Wertung Eintragen";
		
		//Header nur bei HTML
		if( !$ajax ) $this->load->view('HTML/header', $data);
		
		//Body immer ausgeben
		$this->load->view('HTML/new_value', $data);
		
		//Footer nur bei HTML ausgeben
		if( !$ajax ) $this->load->view('HTML/footer');

	}
	
	public function BeschreibungAnzeigen( $ajax = false ){
			
		//Beispieldaten
		$data['description'] = "Hier folgt eine kurze Beschreibung des Spiels";
		
		//Default value
		$data['user'] = $this->user;
		$data['pagetitle'] = "Spielbeschreibung";
		
		//Header nur bei HTML
		if( !$ajax ) $this->load->view('HTML/header', $data);
		
		//Body immer ausgeben
		$this->load->view('HTML/description', $data);
		
		//Footer nur bei HTML ausgeben
		if( !$ajax ) $this->load->view('HTML/footer');
		
	}
	
	public function TabelleAnzeigen( $ajax = false ){
					
		//Beispieldaten
		$data['rows'][0]['teamnummer'] = 1;
		$data['rows'][0]['teamname'] = "DUMMY";
		$data['rows'][0]['wertung'] = "2,5";
		$data['rows'][1]['teamnummer'] = 5;
		$data['rows'][1]['teamname'] = "DUMMY2";
		$data['rows'][1]['wertung'] = "3,5";
		
		
		//Default value
		$data['user'] = $this->user;
		$data['pagetitle'] = "Tabelle";
		
		//Header nur bei HTML
		if( !$ajax ) $this->load->view('HTML/header', $data);
		
		//Body immer ausgeben
		$this->load->view('HTML/table', $data);
		
		//Footer nur bei HTML ausgeben
		if( !$ajax ) $this->load->view('HTML/footer');
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
		$data['msg'] = "<strong>Speichern erfolgreich!</strong> Das Spiel XX wurde angelegt.";
		
		//Beispieldaten
		$hdata['user'] = $this->user;
		$hdata['pagetitle'] = "Spiel anlegen";
		
		//Ausgabe, wenn kein AJAX-Call
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/new_game', $data);
		$this->load->view('HTML/footer');
		
	}
}
