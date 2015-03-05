<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Station extends Monitor {
	
	public function __construct(){
		parent::__construct();
		
		$this->setName('Station');
	}
		
	/**
	 * Spielbeschreibung ausgeben
	 */
	public function SpielBeschreibungAnsehen( $spielid ){
		
		//Dummy Daten
		$return['description'] = "Hier ist die Spielbeschreibung...";
		
		//Rückgabe Spielbeschreibung
		return $return;
	}
	
	/**
	 * Tabelle des Spiels ausgeben.
	 */
	public function SpielTabelleAnsehen( $spielid ){
		
		//Dummy Daten	
		$return['rows'][0]['teamnummer'] = 1;
		$return['rows'][0]['teamname'] = "DUMMY";
		$return['rows'][0]['wertung'] = "2,5";
		$return['rows'][1]['teamnummer'] = 5;
		$return['rows'][1]['teamname'] = "DUMMY2";
		$return['rows'][1]['wertung'] = "3,5";
		
		//Rückgabe Daten
		return $return;
	}
	
	/**
	 * Wertung eines Teams eintragen
	 */
	public function SpielWertungEintragen( $sielid, $teamid, $wertung ){
		
		//Status zurückliefern
		return true;
	}

	/**
	 * Rechte festlegen.
	 */
	protected function setRights(){
		
		//auch Rechte von Monitor
		parent::setRights();
		
		//Wertungseintrag
		$this->rechte[ 'spiele' ][ 'WertungEintragen' ] = true;
		$this->rechte[ 'spiele' ][ 'WertungSpeichern' ] = true;
		$this->rechte[ 'spiele' ][ 'TabelleAnzeigen' ] = true;
		$this->rechte[ 'spiele' ][ 'BeschreibungAnzeigen' ] = true;
	}
	
}
?>	