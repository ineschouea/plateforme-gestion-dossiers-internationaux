<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Attend;

class AttendFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 20; $i++){
            $attend = new Attend();
            $attend->setIdconv("Id de la convention n°$i")
                   ->setAvisDEVE(" point de vus de DEVE de la convention n°$i")
                   ->setAvisCEVU(" point de vus de CEVU de la convention n°$i")
                   ->setAvisCA(" point de vus de CA de la convention n°$i")
                   ->setAvisDRI("")
                   ->setNom("Nom n°$i")
                   ->setPrenom("Prenom  n°$i")
                   ->setDateNaiss("10/04/1996")
                   ->setNationalite("Nationalité n°$i")
                   ->setQualite("Qualité n°$i")
                   ->setAddMail("foulet.felten@xxx.yy")
                   ->setAddDomicil("Domicile n°$i")
                   ->setAddEnsAcc("Enseignant n°$i")
                   ->setTitre("Titre n°$i")
                   ->setType("Type n°$i")
                   ->setDomaine("Domaine n°$i")
                   ->setDate("10/04/1996")
                   ->setTitreProjet("Titre projet n°$i")
                   ->setUniversite("Universite n°$i");
             $manager->persist($attend);      
        }

        $manager->flush();
    }
}
