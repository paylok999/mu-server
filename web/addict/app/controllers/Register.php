<?php 

class Register extends BaseController
{
	public function index()
	{
		return View::make('register');
		
	}
	
	public function addUser()
	{
		
		
		$postdata = Input::get();
		
		$validator = Validator::make(
			$postdata,
			array(
				'username' => 'required|min:6|max:10',
				'password' => 'required|min:6|max:10',
				'email' => 'required|email|max:50',
				'secreta' => 'required||min:4|max:50',
			)
		);
		
		if($validator->fails()){
			$this->api->callback = 'Something went wrong. Please Check your inputs. Follow the guideline';
			return json_encode($this->api);
			
		}else{
			$checkuser = DB::table('memb_info')
			->where('memb___id', $postdata['username'])
			->orwhere('mail_addr', $postdata['email'])
			->get();
			if(!empty($checkuser)){
				$this->api->callback = 'Username or Emaill address exist. Please Try again';
				return json_encode($this->api);
			}else{
				$userinput = array(
					'memb___id' => Input::get('username'),
					'memb_name' => Input::get('username'),
					'memb__pwd' => Input::get('password'),
					'mail_addr' => Input::get('email'),
					'SecretQuestion' => Input::get('secretq'),
					'SecretAnswer' => Input::get('secreta'),
				);
				
				DB::table('memb_info')->insert($userinput);
				
				$seals = array(
					'AccountID' => Input::get('username'),
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 10,
					'UniqueID3' => 15,
					'InventoryType' => 1,
				);
				
				$sealshealing = array(
					'AccountID' => Input::get('username'),
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 38,
					'UniqueID3' => 63,
					'InventoryType' => 1,
				);
				
				$sealspet = array(
					'AccountID' => Input::get('username'),
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 61,
					'UniqueID3' => 102,
					'InventoryType' => 1,
				);
				
				$sealsring = array(
					'AccountID' => Input::get('username'),
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 59,
					'UniqueID3' => 98,
					'InventoryType' => 1,
				);
				
				$masterseals = array(
					'AccountID' => Input::get('username'),
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 51,
					'UniqueID3' => 81,
					'InventoryType' => 1,
				);
				
				DB::table('T_InGameShop_Items')->insert($seals);
				DB::table('T_InGameShop_Items')->insert($sealshealing);
				DB::table('T_InGameShop_Items')->insert($sealspet);
				DB::table('T_InGameShop_Items')->insert($sealsring);
				DB::table('T_InGameShop_Items')->insert($masterseals);
				$this->api->callback = 1;
				return json_encode($this->api);
			}
		}
		
	}
	
	public function addCoin(){
		//$checkonline = DB::table('memb_stat')->where('ConnectStat', 1)->get();

		//echo count($checkonline);
		//var_dump($checkonline);
		foreach($checkonline as $online){
			$onlinecoin = DB::table('T_InGameShop_Point')->where('AccountID', $online->memb___id)->get();
			//echo count($onlinecoin);
			foreach ($onlinecoin as $coin){
				//echo $coin->AccountID.' | '.$coin->WCoinP.' | '.$coin->WCoinC .'<br>';
				echo $coin->AccountID.'<br>';
				//var_dump($coin);
				//DB::table('T_InGameShop_Point')->where('AccountID', $coin->AccountID)->update(array('WcoinP' => $coin->WCoinP+500, 'WCoinC' => $coin->WCoinC+5000));
				
			}
			//echo $onlinecoin->wcoinc.'<br>';
			
			
		}
		
	}
	
	public function changeOldPassword()
	{
		$oldlogins = DB::table('memb_stat')->whereRaw("ConnectTM <= '2014-12-28'")->get();
		//var_dump(count($oldlogins));die();
		foreach($oldlogins as $oldlogin){
			
			//echo $oldlogin->memb___id.'<br>';
			$accounts = DB::table('memb_info')->select('memb___id', 'memb__pwd')->where('memb___id', $oldlogin->memb___id)->get();
			foreach($accounts as $account){
				//echo $account->memb___id.' '. $account->memb__pwd.'<br>';
				/*DB::table('memb_info')
				->where('memb___id', $account->memb___id)
				->update(array('memb__pwd' => 'pig'.$account->memb__pwd.'sisiw'));*/
			}
		}
		
	}
	
	public function addseals($username)
	{
		$account = new AccountModel;
		return $account->addStartingSeals($username);
	}
	
	public function add1DaySetOfSeals()
	{
		$account = new AccountModel;
		//$account->add1DaySeals('admin01');
		//$checkonline = DB::table('memb_stat')->where('ConnectStat', 1)->get();
		$checkonline = DB::table('memb_info')->get();
		echo count($checkonline).'<br>';
		foreach($checkonline as $online){
			echo $online->memb___id.'<br>';
			$this->addseals($online->memb___id);
		}
	}
}