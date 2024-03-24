<?php
final class HomeController
{
    // params
    private $usersRepo;

    // constructor
    public function __construct()
    {
        $this->usersRepo = new UsersRepository();
    }

    // methods

    use Response;
    use CSRFToken;
    use Sanitize;
    use PasswordHash;

    public function homePage()
    {
        if (isset($_POST['firstnameRegister'], $_POST['lastnameRegister'], $_POST['mailRegister'], $_POST['passwordRegister']) && !empty($_POST['firstnameRegister']) && !empty($_POST['lastnameRegister']) && !empty($_POST['mailRegister']) && !empty($_POST['passwordRegister'])) {
            $formData = [
                'firstname' => $_POST['firstnameRegister'],
                'lastname' => $_POST['lastnameRegister'],
                'mail' => $_POST['mailRegister']
            ];
            $formSanitize = $this->sanitize($formData);
            $passwordHash = $this->passwordHash($_POST['passwordRegister']);

            $data =  [
                ...$formSanitize,
                'passwordHash' => $passwordHash
            ];

            $newUser = $this->usersRepo->create($data);
            // $firstname = $newUser->getFirstname();

            $csrf = $this->CSRFToken('csrfRegister');
            $viewData = [
                'csrf' => $csrf,
                // 'firstname' => $firstname
            ];
            $this->render('home', $viewData);
        } else {
            $csrf = $this->CSRFToken('csrfRegister');
            $viewData = [
                'csrf' => $csrf
            ];
            $this->render('home', $viewData);
        }
    }
}
