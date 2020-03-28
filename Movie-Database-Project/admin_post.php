<?php
/*echo "<script>alert('girdi3!!!');</script>";*/

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "moviesdeneme1");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
/*session_start();
if(isset($_SESSION["username"]) == false)
{
    echo "<script>alert('First you need to login');</script>";
    echo"<script>location.assign('login_page.html')</script>";
}*/

if (isset($_POST['submit'])) {
    if(empty($_POST['title']) || empty($_POST['production']) || empty($_POST['plot']) || empty($_POST['posterLink']) || empty($_POST['releaseDate']) || empty($_POST['duration']) || empty($_POST['IMDbVotes']))
    {
        echo "<script>alert('You have an empty field.');</script>";

        echo"<script>location.assign('admin_page.php')</script>";  // go back to the signup page
    }
    elseif (empty($_POST['mid'])) {
        echo "<script>alert('You have an empty field2.');</script>";

        echo"<script>location.assign('admin_page.php')</script>";  // go back to the signup page
    }
    else {
        $mid = $_POST['mid'];
        $title = $_POST['title'];
        $poster = $_POST['posterLink'];
        $releaseDate = $_POST['releaseDate'];
        $duration = $_POST['duration'];
        $plot = $_POST['plot'];
        $production = $_POST['production'];
        $IMDbVotes = $_POST['IMDbVotes'];
        mysqli_query($link, "INSERT INTO Movies (mid, title, poster, releaseDate, duration, plot, production, IMDbVotes) VALUES ('$mid', '$title', '$poster', '$releaseDate', '$duration', '$plot', '$production', '$IMDbVotes')");
        echo "<script>alert('You have succcesfully insert the movie.');</script>";
        echo"<script>location.assign('admin_page.php')</script>";
    }
}

?>
