<?php

use Illuminate\Auth\UserProviderInterface;
use Illuminate\Auth\UserInterface as UserInterface;
use Illuminate\Auth\GenericUser;
	
class MemberUserProvider implements UserProviderInterface
{

    public function retrieveByID($identifier)
    {
		try{
			$data = DB::table('memb_info')
			->where('memb_guid', $identifier)
			->first();
			
			$user = array(
				'id' => $data->memb_guid,
				'username' => $data->memb___id,
				'password' => $data->memb__pwd,
			);
		}catch(\Exception $e){
			throw new Exception('Invalid credential. id not found.');
		}
	
		return new GenericUser($user);
    }

    public function retrieveByCredentials(array $credentials)
    {

        try{
			$data = DB::table('memb_info')
			->where('memb___id', $credentials['username'])
			->first();
			
			$user = array(
				'id' => $data->memb_guid,
				'username' => $data->memb___id,
				'password' => $data->memb__pwd,
				'bloc_code' => $data->bloc_code,
			);
		}catch(\Exception $e){
			throw new Exception('Invalid credential. Please try again.');
		}
	
		return new GenericUser($user);
    }

     public function validateCredentials(Illuminate\Auth\UserInterface $user, array $credentials)
     {
		if($user->password != $credentials['password']){
			throw new Exception('Invalid credential. Please try again.');
			
		}else if($user->bloc_code == 1){
			throw new Exception('Account Block. Please contact Support - Gatsby');
			
		}else{
			return true;
		}
     }
	 
	 public function updateRememberToken(\Illuminate\Auth\UserInterface $user, $token)
	 {
		 
	 }
	 
	 public function retrieveByToken($identifier, $token)
	 {
		 
	 }
}