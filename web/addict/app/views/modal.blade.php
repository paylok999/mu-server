<!-- start login modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Account Authentication </h4>
      </div>
      <div class="modal-body">
       <form id="multipleForm-login" method="post" class="form-horizontal">
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
				<div class="col-sm-9 col-sm-offset-4">
					<button type="submit" class="btn btn-primary" id="loginform-submit">Login</button>
				</div>
			</div>
			<div class="form-group ajax-loader" id="ajax-loader-login">
				<div class="col-sm-9 col-sm-offset-4">
					<span><img src="{{ URL::to('/') }}/img/loading-spin.svg">&nbsp;Logging you in. Please wait...</span>
				</div>
			</div>
	   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--end login modal -->

<!-- start changepassword modal -->
<div class="modal fade" id="changepasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Password </h4>
      </div>
      <div class="modal-body">
       <form id="multipleForm-changepassword" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-4 control-label">Old Password</label>
				<div class="col-sm-5">
					<input class="form-control" type="password" name="oldpassword" />
				</div>
			</div>
			<div class="form-group">
			<label class="col-sm-4 control-label">New Password</label>
				 <div class="col-sm-5">
					<input class="form-control" type="password" name="newpassword" />
				</div>
			</div>
			<div class="form-group">
			<label class="col-sm-4 control-label">Repeat New Password</label>
				 <div class="col-sm-5">
					<input class="form-control" type="password" name="rnewpassword" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-4">
					<button type="submit" class="btn btn-primary" id="changepassword-submit">Change</button>
				</div>
			</div>
			<div class="form-group ajax-loader" id="ajax-loader-changepw">
				<div class="col-sm-9 col-sm-offset-4">
					<span><img src="{{ URL::to('/') }}/img/loading-spin.svg">&nbsp;Changing Password. Please wait...</span>
				</div>
			</div>
	   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--end changepassword modal -->

<!-- start transfercoin modal -->
<div class="modal fade" id="transfercoinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Transfer Coin </h4>
      </div>
      <div class="modal-body">
		<div id="resultmodules">
		</div>
		<div class="form-group ajax-loader" id="ajax-loader-tranfercoin">
			<span><img src="{{ URL::to('/') }}/img/loading-spin.svg">&nbsp;Loading Modules. Please wait...</span>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--end transfercoin modal -->

<!-- start MS reset modal -->
<div class="modal fade" id="resetmsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Master Stat Reset - Please read before proceeding</h4>
      </div>
      <div class="modal-body" style="text-align:center">
		<p>This will module will reset the character name </p>
		<h2 id="charname-container"></h2>
		<p>This is a premium server and will cost you 2000 WCoinP and is irreversable and non refundable.</p>
		<p>Press "Reset Me" to reset the Master skill level of character name above or cancel to cancel this transaction</p>
	<button type="submit" class="btn btn-primary btnreset" id="resetms-submit">Reset Me!</button>
		<button type="button" class="btn btn-danger btnreset" data-dismiss="modal">Cancel</button>
			
		<div class="form-group ajax-loader" id="ajax-loader-resetms">
			<span><img src="{{ URL::to('/') }}/img/loading-spin.svg">&nbsp;Resetting MS Level. Please wait...</span>
		</div>
      </div>
      <div class="modal-footer">
		<p style="text-align:center">You need to logout your account in order to proceed with this service</p>
      </div>
    </div>
  </div>
</div>
<!--end MS reset modal -->


<!-- start stat reset modal -->
<div class="modal fade" id="resetstatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Stat Reset - Please read before proceeding</h4>
      </div>
      <div class="modal-body" style="text-align:center">
		<p>This will module will reset the stats character name </p>
		<h2 id="charnamestats-container"></h2>
		<p>This is a premium server and will cost you 1000 WCoinP and is irreversable and non refundable.</p>
		<p>Press "Reset Me" to reset the Stats skill level of character name above or cancel to cancel this transaction</p>
	<button type="submit" class="btn btn-primary btnresetstat" id="resetstat-submit">Reset Me!</button>
		<button type="button" class="btn btn-danger btnresetstat" data-dismiss="modal">Cancel</button>
			
		<div class="form-group ajax-loader" id="ajax-loader-resetstat">
			<span><img src="{{ URL::to('/') }}/img/loading-spin.svg">&nbsp;Resetting Stats. Please wait...</span>
		</div>
      </div>
      <div class="modal-footer">
		<p style="text-align:center">You need to logout your account in order to proceed with this service</p>
      </div>
    </div>
  </div>
</div>
<!--end stat reset modal -->

<!-- start transfercoin modal -->
<div class="modal fade" id="characterstatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Character Status</h4>
      </div>
      <div class="modal-body" style="text-align:center">
		<div id="resultcharacter">
		</div>
		<div class="form-group ajax-loader" id="ajax-loader-characterstatus">
			<span><img src="{{ URL::to('/') }}/img/loading-spin.svg" style="max-width:100px;width:100%">&nbsp;Loading Character. Please wait...</span>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--end transfercoin modal -->


<!-- start unstock modal -->
<div class="modal fade" id="unstockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Unstock Character</h4>
      </div>
      <div class="modal-body" style="text-align:center">
	  <p>This will module will move your character to lorencia </p>
		<h2 id="unstockchar-container"></h2>
		<p>Use this feature if you cannot open your character or is trap on map that is not existing.</p>
		<p>Press "Unstock" to move your character to lorencia.</p>
		<button type="submit" class="btn btn-primary btnreset" id="unstockchar-submit">Unstock!</button>

		<div class="form-group ajax-loader" id="ajax-loader-unstock">
			<span><img src="{{ URL::to('/') }}/img/loading-spin.svg">&nbsp;Moving Character. Please wait...</span>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--end unstock modal -->