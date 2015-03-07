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
		<link rel="stylesheet" href="<?= base_url(); ?>/public/css/style.php" />
		
	</head>
	<body>
	
	<!-- Navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-user"></span> <?= $user->getUsername(); ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
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
						<a href="<?= site_url('spiele/TabelleAnzeigen/'); ?>" class="navlink" title="Tabelle ansehen">Tabelle</a>
					</li>
					<?php endif; ?>
					<?php if( $user->getRole()->hasRightTo('spiele', 'BeschreibungAnzeigen') ): ?>
					<li>
						<a href="<?= site_url('spiele/BeschreibungAnzeigen/'); ?>" class="navlink" title="Spielbeschreibung ansehen">Spielbeschreibung</a>
					</li>
					<?php endif; ?>
					
					<?php if( $user->getRole()->hasRightTo('monitoring', 'index') ): ?>
					<!-- Menueinträge Monitor -->
					<li>
						<a href="<?= site_url('monitoring/index/'); ?>" class="navlink" title="Bestenliste anzeigen">Bestenliste</a>
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
					
					<?php if( $user->isAdmin() || $user->isLeitung() ): ?>
					<li class="dropdown">
						 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administration <span class="caret"></span></a>
              				<ul class="dropdown-menu" role="menu">
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
									<a href="<?= site_url('user/create/'); ?>" class="navlink" title="User anlegen">User anlegen</a>
								</li>
								<?php endif; ?>
						</ul>
					</li>
					<?php endif; ?>
					
					<?php if( $user->getRole()->hasRightTo('logout', 'index') ): ?>
					<!-- Logout -->
					<li>
						<a href="<?= site_url('logout/index/'); ?>" title="Logout">Logout</a>
					</li>
					<?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	
	
	
		<header>
			&nbsp;			
		</header>
		
		<section id="contentbody" class="container">	