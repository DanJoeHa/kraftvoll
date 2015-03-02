<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	/**
	 * User Objekt
	 */
	protected $user;
	
	/**
	 * Parent Controller für alle anderen Controller.
	 * 
	 * Der Parent Controller erstellt das User-Objekt.
	 * 
	 */
	public function __construct(){
		
		//Parent ausführen
		parent::__construct();
		
		//Klassen laden
		$this->load->model('Benutzer');
		$this->load->model('Rolle');
		
		//User initialisieren
		$this->user = new Benutzer();
		
		//Prüfe, ob User eingeloggt
		if( $this->session->loggedin ){
			$this->user = unserialize($this->session->user);
		}
		
	}
	
	protected function _checkAuthorisierung() {

		//hole URI-Segmente und speichere in Array
		$uri = explode("/", uri_string());

		//bestimme aufzurufende Seite (wenn keine angegeben -> login)
		$sPage = count($uri) == 1 ? "login" : $uri[1];

		//bestimme durchzufuehrende Funktion (wenn keine angegeben -> index)
		$funktion = count($uri) <= 2 ? "index" : $uri[2];

		//hole Rechte-Array aus Config zur aufgerufenen Seite
		$rechte = $this->config->item('kf_' . $sPage);

		//gib Recht zurück
		return $rechte[$funktion][$this->user->getRole()->getRoleName()];

	}
}
