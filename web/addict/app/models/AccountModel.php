<?php

class AccountModel
{
	public function getAllCharacter()
	{
		return DB::table('character')->select('name')->where('AccountID', Auth::user()->username)->get();
	}
	
	public function getCharacterDetailsByName($character)
	{
		return DB::table('character')->select('mlevel')->where('name', $character)->first();
	}
	
	public function getCharacterInfoByName($character)
	{
		return DB::table('character')
		->select(
			'mlevel', 
			'mlpoint',
			'class', 
			'clevel', 
			'leveluppoint', 
			'strength', 
			'dexterity', 
			'vitality', 
			'leadership', 
			'energy', 
			'money', 
			'winduels', 
			'loseduels'
		)
		->where('name', $character)->first();
	}
	
	public function getPKCountByCharname($charname)
	{
		return DB::table('C_PlayerKiller_Info')
			->select(DB::raw('top 1 count(victim) as victim, killer'))
			->where('killer', $charname)
			->groupBy('killer')
			->orderBy('victim', 'desc')
			->get();
	}
	public function getCoinsByUsername($username)
	{
		return DB::table('T_InGameShop_Point')->where('AccountID', $username)->first();
	}
	
	public function checkAccountIfOnline($username)
	{
		return DB::table('memb_stat')->where('memb___id', $username)->first();
	}
	
	public function getMemberAccountByUsername($username)
	{	
		return DB::table('memb_info')->where('memb___id', $username)->first();
	}
	
	public function addStartingSeals($username)
	{
		$seals = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 10,
					'UniqueID3' => 15,
					'InventoryType' => 1,
				);
				
				$sealshealing = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 38,
					'UniqueID3' => 63,
					'InventoryType' => 1,
				);
				
				$sealspet = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 61,
					'UniqueID3' => 102,
					'InventoryType' => 1,
				);
				
				$sealsring = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 59,
					'UniqueID3' => 98,
					'InventoryType' => 1,
				);
				
				$masterseals = array(
					'AccountID' => $username,
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
	}
	
	public function add1DaySeals($username)
	{
		$masterseals = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 51,
					'UniqueID3' => 80,
					'InventoryType' => 1,
				);
				
				$sealspet = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 61,
					'UniqueID3' => 101,
					'InventoryType' => 1,
				);
				
				$sealsring = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 59,
					'UniqueID3' => 97,
					'InventoryType' => 1,
				);
			
				
				DB::table('T_InGameShop_Items')->insert($masterseals);
				DB::table('T_InGameShop_Items')->insert($sealspet);
				DB::table('T_InGameShop_Items')->insert($sealsring);
			
	}
}