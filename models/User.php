<?php

class User extends DrunkModel {

	public static $model;

	static $_usersByName = array();
	static $_users = array();

	private $row;

	public function __construct($id){
		if(is_array($id)){
			$this->row = (object) $id;
		}else if(is_object($id)){
			$this->row = (object) $id;
		}else if(is_string($id)){
			$this->row = (object)User::$model->findOneBy('username',$id);
			if(isset($this->row->scalar) && $this->row->scalar == false){
				$this->row = false;
				return;
			}//else
				//$this->row = $this->row->getRaw();
		}else{
			$this->row = User::$model->find($id);
		}
		User::$_users[$this->row->id] = $this;
		User::$_usersByName[$this->row->username] = $this;
	}

	public function doesExist(){
		return $this->row !== false;
	}

	public function getUsername(){
		return $this->row->username;
	}

	public function getLink(){
		return  "<a href=\"" . $this->getUrl() . "\">" . htmlspecialchars($this->getUsername()) . "</a>";
	}

	public function getId(){
		return $this->row->id;
	}

	public function getUrl(){
		return Utils::build(array( "page" => "user", "params" => array( "username" => $this->getUsername() )));
	}

	public static function getById($id){
		$id = intval($id);
		if(isset(User::$_users[$id]))
			return User::$_users[$id];
		return new User($id);
	}

	public static function getByUsername($id){
		if(isset(User::$_usersByName[$id]))
			return User::$_usersByName[$id];
		return new User($id);
	}
}

User::init('users');
