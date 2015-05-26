<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Event extends CI_Model {
		
		private $id = 0;
		private $datum = "";
		private $description = "";
		
		public $user = array();
		public $games = array();
		public $teams = array();
		public $results = array();
		
		/**
		 * Erstellt ein neues Objekt.
		 */
		public function __construct( $id = 0, $datum = "", $description = ""){
			$this->load->database();
			
			$this->id = $id;
			$this->datum = $datum;
			$this->description = $description;
		}
		
		/**
		 * Erstellt ein neues Event in der DB.
		 */
		public function create( $datum, $description = "" ){
			
			$data['date'] = $datum;
			$data['description'] = $description;
			
			//Event speichern
			if( $this->db->insert('event', $data) ){
				
				//Event-ID in Objekt speichern
				$this->id = $this->db->insert_id();	
				
				//Event-Datum in Objekt speichern
				$this->datum= $datum;	
				$this->description = $description;
				
				//Success	
				return true;
			} 
			
			//Fail
			return false;
			
		}
		
		/**
		 * Lade alle Events.
		 */
		public function loadAll(){
			
			//alle Eventeinträge aus DB holen
			$query = $this->db->select();
			$query = $this->db->from('event');
			$query = $this->db->get();
			
			//Prüfe, ob Events gefunden wurden
			if( $query->num_rows() > 0 ){
				
				//Ergebnisse speichern
				foreach( $query->result() as $row ){
					$this->results[] = new Event( $row->id, $row->date, $row->description );
				}
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		/**
		 * Event zur angegebener ID aus DB laden.
		 */
		public function load( $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
			//Daten aus DB abfragen
			$query = $this->db->select();				// SELECT *
			$query = $this->db->from('event');			// FROM event
			$query = $this->db->where('id', $eventid);	// WHERE id = $eventid
			$query = $this->db->get();					// do it
			
			//Prüfe, ob Event gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				$event = $query->row();
				$this->id = $event->id;
				$this->datum = $event->date;
				$this->description = $event->description;
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		public function getActive(){
			
			//ID des aktiven Events aus der DB holen
			$query = $this->db->select();
			$query = $this->db->from('event');
			$query = $this->db->where('active', 1);
			$query = $this->db->get();
			
			//Prüfe, ob Event gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				$event = $query->row();
				$this->id = $event->id;
				$this->datum = $event->date;
				$this->description = $event->description;
				
				//Success
				return true;
				
			}
			
			//Fail
			return false;
			
		}
		
		/**
		 * Aktualisiert das Datum des Events.
		 */
		public function edit( $datum = "", $description = "", $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
			//Wert zum ändern in Array packen
			if( !empty($datum) ) $data['date'] = $datum;
			if( !empty($description) ) $data['description'] = $description;
			
			$this->db->where('id', $eventid);
			if( $this->db->update('event', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Löscht das Event mit der angegebenen ID aus der DB.
		 */
		public function delete( $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
			$this->db->where('id', $eventid);
			if( $this->db->delete('event') ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Füge dem angegebenen Event einen User hinzu.
		 */
		public function addUser( $userid, $gameid, $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
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
		public function loadUser( $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
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
					$this->user[ $eventid ][$row->user]['userid'] = $row->user;
					$this->user[ $eventid ][$row->user]['gameid'] = $row->game;
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
		public function deleteUser( $userid, $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
			$this->db->where('user', $userid);
			$this->db->where('event', $eventid);
			if( $this->db->delete('eventusers') ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Fügt dem angegebnen Event das Spiel hinzu.
		 */
		public function addGame( $gameid, $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
			//Daten
			$data['game'] = $gameid;;
			$data['event'] = $eventid;
			
			//User-Zuordnung speichern
			if( $this->db->insert('eventgames', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		public function loadGames( $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
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
		public function deleteGame( $gameid, $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
			$this->db->where('game', $gameid);
			$this->db->where('event', $eventid);
			if( $this->db->delete('eventgames') ) return true;
			
			//Fail
			return false;
		}
		
		/**
		 * Fügt dem angegebnen Event das Team hinzu.
		 */
		public function addTeam( $teamid, $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
			//Daten
			$data['team'] = $teamid;;
			$data['event'] = $eventid;
			
			//User-Zuordnung speichern
			if( $this->db->insert('eventteams', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		public function loadTeams( $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
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
		public function deleteTeam( $teamid, $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
			$this->db->where('team', $teamid);
			$this->db->where('event', $eventid);
			if( $this->db->delete('eventteams') ) return true;
			
			//Fail
			return false;
		}
		
		/**
		 * Holt die Ergebnisse eines Events aus der DB.
		 */
		public function getResults( $eventid = -1 ){
			
			//Prüfe, ob ID übergeben wurde
			if( $eventid == -1 ) $eventid = $this->id;
			
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
		
		/**
		 * Gibt die ID des aktiven Events zurück.
		 */
		public function getId(){
			return $this->id;
		}
		
		/**
		 * Gibt die Beschreibung des aktiven Events zurück.
		 */
		public function getDescription(){
			return $this->description;
		}
		
		/**
		 * Gibt das Datum des aktiven Events zurück.
		 */
		public function getDate(){
			return $this->datum;
		}
	}
	
?>