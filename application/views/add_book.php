<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add New Book</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h2> Add a new book and your review </h2>
		<form action="/books/add_book" method="post">
			<div class="form-group">
			   	<label>Choose exisiting book:</label>
			   	<select name="book_name_option">
			   		<option></option>
<?php 
				foreach ($books as $book) {
?>
					<option value="<?=$book['name']?>"> <?=$book['name']?> </option>
<?php
				}
?>
			   	</select>
			</div>
			<div class="form-group">
				<label>Or add a new Book Title:</label>
				<input type="text" name="book_name_input" placeholder="Name of the book" class="form-control">
			</div>
			<div class="form-group">
			   	<label>Choose exisiting author:</label>
			   	<select name="author_name_option">
			   		<option></option>
<?php 
				foreach ($authors as $author) {
?>
					<option value="<?=$author['name']?>"> <?=$author['name']?> </option>
<?php
				}
?>
			   	</select>
			</div>
			<div class="form-group">
			   	<label>Or add new author:</label>
			   	<input type="text" name="add_author" placeholder="New Author" class="form-control">
			</div>
			<div class="form-group">
			   	<label>Review:</label>
			   	<textarea name="description" placeholder="What do you think of the book?" class="form-control"></textarea>
			</div>
			<div class="form-group">
			   	<label>Review:</label>
			   	<select name="rating">
			   		<option>1</option>
			   		<option>2</option>
			   		<option>3</option><option>4</option>
			   		<option>5</option>
			   	</select>
			</div>
			<input type="submit" value="Add Review" class="btn btn-success" id="sign_in_button">
		</form>
	</div>
</body>
</html>