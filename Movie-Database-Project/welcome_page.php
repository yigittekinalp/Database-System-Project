<html lang="en">
<link rel="stylesheet" type="text/css" href="welcome_page.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

<?php
/*echo "<script>alert('girdi');</script>";*/
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

$check = mysqli_query($link,"SELECT * FROM Movies M");

if (!$check) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$myarr = array();

while($row = mysqli_fetch_array($check))
{
    array_push($myarr, $row);
}

$randInt = rand(0, count($myarr) - 1);
//const randInt = $r;
//echo "<script>alert('".$randInt."');</script>";

$mid = $myarr[$randInt]['mid'];
$midForSession = $mid;
$_SESSION['mid'] = $midForSession;
//echo "<script>alert('".$midForSession."');</script>";
$mid = mysql_real_escape_string($mid);
$check2 = mysqli_query($link,"SELECT * FROM Scored S WHERE S.mid = '$mid'");

if (!$check2) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$myarr2 = array();

while($row = mysqli_fetch_array($check2))
{
    array_push($myarr2, $row);
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

    <body style='background-color: black ; color: white;'>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img  class="d-inline-block align-top" alt="">
                    Movie Database Project
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sessionMovieList.php">Movie List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="watched_list.php">Watched List</a>
                        </li>
                       <!--  <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown link
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                    </ul>
                    <span class="navbar-text">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </span>
              </div>
            </div>
        </nav>


        <div class="container">
            <div class="text-center">
                <br/>
                <br/>
                <br/>
                <h1 id = "welcoming"></h1>
                <?php
                 $username = $_SESSION["username"];
                 ?>
                   <!-- echo "<h1 id = 'welcoming'>Hey, ".$username." welcome to the Movie Suggest Application</h1>";
                   echo "<script type='text/javascript'>

                    </script>" -->
                <script type="text/javascript">
                    var i = 0;
                    var username = "<?php echo $username ?>";
                    var txt = 'Hey, ' + username + " welcome to the Movie Suggest Application";
                    var speed = 40;

                    function typeWriter() {
                      if (i < txt.length) {
                        document.getElementById("welcoming").innerHTML += txt.charAt(i);
                        i++;
                        setTimeout(typeWriter, speed);
                      }
                    }
                    typeWriter();
                </script>

                
                <br/>
                <br/>
            </div>

            <div class="row">
                <div class="col-1"></div>

                <div class="col-4">
                    <?php
                        $poster_link = $myarr[$randInt]['poster'];
                        echo "<img id = 'poster' src='".$poster_link."' alt='poster' width='320'>";
                    ?>
                </div>

                <div id = 'features'class="col-6">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <div class="text-center">
                                <?php
                                    $title = $myarr[$randInt]['title'];
                                    echo "<h2 id = 'title'>".$title."</h2>";
                                ?>
                                <br/>
                                <br/>
                            </div>
                            <?php
                                $plot = $myarr[$randInt]['plot'];
                                echo "<h6>Plot: ".$plot."</h6>";
                                echo "<br/>";

                                $duration = $myarr[$randInt]['duration'];
                                echo "<h6>Duration: ".$duration."</h6>";
                                echo "<br/>";

                                $IMDbVotes = $myarr[$randInt]['IMDbVotes'];
                                echo "<h6>IMDb Votes: ".$IMDbVotes."</h6>";
                                echo "<br/>";

                                $type = $myarr2[0]['type'];
                                $score = $myarr2[0]['score'];
                                if ($type == "IMDb") {
                                    echo "<h6>IMDb Rating: ".$score."</h6>";
                                }
                                else {
                                    echo "<h6>Rotten Tomatoes Rating: ".$score."</h6>";
                                }
                                echo "<br/>";

                                $type = $myarr2[1]['type'];
                                $score = $myarr2[1]['score'];
                                if ($type == "IMDb") {
                                    echo "<h6>IMDb Rating: ".$score."</h6>";
                                }
                                else {
                                    echo "<h6>Rotten Tomatoes Rating: ".$score."</h6>";
                                }
                                echo "<br/>";

                                $production = $myarr[$randInt]['production'];
                                echo "<h6>Production: ".$production."</h6>";
                                echo "<br/>";

                                $date = $myarr[$randInt]['releaseDate'];
                                echo "<h6>Release Date: ".$date."</h6>";
                                echo "<br/>";
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-1"></div>
            </div>
            <br/>
            <div class="text-center">
            


            <!-- <input style = "padding: 7px 20.6%;" id="button" class="btn-lg btn-primary" type="submit" name="button" onclick="myFunction();" value="Add to watch list"/>
            <script type="text/javascript">
                document.getElementById("button").onclick = myFunction() {
                <?php                   
                    //$_SESSION['mid'] = $mid; 
                    //echo"<script>location.assign('table.php')</script>";
                ?>
            </script> -->
            


            <form action="sessionTry.php" method="POST">
                <input id = 'add_button'class="btn-lg btn-success" type="submit" name="submit" value="Add it to your movie list">
                <a id = 'list_button' " class="btn-lg btn-primary" href="welcome_page.php" role="button">Select New Movie</a>
            </form>
                   
                <!-- <form action="sessionMovieList.php" method="POST">
                <input style="padding: 7px 20.6%;" class="btn-lg btn-primary" type="submit" name="submit" value="Movie List">
                </form> -->
            </div>

        </div>
    </body>
</html>
