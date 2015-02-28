<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="de">
	<head>
				
		<!-- Meta-Angaben -->
		<meta charset="utf-8" />
		<meta name="author" content="Johannes Haag" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<!-- Title -->
		<title>Kraftvoll</title>
		
		<!-- Styling -->
		<link rel="stylesheet" href="<?= base_url(); ?>/public/css/style.css" />
		
	</head>
	<body>
	
		<header>
			
			<!-- Banner -->
			<picture>
				<img src="<?= base_url(); ?>/public/img/banner_small.png" />
			</picture>
			
			<div class="flexbox">
				
				<!-- Menuicon -->
				<a href="#" id="menuicon" title="Menu anzeigen">&#9776;</a>
				
				<!-- Benutzername anzeigen -->
				<span id="username"><?= $username ?></span>
				
			</div>
			
			<!-- Navigation -->
			<nav>					
				<ul>
					<!-- übergreifende Menueinträge -->
					<li>
						<a href="<?= site_url('start/'); ?>" title="Home">Home</a>
					</li>
					
					<!-- Menueinträge Station -->
					<li>
						<a href="<?= site_url('spiele/WertungEintragen/'); ?>" title="Wertung eintragen">Wertung eintragen</a>
					</li>
					<li>
						<a href="<?= site_url('spiele/TabelleAnzeigen/'); ?>" title="Tabelle ansehen">Tabelle ansehen</a>
					</li>
					
					<!-- Menueinträge Monitor -->
					<li>
						<a href="<?= site_url('monitor/'); ?>" title="Bestenliste anzeigen">Bestenliste anzeigen</a>
					</li>
					
					<!-- Menueinträge Turnierleitung -->
					<li>
						<a href="<?= site_url('teams/'); ?>" title="Team&uuml;bersicht">Team&uuml;bersicht</a>
					</li>
					<li>
						<a href="<?= site_url('teams/anlegen/'); ?>" title="Team anlegen">Team anlegen</a>
					</li>
					<li>
						<a href="<?= site_url('spiele/'); ?>" title="Spiel&uuml;bersicht">Spiel&uuml;bersicht</a>
					</li>
					<li>
						<a href="<?= site_url('spiele/anlegen/'); ?>" title="Spiel anlegen">Spiel anlegen</a>
					</li>
					<li>
						<a href="<?= site_url('events/ergebnis/'); ?>" title="Ergebnisaufstellung">Ergebnisaufstellung</a>
					</li>
					<li>
						<a href="<?= site_url('events/'); ?>" title="Event&uuml;bersicht">Event&uuml;bersicht</a>
					</li>
					<li>
						<a href="<?= site_url('events/anlegen/'); ?>" title="Event anlegen">Event anlegen</a>
					</li>
					
					<!-- Menueinträge Admin -->
					<li>
						<a href="<?= site_url('user/'); ?>" title="User&uuml;bersicht">User&uuml;bersicht</a>
					</li>
					<li>
						<a href="<?= site_url('user/anlegen'); ?>" title="User anlegen">User anlegen</a>
					</li>
					
					<!-- Logout -->
					<li>
						<a href="<?= site_url('logout/'); ?>" title="Logout">Logout</a>
					</li>
				</ul>
			</nav>
			
		</header>
		
		<section>
			
			<h1><?= $pagetitle ?></h1>