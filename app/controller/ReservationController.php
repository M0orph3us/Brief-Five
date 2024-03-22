<?php
final class ReservationController
{
    public function __construct()
    {
    }

    // methods
    use Response;
    public function index()
    {
        $this->render('reservation');
    }
}