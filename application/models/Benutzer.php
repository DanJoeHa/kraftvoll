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
	
	public function __construct(){
		parent::__construct();
		
		$this->role = new Rolle();
	}
	
	/**
	 * Login.
	 */
	public function login( $username, $password ){
		
		//Dummy-Abfrage
		if( ($username == "station" && $password == "station") ||
			($username == "monitor" && $password == "monitor") ||
			($username == "leitung" && $password == "leitung") ||
			($username == "admin" && $password == "admin") ){
			
			//Daten in Objekt speichern
			$this->username = $username;
			$this->password = $password;
			
			//Rolle setzen
			if( $username == "station" ) $this->setStation();
			if( $username == "monitor" ) $this->setMonitor();
			if( $username == "leitung" ) $this->setLeitung();
			if( $username == "admin" ) $this->setAdmin();
			
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
	
	public function isAdmin(){
		if( is_a($this->getRole(), 'Admin') ) return true;
		return false;
	}
	
	public function setAdmin(){
		$this->role = new Admin();
	}
	
	public function isMonitor(){
		if( is_a($this->getRole(), 'Monitor') ) return true;
		return false;
	}
	
	public function setMonitor(){
		$this->role = new Monitor();
	}
	
	public function isLeitung(){
		if( is_a($this->getRole(), 'Leitung') ) return true;
		return false;
	}
	
	public function setLeitung(){
		$this->role = new Leitung();
	}
	
	public function isStation(){
		if( is_a($this->getRole(), 'Station') ) return true;
		return false;
	}
	
	public function setStation(){
		$this->role = new Station();
	}
}
?>	