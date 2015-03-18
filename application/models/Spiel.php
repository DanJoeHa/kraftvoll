<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spiel extends CI_Model {
	
	private $nummer = 0;
	private $beschreibung = "";
	private $name = "";
	
		
	/**
	 * Spiel anlegen
	 */
	public function erstellen($event, $name, $beschreibung ){
		
		//Datentypen prüfen
		if( !empty($name) && is_string( $name ) ){
			
			$query = "INSERT INTO...";
			
			// Beschreibung prüfen
			if( is_string( $beschreibung ) ){
				
			}
			
			//In Objekt speichern
			$this->name = $name;
			$this->beschreibung = $beschreibung;
			
			//In DB speichern
			
			
			
			return true;
		}
		
		return false;
		
	}
	
	/**
	 * Spielbeschreibung ausgeben
	 */
	public function BeschreibungLesen( ){
		
		return $this->beschreibung;
	}
	
}
?>	