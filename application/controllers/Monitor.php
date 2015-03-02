<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/monitor
	 *	- or -
	 * 		http://example.com/monitor/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//Beispieldaten
		$data['rows'][0]['spielnummer'] = 1;
		$data['rows'][0]['spielname'] = "Hau den Lukas";
		$data['rows'][0]['teamnummer'] = 1;
		$data['rows'][0]['teamname'] = "DUMMY";
		$data['rows'][0]['wertung'] = "2,5";
		$data['rows'][1]['spielnummer'] = 2;
		$data['rows'][1]['spielname'] = "Kletterturm";
		$data['rows'][1]['teamnummer'] = 1;
		$data['rows'][1]['teamname'] = "DUMMY1";
		$data['rows'][1]['wertung'] = "30,5 Sekunden";
		$data['rows'][2]['spielnummer'] = 3;
		$data['rows'][2]['spielname'] = "Trecker ziehen";
		$data['rows'][2]['teamnummer'] = 5;
		$data['rows'][2]['teamname'] = "DUMMY2";
		$data['rows'][2]['wertung'] = "23,5 Sekunden";
		$data['rows'][3]['spielnummer'] = 4;
		$data['rows'][3]['spielname'] = "Bierkrug schubsen";
		$data['rows'][3]['teamnummer'] = 1;
		$data['rows'][3]['teamname'] = "DUMMY1";
		$data['rows'][3]['wertung'] = "5 St&uuml;ck";
		
		//Beispieldaten
		$hdata['username'] = "Admin";
		$hdata['pagetitle'] = "Bestleistungen";
		
		//Ausgabe
		$this->load->view('HTML/header', $hdata);
		$this->load->view('HTML/table', $data);
		$this->load->view('HTML/footer');
	}
}
