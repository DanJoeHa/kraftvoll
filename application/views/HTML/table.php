<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			
			<table>
				<tr>
				<?php foreach($rows as $row): ?>
					
					<?php foreach($row as $key=>$value): ?>
						
						<th><?= $key ?></th>
						
					<?php endforeach; ?>

				<?php break; endforeach; ?>
				</tr>
				
				<?php foreach($rows as $row): ?>
				<tr>
					
					<?php foreach($row as $key=>$value): ?>
						
						<th><?= $value ?></th>
						
					<?php endforeach; ?>
					
				</tr>
				<?php endforeach; ?>	
			</table>