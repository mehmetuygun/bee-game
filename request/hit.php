<?php
session_start();

require '../vendor/autoload.php';

//Get game object from stored file
// $storedGame = file_get_contents('../store');

//Convert stored file into object
$Game = unserialize($_SESSION["Game"]);

$Game->hitBee();

if ($Game->isOver()) {
	echo json_encode([
			"status" => 0,
		]);
} else {

	$bees = [];
	if ($Game->getBee("Worker")) {
		$bees["Worker"] = [
				"life" => $Game->getBee("Worker")->life, 
				"lifeSpan" => $Game->getBee("Worker")->lifeSpan,
			];
	}

	if ($Game->getBee("Queen")) {
		$bees["Queen"] = [
				"life" => $Game->getBee("Queen")->life, 
				"lifeSpan" => $Game->getBee("Queen")->lifeSpan
			];
	}

	if ($Game->getBee("Drone")) {
		$bees["Drone"] = [
				"life" => $Game->getBee("Drone")->life, 
				"lifeSpan" => $Game->getBee("Drone")->lifeSpan
			];	
	}

	echo json_encode([
			"status" => 1,
			"round" => $Game->getRound(),
			"bees" => $bees,
		]);
}

$_SESSION["Game"] = serialize($Game);
