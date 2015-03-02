<?php
	/*
	 * Debug-Ausgabe der übergebenen Variablen. Aufruf über debugvar( $var )
	 * 
	 * @param $var Die zu debuggende Variable
	 * @author Johannes Haag, 10.01.2015
	 */
	function debugvar( $var, $varname = "" ){
		echo "<pre>";
		if( !empty( $varname ) ) echo "<strong>$varname:</strong> ";
		print_r( $var );
		echo "</pre>";
	}
?>