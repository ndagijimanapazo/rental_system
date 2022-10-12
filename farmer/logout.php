<?php
session_destroy();

unset($_SESSION["farmerID"]);
unset($_SESSION["telephone"]);
unset($_SESSION["IDNumber"]);
session_unset();

header("location:../index.php");
 ?>