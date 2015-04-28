<?php
$note=<<<XML
<envelope>
<success>TRUE</success>
<role>monitor</role>
</envelope>
XML;

$xml = new SimpleXMLElement($note);
echo $xml->asXML();
?> 