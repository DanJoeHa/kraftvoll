<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Services extends CI_Controller{
		
		public function login(){
			$this->load->model('User');
			$this->load->model('Role');
			
			// hole POST-Daten
			$user = $this->input->post('username');
			$password = $this->input->post('password');
			
			//Rückgabedaten Defaultwerte festlegen
			$data['values']['success'] = 0;
						
			// versuche User zu laden
			if( $this->User->load( $user ) ){

				// prüfe Passwort
				if( md5( $password ) === $this->User->getPassword() ){
					
					// Erfolgreich
					$data['values']['success'] = 1;
					$data['values']['role'] = $this->User->getRole()->getName();
					$data['values']['unit'] = "Stk.";
				}
				
			}
			
			//Rückgabe via XML
			$this->load->view('xml', $data);
			
		}
		
		
		public function createuser(){
			$this->load->model('User');
			$this->load->model('Role');
			
			// hole POST-Daten
			$user = $this->input->post('newuser_username');
			$password = $this->input->post('newuser_password');
			$password_wdh = $this->input->post('newuser_password_wdh');
			$role = $this->input->post('newuser_role');
			
			//Rückgabedaten Defaultwerte festlegen
			$data['values']['success'] = 0;
			
			// Prüfe Passwörter auf Übereinstimmung
			if( $password == $password_wdh ){
				
				// versuche User zu erstellen
				if( $this->User->create( $user, $password, $role ) ){
					$data['values']['success'] = 1;
					$data['values']['message'] = "User erfolgreich erstellt.";
				} 
				
			}else{
				$data['values']['message'] = "Passwörter stimmen nicht überein.";
			}
						
			//Rückgabe via XML
			$this->load->view('xml', $data);
			
		}
		
		public function createteam(){
			$this->load->model('Team');
			
			//hole POST-Daten
			$teamname = $this->input->post('teamname');
			$teamleader = $this->input->post('teamleader');
			$teammember = $this->input->post('teammember');
			
			//Rückgabedaten Defaultwerte festlegen
			$data['values']['success'] = 0;
			$data['values']['message'] = "Team konnte nicht erstellt werden.";
			
			// versuche Team zu erstellen
			if( $this->Team->create( $teamname, $teamleader, $teammember ) ){
				$data['values']['success'] = 1;
				$data['values']['message'] = "Team erfolgreich erstellt.";
				
				//TODO: Team Event hinzufügen
			}
			
			//Rückgabe via XML
			$this->load->view('xml', $data);
			
		}
		
		public function createevent(){
			$this->load->model('Event');
			
			//hole POST-Daten
			$datum = $this->input->post('eventdatum');
			$spiele = $this->input->post('eventspiele');
			
			//Rückgabedaten Defaultwerte festlegen
			$data['values']['success'] = 0;
			$data['values']['message'] = "Event konnte nicht erstellt werden.";
			
			// versuche Event zu erstellen
			if( $this->Event->create( $datum ) ){
				$data['values']['success'] = 1;
				$data['values']['message'] = "Event erfolgreich erstellt.";
				
				//TODO: spiele hinzufügen
			}
			
			//Rückgabe via XML
			$this->load->view('xml', $data);
		}
		
		public function event(){
			$this->load->model('Event');
			
			echo "Erstelle Event am 18.07.2015: ";
			$eventid = $this->Event->create("2015-07-18");
			echo $eventid;
			
			echo "<br>Lade Event: ";
			echo $this->Event->load( $eventid );
			print_r($this->Event);
			
			echo "<br>Ändere Datum auf 27.05.2018: ";
			echo $this->Event->edit( $eventid, "2018-05-27" );
			
			echo "<br>Lade Event mit Änderungen: ";
			echo $this->Event->load( $eventid );
			print_r($this->Event);
			
			echo "<br>Lösche Event: ";
			echo $this->Event->delete( $eventid );
			
		}
		
		public function eventuser(){
			$this->load->model('Event');
			$this->load->model('User');
			$this->load->model('Role');
			
			echo "Erstelle Event am 18.07.2015: ";
			$eventid = $this->Event->create("2015-07-18");
			echo $eventid;
			
			echo "<br>Erstelle User Klettertum mit Password Test und Role Station: ";
			$userid = $this->User->create( 'Kletterturm', 'Test', 4 );
			echo $userid;
			
			echo "<br>Füge User dem Event hinzu: ";
			echo $this->Event->addUser( $userid, "", $eventid );			
			
			echo "<br>Lade Event: ";
			echo $this->Event->load( $eventid );
			echo $this->Event->loadUser( $eventid );
			print_r($this->Event);
			
			echo "<br>Lösche User aus Event: ";
			echo $this->Event->deleteUser( $userid, $eventid );
			
			echo "<br>Lade Event mit Änderungen: ";
			echo $this->Event->load( $eventid );
			echo $this->Event->loadUser( $eventid );
			print_r($this->Event);
			
			echo "<br>Lösche Event: ";
			echo $this->Event->delete( $eventid );
			
			echo "<br>Lösche User: ";
			echo $this->User->delete( $userid );
		}			
		
		
		public function eventgames(){
			$this->load->model('Event');
			$this->load->model('Game');
			
			echo "Erstelle Event am 18.07.2015: ";
			$eventid = $this->Event->create("2015-07-18");
			echo $eventid;
			
			echo "<br>Erstelle Spiel Klettertum mit Wertungsmaßstab Anzahl, Sortierung DESC und Beschreibung lalalla: ";
			$gameid = $this->Game->create( 'Kletterturm', 'Anzahl', 'DESC', 'lalla' );
			echo $gameid;
			
			echo "<br>Füge Spiel dem Event hinzu: ";
			echo $this->Event->addGame( $gameid, $eventid );			
			
			echo "<br>Lade Event: ";
			echo $this->Event->load( $eventid );
			echo $this->Event->loadGames( $eventid );
			print_r($this->Event);
			
			echo "<br>Lösche Spiel aus Event: ";
			echo $this->Event->deleteGame( $gameid, $eventid );
			
			echo "<br>Lade Event mit Änderungen: ";
			echo $this->Event->load( $eventid );
			echo $this->Event->loadGames( $eventid );
			print_r($this->Event);
			
			echo "<br>Lösche Event: ";
			echo $this->Event->delete( $eventid );
			
			echo "<br>Lösche Spiel: ";
			echo $this->Game->delete( $gameid );
		}	

		public function team(){
			$this->load->model('Team');
			
			echo "Erstelle Team Kraftvoll mit Leader Andreas Munder und Member Heiko Mayer, Andi Spenst, Johannes Haag: ";
			$teamid = $this->Team->create( 'Kraftvoll', 'Andreas Munder', 'Heiko Mayer, Andi Spenst, Johannes Haag');
			echo $teamid;
			
			echo "<br>Lade erstellte Team: ";
			echo $this->Team->load( $teamid );
			print_r( $this->Team );
			
			echo "<br>Ändere Teamname in Kraftvoll_2015 und leader auf Josua Urban: ";
			echo $this->Team->edit( $teamid, "Kraftvoll_2015", "Josua Urban" );
			
			echo "<br>Lade Team mit Änderungen: ";
			echo $this->Team->load( $teamid );
			print_r( $this->Team );
			
			echo "<br>Lösche Team: ";
			echo $this->Team->delete( $teamid );
		}
		
		public function eventteams(){
			$this->load->model('Event');
			$this->load->model('Team');
			
			echo "Erstelle Event am 18.07.2015: ";
			$eventid = $this->Event->create("2015-07-18");
			echo $eventid;
			
			echo "Erstelle Team Kraftvoll mit Leader Andreas Munder und Member Heiko Mayer, Andi Spenst, Johannes Haag: ";
			$teamid = $this->Team->create( 'Kraftvoll', 'Andreas Munder', 'Heiko Mayer, Andi Spenst, Johannes Haag');
			echo $teamid;
			
			echo "<br>Füge Team dem Event hinzu: ";
			echo $this->Event->addTeam( $teamid, $eventid );			
			
			echo "<br>Lade Event: ";
			echo $this->Event->load( $eventid );
			echo $this->Event->loadTeams( $eventid );
			print_r($this->Event);
			
			echo "<br>Lösche Team aus Event: ";
			echo $this->Event->deleteTeam( $teamid, $eventid );
			
			echo "<br>Lade Event mit Änderungen: ";
			echo $this->Event->load( $eventid );
			echo $this->Event->loadTeams( $eventid );
			print_r($this->Event);
			
			echo "<br>Lösche Event: ";
			echo $this->Event->delete( $eventid );
			
			echo "<br>Lösche Team: ";
			echo $this->Team->delete( $teamid );
		}	
		
		public function result(){
			$this->load->model('Event');
			$this->load->model('Team');
			$this->load->model('Game');	
			$this->load->model('Result');
				
			echo "Erstelle Event am 18.07.2015: ";
			$eventid = $this->Event->create("2015-07-18");
			echo $eventid;
			
			echo "<br>Erstelle Team Kraftvoll mit Leader Andreas Munder und Member Heiko Mayer, Andi Spenst, Johannes Haag: ";
			$teamid = $this->Team->create( 'Kraftvoll', 'Andreas Munder', 'Heiko Mayer, Andi Spenst, Johannes Haag');
			echo $teamid;
			
			echo "<br>Erstelle Spiel Klettertum mit Wertungsmaßstab Anzahl, Sortierung DESC und Beschreibung lalalla: ";
			$gameid = $this->Game->create( 'Kletterturm', 'Anzahl', 'DESC', 'lalla' );
			echo $gameid;
			
			echo "<br>Erstelle Result mit 5: ";
			echo $this->Result->create($eventid, $gameid, $teamid, '5');
			
			echo "<br>Lade Result: ";
			echo $this->Result->load( $eventid, $gameid, $teamid );
			print_r($this->Result);
			
			echo "<br>Ändere Result auf 1.5: ";
			echo $this->Result->edit($eventid, $gameid, $teamid, '1.5');
			
			echo "<br>Lade Result: ";
			echo $this->Result->load( $eventid, $gameid, $teamid );
			print_r($this->Result);
			
			echo "<br>Lösche Result: ";
			echo $this->Result->delete( $eventid, $gameid, $teamid);
			
			echo "<br>Lösche Spiel: ";
			echo $this->Game->delete( $gameid );
			
			echo "<br>Lösche Team: ";
			echo $this->Team->delete( $teamid );
			
			echo "<br>Lösche Event: ";
			echo $this->Event->delete( $eventid );
		}
		
		public function teamresults(){
			$this->load->model('Event');
			$this->load->model('Team');
			$this->load->model('Game');	
			$this->load->model('Result');
				
			echo "Erstelle Event am 18.07.2015: ";
			$eventid = $this->Event->create("2015-07-18");
			echo $eventid;
			
			echo "<br>Erstelle Team Kraftvoll mit Leader Andreas Munder und Member Heiko Mayer, Andi Spenst, Johannes Haag: ";
			$teamid = $this->Team->create( 'Kraftvoll', 'Andreas Munder', 'Heiko Mayer, Andi Spenst, Johannes Haag');
			echo $teamid;
			
			echo "<br>Erstelle Team Hosenscheißer mit Leader Andreas Munder und Member Heiko Mayer, Andi Spenst, Johannes Haag: ";
			$teamid2 = $this->Team->create( 'Hosenscheißer', 'Andreas Munder', 'Heiko Mayer, Andi Spenst, Johannes Haag');
			echo $teamid2;
			
			echo "<br>Erstelle Spiel 1: Klettertum mit Wertungsmaßstab Anzahl, Sortierung DESC und Beschreibung lalalla: ";
			$gameid = $this->Game->create( 'Kletterturm', 'Anzahl', 'DESC', 'lalla' );
			echo $gameid;
			
			echo "<br>Erstelle Spiel 2: Schlammparcour mit Wertungsmaßstab Zeit, Sortierung ASC und Beschreibung lalalla: ";
			$gameid2 = $this->Game->create( 'Schlammparcour', 'Zeit', 'ASC', 'lalla' );
			echo $gameid2;
			
			echo "<br>Erstelle Result mit 5 für Spiel 1: ";
			echo $this->Result->create($eventid, $gameid, $teamid, '5');
			
			echo "<br>Erstelle Result mit 15 für Spiel 1 von Team 2: ";
			echo $this->Result->create($eventid, $gameid, $teamid2, '15');
			
			echo "<br>Erstelle Result mit 11.5 für Spiel 2: ";
			echo $this->Result->create($eventid, $gameid2, $teamid, '11.5');
			
			echo "<br>Lade Results des Teams: ";
			echo $this->Team->load( $teamid );
			echo $this->Team->getResults( $eventid, $teamid );
			print_r($this->Team);
			
			echo "<br>Lade Results des Events: ";
			echo $this->Event->load( $eventid );
			echo $this->Event->getResults( $eventid );
			print_r($this->Event);
			
			echo "<br>Lade Results des Spiels 1: ";
			echo $this->Game->load( $gameid );
			echo $this->Game->getResults( $eventid, $gameid );
			print_r($this->Game);
			
			echo "<br>Lösche Results: ";
			echo $this->Result->delete( $eventid, $gameid, $teamid);
			echo $this->Result->delete( $eventid, $gameid2, $teamid);
			
			echo "<br>Lösche Spiel: ";
			echo $this->Game->delete( $gameid );
			
			echo "<br>Lösche Teams: ";
			echo $this->Team->delete( $teamid );
			echo $this->Team->delete( $teamid2 );
			
			echo "<br>Lösche Event: ";
			echo $this->Event->delete( $eventid );
		}
	}
?>