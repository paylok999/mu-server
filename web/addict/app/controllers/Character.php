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
			->where('name', '!=', 'DL[Mamen]')
			->orderBy($order, 'desc')
			//->remember(10)
			->get();
		}else{
			
			$account = new AccountModel;
			
			$players = DB::table('C_PlayerKiller_Info')
			->select(DB::raw('top 50 count(victim) as victim, killer'))
			->groupBy('killer')
			->orderBy('victim', 'desc')
			->get();
			
			foreach($players as $key => $player){
				
				
				
				$playerinfo[$key] = $player;

				$playerinfo[$key]->pkcount = ($this->getKillTimes($player->killer) - $this->getDiedTimes($player->killer));
				//$playerinfo[$key]->penalty = $this->getPkPenalty($player->killer);
			}
			
			var_dump($playerinfo);
			
		}
	}
	
	public function getDiedTimes($victim)
	{
		return DB::table('C_PlayerKiller_Info')->where('victim', $victim)->count();
		
	}
	
	public function getKillTimes($killer)
	{
		return DB::table('C_PlayerKiller_Info')->where('killer', $killer)->count();
		
	}
	
	public function getPkPenalty($killer)
	{
		$victims = DB::table('C_PlayerKiller_Info')
		->where('killer', $killer)
		->get();
		
		foreach($victims as $key => $victim){
			//var_dump($victim);
			//$id = $data['id'];
			$pktotal[$victim->Victim] = $victim;
			//var_dump($victim);
			//$charinfo = $this->account->getCharacterInfoByName($victim->Victim);
			//var_dump($charinfo);
			
		}
		//var_dump($pktotal);
		//return $penalties;
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
			->where('name', '!=', 'DL[Mamen]')
			->where('mdate','>=', '2015')
			->orderBy('clevel', 'desc')
			->orderBy('mlevel', 'desc')
			//->remember(10)
			->get();

		}
	}

}
