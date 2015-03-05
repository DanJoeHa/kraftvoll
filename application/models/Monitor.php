<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends Rolle {
	
	public function __construct(){
		parent::__construct();
		
		$this->setName('Monitor');
	}
			
	/**
	 * Beste Wertungen je Station ausgeben.
	 */
	public function BesteWertungenJeStationAusgeben( ){
		
		//Dummy Daten
		$return['rows'][0]['spielnummer'] = 1;
		$return['rows'][0]['spielname'] = "Hau den Lukas";
		$return['rows'][0]['teamnummer'] = 1;
		$return['rows'][0]['teamname'] = "DUMMY";
		$return['rows'][0]['wertung'] = "2,5";
		$return['rows'][1]['spielnummer'] = 2;
		$return['rows'][1]['spielname'] = "Kletterturm";
		$return['rows'][1]['teamnummer'] = 1;
		$return['rows'][1]['teamname'] = "DUMMY1";
		$return['rows'][1]['wertung'] = "30,5 Sekunden";
		$return['rows'][2]['spielnummer'] = 3;
		$return['rows'][2]['spielname'] = "Trecker ziehen";
		$return['rows'][2]['teamnummer'] = 5;
		$return['rows'][2]['teamname'] = "DUMMY2";
		$return['rows'][2]['wertung'] = "23,5 Sekunden";
		$return['rows'][3]['spielnummer'] = 4;
		$return['rows'][3]['spielname'] = "Bierkrug schubsen";
		$return['rows'][3]['teamnummer'] = 1;
		$return['rows'][3]['teamname'] = "DUMMY1";
		$return['rows'][3]['wertung'] = "5 St&uuml;ck";
		
		//Login fehlgeschlagen
		return $return;
	}

	/**
	 * Rechte festlegen.
	 */
	protected function setRights(){
		
		//auch Rechte von Rolle
		parent::setRights();
		
		//Allgemein
		$this->rechte[ 'login' ][ 'index' ] = false;
		$this->rechte[ 'login' ][ 'getMeIn' ] = false;
		$this->rechte[ 'start' ][ 'index' ] = true;
		$this->rechte[ 'logout' ][ 'index' ] = true;
		
		//Ergebnisausgabe
		$this->rechte[ 'monitoring' ][ 'index' ] = true;

	}
	
}
?>	