<html>
	<head>
		<title>Books Home</title>
		<link rel="stylesheet" href="/assets/css/materialize.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col s4">
					<h5>Welcome, <?=$this->session->userdata('logged_user')['first_name']?></h5>
				</div>
				<div class="col s7" style='text-align:right'>
					<div class="section">
						<a href="/books/add">Add book and review</a>
						<a href='/logout' style='margin-left:4%'>Logout</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col s6">
					<div class="row">
						<h5>Recent Book Reviews</h5>
					</div>
					<div class="row">
						<!--reviews-->
					</div>
				</div>
				<div class="col s6">
					<div class="row">
						<h5>Other books with Reviews</h5>
					</div>
					<div class="row">
						<!--books w review list-->
					</div>
				</div>
			</div>
		</div>
	</body>
</html>