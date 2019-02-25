<?php 

include("db.php");


if(isset($_POST['updatethis'])){
	

	$id = mysqli_real_escape_string($connection, $_POST['id']);
	$title = mysqli_real_escape_string($connection, $_POST['title']);

	$query = "UPDATE cars SET title= '$title' WHERE id= $id";
	$result = mysqli_query($connection, $query);

	if(!$result){
		die("QUERY FAILED". mysqli_error($connection));
	}


}




if(isset($_POST['deletethis'])){
	$id = mysqli_real_escape_string($connection ,$_POST['id']);

	$query = "DELETE FROM cars WHERE id =$id";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("QUERY FAILED". mysqli_query($connection));
	}
}



if(isset($_POST['id'])){

	$id = mysqli_real_escape_string($connection ,$_POST['id']);

	$query = "SELECT * FROM cars WHERE id= {$id}";
	$new = mysqli_query($connection, $query);
	if(!$new){
		die("QUERY FAILED". mysqli_error($connection));
	}
	else {
		while ($row = mysqli_fetch_array($new)) {

			echo "<p id='feedback' class='bg-success'></p>";
			echo "<input type='text' rel='".$row['id']."' class='form-conrol title-input' value='{$row['title']}'>";
			echo "<input type='button' class='btn btn-success update' value='Update'> ";
			echo "<input type='button' class='btn btn-danger delete' value='Delete'> ";
			echo "<input type='button' class='btn btn-close close' value='Close'> ";
			


		}
	}

}




 ?>


 <script type="text/javascript">
 	
 		$(document).ready(function(){
 			var id;
 			var title;
 			var updatethis = "update";
 			var deletethis = "delete";

 			/***************extract id and title******************/
 			$(".title-input").on('input', function(){

 				id= $(this).attr('rel');
 				title = $(this).val();
 				
 			});

/***************update button function******************/

			$(".update").on('click', function(){
				
				$.post("process.php", {id: id, title: title, updatethis: updatethis}, function(data){
				
					$("#feedback").text("data update Success");					


				})

			});


/***************delete button function******************/


		$(".delete").on('click', function(){ 

			if(confirm('are you sure to delete this ?')){

			id = $(".title-input").attr("rel");

			$.post("process.php", {id: id, title: title, deletethis: deletethis}, function(data){
				
				$("#action-container").hide();
			});


}
		});


/***************close button function******************/	

$(".close").on('click', function(){

	$("#action-container").hide();

});	



 		});
 </script>