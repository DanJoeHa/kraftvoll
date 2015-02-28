<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			
			<?= form_open('station/WertungSpeichern/'); ?>
				<label for="team">Teamnummer: </label>
				<input type="number" name="team" id="team" min="1" required/>
				<label for="wertung">Wertung: </label>
				<input type="number" name="wertung" id="wertung" required/>
				<input type="submit" value="speichern" name="speichern" id="speichern" />
			<?= form_close(); ?>
			
			<output>
				Hier kommt die Ausgabe, dass erfolgreich gespeichert wurde.
			</output>