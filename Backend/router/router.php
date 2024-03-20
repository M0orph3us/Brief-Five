<?php
require __DIR__ . '/../config/configRouter.php';
$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case URL_HOMEPAGE:
        $home = new HomeController();
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

    case URL_404PAGE:
        $Page404 = new Page404Controller();
        break;

    default:
        # code...
        break;
}
