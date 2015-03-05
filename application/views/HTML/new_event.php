<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			<h1><?= $pagetitle ?></h1>
			<?= form_open('events/speichern/'); ?>
				<label for="eventdatum">eventdatum: </label>
				<input type="date" name="eventdatum" id="eventdatum" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" title="Das Eventdatum muss dem Format DD.MM.YYYY entsprechen!" required/>
				<input type="submit" value="anlegen" name="anlegen" id="anlegen" />
			<?= form_close(); ?>
			
			<?php if( $saved ): ?>
			<!-- Rückmeldung an Benutzer -->
			<output class="<?= $success ? "success" : "failure" ?>">
				<?= $msg ?>
			</output>
			<?php endif; ?>