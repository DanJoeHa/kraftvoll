<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Result extends CI_Model {
		
		private $game = 0;
		private $event = 0;
		private $team = 0;
		private $value = 0;
		
		public function __construct(){
			$this->load->database();
		}
		
		/**
		 * Erstellt ein neues Result in der DB.
		 */
		public function create( $eventid, $gameid, $teamid, $value ){
			
			$data['event'] = $eventid;
			$data['game'] = $gameid;
			$data['team'] = $teamid;
			$data['value'] = $value;
			
			//User speichern
			if( $this->db->insert('results', $data) ) return $this->db->insert_id();
			
			//Fail
			return false;
			
		}
		
		/**
		 * Result zu angegebene ID aus DB laden.
		 */
		public function load( $eventid, $gameid, $teamid ){
				
			//Daten aus DB abfragen
			$query = $this->db->select('value');			// SELECT value
			$query = $this->db->from('results');			// FROM results
			$query = $this->db->where('event', $eventid);	// WHERE event = $eventid 
			$query = $this->db->where('team', $teamid); 	// AND team = $teamid 
			$query = $this->db->where('game', $gameid); 	// AND game = $gameid 
			$query = $this->db->get();						// do it
			
			//Prüfe, ob Rolle gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				$result = $query->row();
				$this->game = $gameid;
				$this->event = $eventid;
				$this->team = $teamid;
				$this->value = $result->value;
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		/**
		 * Aktualisiert die Resultdaten zu den IDs.
		 */
		public function edit( $eventid, $gameid, $teamid, $value ){
			
			//nur value aktualisieren
			$data['value'] = $value;
			
			$query = $this->db->where('event', $eventid);	// WHERE event = $eventid 
			$query = $this->db->where('team', $teamid); 	// AND team = $teamid 
			$query = $this->db->where('game', $gameid); 	// AND game = $gameid 
			if( $this->db->update('results', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Löscht das Result mit der angegebenen IDs aus der DB.
		 */
		public function delete( $eventid, $gameid, $teamid ){
			
			$query = $this->db->where('event', $eventid);	// WHERE event = $eventid 
			$query = $this->db->where('team', $teamid); 	// AND team = $teamid 
			$query = $this->db->where('game', $gameid); 	// AND game = $gameid 
			if( $this->db->delete('results') ) return true;
			
			//Fail
			return false;
			
		}
		
	}
?>
		