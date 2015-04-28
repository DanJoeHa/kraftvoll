<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Kraftvoll</title>
		
		<meta name="description" content="Die Clientanwendung für Kraftvoll" />
		<meta name="author" content="Johannes Haag" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		
		<link rel="stylesheet" href="kraftvoll.css" />
		
	</head>

	<body>
		
		<header>
			<nav>
				<a href="#" id="navicon" class="invisible">&equiv;</a>
				<ul class="invisible">
					<li class="admin leitung station registration monitor invisible"><a href="welcome">Home</a></li>
					<li class="admin leitung station invisible"><a href="description">Spielbeschreibung</a></li>
					<li class="admin leitung station invisible"><a href="teamwertung">Wertung eintragen</a></li>
					<li class="admin leitung station invisible"><a href="gametable">Spieltabelle</a></li>
					<li class="admin leitung monitor invisible"><a href="eventtable">Top-Wertungen</a></li>
					<li class="admin leitung registration invisible"><a href="teams">Teams</a></li>
					<li class="admin leitung registration invisible"><a href="newteam">Team registrieren</a></li>
					<li class="admin leitung invisible"><a href="game">Spiele</a></li>
					<li class="admin leitung invisible"><a href="newgame">Spiel hinzufügen</a></li>
					<li class="admin leitung invisible"><a href="events">Events</a></li>
					<li class="admin leitung invisible"><a href="newevent">Event hinzufügen</a></li>
					<li class="admin leitung invisible"><a href="user">Benutzer</a></li>
					<li class="admin leitung invisible"><a href="newuser">Benutzer hinzufügen</a></li>
				</ul>
			</nav>
		
			<img src="img/banner_small.png" alt="" />
		</header>
		
		<div id="wrapper">
			
			<div id="message" class="invisible"></div>
			
			<article id="login" class="visible">
				<h1>Login</h1>
				<p>
					<form action="login" method="post">
						<label for="username">Benutzername:</label>
						<input type="text" id="username" name="username" maxlength=25 required autofocus />
						<label for="password">Passwort:</label>
						<input type="password" id="password" name="password" required />
						<input type="submit" value="anmelden" />
					</form>
				</p>
			</article>
			
			<article id="welcome" class="invisible">
				<h1>Herzlich Willkommen!</h1>
				<p>
					
				</p>
			</article>
			
			<article id="description" class="invisible">
				<h1>Spielbeschreibung</h1>
				<p>
					
				</p>
			</article>
			
			<article id="teamwertung" class="invisible">
				<h1>Wertung eintragen</h1>
				<p>
					<form action="teamwertung" method="post">
						<label for="team">Team-Nr.:</label>
						<input type="number" min=1 required autofocus />
						<label for="wertung">Wertung:</label>
						<input type="number" required />
						<input type="submit" value="speichern" />
					</form>
				</p>
			</article>
			
			<article id="gametable" class="invisible">
				<h1>Tabelle für Spiel</h1>
				<p>
					<table>
						<thead>
							<tr>
								<td>Team</td>
								<td>Wertung</td>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</p>
			</article>
			
			<article id="eventtable" class="invisible">
				<h1>Bestenleistungen</h1>
				<p>
					<table>
						<thead>
							<tr>
								<td>Spiel</td>
								<td>Team</td>
								<td>Wertung</td>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</p>
			</article>
			
			<article id="teams" class="invisible">
				<h1>Teams</h1>
				<p>
					
				</p>
			</article>
			
			<article id="newteam" class="invisible">
				<h1>Team registrieren</h1>
				<p>
					<form action="team/new/" method="post">
						<label for="teamname">Teamname:</label>
						<input type="text" id="teamname" name="teamname" maxlength=25 required autofocus />
						<label for="teamleader">Teamleader:</label>
						<input type="text" maxlength=50 name="teamleader" id="teamleader" required />
						<label for="teammember">Team-Mitglieder:</label>
						<textarea id="teammember" name="teammember" required></textarea>
						<input type="submit" value="speichern" />
					</form>
				</p>
			</article>
			
			<article id="editteam" class="invisible">
				<h1>Team ändern</h1>
				<p>
					<form action="team/edit/" method="post">
						<label for="editteam_teamnr">Team-Nr.</label>
						<input type="number" id="editteam_teamnr" name="editteam_teamnr" value="" disabled />
						<label for="editteam_teamname">Teamname:</label>
						<input type="text" id="editteam_teamname" name="editteam_teamname" maxlength=25 required autofocus />
						<label for="editteam_teamleader">Teamleader:</label>
						<input type="text" maxlength=50 name="editteam_teamleader" id="editteam_teamleader" required />
						<label for="editteam_teammember">Team-Mitglieder:</label>
						<textarea id="editteam_teammember" name="editteam_teammember" required></textarea>
						<input type="submit" value="speichern" />
					</form>
				</p>
			</article>
			
			<article id="games" class="invisible">
				<h1>Spiele</h1>
				<p>
					
				</p>
			</article>
			
			<article id="newgame"  class="invisible">
				<h1>Spiel anlegen</h1>
				<p>
					<form action="games/new/" method="post">
						<label for="spielname">Spielname:</label>
						<input type="text" id="spielname" name="spielname" maxlength=25 required autofocus />
						<label for="wertungsgrundlage">Wertungsgrundlage:</label>
						<select id="wertungsgrundlage" name="wertungsgrundlage" required>
							<option></option>
							<option>Zeit</option>
							<option>Anzahl</option>
						</select>
						<label for="wertungsfolge">Bestwertung:</label>
						<select id="wertungsfolge" name="wertungsfolge" required>
							<option></option>
							<option value="ASC">meiste/größte</option>
							<option value="DSC">kleinste/kürzeste</option>
						</select>
						<label for="spielbeschreibung">Spielbeschreibung:</label>
						<textarea id="spielbeschreibung" name="spielbeschreibung"></textarea>
						<input type="submit" value="speichern" />
					</form>
				</p>
			</article>
			
			<article id="editgame" class="invisible">
				<h1>Spiel ändern</h1>
				<p>
					<form action="games/edit/" method="post">
						<label for="editgame_spielnr">Spiel-Nr.:</label>
						<input type="number" id="editgame_spielnr" name="editgame_spielnr" disabled value="" />
						<label for="editgame_spielname">Spielname:</label>
						<input type="text" id="editgame_spielname" name="editgame_spielname" maxlength=25 required autofocus />
						<label for="editgame_wertungsgrundlage">Wertungsgrundlage:</label>
						<select id="editgame_wertungsgrundlage" name="editgame_wertungsgrundlage" required>
							<option></option>
							<option>Zeit</option>
							<option>Anzahl</option>
						</select>
						<label for="editgame_wertungsfolge">Bestwertung:</label>
						<select id="editgame_wertungsfolge" name="editgame_wertungsfolge" required>
							<option></option>
							<option value="ASC">meiste/größte</option>
							<option value="DSC">kleinste/kürzeste</option>
						</select>
						<label for="editgame_spielbeschreibung">Spielbeschreibung:</label>
						<textarea id="editgame_spielbeschreibung" name="editgame_spielbeschreibung"></textarea>
						<input type="submit" value="speichern" />
					</form>
				</p>
			</article>
			
			<article id="events" class="invisible">
				<h1>Events</h1>
				<p>
					
				</p>
			</article>
			
			<article id="newevent" class="invisible">
				<h1>Event anlegen</h1>
				<p>
					<form action="event/new/" method="post">
						<label for="eventdatum">Datum:</label>
						<input type="date" id="eventdatum" name="eventdatum" required autofocus />
						<label for="eventspiele">Spiele wählen:</label>
						<select id="eventspiele" name="eventspiele" multiple>
							<option></option>
						</select>
						<input type="submit" value="speichern" />
					</form>
				</p>
			</article>
			
			<article id="editevent" class="invisible">
				<h1>Event ändern</h1>
				<p>
					<form action="event/edit/" method="post">
						<label for="editevent_eventid">Event-ID:</label>
						<input type="number" id="editevent_eventid" name="editevent_eventid" value="" disabled />
						<label for="editevent_eventdatum">Datum:</label>
						<input type="date" id="editevent_eventdatum" name="editevent_eventdatum" required autofocus />
						<label for="editevent_eventspiele">Spiele wählen:</label>
						<select id="editevent_eventspiele" name="editevent_eventspiele" multiple>
							<option></option>
						</select>
						<input type="submit" value="speichern" />
					</form>
				</p>
			</article>
			
			<article id="user" class="invisible">
				<h1>Userübersicht</h1>
				<p>
					
				</p>
			</article>
			
			<article id="newuser" class="invisible">
				<h1>User anlegen</h1>
				<p>
					<form action="user/new/" method="post">
						<label for="newuser_username">Benutzername:</label>
						<input type="text" id="newuser_username" name="newuser_username" maxlength=25 required autofocus />
						<label for="newuser_password">Passwort:</label>
						<input type="password" name="newuser_password" id="newuser_password" maxlength=50 required />
						<label for="newuser_password_wdh">Passwort (Wdh.):</label>
						<input type="password" name="newuser_password_wdh" id="newuser_password_wdh" maxlength=50 required />
						<label for="newuser_role">Rolle:</label>
						<select id="newuser_role" name="newuser_role" required>
							<option value=1>Admin</option>
							<option value=2>Leitung</option>
							<option value=3>Registration</option>
							<option value=4>Station</option>
							<option value=5>Monitor</option>
						</select>
						<input type="submit" value="speichern" />
					</form>
				</p>
			</article>
			
			<article id="edituser" class="invisible">
				<h1>User ändern</h1>
				<p>
					<form action="user/edit/" method="post">
						<label for="edituser_userid">User-ID</label>
						<input type="number" id="edituser_userid" name="edituser_userid" value="" disabled />
						<label for="edituser_username">Benutzername:</label>
						<input type="text" id="edituser_username" name="edituser_username" maxlength=25 required autofocus />
						<label for="edituser_password">Passwort:</label>
						<input type="password" name="edituser_password" id="edituser_password" maxlength=50 />
						<label for="edituser_password_wdh">Passwort (Wdh.):</label>
						<input type="password" name="edituser_password_wdh" id="edituser_password_wdh" maxlength=50 />
						<label for="edituser_role">Rolle:</label>
						<select id="edituser_role" name="edituser_role" required>
							<option value=1>Admin</option>
							<option value=2>Leitung</option>
							<option value=3>Registration</option>
							<option value=4>Station</option>
							<option value=5>Monitor</option>
						</select>
						<input type="submit" value="speichern" />
					</form>
				</p>
			</article>
			
		</div>
			
		<footer>
				&copy; Johannes Haag (<a href="tel:01703116273">0170 - 3116273</a>)
		</footer>
		
		<!-- JavaScript -->
		<script src="kraftvoll.js"></script>
	</body>
</html>
