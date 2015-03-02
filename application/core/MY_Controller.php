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
}
