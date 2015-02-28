<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			
			<?= form_open('login/'); ?>
				<label for="username">Benutzername: </label>
				<input type="text" name="username" id="username" pattern=".+?[\s].+?" title="Der Benutzername darf nur alphanummerische Werte enthalten!" />
				<label for="password">Passwort: </label>
				<input type="password" name="password" id="password" />
				<input type="submit" value="login" name="login" id="login" />
			<?= form_close(); ?>