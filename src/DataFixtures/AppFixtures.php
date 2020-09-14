<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Themes;
use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder )
    {
         // On stock la propriété private $encoder dans la fonction public $encoder pour l'utiliser dans tt les function du fichier Fixture AppFixtures
        $this->encoder = $encoder;                                 
    }
    
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user   ->setEmail('mohamed@msn.com')
                ->setPassword($this->encoder->encodePassword($user, 'password'))
                ->setFirstname('Mohamed')
                ->setLastname('Ben Allal');
                $manager->persist($user);

        $art = new Categories();
        $geographie = new Categories();
        $histoire = new Categories();
        $loisirs = new Categories();
        $medecine = new Categories();
        $politique = new Categories();
        $religion = new Categories();
        $sciences = new Categories();
        $societe = new Categories();
        $sport = new Categories();
        $technologie = new Categories();

        $art->setThemes('Art');
        $manager->persist($art);

        $geographie->setThemes('Géographie');
        $manager->persist($art);

        $histoire->setThemes('Histoire');
        $manager->persist($histoire);

        $loisirs->setThemes('Loisir');
        $manager->persist($loisirs);

        $medecine->setThemes('Médecine');
        $manager->persist($medecine);

        $politique->setThemes('Politique');
        $manager->persist($politique);

        $religion->setThemes('Religion');
        $manager->persist($religion);

        $sciences->setThemes('Sciences');
        $manager->persist($sciences);

        $societe->setThemes('Société');
        $manager->persist($societe);

        $sport->setThemes('Sport');
        $manager->persist($sport);
        
        $technologie->setThemes('Technologie');
        $manager->persist($technologie);

        $manager->flush();
    }
}
