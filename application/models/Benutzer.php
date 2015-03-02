<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benutzer extends CI_Model {
	
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
		if( $username == "test" && $password == "test"){
			
			//Object in Session speichern	
			$this->save2session();
			
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
		$this->session->sess_destroy();
		
		//Logout erfolreich
		return true;
	}
	
	public function __destruct(){
		$this->save2session();
	}
	
	private function save2session(){
		$this->session->user = serialize( $this );
	}
}
?>	