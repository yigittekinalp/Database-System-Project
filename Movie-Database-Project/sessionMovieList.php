<?php
session_start();
$_SESSION['mid'] = -1;
echo"<script>location.assign('table.php')</script>";
?>