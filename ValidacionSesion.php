<?php

require_once "Autenticacion.php";
require_once "Clases.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

// Fecha y hora actual
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Setea la cookie para expirar en 1 mes
$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);

$isLoggedIn = false;
$isAdmin=false;

// Revisa si la sesion ya ha sido iniciada
if (! empty($_SESSION["usuario_id"]) || !empty($_SESSION["ext-user"])) {
    $isLoggedIn = true;
}
if (! empty($_SESSION["rol"]) && $_SESSION["rol"]==0) {
    $isAdmin = true;
}
// Revisa si la sesion esta iniciada
else if (! empty($_COOKIE["login_usuario"]) && ! empty($_COOKIE["random_password"]) && ! empty($_COOKIE["random_selector"])) {
    // Initiate auth token verification directive to false
    $isPasswordVerified = false;
    $isSelectorVerified = false;
    $isExpiryDateVerified = false;
    
    // Get token for username
    $userToken = $auth->getTokenByUsername($_COOKIE["login_usuario"],0);
    
    // Validate random password cookie with database
    if (password_verify($_COOKIE["random_password"], $userToken[0]["password_hash"])) {
        $isPasswordVerified = true;
    }
    
    // Validate random selector cookie with database
    if (password_verify($_COOKIE["random_selector"], $userToken[0]["selector_hash"])) {
        $isSelectorVerified = true;
    }
    
    // check cookie expiration by date
    if($userToken[0]["expiry_date"] >= $current_date) {
        $isExpiryDareVerified = true;
    }
    
    // Redirect if all cookie based validation returns true
    // Else, mark the token as expired and clear cookies
    if (!empty($userToken[0]["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDareVerified) {
        $isLoggedIn = true;
    } else {
        if(!empty($userToken[0]["id"])) {
            $auth->markAsExpired($userToken[0]["id"]);
        }
        // clear cookies
        $util->clearAuthCookie();
    }

}
