<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			</section>
			
			<footer>
				&copy; 2015 Johannes Haag (Support: 0170 - 3116273)
			</footer>

		</div>
		<!-- close Wrapper -->
		
		<!-- Navigationsmenu -->
		<script>
			
			var menuicon = document.getElementById('menuicon');
			var menu = document.querySelector('nav ul');
			
			menuicon.addEventListener('click', function(){
				
				if( menu.classList.contains('open') ){
					menu.classList.remove('open');
				}else{
					menu.classList.add('open');
				}
				
			}, false);
			
		</script>
		
	</body>
</html>