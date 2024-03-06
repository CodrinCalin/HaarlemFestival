<?php
namespace App\Controllers;

use App\Models\User;
use App\Services\UserService;

class AuthController
{
    private $service;

    function __construct()
    {
        session_start();
        $this->service = new UserService();
    }

    public function index()
    {
        require __DIR__ . '/../views/auth/index.php';
    }

    public function login(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["username"]))
            {
                $usernameInput = $_POST["username"];
                $userMatch = $this->service->getUserByUsername($usernameInput);
                if($userMatch != null){
                    $passwordInput = $_POST["password"];
                    if(password_verify($passwordInput, $userMatch->password)) {
                        $_SESSION["authUser"] = $userMatch;
                        header("Location: /");
                        exit();
                    }else{
                        echo "Incorrect password!";
                    }
                }else{
                    echo "User not found!";
                }
            }
        }
    }

    public function register(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $newUser = new User();
            $newUser->username = $_POST["username"];
            $newUser->email = $_POST["email"];
            if($_POST["password"] == $_POST["passwordConfirm"])
            {
                $newUser->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $this->service->addUser($newUser);
                $authorizedUser = $this->service->getUserByUsername($newUser->username);
                $_SESSION["authUser"] = $authorizedUser;
                header("Location: /");
                exit();
            }else{
                echo "<h1>Password incorrect!</h1>";
            }
        }else{
            require __DIR__ . '/../views/auth/register.php';
        }
    }

    public function logout()
    {
        unset($_SESSION["authUser"]);
        unset($_SESSION);
        header('Location: /');
        exit();
    }

    private function checkUsernameAvailability($usernameInput)
    {
        return $this->service->checkUsernameExists($usernameInput);
    }

    private function checkEmailAvailability($emailInput)
    {
        return $this->service->checkEmailExists($emailInput);
    }
}