<html lang="en">
<link rel="stylesheet" type="text/css" href="welcome_page.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

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

    <?php


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
/*session_start();*/
$mid = $_SESSION['mid'];
$username = $_SESSION["username"];
$check = mysqli_query($link, "SELECT * FROM watched_movie_list WM, Movies M WHERE WM.mid = M.mid and username LIKE '$username'");
/*$aaa = mysql_real_escape_string($mid);
echo "<script>alert('".$aaa."');</script>";*/

if (!$check) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$myarr=array();

while($row = mysqli_fetch_array($check))
{
  array_push($myarr, $row);
}

?>

    <body style = "background: #292b2c;">

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
                            <a class="nav-link" href="welcome_page.php">Home <span class="sr-only">(current)</span></a>
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

        <h1 style="font-family: 'Rubik', sans-serif; color:#bad4e4; text-align: center; font-size: 35px; padding-top: 20px;" class="h1">Watched Movie List </h1>


        <div class="container">
      <div class="row">
        <div class="col">&nbsp;</div>
      </div>
      <!-- <div class="col-lg-12">
          
        </div> -->
        <div class="col-lg-12">
          <p class="lead"></p>
          
            <table class="table table-striped table-secondary">
              <thead class="thead-dark">
                <tr>
                  <th style = "text-align: center;" scope="col">Title</th>
                  <th  scope="col" colspan="2"></th>
                </tr>
              </thead>
              <tbody>
                <thead style="text-align: center;">
                  <?php
                      $row_number=count($myarr);
                     /* echo "<script>alert('".$row_number."');</script>";*/
                      for($i=0;$i<$row_number;$i++)
                      {
                        /*echo "<th scope='row'><?php $i ?></th>";*/
                        $title=$myarr[$i]['title'];
                        echo "<tr>";
                        echo "<td>".$title."</td>";
                        echo "<td>";
                        /*echo "<form action='later.php' method='POST'>";
                        echo  "<input class='btn-lg btn-success' type='submit' name='submit' value='watch now'>";
                        echo "</form>";*/
                        echo"</td>";
                      }


                      /*<form action="later.php" method="POST">
                            <input style="padding: 7px 20.6%;" class="btn-lg btn-primary" type="submit" name="submit" value="submit">
                            </form>*/

                     /* <td><a class='btn btn-success' href='#'' role='button'>Watch Now</a></td>
*/
                  ?>
                </thead>
              </tbody>
            </table>
          </div>
  </div>

    </body>
</html>