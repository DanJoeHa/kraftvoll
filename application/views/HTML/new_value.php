<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			<h1><?= $pagetitle ?></h1>
			<?php if( $saved ): ?>
			<!-- Rückmeldung an Benutzer -->
			<output class="<?= $success ? "success" : "failure" ?>">
				<?= $msg ?>
			</output>
			<?php endif; ?>
			
			<?= form_open('spiele/WertungSpeichern/'); ?>
			
				<?php if( !$user->isStation() ): ?>
				<label for="spiel">Spiel: </label>
				<input type="text" name="spiel" id="spiel" list="spiele" required/>
				<datalist id="spiele">
					<option>Bierkrug schubsen</option>
					<option>Hau den Lukas</option>
				</datalist>
				<?php endif; ?>
				
				<label for="team">Teamnummer: </label>
				<input type="number" name="team" id="team" min="1" required/>
				<label for="wertung">Wertung: </label>
				<input type="number" step="any" name="wertung" min="1" id="wertung" required/>
				<input type="submit" value="speichern" name="speichern" id="speichern" />
			<?= form_close(); ?>