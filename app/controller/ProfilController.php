<?php
final class ProfilController
{
    // params
    private $userRepo;

    // constructor
    public function __construct()
    {
        $this->userRepo = new UsersRepository();
    }

    // methods
    use Response;
    public function profilPage()
    {

        $userProfil = $this->userRepo->readOne(11);
        $viewData = [
            'userProfil' => $userProfil
        ];
        $this->render('profil', $viewData);
    }
}