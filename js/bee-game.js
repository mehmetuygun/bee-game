/**
 * Call hit bee ajax request
 */
$( "#hit" ).click(function() {
	$.getJSON( 'request/hit.php', function( data ) {
			if (data.status == 0)
			{
				//Inform user the game is over
				$("#inform").html("Game Over!. <br> You can start again by pressing play again button.");
				//Disable hit button when game is over				
				$("#hit").attr("disabled", true);
			}	
			else
			{	
				//Display new info of bees
				$("#tbody").html(display(data.bees));
				//Display game round
				display_round(data.round);
			}
	});
});

/**
 * Call play again ajax request
 */
$( "#play_again" ).click(function(){
	$.getJSON( 'request/play_again.php', function( data ) {
		//Reset the bee info
		$("#tbody").html(display(data.bees));
		//Reset the round of game
		display_round(data.round);
		//Reset info
		$("#inform").html("");
		//Make button clickable
		$("#hit").attr("disabled", false);
	});
});



/**
 * Display bee info
 * @param  array
 * @return string
 */
function display(data)
{
	//Define html variable as a string
	var html = "";
	html += "<tr><td>Queen</td>";

	if(typeof data.Queen === 'undefined') {
		html += "<td>0</td><td>0</td>";
	} else {
		html += "<td>" + data.Queen.life + "</td>";
		html += "<td>" + data.Queen.lifeSpan + "</td>";
	}

	html += "</tr><tr><td>Worker</td>";

	if(typeof data.Worker === 'undefined') {
		html += "<td>0</td><td>0</td>";
	} else {
		html += "<td>" + data.Worker.life + "</td>";
		html += "<td>" + data.Worker.lifeSpan + "</td>";
	}

	html += "</tr><tr><td>Drone</td>";
	
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
 * Display game's round
 * @param  integer
 */
function display_round(round)
{
	$("#display_round").html(round);
}
