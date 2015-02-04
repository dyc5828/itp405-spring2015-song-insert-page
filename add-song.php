<?php
require_once __DIR__.'/ArtistQuery.php';
require_once __DIR__.'/GenreQuery.php';
require_once __DIR__.'/Song.php';

$aQuery = new ArtistQuery();
$artists = $aQuery->getAll();
$gQuery = new GenreQuery();
$genres = $gQuery->getAll();

if(isset($_GET['Add'])) {
	$song = new Song();

	$song->setTitle($_GET['title']);
	$song->setArtistId($_GET['artist']);
	$song->setGenreId($_GET['genre']);
	$song->setPrice($_GET['price']);

	$song->save();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="main.css">

</head>
<body>
<div id="main">

<div id="heading">Song Insert Page</div>

<?php if(isset($_GET['Add'])) : ?>
	<div id="message">
		<p>
			The song,
			<?=$song->getTitle()?>,
			with an ID of
			<?=$song->getId()?>
			was inserted successfully!
		</p>
	</div>
<?php endif ?>

<form method="get">
	<label for="title">
		Title:
	</label>
	<input type="text" required id="title" name="title">
	<br>

	<label for="artist">
		Artist:
	</label>
	<select required id="artist" name="artist">

<?php foreach($artists as $artist) : ?>
	<option value="<?=$artist->id?>">
		<?=$artist->artist_name?>
	</option>
<?php endforeach; ?>

	</select>
	<br>

	<label for="genre">
		Genre:
	</label>
	<select required id="genre" name="genre">

<?php foreach($genres as $genre) : ?>
	<option value="<?=$genre->id?>">
		<?=$genre->genre?>
	</option>
<?php endforeach; ?>

	</select>
	<br>

	<label for="price">
		Price:
	</label>
	<input type="text" required id="price" name="price">
	<br>

	<input type="submit" value="Add" name="Add">
</form>

</div><!--div#main-->
</body>
</html>