<?php

class User {
	
	static $db;
	static $users;
	static $_usersByName = array();
	static $_users = array();

	private $row;

	public function __construct($id){
		if(is_array($id)){
			$this->row = (object) $id;
		}else if(is_object($id)){
			$this->row = (object) $id;
		}else if(is_string($id)){
			$this->row = User::$users->find($id);
		}else{
			$this->row = User::$users->findOneBy('username',$id);
		}
		User::$_users[$this->row->id] = $this;
		User::$_usersByName[$this->row->username] = $this;
	}

	public function getUsername(){
		return $this->row->username;
	}

	public function getId(){
		return $this->row->id;
	}

	public function getUrl(){
		return Utils::url(array( "controller" => "user", "username" => $this->getUsername() ));
	}

	public static function getById($id){
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