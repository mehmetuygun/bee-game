<?php

	require '../vendor/autoload.php';

	$storedGame = file_get_contents('../store');

	$Game = unserialize($storedGame);

	$Game->hit();

	if ($Game->queen->isDead())
	{
		echo json_encode([
				"status" => 0,
			]);
	}
	else
	{
		echo json_encode([
				"status" => 1,
				"bees" => [
					"Queen" => ["life" => $Game->queen->life, "lifeSpan" => $Game->queen->lifeSpan],
					"Worker" => ["life" => $Game->worker->life, "lifeSpan" => $Game->worker->lifeSpan],
					"Drone" => ["life" => $Game->drone->life, "lifeSpan" => $Game->drone->lifeSpan],
				]
			]);
	}

	$storedGame = serialize($Game);
	file_put_contents('store', $storedGame);

?>