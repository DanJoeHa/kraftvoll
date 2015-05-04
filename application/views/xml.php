<?php

	function to_xml(SimpleXMLElement $object, array $data) {
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				$new_object = $object -> addChild($key);
				to_xml($new_object, $value);
			} else {
				$object -> addChild($key, $value);
			}
		}
	}
	
	$xml = new SimpleXMLElement('<kraftvoll/>');
	to_xml($xml, $values);
	print $xml->asXML();
?> 