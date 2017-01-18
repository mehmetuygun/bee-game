<?php

	require '../vendor/autoload.php';

	//Start new game
	$Game = new App\Game;

	//Send new game info as json
	echo json_encode([
			"status" => 1,
			"round" => $Game->round,
			"bees" => [
				"Queen" => ["life" => $Game->queen->life, "lifeSpan" => $Game->queen->lifeSpan],
				"Worker" => ["life" => $Game->worker->life, "lifeSpan" => $Game->worker->lifeSpan],
				"Drone" => ["life" => $Game->drone->life, "lifeSpan" => $Game->drone->lifeSpan],
			]
		]);

	//Set object in store page
	$storedGame = serialize($Game);
	file_put_contents('../store', $storedGame);

?>