<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Books and Reviews</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
</head>
<body>
	<div class="container">
		<p>Welcome, <?=$user_name?>!</p>
		<p><a href="/books/add"> Add new book! </a></p>
		<h2>Recent Reviews</h2>

		<div class="col-md-8">
<?php
			foreach ($books as $review) {
?>
				<div>
					<p><a href="/books/show_book/<?=$review['book_id']?>"><?=$review['book']?></a></p>
					<p class="aligned">Rating: <?=$review['rating']?></p>
					<p class="aligned"><?=$review['user']?> says: <?=$review['description']?></p>
					<p class="aligned">Posted on: <?=$review['time']?></p>
				</div>
<?php
			}
?>
		</div>

		<div class="col-md-4">
			<h2>Other books with Reviews</h2>
			<div id="list_of_books">
<?php
				foreach ($list_of_books as $book) {
?>	
					<p><a href='#'><?=$book['name']?></a></p>
<?php 
				}
?>
			</div>
		</div>
	</div>
</body>
</html>