/* --------------------------------------------------- *
 *	 					Body-Loader	
 * --------------------------------------------------- */
var xmlhttp = new XMLHttpRequest();
var contentbody = document.getElementById('contentbody');
var navlinks = document.getElementsByClassName('navlink');
var forms;

//Alle Navigationslinks durchlaufen
for(var i = 0; i < navlinks.length; i++){
	
	//Event-Listener für Navigationslinks hinzufügen
	navlinks.item(i).addEventListener('click', function(e){
		
		//Standard-Handling unterbinden
		e.preventDefault();
		
		//AJAX-Call abfeuern
		xmlhttp.open("GET", this.href + "/1" , true);
		xmlhttp.send();
		
		//Navigation schließen
		
		
	}, false);	
}

findForms();

//Alle Formulare durchlaufen
function findForms(){
	//Alle Ajax-Forms suchen
	forms = document.getElementsByClassName('ajaxform');
	
	for(var i = 0; i < forms.length; i++){
	
		//Formularen Event-Listener hinzufügen
		forms.item(i).addEventListener('submit', function(e){
			
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
    	findForms();

  	}
};