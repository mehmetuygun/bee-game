<?php

session_start();

require '../vendor/autoload.php';

$Game = new MehmetUygun\BeeGame\Game();
	
$Queen = new MehmetUygun\BeeGame\Model\Queen;
$Drone = new MehmetUygun\BeeGame\Model\Drone;
$Worker = new MehmetUygun\BeeGame\Model\Worker(10, 20, 10);

$Game->addBee($Queen);
$Game->addBee($Drone);
$Game->addBee($Worker);

$_SESSION["Game"] = serialize($Game);

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
