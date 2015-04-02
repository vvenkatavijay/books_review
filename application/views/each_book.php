<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		<?=$book_name?>
	</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h2><?=$book_name?></h2>
		<p>Author: <?=$author_name?></p>
		<div>
			<h2> Reviews </h2>
<?php 
			foreach ($reviews as $review) {
?>
				<div class="jumbotron">
					<p>Rating: <?=$review['rating']?></p>
					<p><a href = "/books/show_user/<?=$review['user_id']?>">
						<?=$review['user_name']?> </a>says: <?=$review['description']?>
					</p>
					<p>Posted on: <?=$review['created_at']?></p>
<?php 
					if($current_user_id === $review['user_id']) {
?>
						<p><a href="/books/delete_review/<?=$review['review_id']?>"> 
							Delete this review 
						</a></p>
<?php
					}
?>
				</div>
<?php
			}
?>
		</div>
	</div>
</body>
</html>