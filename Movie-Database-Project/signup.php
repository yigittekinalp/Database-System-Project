<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "moviesdeneme1");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['sign']))
{

  if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['passwordCheck'])   )
  {
      echo "<script>alert('You have an empty field.');</script>";

      echo"<script>location.assign('signup_page.html')</script>";  // go back to the signup page
  }
  if ($_POST['password'] != $_POST['passwordCheck'])
  {
      echo "<script>alert('Your password does not match!');</script>";

      echo"<script>location.assign('signup_page.html')</script>";  // go back to the signup page
  }


  $username = mysql_real_escape_string($_POST['username']);     // to get rid of the tricky characters which can destroy the database.
  $password = md5(mysql_real_escape_string($_POST['password']));  // turn into a hash function.
  $mysql_result= mysqli_query($link,"SELECT * from Users WHERE username LIKE '$username' LIMIT 1 ");
  $row_cnt = mysqli_num_rows($mysql_result);


  if (!$mysql_result) { // add this check.
      die('Invalid query: ' . mysql_error());
  }

  $myarr = array();

  while($row = mysqli_fetch_array($mysql_result))
  {
      array_push($myarr, $row);
  }


  if($row_cnt!=1)   // if there is no such user like that.
  {
      mysqli_query($link,"INSERT INTO `Users` (`username`, `password`, `ltype`) VALUES ('$username', '$password', 'reg')");
      session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      echo"<script>location.assign('welcome_page.php')</script>";  // go to the new page
  }
  else
  {
      if ($myarr[0]['ltype'] == 'adm') {
          echo"<script>location.assign('admin_page.php')</script>"; // go to the new page
      }
      else {
          echo "<script>alert('The username already exist!!!');</script>";

          echo"<script>location.assign('signup_page.html')</script>";  // go back to the signup page
      }
  }
}
