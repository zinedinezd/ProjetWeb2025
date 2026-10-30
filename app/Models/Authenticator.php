<?php
namespace App\Models;

/**
 * Description of Authenticator
 *
 * @author david
 */
class Authenticator
{
    public function authenticate($email, $password)
    {
        $personModel = new \App\Models\PersonModel();
        $user = $personModel->where('email', $email)->first(); // Recherche par email

        if ($user && password_verify($password, $user->password)) {
            $user->password = null; // Retirer le mot de passe pour la session
            return $user;
        }

        return null;
    }
}