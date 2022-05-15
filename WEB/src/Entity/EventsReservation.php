<?php

namespace App\Entity;

use App\Repository\EventsReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventsReservationRepository::class)
 */
class EventsReservation
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
    private $tel;

    /**
     * @ORM\Column(type="integer")
     */
    private $Reservations;

    /**
     * @ORM\ManyToMany(targetEntity=Calendar::class, inversedBy="eventsReservations")
     */
    private $LesEvenements;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="eventsReservations")
     */
    private $User;

    public function __construct()
    {
        $this->LesEvenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getReservations(): ?int
    {
        return $this->Reservations;
    }

    public function setReservations(int $Reservations): self
    {
        $this->Reservations = $Reservations;

        return $this;
    }

    /**
     * @return Collection<int, Calendar>
     */
    public function getLesEvenements(): Collection
    {
        return $this->LesEvenements;
    }

    public function addLesEvenement(Calendar $lesEvenement): self
    {
        if (!$this->LesEvenements->contains($lesEvenement)) {
            $this->LesEvenements[] = $lesEvenement;
        }

        return $this;
    }

    public function removeLesEvenement(Calendar $lesEvenement): self
    {
        $this->LesEvenements->removeElement($lesEvenement);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
