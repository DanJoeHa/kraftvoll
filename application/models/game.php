<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Game extends CI_Model {
		
		private $id = 0;
		private $name = "";
		private $description = "";
		private $measurement = "";
		private $order = "ASC";
		
		public $results = array();
		
		public function __construct(){
			$this->load->database();
		}
		
		/**
		 * Erstellt ein neues Spiel in der DB.
		 */
		public function create( $name, $measurement, $order = "ASC", $description = "" ){
			
			$data['name'] = $name;
			$data['measurement'] = $measurement;
			$data['order'] = $order;
			if( !empty( $description ) ) $data['description'] = $description;
			
			//User speichern
			if( $this->db->insert('game', $data) ) return $this->db->insert_id();
			
			//Fail
			return false;
			
		}
		
		/**
		 * Spiel zu angegebener ID aus DB laden.
		 */
		public function load( $gameid ){
			
			//Daten aus DB abfragen
			$query = $this->db->select();				// SELECT *
			$query = $this->db->from('game');			// FROM game
			$query = $this->db->where('id', $gameid);	// WHERE id = $gameid
			$query = $this->db->get();					// do it
			
			//echo $this->db->last_query();
			
			//Prüfe, ob Spiel gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				$game = $query->row();
				$this->id = $game->id;
				$this->name = $game->name;
				$this->description = $game->description;
				$this->measurement = $game->measurement;
				$this->order = $game->order;
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		/**
		 * Aktualisiert die Spieldaten zur ID.
		 */
		public function edit( $gameid, $name = "", $measurement = "", $order = "", $description = "" ){
			
			//Nur die Werte aufnehmen, die übergeben und geändert werden sollen
			if( !empty( $name ) ) $data['name'] = $name;
			if( !empty( $measurement ) ) $data['measurement'] = $measurement;
			if( !empty( $order ) ) $data['order'] = $order;
			if( !empty( $description ) ) $data['description'] = $description;
			
			$this->db->where('id', $gameid);
			if( $this->db->update('game', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Löscht das Spiel mit der angegebenen ID aus der DB.
		 */
		public function delete( $gameid ){
			
			$this->db->where('id', $gameid);
			if( $this->db->delete('game') ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Holt die Ergebnisse eines Spiels aus der DB.
		 */
		public function getResults( $eventid, $gameid = "" ){
			
			//wenn anderes Spiel als gerade geladen, lade dieses
			if( !empty( $gameid ) && $gameid != $this->id ) $this->load($gameid);
						
			//Daten aus DB abfragen
			$query = $this->db->select('team, value');				// SELECT team, value
			$query = $this->db->from('results');					// FROM results
			$query = $this->db->where('event', $eventid);			// WHERE event = $eventid 
			$query = $this->db->where('game', $this->id); 			// AND game = $this->id
			$query = $this->db->order_by('value', $this->order); 	// ORDER BY value $this->order
			$query = $this->db->get();								// do it
			
			//Prüfe, ob Rolle gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				foreach( $query->result() as $result ){
					$this->results[ $eventid ][ $gameid ][ $result->team ] = $result->value;
				}
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		public function getAll(){
			
			//Daten aus DB abfragen
			$query = $this->db->select('id, name');				// SELECT id, name
			$query = $this->db->from('game');					// FROM game
			$query = $this->db->get();							// do it
			
			//Prüfe, ob Spiele gefunden wurden
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				foreach( $query->result() as $result ){
					$this->results[ 'option' . $result->id ]['id'] = $result->id;
					$this->results[ 'option' . $result->id ]['name'] = $result->name;
				}
				
				//Success
				return true;
				
			}
			
			//Fehler
			return false;
		}
		
		public function getDescription(){
			return $this->description;
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function getUnit(){
			return $this->measurement;
		}		
		
		public function getName(){
			return $this->name;
		}
	}
	
?>