<?php 

include("db.php");

$search  =  $_POST['search'];

if(!empty($search)){

	$query = "SELECT * FROM cars WHERE title Like '$search%'";
	$search_query = mysqli_query($connection, $query);
	$count = mysqli_num_rows($search_query);

	if(!$search_query){
		die('QUERY FAILED' . mysqli_error($connection));
	}else{
		while ($row = mysqli_fetch_array($search_query) ) {
			$cars = $row['title'];

			echo "<li class= 'list-unstyled'>";

			echo $cars;

			echo "</li>";
		}
	}
}


 ?>