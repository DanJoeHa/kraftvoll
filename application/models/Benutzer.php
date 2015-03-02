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
			
			//Daten in Objekt speichern
			$this->username = $username;
			$this->password = $password;
			
			//Object in Session speichern	
			$this->save2session();
			
			//Flag setzen
			$this->session->loggedin = True;
			
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
		
		//Session löschen
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
	
	public function getUsername(){
		return $this->username;
	}
	
	public function getRole(){
		return $this->role;
	}
}
?>	