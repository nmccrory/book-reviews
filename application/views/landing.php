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
						<?php foreach($book_reviews as $book_review):  ?>
						<div class='col s12'>
							<h5><a href=<?php echo "/books/{$book_review['book_id']}";?>><?=$book_review['title']?></a></h5>
							<p>Rating</p>
							<?php for($i=0; $i<$book_review['rating']; $i++):
							?>
								<img style="display:inline-block;max-width:5%" src="/assets/images/gold_star.svg.png"></img>
							<?php endfor; ?>
							<?php $empties = 5-$book_review['rating'];
								for($e=0;$e<$empties;$e++): ?>
								<img style="display:inline-block;max-width:5%" src="/assets/images/empty_star.svg.png"></img>
							<?php endfor; ?>
							<div class='section'>
							<a href=<?php echo "/users/{$book_review['user_id']}";?>><?=$book_review['first_name']?></a>
							<p><i><?=$book_review['review']?></i></p>
								<p>Posted on <i><?=$book_review['updated_at']?></i></p>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col s6" style='max-height: 30vh;overflow:scroll;text-align:right;'>
					<div class="row">
						<h5>Other books with Reviews</h5>
					</div>
				</div>
				<div class="col s6" style='max-height: 30vh;overflow:scroll;text-align:right;'>
					<div class="row">
						<?php foreach($titles as $title): ?>
						<h6 style='margin-right:30px'><a href=<?php echo "/books/{$title['id']}"?>><?=$title['title']?></a></h6>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>