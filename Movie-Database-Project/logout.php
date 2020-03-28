<?php
session_start();
unset($_SESSION["username"]);
echo"<script>location.assign('login_page.html')</script>";
?>

