<?php

class Post {
	
	private $row;
	
	static $posts;
	static $db;

	public function __construct($id){
		if(is_array($id)){
			$this->row = (object)$id;
		}else if(is_object($id)){

		}else{
			$this->row = Post::$posts->find($id);
		}
	}
	
	public function getTitle(){
		return $this->row->title;
	}

	public function getId(){
		return $this->row->id;	
	}

	public function getCreator(){
		return User::getById($this->row->userId);
	}

	public function getReplies(){
		return Post::getRepliesById($this->row->id);
	}
	
	public function getList(){
		return Post::getListById($this->row->id);
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
		return array_map(function($row){
			return new Post($row->getRaw());
		}, self::$posts->findMany('parentId = ?',array($id)));
	}
	
	public static function getListById($id){
		$query = "SELECT * FROM {{posts}} WHERE parentId = '".intval($id)."' ORDER BY flags LIKE '%C%' DESC, flags LIKE '%S%' DESC, created";
		return array_map(function($row){
			return new Post($row);
		},self::$db->command()->setSql($query)->queryAll());
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