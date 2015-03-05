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

/* --------------------------------------------------- *
 *	 					Body-Loader	
 * --------------------------------------------------- */
var xmlhttp = new XMLHttpRequest();
var contentbody = document.getElementById('contentbody');
var navlinks = document.getElementsByClassName('navlink');
var forms = document.getElementsByTagName('form');

console.log(forms);

//Alle Navigationslinks durchlaufen
for(var i = 0; i < navlinks.length; i++){
	
	//Event-Listener für Navigationslinks hinzufügen
	navlinks.item(i).addEventListener('click', function(e){
		
		//Standard-Handling unterbinden
		e.preventDefault();
		
		//Menu zumachen
		menu.classList.remove('open');
		
		//AJAX-Call abfeuern
		xmlhttp.open("GET", this.href + "/1" , true);
		xmlhttp.send();
		
	}, false);	
}

findForms();

//Alle Formulare durchlaufen
function findForms(){
	for(var i = 0; i < forms.length; i++){
	
		//Formularen Event-Listener hinzufügen
		forms.item(i).addEventListener('submit', function(e){
			
			alert("sending...");
			
			//Standard-Handling unterbinden
			e.preventDefault();
			
			//AJAX-Call abfeuern
			xmlhttp.open("POST", this.action + "/1", true);
			xmlhttp.send(new FormData(this));
			
		}, false);
	}
}

//Content austauschen
xmlhttp.onreadystatechange = function(){
	//nur wenn erfolgreich
	if (xmlhttp.readyState==4 && xmlhttp.status==200){
		//Content anzeigen
    	contentbody.innerHTML = xmlhttp.responseText;
    	
    	//content auf Forms parsen
    	forms = document.getElementsByTagName('form');
    	findForms();
    	console.log(forms);
  	}
};