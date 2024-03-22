<?php
$uri = $_SERVER['REQUEST_URI'];
switch ($uri) {
    case URL_HOMEPAGE:
        $home = new HomeController();
        $home->index();
        break;

    case URL_PROFILPAGE:
        $profil = new ProfilController();
        break;

    case URL_RESERVATIONPAGE:
        $reservation = new ReservationController();
        break;

    case URL_ADMINPAGE:
        $admin = new AdminController();
        break;


    default:
        header("HTTP/1.0 404 Not Found");
        require_once __DIR__ .  "/../views/404.php";
        exit();
        break;
}