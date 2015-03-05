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
		$this->load->model('Rolle');
		$this->load->model('Monitor');
		$this->load->model('Station');
		$this->load->model('Leitung');
		$this->load->model('Admin');
		$this->load->model('Benutzer');
		
		//Prüfe, ob User eingeloggt
		if( $this->session->loggedin ){
			$this->user = unserialize($this->session->user);
		}else{
			//andernfalls Dummy-User erstellen
			$this->user = new Benutzer();
		}
		
		//Check Berechtigungen
		$this->_checkAuthorisierung();
		
	}
	
	protected function _checkAuthorisierung() {

		//hole URI-Segmente und speichere in Array
		$uri = explode("/", uri_string());
		
		//bestimme aufzurufende Seite (wenn keine angegeben ->login)
		$sPage = empty($uri[0]) ? "login" : $uri[0];
		
		//bestimme durchzufuehrende Funktion (wenn keine angegeben -> index)
		$funktion = count($uri) <= 1 ? "index" : $uri[1];		
		
		//prüfe, ob User das darf -> andernfalls 404
		if( !$this->user->getRole()->hasRightTo( $sPage, $funktion) ){
			show_404();
			exit;
		}

	}
}
