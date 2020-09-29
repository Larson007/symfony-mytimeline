<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Categories;
use App\Entity\Events;
use App\Entity\Timelines;
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
        // IMPORT DE FAKER
        $faker = Factory::create('fr-FR');
        //  USER
        $user = new User();
        $user   ->setEmail('mohamed@msn.com')
                ->setPassword($this->encoder->encodePassword($user, 'password'))
                ->setFirstname('Mohamed')
                ->setLastname('Ben Allal');
                $manager->persist($user);

        //  CATEGORIES
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


        //  TimeLine
        
        for ($i=0; $i < 2; $i++) { 
            
            $timeline = new Timelines;
            $timeline   ->  setTitle($faker->sentence(3))
                        ->  setStartDate($faker->year($max = 1945))
                        ->  setEndDate($faker->year($max = 'now'))
                        ->  setDescription($faker->sentence(6))
                        ->  setPublicationDate($faker->dateTime())
                        ->  setThumbnail('https://via.placeholder.com/660x280')
                        //->  setCategories($faker->numberBetween('123','132'))
                        ;
            $manager->persist($timeline);
        }

        //  Event
        /*
        for ($e=0; $e < 6; $e++) { 
            
            $events = new Events;
            $events ->setYear($faker->year())
                    ->setEndYear($faker->year())
                    ->setHeadline($faker->sentence(3))
                    ->setText($faker->sentence(6))
                    ->setMedia('https://via.placeholder.com/660x280')
            ;

            $manager->persist($events);
        }
        */

        $manager->flush();
    }
}
