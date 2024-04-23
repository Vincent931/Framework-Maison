<?php 
spl_autoload_register(function($className) {
	if($className!=='PDO'){
	$className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
	include_once './'.$className . '.php';
	}
});