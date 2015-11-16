<?php

if ($_SERVER['HTTP_HOST'] == 'localhost')
	return [
	    'class' => 'yii\db\Connection',
	    'dsn' => 'mysql:host=localhost;dbname=vikend',
	    'username' => 'root', 'password' => 'root',
	    'charset' => 'utf8',
	];

else 
	return [
	    'class' => 'yii\db\Connection',
	    'dsn' => 'mysql:host=localhost;dbname=gdezavik_end',
	    'username' => 'gdezavik_boss', 'password' => 'Ws5zfW%!aEeJ',
	    'charset' => 'utf8',
	];
?>