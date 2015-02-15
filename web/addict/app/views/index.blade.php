@include('header')
<div id="container-padding">
</div>
<div class="container" id="main-container">
	<div id="home-container" class="body-content">
		<h1> Announcement</h1>
		<div class="announcement-wrapper">
		<h2>Weekend Warrior</h2>
		<h3>Author: Gatsby</h3> 
		<h3>Date: January 9, 2015</h3>
			<p>Good day Mutizen, As our community grows, we decided to put a weekend warrior every weekend. So what is weekend warrior? Every weekend, there woul be a boost on experience and drop rates.
			<ul>
			<li>100% Experience Bonus to all maps</li>
			<li>100% Drop rates Bonus to all maps</li>
			</ul>
			<p>Bonus start at 7pm Friday night and will end 12am Monday Morning</p>
			<p>So what are you waiting for? Get online now!</p>
			<p>Account concern, contact me <a href="https://www.facebook.com/profile.php?id=100008642380772" target="_blank">Gatsby</a>. Other technical concern, you may also contact me.</p>
		</div>
		<div class="announcement-wrapper">
		<h2>Premium service activated</h2>
		<h3>Author: Gatsby</h3> 
		<h3>Date: January 5, 2015</h3>
			<p>Good day Mutizen, Master Level and Stat Reset is now ready to use. Additionally, you may now unstock your character and check its detail such as stats, player kill, pvp, etc. through our site. Account concern, contact me <a href="https://www.facebook.com/profile.php?id=100008642380772" target="_blank">Gatsby</a>. Other technical concern, you may also contact me.</p>
		</div>
		<div class="announcement-wrapper">
		<h2>New features has been added</h2>
		<h3>Author: Gatsby</h3> 
		<h3>Date: January 3, 2015</h3>
			<p>Good day Mutizen, Transfer of WCoinP on our site has been enable. You may transfer your CoinP like crazy. Also, /offtrade command was enable for you to trade your items via WCoinC using your store. Master reset and other modules will be enable tomorrow, so stay tuned! Let me know if you got issue with the said modules. <a href="https://www.facebook.com/profile.php?id=100008642380772" target="_blank">Gatsby</a>. Other technical concern, you may also contact me.</p>
		</div>
		<div class="announcement-wrapper">
		<h2>Account related and technical concern</h2>
		<h3>Author: Gatsby</h3> 
		<h3>Date: December 29, 2014</h3>
			<p>Hello. For those player that were having issue with their accounts, please do contact me on facebook <a href="https://www.facebook.com/profile.php?id=100008642380772" target="_blank">Gatsby</a>. Other technical concern, you may also contact me.</p>
		</div>
		<div class="announcement-wrapper">
		<h2>Welcome to Mu Philippines</h2>
		<h3>Author: Gatsby</h3> 
		<h3>Date: December 29, 2014</h3>
			<p>First of all, thanks for supporting our server even though we might have some hard time sometimes. Rest assured our server will continue to server you. With or without player, our server will be up 24/7</p>
		</div>
		<div class="announcement-wrapper">
		<h2>New website under construction</h2>
		<h3>Author: Gatsby</h3> 
		<h3>Date: December 29, 2014</h3>
			<p>In order to serve you better, the management has decided to use a custom made website just for your. The benefit of this is, we are not lock with modules on the current Mu Core system provided by IGN</p>
			<p>What are the benefits of new website? We can insert our own custom made features such as</p>
			<li>Transfer Coin</li>
			<li>Stat/MS reset</li>
			<li>Online market via wcoin</li>
			<p>Plus our website is made on top of <a href="http://laravel.com/" target="_blank">Laravel Framework</a> which is the cutting edge and robust framework right now available in market</p>
		</div>
		<div class="announcement-wrapper">
		<h2>Change of Administrator</h2>
		<h3>Author: Gatsby</h3> 
		<h3>Date: December 29, 2014</h3>
			<p>Hello! As you've probably know, i am the new administrator of muphilippines.ph. Hopefully we could all get along together as i will do my best to serve you better</p>
		</div>
	</div>
	<div id="register-container" class="body-content">
		<h1> Mu Philippines Registration </h1>
		<p>Please fill up the form below to register.</p>
		<form id="multipleForm" method="post" class="form-horizontal">
			
			<div class="form-group">
				<label class="col-sm-4 control-label">Username</label>
				<div class="col-sm-5">
					<input class="form-control" type="text" name="username" />
				</div>
			</div>
			<div class="form-group">
			<label class="col-sm-4 control-label">Password</label>
				 <div class="col-sm-5">
					<input class="form-control" type="password" name="password" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Email</label>
				 <div class="col-sm-5">
					<input class="form-control" type="text" name="email" />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-4 control-label">Secret Question</label>
				 <div class="col-sm-5">
					<select name="secretq" class="form-control">
						<option value="1">What is your mother's maiden name?</option>
						<option value="2">What was the name of your first school?</option>
						<option value="3">Who is your favorite super hero?</option>
						<option value="4">What is the name of your first pet?</option>
						<option value="5">What was your favorite place to visit as a child?</option>
						<option value="6">Who is your favorite cartoon character?</option>
						<option value="7">What was the first video game you played?</option>
						<option value="8">What was the name of your first teacher?</option>
						<option value="9">What was your favorite TV show as a child?</option>
						<option value="10">What city was your mother born in?</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Secret Answer</label>
				 <div class="col-sm-5">
					<input class="form-control" type="text" name="secreta" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-4">
					<button type="submit" class="btn btn-default" id="regform-submit">Register</button>
				</div>
			</div>
			<div class="form-group ajax-loader" id="ajax-loader-register">
				<div class="col-sm-8 col-sm-offset-4">
					<span><img src="{{ URL::to('/') }}/img/loading-spin.svg">&nbsp;Creating Account. Please wait...</span>
				</div>
			</div>
		</form>
	</div>
	<div id="download-container" class="body-content">
		<span class="glyphicon glyphicon-download download-icon"></span>
		<p>Please click the button below to download our game client. If you've go trouble wiht our client, kindly contact us <a href="https://www.facebook.com/profile.php?id=100008642380772" target="_blank">Gatsby</a>.</p>
		<a href="http://www.mediafire.com/download/96rl1zkmxkb6t6v/Wigle.rar"> 
			<button type="submit" class="btn btn-primary">Download Client</button>
		</a>
		<p>Required. Official patch and launcher. Download and extract to your MU folder directory</p>
		<a href="https://www.mediafire.com/?p3bvybz3q532dt4" target="_blank"> 
			<button type="submit" class="btn btn-primary">Launcher</button>
		</a>
		<p>Annoyed on Javascript popup?. Download and extract this also to your MU folder directory </p>
		<a href="https://www.mediafire.com/?ud9n9i3di1k57an" target="_blank"> 
			<button type="submit" class="btn btn-primary">Popup fix</button>
		</a>
		<p>Dot Net version error? Download and Install offline installer below</p>
		<a href="http://www.microsoft.com/en-us/download/details.aspx?id=40779" target="_blank"> 
			<button type="submit" class="btn btn-primary">Microsoft .NET Framework 4.5.1 </button>
		</a>
		<p>Autoclose or not loading? Download and Install Microsoft C++ Redistributable 2013 x86 or x64 below </p>
		<a href="http://www.microsoft.com/en-us/download/confirmation.aspx?id=40784&6B49FDFB-8E5B-4B07-BC31-15695C5A2143=1" target="_blank"> 
			<button type="submit" class="btn btn-primary">Microsoft C++ Redistributable 2013</button>
		</a>
		<p>Still having issue? Message me <a href="https://www.facebook.com/profile.php?id=100008642380772" target="_blank">Gatsby</a> and i will help you</p>
	</div>
	<div id="rankings-container" class="body-content">
		<h1>Top 20 Players</h1>
		<p>Please wait atleast 10 minutes to propagate your scores</p>
		<div class="row rankings-wrapper">
			 <div class="col-md-3 rankings-area mlevel">
				<h3>Master Level</h3>
					<div class="row ranking-details-container">
						<div class="col-md-6 ranking-name">Name</div>
						<div class="col-md-6 ranking-name">MS Level</div>
					</div>
					<div class="rankings-loader" id="mlevel-loader">
						<img src="{{ URL::to('/') }}/img/loading-spin.svg">
						<span>Loading...</span>
					</div>
				</div>
			 <div class="col-md-3 rankings-area pkcount">
				<h3>PK Count</h3>
					<div class="row ranking-details-container">
						<div class="col-md-6 ranking-name">Killer</div>
						<div class="col-md-6 ranking-name">Victims</div>
					</div>
					<div class="rankings-loader" id="pkcount-loader">
						<img src="{{ URL::to('/') }}/img/loading-spin.svg">
						<span>Loading...</span>
					</div>
				</div>
			 <div class="col-md-3 rankings-area winduels">
			 <h3>Duel Master</h3>
					<div class="row ranking-details-container">
						<div class="col-md-4 ranking-name">Name</div>
						<div class="col-md-4 ranking-name">Wins</div>
						<div class="col-md-4 ranking-name">Loses</div>
					</div>
					<div class="rankings-loader" id="winduels-loader">
						<img src="{{ URL::to('/') }}/img/loading-spin.svg">
						<span>Loading...</span>
					</div>
			 </div>
			 <div class="col-md-3 rankings-area 2015top">
			 <h3>2015 Top Players</h3>
					
					<div class="row ranking-details-container">
						<div class="col-md-4 ranking-name">Name</div>
						<div class="col-md-4 ranking-name">Level </div>
						<div class="col-md-4 ranking-name">MS Level</div>
					</div>
					<div class="rankings-loader" id="2015top-loader">
						<img src="{{ URL::to('/') }}/img/loading-spin.svg">
						<span>Loading...</span>
					</div>
			 </div>
		</div>
	</div>
</div>
@include('footer')
@include('modal')
</body>
</html>