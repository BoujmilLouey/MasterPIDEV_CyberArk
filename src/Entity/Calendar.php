<?php

namespace App\Entity;

use App\Repository\CalendarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CalendarRepository::class)
 */
class Calendar
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ajouter un titre")
     */
    private $Titre;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Ajouter un date de debut")
     */
    private $start;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Ajouter un date de fin")
     */
    private $end;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $allday;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $background_color;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $boarder_color;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $texte_color;

    /**
     * @ORM\ManyToMany(targetEntity=EventsReservation::class, mappedBy="LesEvenements")
     */
    private $eventsReservations;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="calendars")
     */
    private $User;

    public function __construct()
    {
        $this->eventsReservations = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAllday(): ?bool
    {
        return $this->allday;
    }

    public function setAllday(bool $allday): self
    {
        $this->allday = $allday;

        return $this;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->background_color;
    }

    public function setBackgroundColor(string $background_color): self
    {
        $this->background_color = $background_color;

        return $this;
    }

    public function getBoarderColor(): ?string
    {
        return $this->boarder_color;
    }

    public function setBoarderColor(string $boarder_color): self
    {
        $this->boarder_color = $boarder_color;

        return $this;
    }

    public function getTexteColor(): ?string
    {
        return $this->texte_color;
    }

    public function setTexteColor(string $texte_color): self
    {
        $this->texte_color = $texte_color;

        return $this;
    }



    public function __toString() {
        return $this->Titre;
    }

    /**
     * @return Collection<int, EventsReservation>
     */
    public function getEventsReservations(): Collection
    {
        return $this->eventsReservations;
    }

    public function addEventsReservation(EventsReservation $eventsReservation): self
    {
        if (!$this->eventsReservations->contains($eventsReservation)) {
            $this->eventsReservations[] = $eventsReservation;
            $eventsReservation->addLesEvenement($this);
        }

        return $this;
    }

    public function removeEventsReservation(EventsReservation $eventsReservation): self
    {
        if ($this->eventsReservations->removeElement($eventsReservation)) {
            $eventsReservation->removeLesEvenement($this);
        }

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
