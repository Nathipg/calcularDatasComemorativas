<?php
	ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    ini_set('html_errors', 1);
    error_reporting(E_ALL);

	date_default_timezone_get('Brazil/East');

	function carregarClasses( $nomeClasse ) {
		require 'classes/' . $nomeClasse . '.php';
	}

	spl_autoload_register('carregarClasses');
?>