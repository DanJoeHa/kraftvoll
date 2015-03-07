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
			
			<?= form_open('teams/speichern/', array('class' => 'ajaxform')); ?>
				<label for="teamname">Teamname: </label>
				<input type="text" name="teamname" id="teamname" pattern="[a-zA-Z0-9 ]+" title="Der Teamname darf nur alphanummerische Werte enthalten!" required/>
				<label for="teamleader">Teamleader: </label>
				<input type="text" name="teamleader" id="teamleader" pattern="[a-zA-Z0-9 ]+" title="Der Name des Teamleders darf nur alphanummerische Werte enthalten!" required/>
				<label for="member1">Teammitglied 1: </label>
				<input type="text" name="member1" id="member1" pattern="[a-zA-Z0-9 ]+" title="Der Name des Teammitglieds darf nur alphanummerische Werte enthalten!" />
				<label for="member2">Teammitglied 2: </label>
				<input type="text" name="member2" id="member2" pattern="[a-zA-Z0-9 ]+" title="Der Name des Teammitglieds darf nur alphanummerische Werte enthalten!" />
				<label for="member3">Teammitglied 3: </label>
				<input type="text" name="member3" id="member3" pattern="[a-zA-Z0-9 ]+" title="Der Name des Teammitglieds darf nur alphanummerische Werte enthalten!" />
				<label for="member4">Teammitglied 4: </label>
				<input type="text" name="member4" id="member4" pattern="[a-zA-Z0-9 ]+" title="Der Name des Teammitglieds darf nur alphanummerische Werte enthalten!" />
				<label for="member5">Teammitglied 5: </label>
				<input type="text" name="member5" id="member5" pattern="[a-zA-Z0-9 ]+" title="Der Name des Teammitglieds darf nur alphanummerische Werte enthalten!" />
				<input type="submit" value="anlegen" name="anlegen" id="anlegen" />
			<?= form_close(); ?>