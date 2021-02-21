<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\WorkDayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorkDayRepository::class)
 */
class WorkDay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date_immutable", unique=true)
     */
    private \DateTimeImmutable $date;

    /**
     * @ORM\OneToMany(targetEntity=TimeSlot::class, mappedBy="workDay", orphanRemoval=true)
     */
    private Collection $timeSlots;

    public function __construct()
    {
        $this->timeSlots = new ArrayCollection();
        $this->date = new \DateTimeImmutable('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Collection|TimeSlot[]
     */
    public function getTimeSlots(): Collection
    {
        return $this->timeSlots;
    }

    public function addTimeSlot(TimeSlot $timeSlot): void
    {
        if (!$this->timeSlots->contains($timeSlot)) {
            $this->timeSlots[] = $timeSlot;
            $timeSlot->setWorkDay($this);
        }
    }

    public function removeTimeSlot(TimeSlot $timeSlot): void
    {
        if ($this->timeSlots->removeElement($timeSlot)) {
            // set the owning side to null (unless already changed)
            if ($timeSlot->getWorkDay() === $this) {
                $timeSlot->setWorkDay(null);
            }
        }
    }

    public function __toString(): string
    {
        return $this->getDate()->format('d/m/y');
    }
}
