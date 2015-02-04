<?php // GenreQuery.php

require_once __DIR__.'/Database.php';

class GenreQuery extends Database {

	public function getAll() {

		$sql = '
			SELECT id, genre
			FROM genres
		';

		$statement = parent::$pdo->prepare($sql);
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

}