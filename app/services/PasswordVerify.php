<?php
trait PasswordVerify
{
    public function passwordVerify(string $passwordLogin, string $passwordHash): bool
    {
        if (password_verify($passwordLogin, $passwordHash)) {
            return $_SESSION['isConnected'] = true;
        } else {
            echo '<p> Mauvais mot de passe </p>';
        }
    }
}
