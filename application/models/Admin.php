<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Leitung {
		
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
	
}
?>	