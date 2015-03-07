<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			<h1><?= $pagetitle ?></h1>
			<?= form_open('station/anlegen/', array('class' => 'ajaxform')); ?>
				<label for="stationsname">Name der Station: </label>
				<input type="text" name="stationsname" id="stationsname" pattern=".+?[\s].+?" title="Der Name der Station darf nur alphanummerische Werte enthalten!" required/>
				<label for="bewertungsmasstab">Bewertungsma&szlig;stab: </label>
				<input type="text" name="bewertungsmasstab" id="bewertungsmasstab" list="masstaebe" required/>
				<label for="bewertungsfolge">Bewertungsreihenfolge: </label>
				<input type="text" name="bewertungsfolge" id="bewertungsfolge" list="reihenfolge" required/>
				<label for="beschreibung">Beschreibung: </label>
				<textarea id="beschreibung" name="beschreibung"></textarea>
				<input type="submit" value="anlegen" name="anlegen" id="anlegen" />
			<?= form_close(); ?>
			
			<!-- Eingabelisten -->
			<datalist id="masstaebe">
				<option>Zeit</option>
				<option>Anzahl</option>
			</datalist>
			
			<datalist id="reihenfolge">
				<option>min/schnellste</option>
				<option>max/langsamste</option>
			</datalist>