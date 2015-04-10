<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Model {
	
	private $id = 0;
	private $beschreibung = "";
	private $datum = "01.01.1970";
	
		
	/**
	 * Event anlegen
	 */
	public function erstellen( $datum, $beschreibung ){
		
		//Datum muss gesetzt sein
		if( !empty($datum) ){
			
			$query = "INSERT INTO event SET datum = '$datum'";
			
			// Beschreibung prüfen
			if( !empty( $beschreibung ) ){
				$query .= ", beschreibung = '$beschreibung'";
			}
			
			//In DB speichern
			
			
			//In Objekt speichern
			$this->id = ""; //aus DB holen
			$this->datum = $datum;
			$this->beschreibung = $beschreibung;
			
			return true;
		}
		
		return false;
		
	}
	
	/**
	 * Eventbeschreibung ausgeben
	 */
	public function BeschreibungLesen( ){
		
		return $this->beschreibung;
	}
	
	/**
	 *  Events laden.
	 * 
	 *  Gibt alle Events in Form eines Arrays zurück (id => Datum)
	 */
	public function EventsLaden(){
		
		//Query
		$query = "SELECT id, datum FROM event ORDER BY id ASC";
		
		//Events in Array zusammenführen
		$events[] = $row;
		
		//Rückgabe Array
		return events;
		
	}
	
	/**
	 * Event laden.
	 * 
	 * Läd das Event zur übergebenen ID.
	 */
	public function EventLaden( $id ){
		
		//Query
		$query = "SELECT * FROM event WHERE id = $id";
		
		//in Objekt speichern
		$this->id = $row['id'];
		$this->beschreibung = $row['beschreibung'];
		
	}
	
}
?>	