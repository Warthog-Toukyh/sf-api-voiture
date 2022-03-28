<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Voiture;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($u = 0; $u < 10; $u++) {
            $user = new User();

            $hashedPass = $this->hasher->hashPassword($user, "Password");

            $user->setPassword($hashedPass);
            $user->setEmail($faker->email);

            $manager->persist($user);

            for ($v =  0; $v < random_int(2, 10); $v++) {
                $voiture = (new Voiture())->setAuthor($user)
                    ->setMarque($faker->sentence(4))
                    ->setModele($faker->sentence(2))
                    ->setEdition($faker->dateTimeInInterval('-7', '+50'))
                    ->setDescription($faker->paragraph(2));

                $manager->persist($voiture);
            }
        }

        $manager->flush();
    }
}
