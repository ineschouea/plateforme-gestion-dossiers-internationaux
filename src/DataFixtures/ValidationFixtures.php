<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Validation;

class ValidationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++){
            $validation = new Validation();
            $validation->setIdconv("Id de la convention n°$i")
                   ->setTache1Titre("Contenu tâche n°$i")
                   ->setTache1Decision("terminée")
                   ->setTache2Titre("Contenu tâche n°$i")
                   ->setTache2Decision("terminéé")
                   ->setTache3Titre("Contenu tâche n°$i")
                   ->setTache3Decision("en cours")
                   ->setTache4Titre("Contenu tâche n°$i")
                   ->setTache4Decision("en cours")
                   ->setDate("jj/mm/aa")
                   ->setTitreProjet("Id de projet n°$i")
                   ->setUniversite("Universite n°$i")
                   ->setNom("Nom n°$i")
                   ->setPrenom("Prenom n°$i")
                   ->setAddDomicil("Domicil n°$i") 
                   ->setAddMail("xxx.yyy@xxx.yy");     
    
             $manager->persist($validation);      
        }

        $manager->flush();
    }
}