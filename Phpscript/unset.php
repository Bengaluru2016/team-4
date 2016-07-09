<?php
include "loginsess.php";
unset($_SESSION["username"]);
 session_destroy();
 ?>
 