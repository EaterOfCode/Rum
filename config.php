<?php

/**
 * Why $config an array in a PHP file? well if it was an INI it would be alot harder to do vhosts on the same code!
 */

$config = array();

$tplVars = array();

$tplVars['name'] = "Rum";
$tplVars['description'] = "Lustig";

$config['tplVars'] = $tplVars;

$config['theme'] = "default";

$config['db'] = array(
	"dsn"=>"mysql:host=localhost;dbname=rum",
	"user"=>"root",
	"pass"=>"",
	"prefix"=>"rum_"
);

/**
 * Options: rewrite, path, get
 * Rewrite: /user/l33t (you need a rewrite to ?path=/user/l33t)
 * Path: index.php/user/l33t
 * Get: index.php?path=/user/l33t
 */
$config['path'] = "get";
$config['baseUrl'] = '/rum/';