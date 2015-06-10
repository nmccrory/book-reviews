<html>
	<head>
		<title>Welcome</title>
		<link rel="stylesheet" href="/assets/css/materialize.css">
	</head>
	<body>
		<div class="container">
			<div class='row'>
				<h3>Welcome!</h3>
			</div>
		</div>
		<div class='container'>
			<div class='row'>
				<div class="col s5">
					<h5>Register</h5>
					<form action="register" method='post'>
						First Name<input type="text" name='first_name'>
						Last Name<input type="text" name='last_name'>
						Alias<input type="text" name='alias'>
						Email<input type="text" name='email'>
						Password<input type="password" name='password'>
						<p>*Password should be at least 8 characters</p>
						Confirm Password<input type="password" name='confirm_password'>
						<button type='submit'>Register</button>
					</form>
				</div>
				<div class='col s4 offset-s1'>
					<h5>Login</h5>
					<form action="login" method="post">
						Email<input type="text" name='email'>
						Password<input type="password" name='password'>
						<button type='submit'>Login</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>