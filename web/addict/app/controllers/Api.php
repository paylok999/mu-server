<?php

class Api extends BaseController 
{
	public function showAllOnline()
	{
		return DB::table('memb_stat')->where('ConnectStat', 1)->get();
		
	}
}
