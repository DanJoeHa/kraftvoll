<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Event extends CI_Model {
		
		private $id = 0;
		private $datum = "";
		private $user = array();
		private $games = array();
		private $teams = array();
		
		public $results = array();
		
		public function __construct(){
			$this->load->database();
		}
		
		/**
		 * Erstellt ein neues Event in der DB.
		 */
		public function create( $datum ){
			
			$data['date'] = $datum;
			
			//Event speichern
			if( $this->db->insert('event', $data) ) return $this->db->insert_id();
			
			//Fail
			return false;
			
		}
		
		/**
		 * Event zur angegebener ID aus DB laden.
		 */
		public function load( $eventid ){
			
			//Daten aus DB abfragen
			$query = $this->db->select();				// SELECT *
			$query = $this->db->from('event');			// FROM event
			$query = $this->db->where('id', $eventid);	// WHERE id = $eventid
			$query = $this->db->get();					// do it
			
			//echo $this->db->last_query();
			
			//Prüfe, ob Event gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				$event = $query->row();
				$this->id = $event->id;
				$this->datum = $event->date;
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		/**
		 * Aktualisiert das Datum des Events.
		 */
		public function edit( $eventid, $datum ){
			
			//Wert zum ändern in Array packen
			$data['date'] = $datum;
			
			$this->db->where('id', $eventid);
			if( $this->db->update('event', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Löscht das Event mit der angegebenen ID aus der DB.
		 */
		public function delete( $eventid ){
			
			$this->db->where('id', $eventid);
			if( $this->db->delete('event') ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Füge dem angegebenen Event einen User hinzu.
		 */
		public function addUser( $userid, $gameid, $eventid ){
			
			//Daten
			$data['user'] = $userid;
			$data['game'] = $gameid;;
			$data['event'] = $eventid;
			
			//User-Zuordnung speichern
			if( $this->db->insert('eventusers', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Lade alle dem Event zugeordneten User.
		 */
		public function loadUser( $eventid ){
			
			//alle bisherigen User des zugehörigen Event entfernen
			$this->user[ $eventid ] = array();
			
			//Daten aus DB abfragen
			$query = $this->db->select();					// SELECT *
			$query = $this->db->from('eventusers');			// FROM event
			$query = $this->db->where('event', $eventid);	// WHERE eventid = $eventid
			$query = $this->db->get();						// do it
			
			//echo $this->db->last_query();
			
			//Prüfe, ob User gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				foreach( $query->result() as $row ){
					$this->user[ $eventid ][] = $row->user;
				}
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		/**
		 * Lösche die Zuordnung des angegebenen Users zum angegebenen Event.
		 */
		public function deleteUser( $userid, $eventid ){
			
			$this->db->where('user', $userid);
			$this->db->where('event', $eventid);
			if( $this->db->delete('eventusers') ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Fügt dem angegebnen Event das Spiel hinzu.
		 */
		public function addGame( $gameid, $eventid ){
			
			//Daten
			$data['game'] = $gameid;;
			$data['event'] = $eventid;
			
			//User-Zuordnung speichern
			if( $this->db->insert('eventgames', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		public function loadGames( $eventid ){
			
			//alle bisherigen Spiele des zugehörigen Event entfernen
			$this->games[ $eventid ] = array();
			
			//Daten aus DB abfragen
			$query = $this->db->select();					// SELECT *
			$query = $this->db->from('eventgames');			// FROM event
			$query = $this->db->where('event', $eventid);	// WHERE eventid = $eventid
			$query = $this->db->get();						// do it
			
			//echo $this->db->last_query();
			
			//Prüfe, ob Spiel gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				foreach( $query->result() as $row ){
					$this->games[ $eventid ][] = $row->game;
				}
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		/**
		 * Löscht das angegebene Spiel aus dem Event.
		 */
		public function deleteGame( $gameid, $eventid ){
			
			$this->db->where('game', $gameid);
			$this->db->where('event', $eventid);
			if( $this->db->delete('eventgames') ) return true;
			
			//Fail
			return false;
		}
		
		/**
		 * Fügt dem angegebnen Event das Team hinzu.
		 */
		public function addTeam( $teamid, $eventid ){
			
			//Daten
			$data['team'] = $teamid;;
			$data['event'] = $eventid;
			
			//User-Zuordnung speichern
			if( $this->db->insert('eventteams', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		public function loadTeams( $eventid ){
			
			//alle bisherigen Teams des zugehörigen Event entfernen
			$this->teams[ $eventid ] = array();
			
			//Daten aus DB abfragen
			$query = $this->db->select();					// SELECT *
			$query = $this->db->from('eventteams');			// FROM eventteams
			$query = $this->db->where('event', $eventid);	// WHERE event = $eventid
			$query = $this->db->get();						// do it
			
			//echo $this->db->last_query();
			
			//Prüfe, ob Spiel gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				foreach( $query->result() as $row ){
					$this->teams[ $eventid ][] = $row->team;
				}
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		/**
		 * Löscht das angegebene Team aus dem Event.
		 */
		public function deleteTeam( $teamid, $eventid ){
			
			$this->db->where('team', $teamid);
			$this->db->where('event', $eventid);
			if( $this->db->delete('eventteams') ) return true;
			
			//Fail
			return false;
		}
		
		/**
		 * Holt die Ergebnisse eines Events aus der DB.
		 */
		public function getResults( $eventid ){
			
			//Daten aus DB abfragen
			$query = $this->db->select('team, game, value');// SELECT team, game, value
			$query = $this->db->from('results');			// FROM results
			$query = $this->db->where('event', $eventid);	// WHERE event = $eventid 
			$query = $this->db->get();						// do it
			
			//Prüfe, ob Rolle gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				foreach( $query->result() as $result ){
					$this->results[ $eventid ][ $result->team ][ $result->game ] = $result->value;
				}
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
	}
	
?>