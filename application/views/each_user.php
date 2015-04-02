<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		<?=$user_data['first_name']?>
	</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h2> <?=$user_data['first_name']?> </h2>
		<p> <?=$user_data['email']?> </p>
		<p> Number of reviews: <?php echo count($books_list); ?> </p>

		<h4>List of books reviewed</h4>

<?php 
		foreach ($books_list as $book) {
?>
			<p>
				<a href="/books/show_book/<?=$book['id']?>"><?=$book['name']?> </a>
			</p>
<?php
		}
?>
	</div>
</body>
</html>