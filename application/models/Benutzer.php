<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ergebnis extends CI_Model {
	
	/**
	 * Username.
	 */
	private $username = "";
	/**
	 * Passwort.
	 */
	private $password = "";
	/**
	 * Rolle.
	 */
	private $role = "";
	
	/**
	 * Login.
	 */
	public function login( $username, $password ){
		
		//Dummy-Abfrage
		if( $username == "test" && $password == "test "){
			
			//Object in Session speichern	
			
			//Login erfolgreich	
			return true;
		}
		
		//Login fehlgeschlagen
		return false;
	}
	
	/**
	 * Logout.
	 */
	public function logout(){
		
		//Object aus Session löschen
		
		//Logout erfolreich
		return true;
	}
}
?>	