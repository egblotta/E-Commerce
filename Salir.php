<?php
session_start();

require "Clases.php";
$util = new Util();

//Clear Session
$_SESSION["usuario_id"] = "";
$_SESSION["ext-user"] = "";
session_destroy();

// clear cookies
$util->clearAuthCookie();

header("Location: ./");
?>