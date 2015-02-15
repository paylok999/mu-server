@include('header')
<div class="container" id="main-container">
<h1> Mu Philippines Registration </h1>
<p>Our website is currently under construction. Please use this form to register with us. our website is mobile compatible. You may use your phone or tablet to register</p>
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
		<label class="col-sm-4 control-label">Captcha</label>
         <div class="col-sm-5">
            {{HTML::image(Captcha::img(), 'Captcha image')}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-4">
            <button type="submit" class="btn btn-default" id="regform-submit">Register</button>
        </div>
    </div>
</form>
<div class="container">
	<div id="download-link">
	<a href="http://www.mediafire.com/download/96rl1zkmxkb6t6v/Wigle.rar"> <button type="submit" class="btn btn-primary" id="regform-submit">Download Client</button>
	</div>
</div>
</div>
</body>
</html>