var charname;

$(document).ready(function() {
    $('#multipleForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Username should be minimum of 6 and max of 10 characters'
					}
                }
            },
			password: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			email: {
                validators: {
                    notEmpty: {
                        message: 'Email is required'
                    },
					emailAddress: {
                        message: 'The value is not a valid email address'
                    }
                }
            },
			secreta: {
                validators: {
                    notEmpty: {
                        message: 'Secret answer is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Secret Answer should be minimum of 6 and max of 10 characters'
					}
                }
            },
           
        }
    }).on('success.form.bv', function(e) {
			e.preventDefault();
			$('#ajax-loader-register').show();
			$('#regform-submit').hide();
			var form = $('#multipleForm');
	
			data = {
				username : $("[name='username']", form).val(),
				password : $("[name='password']", form).val(),
				email : $("[name='email']", form).val(),
				secretq : $("[name='secretq']", form).val(),
				secreta : $("[name='secreta']", form).val(),
			}
		
			$.ajax({
				type: 'POST',
				url: '/register',
				data: data,
				success: function(data){
					if(data == 1){
						alert('Register Successful!');
						location.reload();
					}else{
						alert(data);
						$('#ajax-loader-register').hide();
						$('#regform-submit').show();
						$('#regform-submit').removeAttr('disabled');
					}
					
				}
			});
	});
	
	/**
	* Login Validation
	*/
	$('#multipleForm-login').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username is required'
                    },
					stringLength: {
						min: 5,
						max: 10,
						message: 'Username should be minimum of 5 and max of 10 characters'
					}
                }
            },
			password: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			
			
           
        }
    }).on('success.form.bv', function(e) {
			e.preventDefault();
			$('#ajax-loader-login').show();
			$('#loginform-submit').hide();
			var form = $('#multipleForm-login');
	
			data = {
				username : $("[name='username']", form).val(),
				password : $("[name='password']", form).val(),
				captcha : $("[name='captcha']", form).val(),
			}
			console.log(data.captcha);
			$.ajax({
				type: 'POST',
				url: '/authenticate',
				data: data,
				success: function(data){
					$('#ajax-loader-login').show();
					if(data == 1){
						location.reload();
					}else{
						alert(data);
						$('#ajax-loader-login').hide();
						$('#loginform-submit').show();
						$('#loginform-submit').removeAttr('disabled');
					}
					
				}
			});
	});
	/**
	* Change password Validation
	*/
	$('#multipleForm-changepassword').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            oldpassword: {
                validators: {
                    notEmpty: {
                        message: 'Current Password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'Current Password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			newpassword: {
                validators: {
                    notEmpty: {
                        message: 'New Password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'New Password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			rnewpassword: {
                validators: {
                    notEmpty: {
                        message: 'New Password is required'
                    },
					stringLength: {
						min: 6,
						max: 10,
						message: 'New Password should be minimum of 6 and max of 10 characters'
					}
                }
            },
			
			
           
        }
    }).on('success.form.bv', function(e) {
			e.preventDefault();
			$('#ajax-loader-changepw').show();
			$('#changepassword-submit').hide();
			var form = $('#multipleForm-changepassword');
	
			data = {
				oldpassword : $("[name='oldpassword']", form).val(),
				newpassword : $("[name='newpassword']", form).val(),
				rnewpassword : $("[name='rnewpassword']", form).val(),
			}
		
			$.ajax({
				type: 'POST',
				url: '/account/changepassword',
				data: data,
				success: function(data){
					if(data == 1){
						alert('Your password has been successfully change!');
						location.reload();
					}else{
						alert(data);
						$('#changepassword-submit').removeAttr('disabled');
						$('#ajax-loader-changepw').hide();
						$('#changepassword-submit').show();
					}
					
				}
			});
	});
	
	/**
	* show modal login
	*/
	$(document).on('click', '.account-link', function(e){
		e.preventDefault();
		$('#loginModal').modal({show:true});
	})
	/**
	* show modal changepassword
	*/
	$(document).on('click', '.change-password', function(e){
		e.preventDefault();
		$('#changepasswordModal').modal({show:true});
	})
	
	/**
	* show modal unstock char
	*/
	$(document).on('click', '.unstock-character', function(e){
		e.preventDefault();
		charname = $(this).attr('id');
		$('#ajax-loader-characterstatus').show();
		$('#unstockchar-container').text(charname);
		$('#unstockModal').modal({show:true});
	})
	/**
	* Confirm unstock
	*/
	$(document).on('click', '#unstockchar-submit', function(e){
		e.preventDefault();
		$('#unstockchar-submit').hide();
		$('#ajax-loader-unstock').show();
		data = {
			charname : charname
		}
		$.ajax({
			type: 'POST',
			url: '/account/unstock',
			data: data,
			success: function(data){
				if(data == 1){
					alert('Your character has been unstock successfully!');
					location.reload();
				}else{
					alert(data);
					$('#unstockchar-submit').show();
					$('#ajax-loader-unstock').hide();
				}
			}	
		});
	})
	
	/**
	* show modal character status
	*/
	$(document).on('click', '.character-status', function(e){
		e.preventDefault();
		charname = $(this).attr('id');
		$('#ajax-loader-characterstatus').show();
		$('#resultcharacter').hide();
		$('#characterstatusModal').modal({show:true});
		console.log(charname);
		$.ajax({
			type: 'GET',
			url: '/account/character/'+charname,
			success: function(data){
					$('#resultcharacter').html(data);
					$('#resultcharacter').show();
					$('#ajax-loader-characterstatus').hide();
			}	
		});
	})
	/**
	* confirm ms stat reset
	*/
	$(document).on('click', '#resetms-submit', function(e){
		e.preventDefault();
		$('.btnreset').hide();
		$('#ajax-loader-resetms').show();
		data = {
			charname : charname
		}
		$.ajax({
			type: 'POST',
			url: '/account/msreset',
			data: data,
			success: function(data){
				if(data == 1){
					alert('Your character MS Level has been successfully reset!');
					location.reload();
				}else{
					alert(data);
					$('.btnreset').show();
					$('#ajax-loader-resetms').hide();
				}
			}	
		});
	})
	
	/**
	*ms stat reset button modal
	*/
	$(document).on('click', '.ms-reset', function(e){
		e.preventDefault();
		charname = $(this).attr('id');
		$('#charname-container').text($(this).attr('id'));
		$('#resetmsModal').modal({show:true});
	})
	
	/**
	* stat reset button
	*/
	$(document).on('click', '.stat-reset', function(e){
		e.preventDefault();
		charname = $(this).attr('id');
		$('#charnamestats-container').text($(this).attr('id'));
		$('#resetstatModal').modal({show:true});
	})
	
	/**
	* confirm ms stat reset
	*/
	$(document).on('click', '#resetstat-submit', function(e){
		e.preventDefault();
		$('.btnresetstat').hide();
		$('#ajax-loader-resetstat').show();
		data = {
			charname : charname
		}
		$.ajax({
			type: 'POST',
			url: '/account/statreset',
			data: data,
			success: function(data){
				if(data == 1){
					alert('Your character Stats has been successfully reset!');
					location.reload();
				}else{
					alert(data);
					$('.btnresetstat').show();
					$('#ajax-loader-resetstat').hide();
				}
			}	
		});
	})
	/**
	* show modal transfercoin
	*/
	$(document).on('click', '.transfer-coin', function(e){
		e.preventDefault();
		$('#resultmodules').hide();
		$('#ajax-loader-tranfercoin').show();
		$('#transfercoinModal').modal({show:true});
		$.ajax({
			type: 'GET',
			url: '/account/coins',
			success: function(data){
					$('#resultmodules').html(data);
					$('#resultmodules').show();
					$('#ajax-loader-tranfercoin').hide();
			}	
		});
	})
	
	/**
	* Init page by hash
	*/
	var hashpage = window.location.hash;
	if(hashpage == ''){
		hashpage = '#home';
	}
	loadpage = hashpage.replace('#', '.');
	
	if(loadpage == '.rankings'){
		getPlayerRankings('mlevel');
		getPlayerPkCount('pkcount');
		getPlayerDuelwin('winduels');
		getPlayer2015Top('2015top');
	}
	var divelements = $( hashpage + '-container');
	var negativeheight = divelements.height() + 100;
	divelements.css('margin-top', '-' + negativeheight + 'px');
	
	divelements.show();
	divelements.animate({ "margin-top": "0px" }, 500);
	
	/**
	* Navigation
	*/
	$(document).on('click', '.home-link', function(){
		
		var divelements = $('#home-container');
		var negativeheight = divelements.height() + 100;
		divelements.css('margin-top', '-' + negativeheight + 'px');
		
		$('.body-content').hide();
		divelements.show();
		divelements.animate({ "margin-top": "0px" }, 500);
	});
	
	$(document).on('click', '.register-link', function(){
		
		var divelements = $('#register-container');
		var negativeheight = divelements.height() + 100;
		divelements.css('margin-top', '-' + negativeheight + 'px');
		
		$('.body-content').hide();
		divelements.show();
		divelements.animate({ "margin-top": "0px" }, 500);
	});
	
	$(document).on('click', '.download-link', function(){
		
		var divelements = $('#download-container');
		var negativeheight = divelements.height() + 100;
		divelements.css('margin-top', '-' + negativeheight + 'px');
		
		$('.body-content').hide();
		divelements.show();
		divelements.animate({ "margin-top": "0px" }, 500);
	});
	
	$(document).on('click', '.rankings-link', function(){
		
		
		getPlayerRankings('mlevel');
		getPlayerPkCount('pkcount');
		getPlayerDuelwin('winduels');
		getPlayer2015Top('2015top');
		var divelements = $('#rankings-container');
		var negativeheight = divelements.height() + 100;
		divelements.css('margin-top', '-' + negativeheight + 'px');
		
		$('.body-content').hide();
		divelements.show();
		divelements.animate({ "margin-top": "0px" }, 500);
	});
	
	/**
	*Show hide rightnav
	*/
	$(document).on('click', '.hidethis', function() {
		$('#hideme').hide();
		$('#showme').show();
		  $( "#rightnav-container" ).animate({
			right: "-300px",
		 }, 500, function() {
			// Animation complete.
		});
		
		$( "#showme, #hideme" ).animate({
			right: "0",
		 }, 500, function() {
			// Animation complete.
		});
		
	});
	$(document).on('click', '.showthis', function() {
		$('#hideme').show();
		$('#showme').hide();
		  $( "#rightnav-container" ).animate({
			right: "0",
		 }, 500, function() {
			// Animation complete.
		});
		$( "#showme, #hideme" ).animate({
			right: "290",
		 }, 500, function() {
			// Animation complete.
		});
	});

});

function getPlayerRankings(rankings){
	$.ajax({
		type: 'GET',
		url: '/character/rankings/'+rankings,
		success: function(data){
			$.each(data, function(index, element){
			var returndata = '<div class="row ranking-details-container">\
			<div class="col-md-6 ranking-name">' + element.name + '</div>\
			<div class="col-md-6 ranking-level">' + element.mlevel + '</div>\
			</div>';
			$(returndata).appendTo('.' + rankings);
			$('#' + rankings + '-loader').hide();
		});
					
		}
	});
	
}

function getPlayerPkCount(rankings){
	$.ajax({
		type: 'GET',
		url: '/character/rankings/'+rankings,
		success: function(data){
			$.each(data, function(index, element){
			var returndata = '<div class="row ranking-details-container">\
			<div class="col-md-6 ranking-name">' + element.killer + '</div>\
			<div class="col-md-6 ranking-level">' + element.victim + '</div>\
			</div>';
			$(returndata).appendTo('.' + rankings);
			$('#' + rankings + '-loader').hide();
		});
					
		}
	});
	
}

function getPlayerDuelwin(rankings){
	$.ajax({
		type: 'GET',
		url: '/character/rankings/'+rankings,
		success: function(data){
			$.each(data, function(index, element){
			var returndata = '<div class="row ranking-details-container">\
			<div class="col-md-4 ranking-name">' + element.name + '</div>\
			<div class="col-md-4 ranking-level">' + element.winduels + '</div>\
			<div class="col-md-4 ranking-level">' + element.loseduels + '</div>\
			</div>';
			$(returndata).appendTo('.' + rankings);
			$('#' + rankings + '-loader').hide();
		});
					
		}
	});
	
}


function getPlayer2015Top(rankings){
	$.ajax({
		type: 'GET',
		url: '/character/rankings2015/'+rankings,
		success: function(data){
			$.each(data, function(index, element){
			var returndata = '<div class="row ranking-details-container">\
			<div class="col-md-4 ranking-name">' + element.name + '</div>\
			<div class="col-md-4 ranking-level">' + element.clevel + '</div>\
			<div class="col-md-4 ranking-level">' + element.mlevel + '</div>\
			</div>';
			$(returndata).appendTo('.' + rankings);
			$('#' + rankings + '-loader').hide();
		});
			
		}
	});
	
}