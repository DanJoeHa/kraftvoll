<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Role extends CI_Model {
		
		private $id = 0;
		private $name = "";
		
		public function __construct(){
			$this->load->database();
		}
		
		/**
		 * Role zu angegebene ID aus DB laden.
		 */
		public function load( $roleid ){
				
			//Daten aus DB abfragen
			$query = $this->db->select();				// SELECT *
			$query = $this->db->from('role');			// FROM user
			$query = $this->db->where('id', $roleid);	// WHERE id = $roleid
			$query = $this->db->get();					// do it
			
			//Prüfe, ob Rolle gefunden wurde
			if( $query->num_rows() > 0 ){
				
				//Daten in Objekt speichern
				$role = $query->row();
				$this->id = $role->id;
				$this->name = $role->name;
				
				//Success
				return true;	
			}
			
			//Fail
			return false;
			
		}
		
	}
?>
		