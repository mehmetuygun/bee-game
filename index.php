<?php

	require __DIR__ . '/vendor/autoload.php';

	$Game = new App\Game();

	/**
	 * Store object as a file to use in another php file
	 * @var object
	 */
	$storedGame = serialize($Game);
	file_put_contents('store', $storedGame);

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
						<td>1</td>
						<td>100</td>
					</tr>
					<tr>
						<td>Worker</td>
						<td>5</td>
						<td>75</td>
					</tr>					
					<tr>
						<td>Drone</td>
						<td>8</td>
						<td>50</td>
					</tr>
				</tbody>
			</table>
		</div>	
		<div>The Round: <div id="display_round">0</div></div>

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
						$("#inform").html("Game is over!. <br> You can start again by pressing play again.");
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
				$("#inform").html("");
				$("#display_round").html("0");
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
			html += "<td>" + data.Queen.life + "</td>";
			html += "<td>" + data.Queen.lifeSpan;
			html += "</td>";
			html += "</tr>";
			html += "<tr>";
			html += "<td>Worker</td>";
			html += "<td>" + data.Worker.life + "</td>";
			html += "<td>" + data.Worker.lifeSpan + "</td>";
			html += "</tr>";
			html += "<tr>";
			html += "<td>Drone</td>";
			html += "<td>" + data.Drone.life + "</td>";
			html += "<td>" + data.Drone.lifeSpan + "</td>";
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