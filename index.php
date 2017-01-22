<?php

session_start();

// autoload
require __DIR__ . '/vendor/autoload.php';

$Game = new MehmetUygun\BeeGame\Game();
	
$Queen = new MehmetUygun\BeeGame\Model\Queen;
$Drone = new MehmetUygun\BeeGame\Model\Drone;
$Worker = new MehmetUygun\BeeGame\Model\Worker(5, 2, 1);

$Game->addBee($Queen);
$Game->addBee($Drone);
$Game->addBee($Worker);

$_SESSION["Game"] = serialize($Game);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bee Game</title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

	<div class="container" style="margin-top: 100px; width: 300px">
		<div style="text-align: center;">
			<button class="btn btn-danger" id="hit" name="hit">HIT</button>
			<button class="btn btn-success" id="play_again" name="playagain">PLAY AGAIN</button>
		</div>

		<div id="display" style="margin-top: 20px;">
			<table class="table table-bordered">
				<th>Bee</th>
				<th>Life</th>
				<th>Life Span</th>
				<tbody id="tbody">
					<tr>
						<td>Queen</td>
						<td><?php echo $Game->getBee("Queen")->getLife(); ?></td>
						<td><?php echo $Game->getBee("Queen")->getLifeSpan(); ?></td>
					</tr>
					<tr>
						<td>Worker</td>
						<td><?php echo $Game->getBee("Worker")->getLife(); ?></td>
						<td><?php echo $Game->getBee("Worker")->getLifeSpan(); ?></td>
					</tr>					
					<tr>
						<td>Drone</td>
						<td><?php echo $Game->getBee("Drone")->getLife(); ?></td>
						<td><?php echo $Game->getBee("Drone")->getLifeSpan(); ?></td>
					</tr>
				</tbody>
			</table>
		</div>	
		<p>The Round: <span id="display_round">0</span></p>

		<div id="inform"></div>

	</div>

	<!-- include jquery file before bootstrap 		 -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- include bootstrap -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/bee-game.js"></script>

</body>
</html>