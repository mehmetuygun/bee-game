<?php

	require '../vendor/autoload.php';

	//Get game object from stored file
	$storedGame = file_get_contents('../store');

	//Convert stored file into object
	$Game = unserialize($storedGame);

	$Game->hit();

	//Check the if game is over
	if ($Game->isOver())
	{
		echo json_encode([
				"status" => 0,
			]);
	}
	else
	{
		echo json_encode([
				"status" => 1,
				"round" => $Game->round,
				"bees" => [
					"Queen" => ["life" => $Game->queen->life, "lifeSpan" => $Game->queen->lifeSpan],
					"Worker" => ["life" => $Game->worker->life, "lifeSpan" => $Game->worker->lifeSpan],
					"Drone" => ["life" => $Game->drone->life, "lifeSpan" => $Game->drone->lifeSpan],
				]
			]);
	}

	//Set the changed game object into store file
	$storedGame = serialize($Game);
	file_put_contents('../store', $storedGame);

?>