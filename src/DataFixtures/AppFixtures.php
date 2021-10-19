<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Sortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    
    public function load(ObjectManager $manager)
    {
        
        $faker = Factory::create('fr_FR');

        for ($nbUsers = 0; $nbUsers < 10; $nbUsers++) {

            $user = new User();
            $user->setEmail($faker->email());
            $user->setNom($faker->lastName());
            $user->setAvatar($faker->imageUrl());
            $user->setDatecreationducompte($faker->dateTime());
            $user->setMiseajourcreationducompte($faker->dateTime());
            $user->setPrenom($faker->firstName());
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
            $manager->persist($user);
            $manager->flush();

            $this->addReference('user_'. $nbUsers, $user);

        }

        for ($i = 0; $i < 10; $i++) {

            $users = $this->getReference('user_'. $faker->numberBetween(0,5));
            $sortie = new Sortie();
            $sortie->setUser($users);
            $sortie->setDate($faker->dateTime());
            $sortie->setVille($faker->text());
            $sortie->setAdresse($faker->text());
            $sortie->setImage($faker->imageUrl());
            $sortie->setDescription($faker->text());
            $sortie->setDatecreationsortie($faker->dateTime());
            $sortie->setMiseajoursortie($faker->dateTime());
            $manager->persist($sortie);
            $manager->flush();

        } 
    }
}
