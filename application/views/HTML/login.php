<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			<h1><?= $pagetitle ?></h1>
			<?= form_open('login/getMeIn/', array('class' => 'form-signin')); ?>
				<h2 class="form-signin-heading">Bitte melde dich an</h2>
				<label for="benutzername">Benutzername: </label>
				<input type="text" name="benutzername" id="benutzername" class="form-control" pattern="[a-zA-Z0-9]+" title="Der Benutzername darf nur alphanummerische Werte enthalten!" required autofocus/>
				<label for="password">Passwort: </label>
				<input type="password" name="password" id="password" class="form-control" required/>
				<input type="submit" value="login" name="login" id="login" class="btn btn-lg btn-primary btn-block"/>
			<?= form_close(); ?>
