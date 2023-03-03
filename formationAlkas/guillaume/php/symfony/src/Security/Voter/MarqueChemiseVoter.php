<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class MarqueChemiseVoter extends Voter
{
    public const EDIT = 'modifMarque';
//    public const VIEW = 'POST_VIEW';
    private $security;

//    public const VIEW = 'POST_VIEW';

    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    protected function supports(string $attribute, mixed $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, [self::EDIT])
            && $subject instanceof \App\Entity\MarqueChemise;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof User) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        if ($attribute === self::EDIT && $user->getId() === $subject->getUser()->getId() || $this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        return false;
    }
}
