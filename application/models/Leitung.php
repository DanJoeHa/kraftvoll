<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leitung extends Station {
		
	/**
	 * Event anlegen
	 */
	public function EventAnlegen( $datum ){
		
		//Rückgabe Anlage
		return true;
	}
	
	/**
	 * Team anlegen
	 */
	public function TeamAnlegen( $teamname, $teammember = array() ){
		
		//Rückgabe Teamnummer
		return 1;
	}
	
	/**
	 * Team editieren
	 */
	public function TeamEditieren( $teamid, $teamname, $teammember = array() ){
		
		//Rückgabe Änderung
		return true;
	}
	
	/**
	 * Team löschen
	 */
	public function TeamLoeschen( $teamid ){
		
		//Rückgabe Löschung
		return true;
	}
	
	/**
	 * Spiel anlegen
	 */
	public function SpielAnlegen( $spielname, $spielwertung, $wertungsfolge, $beschreibung ){
		
		//Rückgabe Spielnummer
		return 1;
	}
	
	/**
	 * Spiel editieren
	 */
	public function SpielEditieren( $spielid, $spielname, $spielwertung, $wertungsfolge, $beschreibung ){
		
		//Rückgabe Änderung
		return true;
	}
	
	/**
	 * Spiel löschen
	 */
	public function SpielLoeschen( $spielid ){
		
		//Rückgabe Löschung
		return true;
	}
	
	/**
	 * Ergebnistabelle ausgeben.
	 */
	public function ErgebnistabelleAusgeben(){
		
		//Beispieldaten
		$return['rows'][0]['teamnummer'] = 27;
		$return['rows'][0]['teamname'] = "Dummy15";
		$return['rows'][0]['gesamtpunktzahl'] = 500;
		$return['rows'][1]['teamnummer'] = 5;
		$return['rows'][1]['teamname'] = "Dummy2";
		$return['rows'][1]['gesamtpunktzahl'] = 470;
		$return['rows'][2]['teamnummer'] = 1;
		$return['rows'][2]['teamname'] = "Dummy1";
		$return['rows'][2]['gesamtpunktzahl'] = 469;
		
		//Rückgabe Daten
		return $return;
		
	}
	
}
?>	