<?php

class Shop extends BaseController
{
	public function showItems()
	{
		$this->data['shoppingitems'] = $this->getAllItems();
		return $this->data['shoppingitems'];
		//return View::make('shop/shop', $this->data);
	}
	
	public function showCheckout()
	{
		$this->data['shoppingitems'] = $this->getAllItems();
		return View::make('shop/shop', $this->data);
	}
	public function getAllItems()
	{
		return DB::table('onlineshop')->orderBy('id', 'asc')->get();
	}
	
	public function getAllItemsByUsername($username)
	{
		$getcheckout = DB::table('onlineshopcheckout')
		->where('username', $username)
		->orderBy('id', 'asc')->get();
		
		$allitems = array();
		$itemcount = array();
		$itemprice = array();
		$itemid = array();
		foreach($getcheckout as $checkout)
		{
			$items = DB::table('onlineshop')->where('id', $checkout->cartnumber)->first();
			$allitems[] = $items;
			$itemcount[] = $checkout->cartcount;
			$itemprice[] = $checkout->cartcount * $items->itemprice;
			$itemid[] = $checkout->id;
		}
		$this->data['shoppingitems'] = $allitems;
		$this->data['itemcount'] = $itemcount;
		$this->data['itemprice'] = $itemprice;
		$this->data['itemid'] = $itemid;
		
		return $this->data;
	}
	
	public function addCart()
	{
		$inputs = Input::all();
		unset($inputs['hash']);
		DB::table('onlineshopcheckout')->insert($inputs);
		return 1;
	}
	
	public function deleteItem($id)
	{
		$itemid = Input::get('cartnumber');
		//var_dump($itemid);
		DB::table('onlineshopcheckout')->where('id', $id)->delete();
		return 1;
		
	}
	
	public function cancel()
	{
		return View::make('shop/cancel', $this->data);
	}
	
	public function complete()
	{
		return View::make('shop/complete', $this->data);
	}
}