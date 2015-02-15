<?php
use Illuminate\Auth\UserInterface;

class MemberUser implements UserInterface {
	public $id;
	public $memb___id;
	public $memb__pwd;

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier() {
		return $this->memb___id;
	}
	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword() {
		return $this->memb__pwd;
	}
	public function getRememberToken(){
		return md5($_SERVER['REMOTE_ADDR']);
	}
	public function setRememberToken($token){
		return md5($_SERVER['REMOTE_ADDR']);
	}
	public function getRememberTokenName(){
		return md5($_SERVER['REMOTE_ADDR']);
	}
}