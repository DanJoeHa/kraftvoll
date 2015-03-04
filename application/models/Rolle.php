<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rolle extends CI_Model {
	
	/**
	 * Rollenname.
	 */
	protected $name = "";
	
	/**
	 * Rechte der Rolle.
	 */
	protected $rechte = array();
	
	public function __construct(){
		parent::__construct();
		
		$this->setRights();
	}
	
	public function setRoleName( $rolename ){
		$this->name = $rolename;
	}
	
	public function getRoleName(){
		return $this->name;
	}
	
	public function hasRightTo( $controller, $action ){
		if( !isset( $this->rechte[ $controller ][ $action ] ) ) return false;	
		return $this->rechte[ $controller ][ $action ];		
	}
	
	/**
	 * Rechte festlegen.
	 */
	private function setRights(){
		
		//Allgemein
		$this->rechte[ 'login' ][ 'index' ] = true;
		$this->rechte[ 'login' ][ 'getMeIn' ] = true;
	}
}
?>	