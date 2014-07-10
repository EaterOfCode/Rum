<?php

class Post extends DrunkModel {

	public static $model;

	private $row;

	static $posts;
	static $db;

	public function __construct($id){
		if(is_array($id)){
			$this->row = (object)$id;
		}else if(is_object($id)){
			$this->row = (object)$id;
		}else{
			$this->row = Post::$model->find($id);
		}
	}

	public function getLink(){
		return Utils::build(array(
			"page"=>"category",
			"params"=>array(
				"id"=>$this->row->id,
				"title"=> preg_replace('~[^a-z0-9]+~i', '-', $this->row->title)
			)
		));
	}

	public function getTitle(){
		return $this->row->title;
	}

	public function getId(){
		return $this->row->id;
	}

	public function getCreated(){
		return $this->row->created;
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
		return false!==strpos($this->row->flags,'C');
	}

	public function isSticky(){
		return false!==strpos($this->row->flags,'S');
	}

	public function isEdited(){
		return false!==strpos($this->row->flags,'E');
	}

	public function isClosed(){
		return false!==strpos($this->row->flags,'D');
	}

	public function isPost(){
		return false!==strpos($this->row->flags,'P');
	}

	public function isReply(){
		return false!==strpos($this->row->flags,'R');
	}

	public function getText(){
		return $this->row->text;
	}

	public static function getRepliesById($id){
		return array_map(function($row){
			return new Post($row->getRaw());
		}, self::$model->findMany("parentId = ? AND flags LIKE '%R%'",array($id)));
	}

	public static function getListById($id){
		$query = "SELECT * FROM {{posts}} WHERE parentId = '".intval($id)."' ORDER BY flags LIKE '%C%' DESC, flags LIKE '%S%' DESC, created";
		$objArray = array_map(function($row){
			return new Post($row);
		}, Utils::$db->command()->setSql($query)->queryAll());
		return array_reduce($objArray,function($a,$b){
			$a[$b->isCategory()?'categories':($b->isPost()?'posts':'replies')][] = $b;
			return $a;
		},array( 'categories'=>array(), 'posts'=>array(), 'replies'=>array() ));
	}

	public static function create($userId, $title, $text, $flags, $parentId){
		return self::$model->insert(array(
			"title"=>$title,
			"post"=>$text,
			"flags"=> $flags,
			'parentId'=>$parentId,
			'userId'=>$userId,
			'created'=>date("Y-m-d H:i:s")
		));
	}


}

Post::init('posts');
