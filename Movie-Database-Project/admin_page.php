<html lang="en">
<link rel="stylesheet" type="text/css" href="admin_page.css">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans|Rubik" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme|Nunito+Sans|Rubik" rel="stylesheet"><?php
error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "moviesdeneme1");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();
if(isset($_SESSION["username"]) == false) 
{
  echo "<script>alert('First you need to login');</script>";
  echo"<script>location.assign('login_page.html')</script>";
}

?>

	<head>
		<meta charset="utf-8">
		<title>Site title</title>
		<meta name="description" content="Bootstrap Recitation">
		<meta name="author" content="CS306-201802">

		<!--
			Bootstrap files
		-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
    
  <h2 id = "admin">Welcome to the admin page</h2>
   <a style = "color: white; padding-left: 1400px; " href="logout.php">Logout</a>

	<body style='background-color: black ; color: white;'>
		<div style = "padding-left: 260px;" class="container">
            <br/>
            <br/>
            <h4 style = "font-family: 'Nunito Sans', sans-serif;">You can insert movies from below form</h4>
            <br/>
            <form action='admin_post.php' method="POST">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="title">Title</label>
                  <input  type="text" class = "form-control" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group col-md-4">
                  <label for="Production">Production</label>
                  <input type="text" class = "form-control" id="Production" name="production" placeholder="Production">
                </div>
              </div>
              <div class = "form-row">
                <div class="form-group col-md-8">
                  <label for="Plot">Plot</label>
                  <input type="text" class = "form-control" id="Plot" name="plot" placeholder="Once up on a time...">
                </div>
              </div>
              <div class = "form-row">
                <div class="form-group col-md-8">
                  <label for="Poster">Poster Link</label>
                  <input type="text" class = "form-control" id="Poster" name="posterLink" placeholder="Poster Link">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="ReleaseDate">Release Date</label>
                  <input type="text" class = "form-control" id="ReleaseDate" name="releaseDate" placeholder="2019">
                </div>
                <div class="form-group col-md-2">
                  <label for="Duration">Duration</label>
                  <input type="text" class = "form-control" id="Duration" name="duration" placeholder="125 min">
                </div>
                <div class="form-group col-md-2">
                  <label for="IMDbVotes">IMDb Votes</label>
                  <input type="text" class = "form-control" id="IMDbVotes" name="IMDbVotes" placeholder="999999">
                </div>
                <div class="form-group col-md-2">
                  <label for="mid">mid</label>
                  <input type="text" class = "form-control" id="mid" name="mid" placeholder="1">
                </div>
              </div>
                <input id = "button" class='btn-lg btn-success' type='submit' name='submit' value='submit' style='padding: 7px 12.6%;'/>
            </form>
        </div>
    </body>
</html>
