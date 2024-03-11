<?php
namespace App\Controllers;

use App\Models\User;
use App\Services\UserService;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController
{
    private $service;
    private $mail;

    function __construct()
    {
        session_start();
        $this->service = new UserService();
        $this->mailInit();
    }

    private function mailInit()
    {
        $this->mail = null;

        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'ignmontvydas@gmail.com'; // SMTP username
        $this->mail->Password = 'dvxsihggslhmyksn'; // SMTP password
        $this->mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $this->mail->Port = 587; // TCP port connect

        $this->mail->setFrom('ignmontvydas@gmail.com');
        $this->mail->isHTML(true);
    }

    private function setMailInfo($email, $subject, $body)
    {
        $this->mail->addAddress($email);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
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

    public function forgotPassword()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["email"])) {
                $email = $_POST["email"];
                $user = $this->service->getUserByEmail($email);

                if ($user) {
                    $token = bin2hex(random_bytes(32)); // Token generation
                    $this->service->storeResetToken($email, $token);

                    $reset_link = "/auth/resetpassword?token=$token";
                    try
                    {
                        $this->mailInit();

                        $mailSubject = "[Password Reset] Haarlem Website";
                        $mailBody = "Click the following link to reset your password: $reset_link";

                        $this->setMailInfo($email, $mailSubject, $mailBody);


                        $this->mail->send();
                    }catch (Exception $e){
                        echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
                    }
                    $_POST = array();
                    header("Location: /auth/forgotpasswordsuccess");
                    exit();
                } else {
                    echo "User not found!";
                }
            }
        } else {
            require __DIR__ . '/../views/auth/forgotpassword.php';
        }
    }

    public function resetPassword()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["token"])) {
            $token = $_GET["token"];
            $email = $this->service->getEmailByResetToken($token); // Get verified email by the token

            if ($email) {
                require __DIR__ . '/../views/auth/resetpassword.php';
            } else {
                echo "Invalid token!";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["token"])) {
            $token = $_POST["token"];
            $newPassword = $_POST["password"];
            // Reset password logic
            $email = $this->service->getEmailByResetToken($token);

            if ($email) {
                $this->service->updatePasswordByEmail($email, $newPassword);

                header("Location: /login");
                exit();
            } else {
                echo "Invalid token!";
            }
        } else {
            http_response_code(400);
            echo "Token not provided!";
        }
    }

    public function forgotpasswordsuccess()
    {
        require __DIR__ . '/../views/auth/forgotpasswordsuccess.php';
    }
}