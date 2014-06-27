<?php

/**
 * Why $config an array in a PHP file? well if it was an INI it would be alot harder to do vhosts on the same code!
 */

$config = array();

$config['name'] = "My own alcoholic forum";
$config['description'] = "Anonymous, but not really";

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
$config['baseUrl'] = '/';