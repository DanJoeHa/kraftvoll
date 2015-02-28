<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8" />
		<title>Kraftvoll</title>

		<meta name="author" content="Johannes Haag" />
		
	</head>
	<body>
		<div id="wrapper">
			
			<header>
				
				<!-- Navigation -->
				<nav>
					<ol>
						<!-- übergreifende Menueinträge -->
						<li>
							<a href="<?= site_url(); ?>" title="Home">Home</a>
						</li>
						
						<!-- Menueinträge Station -->
						<li>
							<a href="<?= site_url('station/'); ?>" title="Wertung eintragen">Wertung eintragen</a>
						</li>
						<li>
							<a href="<?= site_url('station/TabelleAnzeigen/'); ?>" title="Tabelle ansehen">Tabelle ansehen</a>
						</li>
						
						<!-- Menueinträge Monitor -->
						<li>
							<a href="<?= site_url('monitor/'); ?>" title="Bestenliste anzeigen">Bestenliste anzeigen</a>
						</li>
						
						<!-- Menueinträge Turnierleitung -->
						<li>
							<a href="<?= site_url('team/Anlegen/'); ?>" title="Team anlegen">Team anlegen</a>
						</li>
						<li>
							<a href="<?= site_url('team/UebersichtAnzeigen/'); ?>" title="Team&uuml;bersicht">Team&uuml;bersicht</a>
						</li>
						<li>
							<a href="<?= site_url('station/anlegen/'); ?>" title="Station anlegen">Station anlegen</a>
						</li>
						<li>
							<a href="<?= site_url('station/uebersicht/'); ?>" title="Stations&uuml;bersicht">Stations&uuml;bersicht</a>
						</li>
						<li>
							<a href="<?= site_url('ergebnis/'); ?>" title="Ergebnisaufstellung">Ergebnisaufstellung</a>
						</li>
						
					</ol>
				</nav>
				
				<!-- Banner -->
				<picture>
					<source media="" src=""></source>
					<img src="fallback_banner.png" alt="Fallback Banner Kraftvoll" />
					<p>Kraftvoll Banner</p>
				</picture>
				
			</header>
			
			<section>
				
			