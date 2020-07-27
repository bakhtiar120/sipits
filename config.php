<?php 
define ('DB_HOST', 'localhost'); 
//Username 
define ('DB_USERNAME', ''); 
//Pass 
define ('DB_PASS', '');  
//Database Name 
define ('DB_NAME', 'sipits'); 
//Root Directory 
$root = "http://".$_SERVER['HTTP_HOST']; 
// $root = str_replace("http://", "https://", $root);
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define ('ROOT_DIR', $root);
