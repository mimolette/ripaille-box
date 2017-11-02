<?php

namespace RipailleBoxBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use RipailleBoxBundle\Entity\Categorie;

/**
 * Class CategorieFixtures
 * @package RipailleBoxBundle\DataFixtures\ORM
 */
class CategorieFixtures extends Fixture
{
    const data = [
        ["légume", "#212121", "#EEEEEE"],
        ["fruit", "#212121", "#EEEEEE"],
        ["viande", "#212121", "#EEEEEE"],
        ["poisson", "#212121", "#EEEEEE"],
        ["boisson", "#212121", "#EEEEEE"],
        ["féculent", "#212121", "#EEEEEE"],
        ["produit laitier", "#212121", "#EEEEEE"],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach (self::data as $categorieArray) {
            // create Categorie instance
            $categorieObj = new Categorie();
            $categorieObj
                ->setNom($categorieArray[0])
                ->setCouleur($categorieArray[1])
                ->setCouleurFond($categorieArray[2])
            ;

            // save categorie
            $manager->persist($categorieObj);
        }

        // flush
        $manager->flush();
    }
}
