<?php

namespace App\Controllers;

use App\Exception\PasswordDoesNotMatchException;
use App\Exception\TokenNotFoundException;
use App\Models\User;
use App\Services\ResetTokenService;
use App\Services\UserService;
use App\Logic\MailerLogic;
use mysql_xdevapi\Exception;

class AuthController extends Controller {
    // <editor-fold desc="Initialization = Variables and Constructor">
    private $userService;
    private $tokenService;
    private $mailerLogic;

    function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();
        $this->tokenService = new ResetTokenService();
        $this->mailerLogic = new MailerLogic();
    }
    // </editor-fold>

    // <editor-fold desc="Index page">
    public function index()
    {
        require __DIR__ . '/../views/auth/index.php';
    }
    // </editor-fold>

    // <editor-fold desc="Login page">
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["username"])) {
                $usernameInput = $_POST["username"];
                $userMatch = $this->userService->getUserByUsername($usernameInput);
                if ($userMatch != null) {
                    $passwordInput = $_POST["password"];
                    if (password_verify($passwordInput, $userMatch->password)) {
                        $_SESSION["authUser"] = $userMatch;
                        header("Location: /");
                        exit();
                    } else {
                        echo "Incorrect password!";
                    }
                } else {
                    echo "User not found!";
                }
            }
        }
    }
    // </editor-fold>

    // <editor-fold desc="Register page">
    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newUser = new User();
            $newUser->username = $_POST["username"];
            $newUser->email = $_POST["email"];
            if ($_POST["password"] == $_POST["passwordConfirm"]) {
                $newUser->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $this->userService->addUser($newUser);
                $authorizedUser = $this->userService->getUserByUsername($newUser->username);
                $_SESSION["authUser"] = $authorizedUser;
                header("Location: /");
                exit();
            } else {
                echo "<h1>Password incorrect!</h1>";
            }
        } else {
            require __DIR__ . '/../views/auth/register.php';
        }
    }
    // </editor-fold>

    // <editor-fold desc="Forgot Password page">
    public function forgot_password()
    {
        try{
            $mailSubject = "[Password Reset] Haarlem Website";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["email"])) {
                    $email = $_POST["email"];
                    $user = $this->userService->getUserByEmail($email);

                    if ($user) {
                        $this->tokenService->deleteExistingTokens($email);
                        $validToken = false;

                        /* Loop until you get a valid/non-existent token */
                        while (!$validToken) {
                            $token = bin2hex(random_bytes(32)); // Token generation
                            if($this->tokenService->checkIfTokenIsValid($token)){
                               $validToken = true;
                            }
                        }
                        $this->tokenService->addResetToken($email, $token);

                        /* Assign create url with a token and email contents into mail*/
                        $reset_link = "http://localhost/auth/reset_password?token=$token";
                        $mailBody = "Click the following link to reset your password: " . "<br><br>" . "<a href=" . $reset_link . ">Password reset</a>";
                        $this->mailerLogic->setMailInfo($email, $mailSubject, $mailBody);

                        /* Send mail */
                        $this->mailerLogic->sendMail();

                        header("Location: /auth/forgot_password_success");
                        exit();
                    } else {
                        echo "User not found!";
                    }
                }
            } else {
                require __DIR__ . '/../views/auth/forgot_password.php';
            }
        }catch (\Exception $ex){
            echo "Message could not be sent. Mailer Error: {$this->mailerLogic->getError()}";
        }
    }

    public function forgot_password_success()
    {
        require __DIR__ . '/../views/auth/forgot_password_success.php';
    }
    // </editor-fold>

    // <editor-fold desc="Reset Password page">
    public function reset_password()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["token"])) {
                $token = $_GET["token"];
                $resetToken = $this->tokenService->getResetTokenByToken($token);

                require __DIR__ . '/../views/auth/reset_password.php';
            } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["token"])) {
                $postedToken = $_POST["token"];
                $resetToken = $this->tokenService->getResetTokenByToken($postedToken);

                if (!$postedToken || !$resetToken) {
                    throw new TokenNotFoundException();
                }

                $password = $_POST["password"];
                $passwordConfirm = $_POST["passwordConfirm"];

                if ($password !== $passwordConfirm) {
                    throw new PasswordDoesNotMatchException();
                }

                // Reset password logic
                $this->userService->updateUserPassword($resetToken, password_hash($password, PASSWORD_DEFAULT));
                header("Location: /auth/reset_password_success");
                exit();
            } else {
                throw new TokenNotFoundException();
            }
        } catch (PasswordDoesNotMatchException $ex) {
            echo '<script>';
            echo 'document.addEventListener("DOMContentLoaded", function() {';
            echo '    displayAlert("Error: ' . addslashes($ex->getMessage()) . '");'; // Pass PHP exception message to JavaScript
            echo '});';
            echo '</script>';
        } catch (TokenNotFoundException $ex) {
            header("Location: /404");
            exit();
        } catch (Exception $ex) {
            header("Location: /404");
            exit();
        }
    }

    public function reset_password_success()
    {
        require __DIR__ . '/../views/auth/reset_password_success.php';
    }
    // </editor-fold>

    // <editor-fold desc="Logout">
    public function logout()
    {
        unset($_SESSION["authUser"]);
        unset($_SESSION);
        header('Location: /');
        exit();
    }
    // </editor-fold>
}
