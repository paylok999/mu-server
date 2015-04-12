<?php

class BaseController extends Controller {

	public $data;
	public $account;
	public $hash;
	public $api;
	public $callback;
	
	public function __construct(AccountModel $account)
	{
		$this->api = new StdClass;
		
		$this->hash= md5('muaddictisawesome');
		$hash = Input::get('hash');
		//echo $this->hash;
		if($hash != $this->hash){
			//return Redirect::to('http://youjizz.com');
			header("Location: http://youjizz.com/");
			die('hash not found. Aborting..');
		}
		//$this->antiDdos();
	
		$this->account = $account;
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	public function getAllOnline()
	{
		return DB::table('memb_stat')->where('ConnectStat', 1)->get();
		
	}
	
	public function antiDdos()
	{
		// Assuming session is already started
		$uri = md5($_SERVER['REQUEST_URI']);
		$exp = 3; // 3 seconds
		$hash = $uri .'|'. time();
		if (!isset($_SESSION['ddos'])) {
			$_SESSION['ddos'] = $hash;
		}

		list($_uri, $_exp) = explode('|', $_SESSION['ddos']);
		if ($_uri == $uri && time() - $_exp < $exp) {
			header('HTTP/1.1 503 Service Unavailable');
			// die('Easy!');
			die;
		}

		// Save last request
		$_SESSION['ddos'] = $hash;
	}
}
