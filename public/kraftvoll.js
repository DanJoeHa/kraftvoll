/**
 * @author Johannes Haag
 */
/* Formular absenden via AJAX */
$('form').submit(function(e){
	//Submit unterbinden
	e.preventDefault();
	
	//Anzeige Loader
	$('#loader').fadeIn();
	
	
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
				changePageTo('#welcome');
				
				//Navigationsmenü erstellen
				$('#navicon').removeClass('invisible').addClass('visible');
				var role = $(response).find('role').text();
				$( '.' + role.toLowerCase() ).removeClass('invisible').addClass('visible');
				
				//Einheit setzen
				var unit = $(response).find('unit').text();
				$('#unit').text( unit + ":");
				
				//Event setzen
				$( '#eventchooser' ).append( $('<option>', {
					value: 1,
					text: '17.08.2015'
				}));
			}
			
			//Formular leeren
			$( modul ).find('form')[0].reset();
			
			// Erfolgsmeldung an User geben
			$('#message').removeClass('invisible failure').addClass('visible success').text( $(response).find('message').text() );
			
		}else{
			
			// Fehlermeldung an User geben
			$('#message').removeClass('invisible success').addClass('visible failure').text( $(response).find('message').text() );
			
		}
		
		//Loader ausblenden
		$('#loader').fadeOut();
		
	});
	
});

/* Navigationsmenü einblenden */
$('#navicon').click(function(e){
	
	//Default Link unterbinden
	e.preventDefault();
	
	//prüfe, ob Navigationsmenü eingeblendet ist
	if( $('nav ul').hasClass('visible') ){
		$('nav ul').removeClass('visible').slideUp();
	}else{
		$('nav ul').slideDown().addClass('visible');
	}
	
});

/* Seitenwechsel einleiten */
$('nav ul li a').click(function(e){
	
	//Default Link unterbinden
	e.preventDefault();
	
	//Seite wechseln
	changePageTo( $(this).attr('href') );
	
	//Navigationsmenü ausblenden
	$('nav ul').removeClass('visible').fadeOut();
	
});

/* Seitenwechsel */
function changePageTo( target ){
	
	//derzeit aktives Modul ausblenden
	$('article.visible').addClass('invisible').removeClass('visible');
	
	//Meldung ausblenden
	$('#meldung').addClass('invisible').removeClass('visible');
	
	//Targetmodul einblenden
	$( target ).removeClass('invisible').addClass('visible');
	
	//Prüfen, ob Daten onLoad geladen werden müssen
	if( $( target ).attr('data-onload') ){
		
		//Loader einblenden
		$( '#loader' ).fadeIn();
		
		//Daten via AJAX anfragen
		$.ajax({
			url: $( target ).attr('data-onload'),
			method: 'post'
		}).done(function(response){
			
			//Success
			if( $(response).find('success').text() == '1' ){
				
				//Ausgabe als Tabelle
				if( $(response).find('output').text() == 'table' ){
					//Rückgabe-Html vorbereiten
					var output = "";
					
					//Tabellen-Ausgabe
					$( response ).find( 'row' ).each( function(){
							
							//Zeile beginnen
							output += "<tr>";
							
							$( this ).find( 'cell' ).each( function(){
								
								//Zellen hinzufügen
								output += "<td>" + $( this ).text() + "</td>";
								
							});
							
							//Zeile beenden
							output += "</tr>";
							
					});
					
					//Html ausgeben
					$( target ).find('tbody').html( output );	
				}
				
				//Ausgabe als Optionsliste
				if( $( response ).find('output').text() == 'select' ){
					
					$( response ).find( 'options' ).each(function( ){
						
						//Optionen einfügen
						$( target ).find( 'select' ).append( new Option( $( this ).find('name').text(), $( this ).find('id').text() ) );
					});
					
				}
				
			
			//Fail
			}else{
				
				// Fehlermeldung an User geben
				$('#message').removeClass('invisible success').addClass('visible failure').text( $(response).find('message').text() );
			}
			
			//Loader ausblenden
			$( '#loader' ).fadeOut();
		});
		
	}
	
} 
