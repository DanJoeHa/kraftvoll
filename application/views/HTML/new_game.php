<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			<h1><?= $pagetitle ?></h1>
			<?= form_open('spiele/speichern/'); ?>
				<label for="spielname">Spielname: </label>
				<input type="text" name="spielname" id="spielname" pattern="[a-zA-Z0-9 ]+" title="Der Spielname darf nur alphanummerische Werte enthalten!" required/>
				<label for="wertungsgrundlage">Wertungsgrundlage: </label>
				<input type="text" name="wertungsgrundlage" id="wertungsgrundlage" list="wertungsgrundlagen" placeholder="Bitte w&auml;hlen..." required/>
				<datalist id="wertungsgrundlagen">
					<option>Zeit</option>
					<option>Anzahl</option>
				</datalist>
				<label for="bewertungsfolge">Bewertungsreihenfolge: </label>
				<input type="text" name="bewertungsfolge" id="bewertungsfolge" list="bewertungsfolgen" placeholder="Bitte w&auml;hlen..." required />
				<datalist id="bewertungsfolgen">
					<option>min</option>
					<option>max</option>
				</datalist>
				<label for="beschreibung">Beschreibung: </label>
				<textarea id="beschreibung" name="beschreibung">Beschreibung eintragen</textarea>
				<input type="submit" value="anlegen" name="anlegen" id="anlegen" />
			<?= form_close(); ?>
			
			<?php if( $saved ): ?>
			<!-- Rückmeldung an Benutzer -->
			<output class="<?= $success ? "success" : "failure" ?>">
				<?= $msg ?>
			</output>
			<?php endif; ?>