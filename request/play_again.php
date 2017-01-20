<?php

session_start();

require '../vendor/autoload.php';

$Game = new MehmetUygun\Game();
	
$Queen = new MehmetUygun\Model\Queen;
$Drone = new MehmetUygun\Model\Drone;
$Worker = new MehmetUygun\Model\Worker(10, 20, 10);

$Game->addBee($Queen);
$Game->addBee($Drone);
$Game->addBee($Worker);

$_SESSION["Game"] = serialize($Game);

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
