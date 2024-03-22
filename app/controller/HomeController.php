<?php
final class HomeController
{
    public function __construct()
    {
    }

    // methods
    use Response;
    public function index()
    {
        $this->render('home');
    }
}