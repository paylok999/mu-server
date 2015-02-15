<?php

class Account extends BaseController
{
	public $msstatreset = 2000;
	public $statreset = 1000;
	
	public function showAllCharacter($username)
	{
		return DB::table('character')->select('name')->where('AccountID', $username)->get();
	}
	
	public function changePassword($username)
	{
		$postdata = Input::get();
		
		$validator = Validator::make(
			$postdata,
			array(
				'oldpassword' => 'required|min:6|max:10',
				'newpassword' => 'required|min:6|max:10',
				'rnewpassword' => 'required|min:6|max:10',
			)
		);
		
		if($validator->fails()){
			$this->api->callback = 'Something went wrong. Please Check your inputs. Follow the guideline';
				return json_encode($this->api);
			
		}else{
			$userdetail = $this->getUserDetail($username);
			if($postdata['oldpassword'] != $userdetail->memb__pwd){
				$this->api->callback = 'Your input current password did not match on whats in our system. Please try again.';
				return json_encode($this->api);
			}else if($postdata['newpassword'] != $postdata['rnewpassword']){
				$this->api->callback = 'New password and Repeat new password did not match. Please Try again.';
				return json_encode($this->api);
			}else{
				
				DB::table('memb_info')
				->where('memb___id', $username)
				->update(array('memb__pwd' => ($postdata['newpassword'])));
				$this->api->callback = 1;
				return json_encode($this->api);
			}
		}
	}
	
	public function getUserDetail($username)
	{
		return DB::table('memb_info')->where('memb___id', $username)->first();
	}
	
	/* load transfer coin modules*/
	public function getCoinTransferForm($username)
	{
		return json_encode($this->account->getCoinsByUsername($username));
	}
	
	/*POST transfercoin*/
	public function transferCoin()
	{
		$postdata = Input::get();
		
		$validator = Validator::make(
			$postdata,
			array(
				'username' => 'required|min:5|max:10',
				'receiverusername' => 'required|min:5|max:10',
				'amount' => 'required|numeric',
				'userpassword' => 'required|min:6|max:10',
			)
		);
		if($validator->fails()){
			$this->api->callback = 'Something went wrong. Please Check your inputs. Follow the guideline. reason: '. $validator->messages();
			return json_encode($this->api);
			
		}else{
			$checkifonline = $this->account->checkAccountIfOnline($postdata['username']);
			$checkifonlinereceiver = $this->account->checkAccountIfOnline($postdata['receiverusername']);

			if($checkifonlinereceiver == null){
				$this->api->callback = 'Receiver username not found. Please try again';
				return json_encode($this->api);
			}else if($checkifonline->ConnectStat == 1){
				$this->api->callback = 'Your account is online. Please logout first in game.';
				return json_encode($this->api);
			}else if($checkifonlinereceiver->ConnectStat == 1){
				$this->api->callback = 'Receiver account is online. Please logout first in game.';
				return json_encode($this->api);
			}
			$checkuser = $this->account->getMemberAccountByUsername($postdata['receiverusername']);
			if($checkuser == NULL){
				$this->api->callback = 'Username not found. Please try again.';
				return json_encode($this->api);
			}else{
				$currentcoins = $this->account->getCoinsByUsername($postdata['username']);
				if($postdata['amount'] > $currentcoins->WCoinP){
					$this->api->callback = 'You do not have this amount of coin. Please try again.';
					return json_encode($this->api);
				}else{
					$checksenderuser = $this->account->getMemberAccountByUsername($postdata['username']);
					//var_dump($checksenderuser->memb__pwd);
					if($postdata['userpassword'] != $checksenderuser->memb__pwd){
						$this->api->callback = 'You have entered invalid password. Please try again.';
						return json_encode($this->api);
					}else{
						$sendercoin = $this->account->getCoinsByUsername($postdata['username']);
						$receivercoin = $this->account->getCoinsByUsername($postdata['receiverusername']);
						/*minus sender*/
						DB::table('T_InGameShop_Point')
						->where('AccountID', $sendercoin->AccountID)
						->update(array('WCoinP' => $sendercoin->WCoinP - $postdata['amount']));
						/*add receiver*/
						DB::table('T_InGameShop_Point')
						->where('AccountID', $receivercoin->AccountID)
						->update(array('WCoinP' => $receivercoin->WCoinP + $postdata['amount']));
						$this->api->callback = 1;
						return json_encode($this->api);
					}
				}
				
			}
		}
		//var_dump(Input::all());
		//$this->account->getMemberAccountByUsername()
		//return 1;
	}
	
	public function resetMSReset()
	{
		$charname = Input::get();
		$validator = Validator::make(
			$charname,
			array(
				'username' => 'required|min:4|max:10',
				'charname' => 'required|min:4|max:10',
			)
		);
		if($validator->fails()){
			$this->api->callback = 'Something went wrong. Please Check your inputs. Follow the guideline. reason: '. $validator->messages();
			return json_encode($this->api);
			
		}else{
			$charinfo = $this->account->getCharacterDetailsByName($charname['charname']);
			
			$checkifonline = $this->account->checkAccountIfOnline($charname['username']);
			if($checkifonline->ConnectStat == 1){
				$this->api->callback = 'Your account is online. Please logout first in game.';
				return json_encode($this->api);
			}else if($charinfo == NULL){
				$this->api->callback = 'Character not found. Please try again.';
				return json_encode($this->api);
			}else if($charinfo->mlevel <= 0){
				$this->api->callback = 'Not enough level for master skill. Please choose different character';
				return json_encode($this->api);
				
			}else{
				$currentcoins = $this->account->getCoinsByUsername($charname['username']);
				if($currentcoins->WCoinP < $this->msstatreset){
					$this->api->callback = 'You do not have this amount of coin. Please try again.';
					return json_encode($this->api);
				}else{
					//minus coin
					$usercoin = $this->account->getCoinsByUsername($charname['username']);
					DB::table('T_InGameShop_Point')
					->where('AccountID', $usercoin->AccountID)
					->update(array('WCoinP' => $usercoin->WCoinP - $this->msstatreset));
					
					//reset msstat
					DB::table('character')
					->where('name', $charname['charname'])
					->update(array('MagicList' => DB::raw('Convert(varbinary(60),NULL)'), 'mlPoint' => $charinfo->mlevel));
					
					$this->api->callback = 1;
					return json_encode($this->api);
				}
			}
		}
	}
	/*character stat reset*/
	public function resetStats()
	{
		$charname = Input::get();
		$validator = Validator::make(
			$charname,
			array(
				'username' => 'required|min:4|max:10',
				'charname' => 'required|min:4|max:10',
			)
		);
		if($validator->fails()){
			$this->api->callback = 'Something went wrong. Please Check your inputs. Follow the guideline. reason: '. $validator->messages();
			return json_encode($this->api);
			
		}else{
			$charinfo = $this->account->getCharacterInfoByName($charname['charname']);
			
			$checkifonline = $this->account->checkAccountIfOnline($charname['username']);
			if($checkifonline->ConnectStat == 1){
				$this->api->callback = 'Your account is online. Please logout first in game.';
				return json_encode($this->api);
			}else if($charinfo == NULL){
				$this->api->callback = 'Character not found. Please try again.';
				return json_encode($this->api);
			}else if($charinfo->clevel <= 150){
				return 'Not enough level for reset. Atleast level 150 is allowed. Please choose different character';
				
			}else{
				$currentcoins = $this->account->getCoinsByUsername($charname['username']);
				if($currentcoins->WCoinP < $this->statreset){
					$this->api->callback = 'You do not have this amount of coin. Please try again.';
					return json_encode($this->api);
				}else{
					//minus coin
					$usercoin = $this->account->getCoinsByUsername($charname['username']);
					DB::table('T_InGameShop_Point')
					->where('AccountID', $usercoin->AccountID)
					->update(array('WCoinP' => $usercoin->WCoinP - $this->statreset));
					
					$totalstats = ($charinfo->strength + $charinfo->dexterity + $charinfo->vitality + $charinfo->energy + $charinfo->leadership + $charinfo->leveluppoint) - 100;
					
					//reset stats
					DB::table('character')
					->where('name', $charname['charname'])
					->update(array('strength' => 25, 'dexterity' => 25, 'vitality' => 25, 'energy' => 25 , 'leveluppoint' => $totalstats));
					
					$this->api->callback = 1;
					return json_encode($this->api);
				}
			}
		}
	}
	/*show character details*/
	public function getCharacterDetailsInfo($charname)
	{
		return json_encode($this->account->getCharacterInfoByName($charname));
	}
	
	public function getCharacterDetailsPk($charname)
	{
		return $this->account->getPKCountByCharname($charname);
	}
	
	public function unstockCharacter()
	{
		$charname = Input::get();
		$validator = Validator::make(
			$charname,
			array(
				'charname' => 'required|min:6|max:10',
			)
		);
		if($validator->fails()){
			$this->api->callback = 'Something went wrong. Please Check your inputs. Follow the guideline. reason: '. $validator->messages();
			return json_encode($this->api);
			
		}else{
			$checkifonline = $this->account->checkAccountIfOnline($charname['username']);
			if($checkifonline->ConnectStat == 1){
				$this->api->callback = 'Your account is online. Please logout first in game.';
				return json_encode($this->api);
			}else{
				DB::table('character')->where('name', $charname['charname'])->update(array('mapnumber' => 0, 'MapPosX' => 140, 'MapPosY' => 127));
				$this->api->callback = 1;
				return json_encode($this->api);
			}
		}
		
	}
}