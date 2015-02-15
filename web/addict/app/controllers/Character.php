<?php

class Character extends BaseController
{
	public $limit = 20;
	
	public function getTop($order = 'mlevel')
	{
		$orderlimit = array('mlevel', 'pkcount', 'winduels');
		if(!in_array($order, $orderlimit))
			die();
		if($order == 'mlevel' || $order == 'winduels'){
			return DB::table('character')
			->select(DB::raw('TOP 20 name,mlevel, winduels, loseduels, pkcount'))
			->where('ctlcode', 0)
			->where('name', '!=', 'mamen***')
			->where('name', '!=', 'Rfmamen**')
			->where('name', '!=', 'babymamen')
			->orderBy($order, 'desc')
			//->remember(10)
			->get();
		}else{
			return DB::table('C_PlayerKiller_Info')
			->select(DB::raw('top 20 count(victim) as victim, killer'))
			->groupBy('killer')
			->orderBy('victim', 'desc')
			->remember(10)
			->get();
			
		}
	}
	
	public function getBloodCastleRankings()
	{
		return DB::connection('sqlsrv_rankings')->table('EVENT_INFO_BC_5TH')
			->select(DB::raw('top 20 SUM (Point*PlayCount) as totalpoints, CharacterName'))
			->groupBy('CharacterName')
			->orderBy('totalpoints', 'desc')
			//->remember(10)
			->get();
		
	}
	public function get2015TopPlayer($order)
	{
		if($order == '2015top'){
			return DB::table('character')
			->select(DB::raw('TOP 20 name,mlevel, clevel'))
			->where('ctlcode', 0)
			->where('mdate','>=', '2015')
			->orderBy('clevel', 'desc')
			->orderBy('mlevel', 'desc')
			//->remember(10)
			->get();

		}
	}

}