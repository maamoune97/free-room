<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\Room;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-Fr');
        $users = [];

        $user = new User();
        $user->setFirstName('Maamoune')
            ->setLastName('Hassane')
            ->setEmail('maamoune97bv@gmail.com')
            ->setPassword($this->encoder->encodePassword($user, 'password'))
            ->setPhoneNumber('+2693216849')
            ->setCreatedAt(new DateTime());

        $manager->persist($user);
        $users[] = $user;

        for ($u = 0; $u < 36; $u++){
            $user = new User();
            $user->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setEmail($faker->freeEmail)
                ->setPassword($this->encoder->encodePassword($user, 'password'))
                ->setPhoneNumber($faker->e164PhoneNumber)
                ->setCreatedAt(new DateTime());

            $manager->persist($user);
            $users[] = $user;
        }

        for ($r=0; $r < 87 ; $r++) {
            $description = '<p>' . \join('</p><p>',$faker->paragraphs(5)) . '</p>';
            $room = new Room();
            $room->setTitle($faker->words(mt_rand(2,5), true))
                 ->setDescription($description)
                 ->setFloor(mt_rand(0,5))
                 ->setRented($faker->boolean)
                 ->setSurface(mt_rand(12,37))
                 ->setPrice($faker->randomFloat(2,250,1000))
                 ->setOwner($faker->randomElement($users))
                 ->setCoverImage($faker->imageUrl())
                 ->setCreatedAt(new DateTime());
            
                 for ($i=0; $i < mt_rand(0,6) ; $i++) { 
                     $image = new Image();
                     
                     $image->setUrl($faker->imageUrl())
                           ->setCaption($faker->sentence(4))
                           ->setRoom($room);
                    
                    $manager->persist($image);
                 }

            $manager->persist($room);
        }


        $manager->flush();
    }
}
