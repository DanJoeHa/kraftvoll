<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			<h1><?= $pagetitle ?></h1>
			<?php if( $saved ): ?>
			<!-- Rückmeldung an Benutzer -->
			<output class="alert <?= $success ? "alert-success" : "alert-danger" ?>">
				<?= $msg ?>
			</output>
			<?php endif; ?>
			
			<?= form_open('spiele/WertungSpeichern/', array('class' => 'ajaxform')); ?>
			
				<?php if( !$user->isStation() ): ?>
				<label for="spiel">Spiel: </label>
				<input type="text" name="spiel" id="spiel" list="spiele" class="form-control" required/>
				<datalist id="spiele">
					<option>Bierkrug schubsen</option>
					<option>Hau den Lukas</option>
				</datalist>
				<?php endif; ?>
				
				<label for="team">Teamnummer: </label>
				<input type="number" name="team" id="team" class="form-control" min="1" required/>
				<label for="wertung">Wertung: </label>
				<input type="number" step="any" name="wertung" min="1" id="wertung" class="form-control" required/>
				<input type="submit" value="speichern" name="speichern" id="speichern" class="btn btn-lg btn-primary btn-block"/>
			<?= form_close(); ?>