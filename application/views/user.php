<html>
	<head>
		<title>User Reviews</title>
		<link rel="stylesheet" href="/assets/css/materialize.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col s12" style='text-align:right'>
					<div class='section'>
						<a href='/books'>Home</a>
						<a href='/books/add' style='margin-left:4%'>Add Book and Review</a>
						<a href='/logout' style='margin-left:4%'>Logout</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class='col s12'>
					<h2>User Alias: <?=$user['alias']?></h2>
					<p>Name: <?=$user['first_name']?> <?=$user['last_name']?></p>
					<p>Email: <?=$user['email']?></p>
					<p>Total Reviews: <?=$review_count['COUNT(review)']?></p>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<h4>Posted Reviews on the following books:</h4>
				</div>
				<div class="col s6">
					<?php foreach($books as $book): ?>
					<p><a href=<?php echo "/books/{$book['book_id']}";?>><?=$book['title']?></a></p>
				<?php endforeach ?>
				</div>
			</div>
		</div>
	</body>
</html>