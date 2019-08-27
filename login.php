<?php
session_start();

require_once "Autenticacion.php";
require_once "Clases.php";

$auth = new Auth();         // clase Auth de Autenticacion.php
$db_handle = new DBController();
$util = new Util();     //clase Util de Clases.php

require_once "ValidacionSesion.php";


if ($isLoggedIn && $isAdmin) {
    $util->redirect("admin-menu.php");

}
if ($isLoggedIn) {
    $util->redirect("main-page.php");
}

if (! empty($_POST["login"])) {
    $isAuthenticated = false;

    $username = $_POST["usuario_nombre"];
    $password = $_POST["usuario_password"];

    $user = $auth->getMemberByUsername($username);
    if (password_verify($password, $user[0]["usuario_password"])) {
        $isAuthenticated = true;
    }

    if($user[0]["rol"]==0){
        $isAdmin=true;
    }

    if ($isAuthenticated) {

        $_SESSION["usuario_id"] = $user[0]["usuario_id"];
        $_SESSION["rol"] = $user[0]["rol"];
        $_SESSION["usuario_nombre"] = $user[0]["usuario_nombre"];

        // Set Auth Cookies if 'Remember Me' checked
        if (! empty($_POST["remember"])) {
            setcookie("login_usuario", $username, $cookie_expiration_time);

            $random_password = $util->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time);

            $random_selector = $util->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time);

            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

            // mark existing token as expired
            $userToken = $auth->getTokenByUsername($username, 0);
            if (! empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }
            // Insert new token
            $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
        } else {
            $util->clearAuthCookie();
        }
        if($isAdmin)
            $util->redirect("admin-menu.php");

        $util->redirect("main-page.php");
    } else {
        $mensaje = "Datos incorrectos, Por favor intente nuevamente.";
    }
}
