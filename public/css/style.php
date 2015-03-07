<?php
header('Content-type: text/css');
echo '@charset "UTF-8"'."\r\n";
echo file_get_contents("bootstrap.min.css")."\r\n";
echo file_get_contents("bootstrap-theme.min.css")."\r\n";
echo file_get_contents("style.css")."\r\n";
?>