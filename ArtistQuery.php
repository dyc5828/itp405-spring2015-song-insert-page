<?php // ArtistQuery.php

require_once __DIR__.'/Database.php';

class ArtistQuery extends Database {

	public function getAll() {

		$sql = '
			SELECT id, artist_name
			FROM artists
		';

		$statement = parent::$pdo->prepare($sql);
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

}