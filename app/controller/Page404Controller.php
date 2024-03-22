<?php
final class Page404Controller
{

    public function __construct()
    {
    }

    // methods
    use Response;
    public function index()
    {
        $this->render('404');
    }
}