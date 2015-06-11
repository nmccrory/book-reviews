<html>
	<head>
		<title>Add Book and Review</title>
	<link rel="stylesheet" href="/assets/css/materialize.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col s12" style='text-align:right'>
					<div class='section'>
						<a href='/books'>Home</a>
						<a href='/logout' style='margin-left:4%'>Logout</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<h3><?=$bookinfo['title']?></h3>
			</div>
			<div class="row"><h5>Author: <?=$bookinfo['author']?></h5></div>
		</div>
		<div class="container">
			<div class="row">
				<div class='col s6'>
					<div class="row">
						<h3>Reviews:</h3>
					</div>
						<?php foreach($reviews as $review): ?>
						<div class='col s12'>
							<p>Rating</p>
							<?php for($i=0; $i<$review['rating']; $i++):
							?>
								<img style="display:inline-block;max-width:5%" src="/assets/images/gold_star.svg.png"></img>
							<?php endfor; ?>
							<?php $empties = 5-$review['rating'];
								for($e=0;$e<$empties;$e++): ?>
								<img style="display:inline-block;max-width:5%" src="/assets/images/empty_star.svg.png"></img>
							<?php endfor; ?>
							<div class='section'>
								<a href=<?php echo "/users/{$review['user_id']}";?>><?=$review['first_name']?></a><p><i><?=$review['review']?></i></p>
								<p>Posted on <i><?=$review['updated_at']?></i></p>
							</div>
						</div>
						<?php endforeach; ?>
				</div>
					<div class="col s6">
							<h4>Add a review</h4>
						<form class="s10 offset-s2" action=<?php echo "/add/{$bookinfo['id']}";?> method='post'>
							Review: <textarea class='textarea' name='review'></textarea>
						<div class='row'>
							<div class="col s2">
								Rating: <input type="number" min='1'max='5' name='rating'>
							</div>
						</div>
							<div class='row'>
								<button type='submit'>Add Review</button>
							</div>
						</form>
					</div>
				</div>
			</div>
	</body>
</html>