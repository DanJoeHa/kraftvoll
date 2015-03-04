<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Leitung {
	
	public function __construct(){
		parent::__construct();
		
		$this->setRoleName('Admin');
		$this->setRights();
		
	}
		
	/**
	 * Benutzer anlegen
	 */
	public function BenutzerAnlegen( $username, $rolle ){
		
		//Rückgabe Passwort
		return "pass";
	}
	
	/**
	 * Benutzer editieren
	 */
	public function BenutzerEditieren( $username, $password ){
		
		//Rückgabe Änderung
		return true;
	}
	
	/**
	 * Benutzer löschen
	 */
	public function BenutzerLoeschen( $username ){
		
		//Rückgabe Löschung
		return true;
	}
	
	/**
	 * Rechte festlegen.
	 */
	private function setRights(){
			
		//Teamadministration
		$this->rechte[ 'teams' ][ 'index' ] = true;
		$this->rechte[ 'teams' ][ 'create' ] = true;
		$this->rechte[ 'teams' ][ 'edit' ] = true;
		$this->rechte[ 'teams' ][ 'delete' ] = true;
	}
}
?>	