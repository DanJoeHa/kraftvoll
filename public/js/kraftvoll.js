/* --------------------------------------------------- *
 * 					Navigationsmenu
 * --------------------------------------------------- */			
var menuicon = document.getElementById('menuicon');
var menu = document.querySelector('nav ul');

menuicon.addEventListener('click', function(){
	
	if( menu.classList.contains('open') ){
		menu.classList.remove('open');
	}else{
		menu.classList.add('open');
	}
	
}, false);	