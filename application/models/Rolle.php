<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rolle extends CI_Model {
	
	/**
	 * Rollenname.
	 */
	protected $name = "Not Logged In";
	
	/**
	 * Rechte der Rolle.
	 */
	protected $rechte = array();
	
	public function __construct(){
		parent::__construct();
		
		$this->setRights();
	}
	
	public function setName( $rolename ){
		$this->name = $rolename;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function hasRightTo( $controller, $action ){
		if( !isset( $this->rechte[ $controller ][ $action ] ) ) return false;	
		return $this->rechte[ $controller ][ $action ];		
	}
	
	/**
	 * Rechte festlegen.
	 */
	protected function setRights(){
		
		//Allgemein
		$this->rechte[ 'login' ][ 'index' ] = true;
		$this->rechte[ 'login' ][ 'getMeIn' ] = true;
	}
}
?>	