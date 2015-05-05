-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 05. Mai 2015 um 09:08
-- Server Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `usr_web168_18`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eventgames`
--

CREATE TABLE IF NOT EXISTS `eventgames` (
  `event` int(11) NOT NULL,
  `game` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eventteams`
--

CREATE TABLE IF NOT EXISTS `eventteams` (
  `event` int(11) NOT NULL,
  `team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eventusers`
--

CREATE TABLE IF NOT EXISTS `eventusers` (
  `user` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `game` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `game`
--

CREATE TABLE IF NOT EXISTS `game` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `measurement` varchar(10) NOT NULL,
  `order` varchar(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `game`
--

INSERT INTO `game` (`id`, `name`, `description`, `measurement`, `order`) VALUES
(11, 'Schlammparcour', 'lalla', 'Zeit', 'ASC'),
(13, 'Schlammparcour', 'lalla', 'Zeit', 'ASC'),
(15, 'Schlammparcour', 'lalla', 'Zeit', 'ASC'),
(17, 'Schlammparcour', 'lalla', 'Zeit', 'ASC'),
(19, 'Schlammparcour', 'lalla', 'Zeit', 'ASC'),
(21, 'Schlammparcour', 'lalla', 'Zeit', 'ASC'),
(23, 'Schlammparcour', 'lalla', 'Zeit', 'ASC'),
(25, 'Schlammparcour', 'lalla', 'Zeit', 'ASC'),
(27, 'Schlammparcour', 'lalla', 'Zeit', 'ASC'),
(29, 'Schlammparcour', 'lalla', 'Zeit', 'ASC'),
(31, 'Schlammparcour', 'lalla', 'Zeit', 'ASC');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `game` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `results`
--

INSERT INTO `results` (`game`, `team`, `event`, `value`) VALUES
(24, 19, 22, 5),
(26, 21, 23, 15),
(28, 23, 24, 15),
(30, 25, 25, 15);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Leitung'),
(3, 'Registration'),
(4, 'Station'),
(5, 'Monitor');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team`
--

CREATE TABLE IF NOT EXISTS `team` (
`id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `leader` varchar(25) NOT NULL,
  `member` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `role`) VALUES
(1, 'adm_jhaag', 'bc441fb95c5aabeee28a0ed4d85f68e7', 1),
(2, 'ltg_jhaag', 'b516bcbe29c82c4019a696137bc48b95', 2),
(3, 'reg_jhaag', '53dca81fbdbbf113638cbbba5c0912c3', 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `eventgames`
--
ALTER TABLE `eventgames`
 ADD PRIMARY KEY (`event`,`game`);

--
-- Indizes für die Tabelle `eventteams`
--
ALTER TABLE `eventteams`
 ADD PRIMARY KEY (`event`,`team`);

--
-- Indizes für die Tabelle `eventusers`
--
ALTER TABLE `eventusers`
 ADD PRIMARY KEY (`user`,`event`);

--
-- Indizes für die Tabelle `game`
--
ALTER TABLE `game`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `results`
--
ALTER TABLE `results`
 ADD PRIMARY KEY (`game`,`team`,`event`);

--
-- Indizes für die Tabelle `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`name`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `event`
--
ALTER TABLE `event`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `game`
--
ALTER TABLE `game`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT für Tabelle `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `team`
--
ALTER TABLE `team`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;