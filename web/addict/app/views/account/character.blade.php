<h2>{{$character}}</h2>
<p>Stats</p>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Strength</div>
	<div class="col-md-6 text-left">{{$info->strength}}</div>
</div>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Agility</div>
	<div class="col-md-6 text-left">{{$info->dexterity}}</div>
</div>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Vitality</div>
	<div class="col-md-6 text-left">{{$info->vitality}}</div>
</div>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Energy</div>
	<div class="col-md-6 text-left">{{$info->energy}}</div>
</div>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Command</div>
	<div class="col-md-6 text-left">{{$info->leadership}}</div>
</div>
<p>Level</p>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Level</div>
	<div class="col-md-6 text-left">{{$info->clevel}}</div>
</div>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Master Level</div>
	<div class="col-md-6 text-left">{{$info->mlevel}}</div>
</div>
<p>Duel Record</p>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Wins</div>
	<div class="col-md-6 text-left">{{$info->winduels}}</div>
</div>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Loses</div>
	<div class="col-md-6 text-left">{{$info->loseduels}}</div>
</div>
<p>PK Record</p>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Victim</div>
	<div class="col-md-6 text-left">{{{$pk[0]->victim or '0'}}}</div>
</div>
<p>Others</p>
<div class="row characterinfo">
	<div class="col-md-6 text-right">Zen</div>
	<div class="col-md-6 text-left">{{$info->money}}</div>
</div>