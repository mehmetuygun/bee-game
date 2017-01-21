<?php

session_start();

// autoload
require __DIR__ . '/vendor/autoload.php';

$Game = new MehmetUygun\BeeGame\Game();
	
$Queen = new MehmetUygun\BeeGame\Model\Queen;
$Drone = new MehmetUygun\BeeGame\Model\Drone;
$Worker = new MehmetUygun\BeeGame\Model\Worker(10, 20, 10);

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
    <link href="vendor/twitter/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

	<div class="container" style="margin-top: 100px; width: 300px">
			<button class="btn btn-danger" id="hit" name="hit">HIT</button>
			<button class="btn btn-success" id="play_again" name="playagain">PLAY AGAIN</button>

		<div id="display" style="margin-top: 20px;">
			<table class="table table-bordered">
				<th>Bee</th>
				<th>Life</th>
				<th>Life Span</th>
				<tbody id="tbody">
					<tr>
						<td>Queen</td>
						<td><?php echo $Game->getBee("Queen")->life; ?></td>
						<td><?php echo $Game->getBee("Queen")->lifeSpan; ?></td>
					</tr>
					<tr>
						<td>Worker</td>
						<td><?php echo $Game->getBee("Worker")->life; ?></td>
						<td><?php echo $Game->getBee("Worker")->lifeSpan; ?></td>
					</tr>					
					<tr>
						<td>Drone</td>
						<td><?php echo $Game->getBee("Drone")->life; ?></td>
						<td><?php echo $Game->getBee("Drone")->lifeSpan; ?></td>
					</tr>
				</tbody>
			</table>
		</div>	
		<p>The Round: <span id="display_round">0</span></p>

		<div id="inform"></div>

	</div>

	<!-- include jquery file before bootstrap 		 -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- include bootstrap -->
	<script type="text/javascript" src="vendor/twitter/bootstrap/dist/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		
		$( "#hit" ).click(function() {
			$.getJSON( 'request/hit.php', function( data ) {
					if (data.status == 0)
					{
						$("#inform").html("Game is over!. <br> You can start again by pressing play again button.");
					}	
					else
					{
						$("#tbody").html(display(data.bees));
						display_round(data.round);
					}
			});
		});

		$( "#play_again" ).click(function(){
			$.getJSON( 'request/play_again.php', function( data ) {
				$("#tbody").html(display(data.bees));
				display_round(data.round);
				$("#inform").html("");
			});
		});

		/**
		 * Display bee"s infromation
		 * @param  array
		 * @return string
		 */
		function display(data)
		{
			var html = "";
			html += "<tr>";
			html += "<td>Queen</td>";

			if(typeof data.Queen === 'undefined') {
    			html += "<td>0</td><td>0</td>";
			} else {
				html += "<td>" + data.Queen.life + "</td>";
				html += "<td>" + data.Queen.lifeSpan + "</td>";
			}

			html += "<tr>";
			html += "<td>Worker</td>";

			if(typeof data.Worker === 'undefined') {
    			html += "<td>0</td><td>0</td>";
			} else {
				html += "<td>" + data.Worker.life + "</td>";
				html += "<td>" + data.Worker.lifeSpan + "</td>";
			}

			html += "</tr>";
			html += "<tr>";

			html += "<td>Drone</td>";
			if(typeof data.Drone === 'undefined') {
    			html += "<td>0</td><td>0</td>";
			} else {
				html += "<td>" + data.Drone.life + "</td>";
				html += "<td>" + data.Drone.lifeSpan + "</td>";
			}

			html += "</tr>";

			return html;
		}

		/**
		 * Display round of game
		 * @param  integer
		 * @return void
		 */
		function display_round(round)
		{
			$("#display_round").html(round);
		}

	</script>

</body>
</html>