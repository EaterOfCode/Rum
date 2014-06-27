<?php
Class Utils {
	
	public static $config;

	public static $routes;

	public static function route(){
		$path = self::$config['path'] == "path"?$_SERVER['PATH_INFO']:$_GET['path'];
		if($path == '/' || $path == ''){
			return array(
				"controller"=>"index",
				"params"=>array( 'path' => '/' )
			);
		}
		foreach (self::$routes as $key => $value) {
			if($match = self::tryRoute($value['pattern'], $path)){
				return array(
					"params"=>$match,
					"controller"=>$key
				);
			}
		}
	}

	public static function tryRoute($route, $path){
		$params = array("path");
		$reg = str_replace('/','\/',preg_replace_callback('~\[([a-z0-9\.\-_\+]+)\:([a-z0-9\_]+)\](\+|\*|\{[0-9]+(?:,[0-9]+)?\})?~', function($matches) use(&$params) {
			$params[] = $matches[2];
			return '([' . $matches[1] . ']' . $matches[3] . ')';
		}, $route));
	    if(preg_match('~^' . $reg . '$~',$path, $matches)){
			return array_combine($params, $matches);
	    }
		else{
			return false;
		}

	}
}