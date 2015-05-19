/**
 * @author Johannes Haag
 */
/* Foundation Framework aktivieren */
$(document).foundation();

/* TODO: Anzeige Login nur, wenn User nicht bereits eingeloggt */

/* Formular absenden via AJAX */
$('form').submit(function(e){
	
	//Submit unterbinden
	e.preventDefault();
	
	//Anzeige Loader
	$('#loader').show();
		
	//Ziel-Adresse und Formulardaten holen
	var url = $(this).attr('action');
	var data = $(this).serialize();
	var modul = $(this).parent('article').attr('id');
	
	//Formulardaten wegsenden
	$.ajax({
		url: url,
		method: 'post',
		data: data,
		error: function(response){
			
			// Ausgabe Fehlermeldung
			$('#message').find('p').text( 'Es ist ein Kommunikationsfehler aufgetreten: ERROR' + response.status );
			$('#message').removeClass('invisible success').addClass('visible warning');
			
			//Loader ausblenden
			$('#loader').hide();
		}
	}).done(function(response){
		
		//Success
		if( $(response).find('success').text() == '1' ){
			
			//wenn Login-Form
			if( modul == 'login' ){
				
				// Antwort verarbeiten
				process_response_login( response );
				
			}
			
			//Formular leeren
			$( '#' + modul ).find('form').get(0).reset();
			
			// Erfolgsmeldung an User geben
			$('#message').find('p').text( $(response).find('message').text() );
			$('#message').removeClass('invisible warning').addClass('visible success');
			
			
		}else{
			
			// Fehlermeldung an User geben
			$('#message').find('p').text( $(response).find('message').text() );
			$('#message').removeClass('invisible success').addClass('visible warning');
			
		}
		
		//Loader ausblenden
		$('#loader').hide();
		
	});
	
});

/* Seitenwechsel einleiten */
$('nav ul li a').click(function(e){
	
	//Default Link unterbinden
	e.preventDefault();
	
	//Ziel herausfinden
	var target = $(this).attr('href');
	
	//Seite wechseln, wenn valide ID angegeben
	if( target != '#' ) changePageTo( target );
	
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
			method: 'post',
			error: function(response){
				
				// Ausgabe Fehlermeldung
				$('#message').find('p').text( 'Es ist ein Kommunikationsfehler aufgetreten: ERROR' + response.status );
				$('#message').removeClass('invisible success').addClass('visible warning');
				
				//Loader ausblenden
				$('#loader').hide();
			}
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
					
					//Zeilen ausgeben
					$( target ).find('tbody').html( output );	
				}
				
				//Ausgabe als Optionsliste
				if( $( response ).find('output').text() == 'select' ){
					
					$( response ).find( 'options' ).each(function( ){
						
						$( response ).find( 'option' ).each(function( ){
							
							//Optionen einfügen
							$( target ).find( 'select' ).append( new Option( $( this ).find('name').text(), $( this ).find('id').text() ) );
						});
					});
					
				}
				
			
			//Fail
			}else{
				
				// Fehlermeldung an User geben
				$('#message').find('p').text( $(response).find('message').text() );
				$('#message').removeClass('invisible success').addClass('visible warning');

			}
			
			//Loader ausblenden
			$( '#loader' ).fadeOut();
		});
		
	}
	
} 

/* Logout */
$('#logout').click(function(){
	
	// User ausloggen
	localStorage.removeItem( 'userid' );
	
	//Navigationsmenu ausblenden
	$('.menu-icon').removeClass('visible').addClass('invisible');
	$('.left li, .right li').removeClass('visible').addClass('invisible');
	
	//Homelink zurücksetzen
	$('#homelink').attr('href', '#login');
	
});

function process_response_login( response ){
	
	// Userdaten speichern
	localStorage.setItem('userid', $( response ).find('user').find('id').text() );
	
	//Startseite anzeigen
	changePageTo('#welcome');
	
	//Homelink auf Startseite ändern
	$('#homelink').attr('href', '#welcome');
	
	//Navigationsmenü erstellen
	$('.menu-icon').removeClass('invisible').addClass('visible');
	var role = $(response).find('role').text();
	$( '.' + role.toLowerCase() ).removeClass('invisible').addClass('visible');
	
	//Spiel-Einheit setzen
	var unit = $(response).find('game').find('unit').text();
	$('#unit').text( unit + ":");
	
	//Spiel-Beschreibung setzen
	var desc = $( response ).find('game').find('description').text();
	$('#description').find('p').html( desc );
	
	//Events einfügen
	$( response ).find('events').find('event').each( function(){
		
		$('#eventchooser').append( new Option( $( this ).find('date').text(), $( this ).find('id').text() ) );
		
	});
	
	//Aktives Event setzen
	$( '#eventchooser' ).val( $( response).find('events').find('active').find('id').text() ).prop('selected', 'selected');
	
	//Aktives Event Beschreibung setzen
	desc = $( response ).find('events').find('active').find('description').text();
	$( '#welcome' ).find('p').html( desc );
	
}
