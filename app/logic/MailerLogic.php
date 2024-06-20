<?php
namespace App\Logic;
use PHPMailer\PHPMailer\PHPMailer;

class MailerLogic{
    private $mailOutbound;
    private $mailHost = 'smtp.gmail.com';
    private $sender = 'ignmontvydas@gmail.com';
    private $smtpPass = 'dvxsihggslhmyksn';

    public function __construct(){
        $this->mailInit();
    }

    private function mailInit()
    {
        $this->mailOutbound = new PHPMailer(true);

        $this->mailOutbound->isSMTP();
        $this->mailOutbound->Host = $this->mailHost;
        $this->mailOutbound->SMTPAuth = true;
        $this->mailOutbound->Username = $this->sender; // SMTP username
        $this->mailOutbound->Password = $this->smtpPass; // SMTP password
        $this->mailOutbound->SMTPSecure = 'tls'; // Enable TLS encryption
        $this->mailOutbound->Port = 587; // TCP port connect

        $this->mailOutbound->setFrom($this->sender);
        $this->mailOutbound->isHTML(true);
    }

    public function setMailInfo($email, $subject, $body)
    {
        $this->mailOutbound->addAddress($email);
        $this->mailOutbound->Subject = $subject;
        $this->mailOutbound->Body = $body;
    }

    public function sendMail()
    {
        $this->mailOutbound->send();
    }

    public function mailClassTest(){
        echo "Hello from MailLogic Class";
    }
}

