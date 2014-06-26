<?php
/**
 *	Load third party libs
 */
$thirdParty = glob(__DIR__ . '/../third party/*.php');
foreach($thirdParty as $lib) require_once($lib);

/**
 * Init DB connection
 */
$db = new TinyDB($config['db']['dsn'], $config['db']['user'], $config['db']['pass'],array(
	'prefix'=>$config['db']['prefix']
));

$posts = $db->factory('@{{posts}}');
$users = $db->factory('@{{users}}');

/**
 * Load models
 */
include __DIR__ . '/classes/Post.php';

Post::$posts = $posts;

include __DIR__ . '/classes/User.php';

/**
 * load and execute "controller"
 */
$page = (isset($_GET['page']) && preg_match('/^[a-z-_]+$/'))?$_GET['page']:'index';

include __DIR__ . '/pages/' . $page . '.php';