<?php
/**
 *	Load third party libs
 */
$thirdParty = glob(__DIR__ . '/../third party/*.php');
foreach($thirdParty as $lib) require_once($lib);

require __DIR__ . '/tpl.php';

$tplEngine = new RumTemplate(realpath(__DIR__ . '/../../views/' . $config['theme'] . '/'));

$tplEngine->name = $config['name'];
$tplEngine->description = $config['description'];


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
require __DIR__ . '/models/Post.php';

Post::$posts = $posts;
Post::$db = $db;

require __DIR__ . '/models/User.php';

/**
 * load and execute "controller"
 */
$page = (isset($_GET['page']) && preg_match('/^[a-z-_\/]+$/', $_GET['page']))?$_GET['page']:'index';

$pagePath = __DIR__ . '/pages/' . $page . '.php';

if(file_exists($pagePath)){
	require $pagePath;
}else{
	/**
	 * Render 404 template when cant find the controller
	 */
	header('Status: 404 Not Found');
	$tplEngine->error = "Can't find page";
	$tplEngine->render('404');
}