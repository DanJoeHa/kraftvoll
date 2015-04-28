<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Team extends CI_Model {
		
		private $id = 0;
		private $name = "";
		private $leader = "";
		private $member = "";
		
		public $results = array();
		
		public function __construct(){
			$this->load->database();
		}
		
		/**
		 * Erstellt ein neues Team in der DB.
		 */
		public function create( $name, $leader, $member = "" ){
			
			$data['name'] = $name;
			$data['leader'] = $leader;
			$data['member'] = $member;
			
			//User speichern
			if( $this->db->insert('team', $data) ) return $this->db->insert_id();
			
			//Fail
			return false;
			
		}
		
		/**
		 * Team zu angegebener ID aus DB laden.
		 */
		public function load( $teamid ){
			
			//Daten aus DB abfragen
			$query = $this->db->select();				// SELECT *
			$query = $this->db->from('team');			// FROM team
			$query = $this->db->where('id', $teamid);	// WHERE id = $teamid
			$query = $this->db->get();					// do it
			
			//echo $this->db->last_query();
			
			//Prüfe, ob Spiel gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				$team = $query->row();
				$this->id = $team->id;
				$this->name = $team->name;
				$this->leader = $team->leader;
				$this->member = $team->member;
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		/**
		 * Aktualisiert die Teamdaten zur ID.
		 */
		public function edit( $teamid, $name = "", $leader = "", $member = "" ){
			
			//Nur die Werte aufnehmen, die übergeben und geändert werden sollen
			if( !empty( $name ) ) $data['name'] = $name;
			if( !empty( $leader ) ) $data['leader'] = $leader;
			if( !empty( $member ) ) $data['member'] = $member;
			
			$this->db->where('id', $teamid);
			if( $this->db->update('team', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Löscht das Team mit der angegebenen ID aus der DB.
		 */
		public function delete( $teamid ){
			
			$this->db->where('id', $teamid);
			if( $this->db->delete('team') ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Holt die Ergebnisse eines Teams aus der DB.
		 */
		public function getResults( $eventid, $teamid ){
			
			//Daten aus DB abfragen
			$query = $this->db->select('game, value');		// SELECT game, value
			$query = $this->db->from('results');			// FROM results
			$query = $this->db->where('event', $eventid);	// WHERE event = $eventid 
			$query = $this->db->where('team', $teamid); 	// AND team = $teamid
			$query = $this->db->order_by('game', 'ASC'); 	// ORDER BY team ASC
			$query = $this->db->get();						// do it
			
			//Prüfe, ob Rolle gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				foreach( $query->result() as $result ){
					$this->results[ $eventid ][ $teamid ][ $result->game ] = $result->value;
				}
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
	}
	
?>