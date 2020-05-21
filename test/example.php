<?php
	
	require_once __DIR__."vendor/autoload.php";
	use elevenstack\Gencriptor\Gencriptor;

	$hash = new Gencriptor();
	$var = $hash->encString("qualquer caoisa");

	echo $var;