<?php

namespace App\DataFixtures;

use App\Entity\Consultation;
use App\Entity\Medication;
use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       $product = (new Patient())->setName("Dupont Charles");
       $medication = (new Medication())->setLabel("Tadax");
       $consultation = (new Consultation())->setUsername("Docotor")->setPassword("doctor")->setDoctorMatricule();

        $manager->persist($product,$medication);
        $manager->flush();
    }
}
