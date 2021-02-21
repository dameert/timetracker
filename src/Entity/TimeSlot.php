<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TimeSlotRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TimeSlotRepository::class)
 */
class TimeSlot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time_immutable")
     */
    private \DateTimeImmutable $startTime;

    /**
     * @ORM\Column(type="time_immutable")
     */
    private \DateTimeImmutable $endTime;

    /**
     * @ORM\ManyToOne(targetEntity=Task::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private Task $task;

    /**
     * @ORM\ManyToOne(targetEntity=WorkDay::class, inversedBy="timeSlots")
     * @ORM\JoinColumn(nullable=false)
     */
    private WorkDay $workDay;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTask(): Task
    {
        return $this->task;
    }

    public function setTask(Task $task): void
    {
        $this->task = $task;
    }

    public function getWorkDay(): WorkDay
    {
        return $this->workDay;
    }

    public function setWorkDay(WorkDay $workDay): void
    {
        $this->workDay = $workDay;
    }

    public function getStartTime(): \DateTimeImmutable
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeImmutable $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getEndTime(): \DateTimeImmutable
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeImmutable $endTime): void
    {
        $this->endTime = $endTime;
    }
}
