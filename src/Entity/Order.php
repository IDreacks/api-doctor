<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\UniqueConstraint(name: "unique_medication_by_prescription", columns: ["medication_id", "consultation_id"])]
#[ORM\Table(name: '`order`')]
#[ApiResource]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $postlogy;

    #[ORM\ManyToOne(targetEntity: Medication::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $medication;

    #[ORM\ManyToOne(targetEntity: Consultation::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $consultation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostlogy(): ?string
    {
        return $this->postlogy;
    }

    public function setPostlogy(?string $postlogy): self
    {
        $this->postlogy = $postlogy;

        return $this;
    }

    public function getMedication(): ?Medication
    {
        return $this->medication;
    }

    public function setMedication(?Medication $medication): self
    {
        $this->medication = $medication;

        return $this;
    }

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(?Consultation $consultation): self
    {
        $this->consultation = $consultation;

        return $this;
    }
}
