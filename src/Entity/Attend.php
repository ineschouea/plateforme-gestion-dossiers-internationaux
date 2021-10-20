<?php

namespace App\Entity;

use App\Repository\AttendRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttendRepository::class)
 */
class Attend
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
     * @ORM\Column(type="text")
     */
    private $Avis_DEVE;

    /**
     * @ORM\Column(type="text")
     */
    private $Avis_CEVU;

    /**
     * @ORM\Column(type="text")
     */
    private $Avis_CA;

    /**
     * @ORM\Column(type="text")
     */
    private $Avis_DRI;

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
    private $date_naiss;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qualite;

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
    private $add_ens_acc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domaine;

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

    public function getIdConv(): ?string
    {
        return $this->Id_conv;
    }

    public function setIdConv(string $Id_conv): self
    {
        $this->Id_conv = $Id_conv;

        return $this;
    }

    public function getAvisDEVE(): ?string
    {
        return $this->Avis_DEVE;
    }

    public function setAvisDEVE(string $Avis_DEVE): self
    {
        $this->Avis_DEVE = $Avis_DEVE;

        return $this;
    }

    public function getAvisCEVU(): ?string
    {
        return $this->Avis_CEVU;
    }

    public function setAvisCEVU(string $Avis_CEVU): self
    {
        $this->Avis_CEVU = $Avis_CEVU;

        return $this;
    }

    public function getAvisCA(): ?string
    {
        return $this->Avis_CA;
    }

    public function setAvisCA(string $Avis_CA): self
    {
        $this->Avis_CA = $Avis_CA;

        return $this;
    }

    public function getAvisDRI(): ?string
    {
        return $this->Avis_DRI;
    }

    public function setAvisDRI(string $Avis_DRI): self
    {
        $this->Avis_DRI = $Avis_DRI;

        return $this;
    }

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

    public function getDateNaiss(): ?string
    {
        return $this->date_naiss;
    }

    public function setDateNaiss(string $date_naiss): self
    {
        $this->date_naiss = $date_naiss;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getQualite(): ?string
    {
        return $this->qualite;
    }

    public function setQualite(string $qualite): self
    {
        $this->qualite = $qualite;

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

    public function getAddEnsAcc(): ?string
    {
        return $this->add_ens_acc;
    }

    public function setAddEnsAcc(string $add_ens_acc): self
    {
        $this->add_ens_acc = $add_ens_acc;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): self
    {
        $this->domaine = $domaine;

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
