<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChambreRepository::class)]
class Chambre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[Assert\NotBlank(message:"Ce champs ne peut pas être vide")]
    #[Assert\Length(min:5, max:255, minMessage:"Pas assez de caractères. il faut au moins {{ limit }} caractères et {{ value }} est trop court")]
    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descrition = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_enregistrement = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescrition(): ?string
    {
        return $this->descrition;
    }

    public function setDescrition(string $descrition): static
    {
        $this->descrition = $descrition;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDateEnregistrement(): ?\DateTimeInterface
    {
        return $this->date_enregistrement;
    }

    public function setDateEnregistrement(\DateTimeInterface $date_enregistrement): static
    {
        $this->date_enregistrement = $date_enregistrement;

        return $this;
    }
}
