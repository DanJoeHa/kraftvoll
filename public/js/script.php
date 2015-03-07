<?php
header('Content-type: text/javascript');
echo file_get_contents("jquery-2.1.3.min.js")."\r\n";
echo file_get_contents("bootstrap.min.js")."\r\n";
echo file_get_contents("kraftvoll.js")."\r\n";
?>