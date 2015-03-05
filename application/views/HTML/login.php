<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			<h1><?= $pagetitle ?></h1>
			<?= form_open('login/getMeIn/'); ?>
				<label for="username">Benutzername: </label>
				<input type="text" name="username" id="username" pattern="[a-zA-Z0-9]+" title="Der Benutzername darf nur alphanummerische Werte enthalten!" required/>
				<label for="password">Passwort: </label>
				<input type="password" name="password" id="password" required/>
				<input type="submit" value="login" name="login" id="login" />
			<?= form_close(); ?>