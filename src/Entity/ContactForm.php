<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ContactFormRepository;
use Symfony\Component\Validator\Constraints\Range;

#[ORM\Entity(repositoryClass: ContactFormRepository::class)]
class ContactForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $typePhone = null;

    #[ORM\Column(length: 255)]
    private ?string $onlyfanAccount = null;

    #[ORM\Column(length: 255)]
    private ?string $hoursDay = null;

    // #[ORM\Column(length: 255)]
    // private ?string $photo = null;

    // #[ORM\Column(length: 255)]
    // private ?string $socialNetwork = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $instagram = null;

    #[ORM\Column]
    #[Range(
        min: 18,
        notInRangeMessage: 'Vous devez être majeur.'
    )]
    private ?int $age = null;

    #[ORM\Column]
    private array $content = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTypePhone(): ?string
    {
        return $this->typePhone;
    }

    public function setTypePhone(string $typePhone): static
    {
        $this->typePhone = $typePhone;

        return $this;
    }

    public function getOnlyfanAccount(): ?string
    {
        return $this->onlyfanAccount;
    }

    public function setOnlyfanAccount(string $onlyfanAccount): static
    {
        $this->onlyfanAccount = $onlyfanAccount;

        return $this;
    }

    public function getHoursDay(): ?string
    {
        return $this->hoursDay;
    }

    public function setHoursDay(string $hoursDay): static
    {
        $this->hoursDay = $hoursDay;

        return $this;
    }

    // public function getPhoto(): ?string
    // {
    //     return $this->photo;
    // }

    // public function setPhoto(string $photo): static
    // {
    //     $this->photo = $photo;

    //     return $this;
    // }

    // public function getSocialNetwork(): ?string
    // {
    //     return $this->socialNetwork;
    // }

    // public function setSocialNetwork(string $socialNetwork): static
    // {
    //     $this->socialNetwork = $socialNetwork;

    //     return $this;
    // }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(string $instagram): static
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getContent(): array
    {
        return $this->content;
    }

    public function setContent(array $content): static
    {
        $this->content = $content;

        return $this;
    }
}
