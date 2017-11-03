<?php

namespace RipailleBoxBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\UserBundle\Doctrine\UserManager;

/**
 * Class UtilisateurFixtures
 * @package RipailleBoxBundle\DataFixtures\ORM
 */
class UtilisateurFixtures extends Fixture
{
    const DATA = [
        ["user", "aaaa", "test@free.fr", "ROLE_USER"],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // get user manager
        $userManager = $this->getUserManager();

        foreach (self::DATA as $userArray) {
            // create Utilisateur instance
            $utilisateur = $userManager->createUser();
            $utilisateur
                ->setPlainPassword($userArray[1])
                ->setUsername($userArray[0])
                ->setEmail($userArray[2])
                ->setRoles([$userArray[3]])
                ->setEnabled(true)
            ;

            // save categorie
            $manager->persist($utilisateur);
            $this->addReference($utilisateur->getUsername(), $utilisateur);
        }

        // flush
        $manager->flush();
    }

    /**
     * @return UserManager
     */
    private function getUserManager()
    {
        return $this->container->get("fos_user.user_manager");
    }
}
