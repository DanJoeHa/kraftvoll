<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			<h1><?= $pagetitle ?></h1>
			<?= form_open('user/speichern/'); ?>
				<label for="username">Benutzername: </label>
				<input type="text" name="username" id="username" pattern="[a-zA-Z0-9 ]+" title="Der Benutzername darf nur alphanummerische Werte enthalten!" required/>
				<label for="rolle">Rolle: </label>
				<input type="text" name="rolle" id="rolle" list="rollen" placeholder="Bitte w&auml;hlen..." required/>
				<datalist id="rollen">
					<option>Station</option>
					<option>Monitor</option>
					<option>Leitung</option>
					<option>Admin</option>
				</datalist>
				<input type="submit" value="anlegen" name="anlegen" id="anlegen" />
			<?= form_close(); ?>
			
			<?php if( $saved ): ?>
			<!-- Rückmeldung an Benutzer -->
			<output class="<?= $success ? "success" : "failure" ?>">
				<?= $msg ?>
			</output>
			<?php endif; ?>