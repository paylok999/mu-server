 <form id="multipleForm-transfercoin" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-4 control-label">You currently have: </label>
				<div class="col-sm-5">
				<p style="margin-top:7px;margin-bottom:0px;">{{$coins->WCoinP}} WCoinP</p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Username of Receiver</label>
				<div class="col-sm-5">
					<input class="form-control" type="text" name="receiverusername" />
				</div>
			</div>
			<div class="form-group">
			<label class="col-sm-4 control-label">Amount to be transfer</label>
				 <div class="col-sm-5">
					<input class="form-control" type="text" name="amount" />
				</div>
			</div>
			<div class="form-group">
			<label class="col-sm-4 control-label">Confirm Password</label>
				 <div class="col-sm-5">
					<input class="form-control" type="password" name="userpassword" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-4">
					<button type="submit" class="btn btn-primary" id="transfercoin-submit">Transfer</button>
				</div>
			</div>
			<div class="form-group ajax-loader" id="ajax-loader-transfercoinmodal">
				<div class="col-sm-9 col-sm-offset-4">
					<span><img src="{{ URL::to('/') }}/img/loading-spin.svg">&nbsp;Transferring Coins. Please wait...</span>
				</div>
			</div>
	   </form>
<script>

	/**
	* Change password Validation
	*/
	$('#multipleForm-transfercoin').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            receiverusername: {
                validators: {
                    notEmpty: {
                        message: 'Receiver username is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Receiver username should be minimum of 6 and max of 10 characters'
					}
                }
            },
			amount: {
                validators: {
                    notEmpty: {
                        message: 'Amount is required'
                    },
					integer: {
						message: 'Only numbers are allowed'
					}
                }
            },
			userpassword: {
                validators: {
                    notEmpty: {
                        message: 'Your password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Your password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			
			
           
        }
    }).on('success.form.bv', function(e) {
			e.preventDefault();
			$('#ajax-loader-transfercoinmodal').show();
			$('#transfercoin-submit').hide();
			var form = $('#multipleForm-transfercoin');
	
			data = {
				receiverusername : $("[name='receiverusername']", form).val(),
				amount : $("[name='amount']", form).val(),
				userpassword : $("[name='userpassword']", form).val(),
			}
		
			$.ajax({
				type: 'POST',
				url: '/account/coins',
				data: data,
				success: function(data){
					if(data == 1){
						var currentcoin = {{$coins->WCoinP}};
						var minuscoins = $("[name='amount']", form).val();
						var remainingcoin = currentcoin - minuscoins;
						alert('Coins has been transfer successfully! You have ' + remainingcoin  +' coins remaining.');
						location.reload();
					}else{
						alert(data);
						$('#transfercoin-submit').removeAttr('disabled');
						$('#ajax-loader-transfercoinmodal').hide();
						$('#transfercoin-submit').show();
					}
					
				}
			});
	});
</script>