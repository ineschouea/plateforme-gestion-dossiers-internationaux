<?php

namespace App\Entity;

use App\Repository\ValidationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ValidationRepository::class)
 */
class Validation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Id_conv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tache1_titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tache1_decision;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tache2_titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tache2__decision;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tache3_titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tache3_decision;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tache4_titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tache4_decision;
    /**
     * @ORM\Column(type="string", length=255)
     */
  
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $add_mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $add_domicil;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreProjet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $universite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTache1Titre(): ?string
    {
        return $this->tache1_titre;
    }

    public function setTache1Titre(string $tache1_titre): self
    {
        $this->tache1_titre = $tache1_titre;

        return $this;
    }

    public function getTache1Decision(): ?string
    {
        return $this->tache1_decision;
    }

    public function setTache1Decision(string $tache1_decision): self
    {
        $this->tache1_decision = $tache1_decision;

        return $this;
    }

    public function getTache2Titre(): ?string
    {
        return $this->tache2_titre;
    }

    public function setTache2Titre(string $tache2_titre): self
    {
        $this->tache2_titre = $tache2_titre;

        return $this;
    }

    public function getTache2Decision(): ?string
    {
        return $this->tache2__decision;
    }

    public function setTache2Decision(string $tache2__decision): self
    {
        $this->tache2__decision = $tache2__decision;

        return $this;
    }

    public function getTache3Titre(): ?string
    {
        return $this->tache3_titre;
    }

    public function setTache3Titre(string $tache3_titre): self
    {
        $this->tache3_titre = $tache3_titre;

        return $this;
    }

    public function getTache3Decision(): ?string
    {
        return $this->tache3_decision;
    }

    public function setTache3Decision(string $tache3_decision): self
    {
        $this->tache3_decision = $tache3_decision;

        return $this;
    }

    public function getTache4Titre(): ?string
    {
        return $this->tache4_titre;
    }

    public function setTache4Titre(string $tache4_titre): self
    {
        $this->tache4_titre = $tache4_titre;

        return $this;
    }

    public function getTache4Decision(): ?string
    {
        return $this->tache4_decision;
    }

    public function setTache4Decision(string $tache4_decision): self
    {
        $this->tache4_decision = $tache4_decision;

        return $this;
    }
    public function getIdConv(): ?string
    {
        return $this->Id_conv;
    }

    public function setIdConv(string $Id_conv): self
    {
        $this->Id_conv = $Id_conv;

        return $this;
    }
    ///////////////////////
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getAddMail(): ?string
    {
        return $this->add_mail;
    }

    public function setAddMail(string $add_mail): self
    {
        $this->add_mail = $add_mail;

        return $this;
    }

    public function getAddDomicil(): ?string
    {
        return $this->add_domicil;
    }

    public function setAddDomicil(string $add_domicil): self
    {
        $this->add_domicil = $add_domicil;

        return $this;
    }


    

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTitreProjet(): ?string
    {
        return $this->titreProjet;
    }

    public function setTitreProjet(string $titre): self
    {
        $this->titreProjet = $titre;

        return $this;
    }

    public function getUniversite(): ?string
    {
        return $this->universite;
    }

    public function setUniversite(string $univ): self
    {
        $this->universite = $univ;

        return $this;
    }
}