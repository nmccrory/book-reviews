<html>
	<head>
		<title>Add Book Review</title>
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
				<h5>Add a New Book Title and Review</h5>
			</div>
			<div class="row">
				<form action="/addbook" method='post'>
					Book Title: <input type="text" name='title'>
					Author:
						<label>Choose from list: </label>
					    <select class="browser-default" name='author'>
					      <?php foreach($authors as $author): ?>
					      	<option value=<?=$author['author']?>><?=$author['author']?></option>
					      <?php endforeach ?>
					    </select>
						Or add new author: <input type="text" name='new_author'>
					Review: <textarea class='textarea' name='review'></textarea>
					<div class="col s1">
						Rating: <input type="number" name='rating'>
					</div>
					<div class='row'>
						<button type='submit'>Add Book and Review</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>