<?php 

include("db.php");


	$query = "SELECT * FROM cars";
	$new = mysqli_query($connection, $query);
	if(!$new){
		die("QUERY FAILED". mysqli_error($connection));
	}
	else {
		while ($row = mysqli_fetch_array($new)) {

			echo "<tr>";

			echo "<td>{$row['id']}</td>";
			echo "<td><a rel='".$row['id']."' class='title-link' href='javascript:void(0)'>{$row['title']}</a></td>";

			echo "</tr>";

		}
	}



 ?>

 	<script>
		// $("#action-container").hide();

	$(document).ready(function(){		
			$(".title-link").on('click', function(){

				$("#action-container").show();

				var id = $(this).attr("rel");

					$.post("process.php", {id: id}, function(data){

						$("#action-container").html(data);

					});


			});
		});
	</script>