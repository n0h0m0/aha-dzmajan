<?php 


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Media.</title>
</head>
<body style="background-image: url('background.jpg'); background-repeat: no-repeat; background-size: cover; position: sticky;">
	<?php require_once('inc/navbar.php') ?>

	<div class="container row m-auto visually-hidden scroll" id="photosForm"> <!-- photos start.-->
		<?php 	
			$dir = 'photos';
			$files = scandir($dir);
			rsort($files);
		?>
		<?php for($i = 0;$i < sizeof($files)-2;$i++){?>
		<div class="card col-3" style="width: 10rem; align-self: center;">
		  <img src="<?= "photos/$files[$i]" ?>" class="card-img-top rounded" alt="..." style="max-width: 8rem; height: auto;">
		  <div class="card-body">
		    <h5 class="card-title">Card title</h5>
		    <details>
		    	<summary><small>Details</small></summary>
		    	<p><small class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</small></p>
		    </details>
		    <a href="#" class="btn btn-primary mt-1">Like</a>
		  </div>
		</div>
		<?php }?>
	</div> <!-- photos end.-->

	<div class="container row m-auto visually-hidden scroll" id="postsForm"> <!-- posts start.-->
		<?php 	
			$conn = mysqli_connect('localhost','root','','ttt');
			$sql = "SELECT * FROM posts";
			$res = $conn->query($sql);		

			if($res == true){
				echo "<p class='mb-5'> </p>";
				while($row = mysqli_fetch_assoc($res)){ ?>
        	
        	<ul class="list-group w-50 mb-1" style="text-align: center;">
					  <li class="list-group-item"><?php echo $row['post_text'] ?></li>
					</ul>
      	
      <?php }
			}else{
				?> <h1 style="text-align: center; color: red; font-weight: bolder;">Error.</h1> <?php
			}


		?>
	</div> <!-- posts end. -->



	<script type="text/javascript" src="script.js"></script>
</body>
</html>