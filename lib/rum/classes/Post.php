<?php

class Post {
	
	private $row;
	
	static $posts;
	
	public function __construct($id){
		
		$this->row = $posts->find($id);
		
	}
	
	public function getReplies(){
		return Post::getRepliesById($this->row->id);
	}
	
	public function isCategory(){
		return false!==strpos('C', $this->row->flags);
	}
	
	public function isSticky(){
		return false!==strpos('S', $this->row->flags);
	}
	
	public function isEdited(){
		return false!==strpos('E', $this->row->flags);
	}
	
	public function isClosed(){
		return false!==strpos('D', $this->row->flags);
	}
	
	public static function getRepliesById($id){
		return self::$posts->findMany('parentId = ?',array($id));
	}
	
	public static function getListById($id){
		
		$query = "SELECT * FROM {{posts}} WHERE parentId = '".intval($id)."' ORDER BY flags LIKE '%C%' DESC, flags LIKE '%S%' DESC, created"
		
		return self::$posts->findMany();
	}
	
	public static function create($userId, $title, $text, $flags, $parentId){
		return $posts->insert(array(
			"title"=>$title,
			"post"=>$text,
			"flags"=> $flags,
			'parentId'=>$parentId,
			'userId'=>$userId,
			'created'=>date("Y-m-d H:i:s")
		));
	}
	
	
}