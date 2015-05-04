/**
 * @author Johannes Haag
 */
/* Formular absenden via AJAX */
$('form').submit(function(e){
	//Submit unterbinden
	e.preventDefault();
	
	//Button austauschen
	
	
	//Ziel-Adresse und Formulardaten holen
	var url = $(this).attr('action');
	var data = $(this).serialize();
	var modul = $(this).parent('article').attr('id');
	
	//Formulardaten wegsenden
	$.ajax({
		url: url,
		method: 'post',
		data: data
	}).done(function(response){
		
		//Success
		if( $(response).find('success').text() == '1' ){
			
			//wenn Login-Form
			if( modul == 'login' ){
				
				//Startseite anzeigen
				changePageTo('welcome');
				
				//Navigationsmenü erstellen
				$('#navicon').removeClass('invisible').addClass('visible');
				var role = $(response).find('role').text();
				$( '.' + role.toLowerCase() ).removeClass('invisible').addClass('visible');
				
			}
			
			//Formular leeren
			alert( $(this) );
			alert( $( modul ).find('form') );
			$( modul ).find('form')[0].reset();
			
			// Erfolgsmeldung an User geben
			$('#message').removeClass('invisible failure').addClass('visible success').text( $(response).find('message').text() );
			
		}else{
			
			// Fehlermeldung an User geben
			$('#message').removeClass('invisible success').addClass('visible failure').text( $(response).find('message').text() );
			
		}
		
	});
	
});

/* Navigationsmenü einblenden */
$('#navicon').click(function(e){
	
	//Default Link unterbinden
	e.preventDefault();
	
	//prüfe, ob Navigationsmenü eingeblendet ist
	if( $('nav ul').hasClass('invisible') ){
		$('nav ul').removeClass('invisible').addClass('visible');
	}else{
		$('nav ul').addClass('invisible').removeClass('visible');
	}
	
});

/* Seitenwechsel einleiten */
$('nav ul li a').click(function(e){
	
	//Default Link unterbinden
	e.preventDefault();
	
	//Seite wechseln
	changePageTo( $(this).attr('href') );
	
	//Navigationsmenü ausblenden
	$('nav ul').addClass('invisible');
	
});

/* Seitenwechsel */
function changePageTo( target ){
	
	//derzeit aktives Modul ausblenden
	$('article.visible').addClass('invisible').removeClass('visible');
	
	//Meldung ausblenden
	$('#meldung').addClass('invisible').removeClass('visible');
	
	//Targetmodul einblenden
	$( target ).removeClass('invisible').addClass('visible');
	
} 
