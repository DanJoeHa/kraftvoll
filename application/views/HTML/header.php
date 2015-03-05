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
	
		<header class="page-row">
			
			<!-- Banner -->
			<picture>
				<img src="<?= base_url('public/img/banner_small.png'); ?>" alt=""/>
			</picture>
			
			<div class="flexbox">
				
				<!-- Menuicon -->
				<a href="#" id="menuicon" title="Menu anzeigen">&#9776;</a>
				
				<!-- Benutzername anzeigen -->
				<span id="username"><?= $user->getUsername(); ?></span>
				
			</div>
			
			<!-- Navigation -->
			<nav>					
				<ul>
					<?php if( $user->getRole()->hasRightTo('start', 'index')): ?>
					<!-- übergreifende Menueinträge -->
					<li>
						<a href="<?= site_url('start/index/'); ?>" class="navlink" title="Home">Home</a>
					</li>
					<?php endif; ?>
					
					<?php if( $user->getRole()->hasRightTo('spiele', 'WertungEintragen') ): ?>
					<!-- Menueinträge Station -->
					<li>
						<a href="<?= site_url('spiele/WertungEintragen/'); ?>" class="navlink" title="Wertung eintragen">Wertung eintragen</a>
					</li>
					<?php endif; ?>
					<?php if( $user->getRole()->hasRightTo('spiele', 'TabelleAnzeigen') ): ?>
					<li>
						<a href="<?= site_url('spiele/TabelleAnzeigen/'); ?>" class="navlink" title="Tabelle ansehen">Tabelle ansehen</a>
					</li>
					<?php endif; ?>
					<?php if( $user->getRole()->hasRightTo('spiele', 'BeschreibungAnzeigen') ): ?>
					<li>
						<a href="<?= site_url('spiele/BeschreibungAnzeigen/'); ?>" class="navlink" title="Spielbeschreibung ansehen">Spielbeschreibung ansehen</a>
					</li>
					<?php endif; ?>
					
					<?php if( $user->getRole()->hasRightTo('monitoring', 'index') ): ?>
					<!-- Menueinträge Monitor -->
					<li>
						<a href="<?= site_url('monitoring/index/'); ?>" class="navlink" title="Bestenliste anzeigen">Bestenliste anzeigen</a>
					</li>
					<?php endif; ?>
					
					<?php if( $user->getRole()->hasRightTo('events', 'ergebnis') ): ?>				
					<!-- Menueinträge Turnierleitung -->
					<li>
						<a href="<?= site_url('events/ergebnis/'); ?>" class="navlink" title="Ergebnisaufstellung">Ergebnisaufstellung</a>
					</li>
					<?php endif; ?>
					<?php if( $user->getRole()->hasRightTo('teams', 'index') ): ?>
					<li>
						<a href="<?= site_url('teams/index/'); ?>" class="navlink" title="Team&uuml;bersicht">Team&uuml;bersicht</a>
					</li>
					<?php endif; ?>
					<?php if( $user->getRole()->hasRightTo('teams', 'create') ): ?>
					<li>
						<a href="<?= site_url('teams/create/'); ?>" class="navlink" title="Team anlegen">Team anlegen</a>
					</li>
					<?php endif; ?>
					<?php if( $user->getRole()->hasRightTo('spiele', 'index') ): ?>
					<li>
						<a href="<?= site_url('spiele/index/'); ?>" class="navlink" title="Spiel&uuml;bersicht">Spiel&uuml;bersicht</a>
					</li>
					<?php endif; ?>
					<?php if( $user->getRole()->hasRightTo('spiele', 'create') ): ?>
					<li>
						<a href="<?= site_url('spiele/create/'); ?>" class="navlink" title="Spiel anlegen">Spiel anlegen</a>
					</li>
					<?php endif; ?>
					<?php if( $user->getRole()->hasRightTo('events', 'index') ): ?>
					<li>
						<a href="<?= site_url('events/index/'); ?>" class="navlink" title="Event&uuml;bersicht">Event&uuml;bersicht</a>
					</li>
					<?php endif; ?>
					<?php if( $user->getRole()->hasRightTo('events', 'create') ): ?>
					<li>
						<a href="<?= site_url('events/create/'); ?>" class="navlink" title="Event anlegen">Event anlegen</a>
					</li>
					<?php endif; ?>
					
					<?php if( $user->getRole()->hasRightTo('user', 'index') ): ?>
					<!-- Menueinträge Admin -->
					<li>
						<a href="<?= site_url('user/index/'); ?>" class="navlink" title="User&uuml;bersicht">User&uuml;bersicht</a>
					</li>
					<?php endif; ?>
					<?php if( $user->getRole()->hasRightTo('user', 'create') ): ?>
					<li>
						<a href="<?= site_url('user/create/'); ?>" class="navlink" title="User anlegen">&raquo; User anlegen</a>
					</li>
					<?php endif; ?>
					
					<?php if( $user->getRole()->hasRightTo('logout', 'index') ): ?>
					<!-- Logout -->
					<li>
						<a href="<?= site_url('logout/index/'); ?>" class="navlink" title="Logout">Logout</a>
					</li>
					<?php endif; ?>
				</ul>
			</nav>
			
		</header>
		
		<section class="page-row page-row-expanced" id="contentbody">
			