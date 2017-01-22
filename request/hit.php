<?php
session_start();

require '../vendor/autoload.php';

//Get game object from stored file
// $storedGame = file_get_contents('../store');

//Convert stored file into object
$Game = unserialize($_SESSION["Game"]);

$Game->setRandomGenerator(new MehmetUygun\BeeGame\RandomGenerator);

$Game->hitBee();

if ($Game->isOver()) {
	echo json_encode([
			"status" => 0,
		]);
} else {

	$bees = [];
	if ($Game->getBee("Worker")) {
		$bees["Worker"] = [
				"life" => $Game->getBee("Worker")->getLife(), 
				"lifeSpan" => $Game->getBee("Worker")->getLifeSpan(),
			];
	}

	if ($Game->getBee("Queen")) {
		$bees["Queen"] = [
				"life" => $Game->getBee("Queen")->getLife(), 
				"lifeSpan" => $Game->getBee("Queen")->getLifeSpan()
			];
	}

	if ($Game->getBee("Drone")) {
		$bees["Drone"] = [
				"life" => $Game->getBee("Drone")->getLife(), 
				"lifeSpan" => $Game->getBee("Drone")->getLifeSpan()
			];	
	}

	echo json_encode([
			"status" => 1,
			"round" => $Game->getRound(),
			"bees" => $bees,
		]);
}

$_SESSION["Game"] = serialize($Game);
