<?php

namespace App\Security\Voter;

use App\Entity\Chemise;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;


class ChemiseVoter extends Voter
{
    public const MODIF = 'modifChemise';
    public const SUPPR = 'deleteChemise';
    private $security;

//    public const VIEW = 'POST_VIEW';

    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    protected function supportsModif(string $attribute, mixed $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, [self::MODIF])
            && $subject instanceof Chemise;
    }
    protected function supportsDelete(string $attribute, mixed $subject): bool
    {

        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, [self::SUPPR])
            && $subject instanceof Chemise;
    }

    protected function voteOnAttributeModif(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof User) {
            return false;
        }

        if ($attribute === self::MODIF && $user->getId() === $subject->getUser()->getId() || $this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }
        return false;

    }
    protected function voteOnAttributeDelete(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof User) {
            return false;
        }

        if ($attribute === self::SUPPR && $user->getId() === $subject->getUser()->getId() || $this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }
        return false;

    }
}
