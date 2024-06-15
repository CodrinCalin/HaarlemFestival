<?php

namespace App\Services;

use App\exception\TokenExpiredException;
use App\exception\TokenNotFoundException;
use App\Repositories\ResetTokenRepository;
use App\Repositories\UserRepository;

class ResetTokenService
{
    private $tokenRepository;
    private $userRepository;

    private function getNewInstance()
    {
        $this->tokenRepository = new ResetTokenRepository();
        $this->userRepository = new UserRepository();
    }

    public function getResetTokenByToken($token)
    {
        $this->getNewInstance();
        $resetToken = $this->tokenRepository->fetchResetTokenByToken($token);

        if(!$resetToken) throw new TokenNotFoundException();

        if ($resetToken->expiration <= date('Y-m-d H:i:s')) throw new TokenExpiredException();

        return $resetToken;
    }

    public function addResetToken($email, string $token)
    {
        $this->getNewInstance();
        $this->tokenRepository->addResetToken($email, $token);
    }

    public function deleteExistingTokens(string $email)
    {
        $this->getNewInstance();
        $tokens = $this->tokenRepository->fetchAllResetTokensByEmail($email);
        if(count($tokens) > 0){
            foreach ($tokens as $token){
                $this->deleteResetTokenByToken($token->token);
            }
        }
    }

    public function checkIfTokenIsValid(string $token)
    {
        if($this->tokenRepository->checkIfTokenIsValid($token)){
            return true;
        }
        return false;
    }

    public function deleteResetTokenByToken($token)
    {
        $this->tokenRepository->deleteResetTokenByToken($token);
    }
}