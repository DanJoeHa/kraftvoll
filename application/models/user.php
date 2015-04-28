<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User extends CI_Model {
		
		private $id = 0;
		private $name = "";
		private $password = "";
		private $role = null;
		
		public function __construct(){
			$this->load->database();
		}
		
		/**
		 * Erstellt einen neuen User in der DB.
		 */
		public function create( $name, $password, $roleid ){
			
			$data['name'] = $name;
			$data['password'] = password_hash($password, PASSWORD_DEFAULT);
			$data['role'] = $roleid;
			
			//User speichern
			if( $this->db->insert('user', $data) ) return $this->db->insert_id();
			
			//Fail
			return false;
			
		}
		
		/**
		 * User zu angegebener Userid aus DB laden.
		 */
		public function load( $userid ){
			
			//Daten aus DB abfragen
			$query = $this->db->select();				// SELECT *
			$query = $this->db->from('user');			// FROM user
			$query = $this->db->where('id', $userid);	// WHERE id = $userid
			$query = $this->db->get();					// do it
			
			//echo $this->db->last_query();
			
			//Prüfe, ob User gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				$user = $query->row();
				$this->id = $user->id;
				$this->name = $user->name;
				$this->password = $user->password;
				
				//Rolle laden und speichern
				$this->Role->load( $user->role );				
				$this->role = $this->Role;
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
		/**
		 * Aktualisiert die Userdaten zur Userid.
		 */
		public function edit( $userid, $name = "", $password = "", $roleid = "" ){
			
			//Nur die Werte aufnehmen, die übergeben und geändert werden sollen
			if( !empty( $name ) ) $data['name'] = $name;
			if( !empty( $password ) ) $data['password'] = $password;
			if( !empty( $roleid ) ) $data['role'] = $roleid;
			
			$this->db->where('id', $userid);
			if( $this->db->update('user', $data) ) return true;
			
			//Fail
			return false;
			
		}
		
		/**
		 * Löscht den User mit der angegebenen Userid aus der DB.
		 */
		public function delete( $userid ){
			
			$this->db->where('id', $userid);
			if( $this->db->delete('user') ) return true;
			
			//Fail
			return false;
			
		}
		
	}
	
?>